<?php

/**
 * ECSHOP 文章及文章分类相关函数库
 * ============================================================================

 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: lib_article.php 17217 2011-01-19 06:29:08Z liubo $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

/**
 * 获得文章分类下的文章列表
 *
 * @access  public
 * @param   integer     $cat_id
 * @param   integer     $page
 * @param   integer     $size
 *
 * @return  array
 */
function get_cat_articles($cat_id, $page = 1, $size = 20 ,$requirement='')
{
    //取出所有非0的文章
    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
    //增加搜索条件，如果有搜索内容就进行搜索    
    if ($requirement != '')
    {
        $sql = 'SELECT article_id, title, author, add_time, file_url, open_type,content' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND title like \'%' . $requirement . '%\' ' .
               ' ORDER BY article_type DESC, article_id DESC';
    }
    else 
    {
        
        $sql = 'SELECT article_id, title, author, add_time, file_url, open_type,content' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND ' . $cat_str .
               ' ORDER BY article_type DESC, article_id DESC';
    }

    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page-1) * $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['article_id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['title']       = $row['title'];
            $arr[$article_id]['content']       = $row['title'];
            $arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = $row['open_type'] != 1 ? build_uri('article', array('aid'=>$article_id), $row['title']) : trim($row['file_url']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);
            $arr[$article_id]['file_url']    = trim($row['file_url']);
        }
    }

    return $arr;
}

/**
 * 获得指定分类下的文章总数
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */
function get_article_count($cat_id ,$requirement='')
{
    global $db, $ecs;
    if ($requirement != '')
    {
        $count = $db->getOne('SELECT COUNT(*) FROM ' . $ecs->table('article') . ' WHERE ' . get_article_children($cat_id) . ' AND  title like \'%' . $requirement . '%\'  AND is_open = 1');
    }
    else
    {
        $count = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('article') . " WHERE " . get_article_children($cat_id) . " AND is_open = 1");
    }
    return $count;
}
/*
* ============================== 截取含有 html标签的字符串 =========================
* @param (string) $str   待截取字符串
* @param (int)  $lenth  截取长度
* @param (string) $repalce 超出的内容用$repalce替换之（该参数可以为带有html标签的字符串）
* @param (string) $anchor 截取锚点，如果截取过程中遇到这个标记锚点就截至该锚点处
* @return (string) $result 返回值
* @demo  $res = cut_html_str($str, 256, '...'); //截取256个长度，其余部分用'...'替换
* ===============================================================================
*/

function cut_html_str($str, $lenth, $replace = '...', $anchor = '<!-- break -->')
{
    $_lenth = mb_strlen($str, "utf-8"); // 统计字符串长度（中、英文都算一个字符）
    if ($_lenth <= $lenth) {
        return $str;    // 传入的字符串长度小于截取长度，原样返回
    }
    $strlen_var = strlen($str);     // 统计字符串长度（UTF8编码下-中文算3个字符，英文算一个字符）
    if (strpos($str, '<') === false) {
        return mb_substr($str, 0, $lenth);  // 不包含 html 标签 ，直接截取
    }
    if ($e = strpos($str, $anchor)) {
        return mb_substr($str, 0, $e);  // 包含截断标志，优先
    }
    $html_tag = 0;  // html 代码标记
    $result = '';   // 摘要字符串
    $html_array = array('left' => array(), 'right' => array()); //记录截取后字符串内出现的 html 标签，开始=>left,结束=>right
    /*
    * 如字符串为：<h3><p><b>a</b></h3>，假设p未闭合，数组则为：array('left'=>array('h3','p','b'), 'right'=>'b','h3');
    * 仅补全 html 标签，<? <% 等其它语言标记，会产生不可预知结果
    */
    for ($i = 0; $i < $strlen_var; ++$i) {
        if (!$lenth) break;  // 遍历完之后跳出
        $current_var = substr($str, $i, 1); // 当前字符
        if ($current_var == '<') { // html 代码开始
            $html_tag = 1;
            $html_array_str = '';
        } else if ($html_tag == 1) { // 一段 html 代码结束
            if ($current_var == '>') {
                $html_array_str = trim($html_array_str); //去除首尾空格，如 <br / > < img src="" / > 等可能出现首尾空格
                if (substr($html_array_str, -1) != '/') { //判断最后一个字符是否为 /，若是，则标签已闭合，不记录
                    // 判断第一个字符是否 /，若是，则放在 right 单元
                    $f = substr($html_array_str, 0, 1);
                    if ($f == '/') {
                        $html_array['right'][] = str_replace('/', '', $html_array_str); // 去掉 '/'
                    } else if ($f != '?') { // 若是?，则为 PHP 代码，跳过
                        // 若有半角空格，以空格分割，第一个单元为 html 标签。如：<h2 class="a"> <p class="a">
                        if (strpos($html_array_str, ' ') !== false) {
                            // 分割成2个单元，可能有多个空格，如：<h2 class="" id="">
                            $html_array['left'][] = strtolower(current(explode(' ', $html_array_str, 2)));
                        } else {
                            //若没有空格，整个字符串为 html 标签，如：<b> <p> 等，统一转换为小写
                            $html_array['left'][] = strtolower($html_array_str);
                        }
                    }
                }
                $html_array_str = ''; // 字符串重置
                $html_tag = 0;
            } else {
                $html_array_str .= $current_var; //将< >之间的字符组成一个字符串,用于提取 html 标签
            }
        } else {
            --$lenth; // 非 html 代码才记数
        }
        $ord_var_c = ord($str{$i});
        switch (true) {
            case (($ord_var_c & 0xE0) == 0xC0): // 2 字节
                $result .= substr($str, $i, 2);
                $i += 1;
                break;
            case (($ord_var_c & 0xF0) == 0xE0): // 3 字节
                $result .= substr($str, $i, 3);
                $i += 2;
                break;
            case (($ord_var_c & 0xF8) == 0xF0): // 4 字节
                $result .= substr($str, $i, 4);
                $i += 3;
                break;
            case (($ord_var_c & 0xFC) == 0xF8): // 5 字节
                $result .= substr($str, $i, 5);
                $i += 4;
                break;
            case (($ord_var_c & 0xFE) == 0xFC): // 6 字节
                $result .= substr($str, $i, 6);
                $i += 5;
                break;
            default: // 1 字节
                $result .= $current_var;
        }
    }
    if ($html_array['left']) { //比对左右 html 标签，不足则补全
        $html_array['left'] = array_reverse($html_array['left']); //翻转left数组，补充的顺序应与 html 出现的顺序相反
        foreach ($html_array['left'] as $index => $tag) {
            $key = array_search($tag, $html_array['right']); // 判断该标签是否出现在 right 中
            if ($key !== false) { // 出现，从 right 中删除该单元
                unset($html_array['right'][$key]);
            } else { // 没有出现，需要补全
                $result .= '</' . $tag . '>';
            }
        }
    }
    return $result . $replace;
}

?>