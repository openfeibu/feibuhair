<?php

namespace App\Models\v2;

use App\Models\BaseModel;

use App\Helper\Token;
use App\Helper\XXTEA;
use App\Services\Cloud\Client;
use App\Services\QiNiu\QiNiu;
use App\Services\Other\JSSDK;
use App\Services\Shopex\Authorize;

class Configs extends BaseModel
{
    protected $connection = 'shop';

    protected $table = 'config';

    protected $guarded = [];

    public $timestamps   = true;

    public static function getList(array $attributes)
    {
        extract($attributes);
        $url = isset($url) ? $url : null;
        $data = self::where('status', 1)->get();
        $config = ['config' => self::formatConfig($data, $url), 'feature' => Features::getList(), 'platform' => self::getApplicationPlatform()];
        return self::formatBody(['data' => base64_encode(XXTEA::encrypt($config, 'getprogname()'))]);
    }

    public static function getWeChat(array $attributes)
    {
        extract($attributes);
        $url = isset($url) ? $url : null;
        $data = self::where('status', 1)->where('code', 'wechat.web')->get();
        $config = ['config' => self::formatConfig($data, $url), 'feature' => Features::getList(), 'platform' => self::getApplicationPlatform()];
        return self::formatBody(['data' => base64_encode(XXTEA::encrypt($config, 'getprogname()'))]);
    }

    private static function getApplicationPlatform()
    {
        return [
            'type'      => self::B2C,
            'vendor'    => self::ECSHOP,
            'version'   => '3.5.0'
        ];
    }

    public static function checkConfig($code)
    {
        if (!$license = Token::decode_license()) {
            return self::formatError(4444, trans('message.license.invalid'));
        }

        switch ($code) {
            case 'sms':
                if ($license['permissions']['sms'] !== true) {
                    return self::formatError(4445, trans('message.license.unauthorized'));
                }
                return self::initLeanCloud();
                break;
        }

        return true;
    }

    public static function verifyConfig(array $params, $config)
    {
        if (!isset($config->config)) {
            return false;
        }

        $data = json_decode($config->config, true);

        foreach ($params as $key => $value) {
            if (!isset($data[$value])) {
                return false;
            }
        }

        return $data;
    }

    private static function initLeanCloud()
    {
        if (!$cloud = Configs::where('code', 'leancloud')->first()) {
            return self::formatError(3001, trans('message.cloud.config'));
        }

        if (!$cloud->status) {
            return self::formatError(3002, trans('message.cloud.notopen'));
        }

        $cloud_config = json_decode($cloud->config);
        if ($cloud_config && isset($cloud_config->app_id) && isset($cloud_config->app_key)) {
            Client::initialize($cloud_config->app_id, $cloud_config->app_key);
            return true;
        } else {
            return self::formatError(3001, trans('message.cloud.config'));
        }
    }

    private static function formatConfig($data, $url)
    {
        $body = null;
        foreach ($data as $value) {
            $arr = json_decode($value->config, true);

            //qiniu?????????
            if ($value->code == 'qiniu') {
                if (!empty($value->config)) {
                    $qiniu = new QiNiu($arr['app_key'], $arr['secret_key']);
                    unset($arr['app_key']);
                    unset($arr['secret_key']);
                    $arr['token'] = $qiniu->uploadToken(array('scope' => $arr['bucket']));
                }
            }

            //wxpay.web jssdk
            if ($value->code == 'wechat.web' && $value->status) {
                if (!empty($value->config)) {
                    $jssdk = new JSSDK($arr['app_id'], $arr['app_secret']);
                    $arr = $jssdk->GetSignPackage($url);
                }
            }

            if ($value->code == 'wxpay.web' && $value->status) {
                if (!empty($value->config)) {
                    $jssdk = new JSSDK($arr['app_id'], $arr['app_secret']);
                    $arr = $jssdk->GetSignPackage($url);
                }
            }

            if (is_array($arr)) {
                $body[$value->code] = $arr;
            }
        }

        $body['authorize'] = false;

        $response = Authorize::info();
        if ($response['result'] == 'success') {
            // ???????????????...
            if ($response['info']['authorize_code'] == 'NDE') {
                $body['authorize'] = true;
            }
        }

        //????????????
        unset($body['alipay.app']);
        unset($body['wxpay.app']);
        unset($body['unionpay.app']);
        unset($body['leancloud']['master_key']);

        return $body;
    }
}
