<?php
//
//    ______     ______     __  __
//   /\  ___\   /\  ___\   /\_\_\_\
//   \ \  __\   \ \ \____  \/_/\_\/_
//    \ \_____\  \ \_____\   /\_\/\_\
//     \/_____/   \/_____/   \/_/\/_
//
//   英斯特哈博（北京）科技有限公司
//
//  -----------------------------------------------------------------------------
//
//   一、协议的许可和权利
//
//    1. 您可以在完全遵守本协议的基础上，将本软件应用于商业用途；
//    2. 您可以在协议规定的约束和限制范围内修改本产品源代码或界面风格以适应您的要求；
//    3. 您拥有使用本产品中的全部内容资料、商品信息及其他信息的所有权，并独立承担与其内容相关的
//       法律义务；
//    4. 获得商业授权之后，您可以将本软件应用于商业用途，自授权时刻起，在技术支持期限内拥有通过
//       指定的方式获得指定范围内的技术支持服务；
//
//   二、协议的约束和限制
//
//    1. 未获商业授权之前，禁止将本软件用于商业用途（包括但不限于企业法人经营的产品、经营性产品
//       以及以盈利为目的或实现盈利产品）；
//    2. 未获商业授权之前，禁止在本产品的整体或在任何部分基础上发展任何派生版本、修改版本或第三
//       方版本用于重新开发；
//    3. 如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回并承担相应法律责任；
//
//   三、有限担保和免责声明
//
//    1. 本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的；
//    2. 用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未获得商业授权之前，我们不承
//       诺提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任；
//    3. 英斯特哈博（北京）科技有限公司不对使用本产品构建的商城中的内容信息承担责任，但在不侵犯
//       用户隐私信息的前提下，保留以任何方式获取用户信息及商品信息的权利；
//
//   有关本产品最终用户授权协议、商业授权与技术服务的详细内容，均由英斯特哈博（北京）科技有限公司
//   独家提供。英斯特哈博（北京）科技有限公司拥有在不事先通知的情况下，修改授权协议的权力，修改后
//   的协议对改变之日起的新授权用户生效。电子文本形式的授权协议如同双方书面签署的协议一样，具有完
//   全的和等同的法律效力。您一旦开始修改、安装或使用本产品，即被视为完全理解并接受本协议的各项条
//   款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反
//   本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。
//
//  -----------------------------------------------------------------------------
//
return [
    //HTTP响应头

    /**
     * 允许向该服务器提交请求（跨站）的URI，对于一个不带有credentials的请求,可以指定为'*',表示允许来自所有域的请求.
     */
    'allowOrigins' => ['*'],

    /**
     * 在响应预检请求的时候使用.用来指明在实际的请求中,可以使用哪些自定义HTTP请求头.
     */
   // 'allowHeaders' => ['Content-Type', 'Origin', 'accept', 'Authorization'],
    'allowHeaders' => ['*'],

    /**
     * 指明资源可以被请求的方式有哪些(一个或者多个). 这个响应头信息在客户端发出预检请求的时候会被返回.
     */
    'allowMethods' => ['GET','POST','PUT','DELETE','OPTIONS'],

    /**
     * 附带凭证信息的请求，默认是true（附带）
     *
     * 对于跨站请求，浏览器是不会发送凭证信息。
     * XMLHttpRequest的withCredentials标志设置为true，从而使得Cookies可以随着请求发送，但是，如果服务器端的响应中，
     * 如果没有返回Access-Control-Allow-Credentials: true的响应头，那么浏览器将不会把响应结果传递给发出请求的脚步程序，
     * 以保证信息的安全。
     *
     */
    'allowCredentials' => true,

    /**
     * 设置浏览器允许访问的服务器的头信息的白名单:
     */
    'exposeHeaders' => ['X-ECAPI-ErrorCode', 'X-ECAPI-ErrorDesc'],

    /**
     * 本次“预请求 OPTIONS ”的响应结果有效时间（单位：秒）， 默认1天
     * 浏览器在处理针对该服务器的跨站请求，都可以无需再发送“预请求”，只需根据本次结果进行处理
     *
     * “预请求”要求必须先发送一个 OPTIONS 请求给目的站点，来查明这个跨站请求对于目的站点是不是安全可接受的
     * 需要发送预请求的方法： POST,PUT,DELETE
     * 从Gecko 2.0开始，text/plain, application/x-www-form-urlencoded 和 multipart/form-data 类型的数据
     * 都可以直接用于跨站请求，而不需要先发起“预请求”了
     *
     */
    'maxAge' => 86400
];