<?php

/**
 * ECSHOP 程序说明
 * ===========================================================

 * ----------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ==========================================================
 * $Author: wangleisvn $
 * $Id: lead.php 16131 2009-05-31 08:21:41Z wangleisvn $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 移动端全民分销开通引导页
/*------------------------------------------------------ */
if ($_REQUEST['act']== 'list')
{
    /* 检查权限 */
    admin_priv('lead');
    $url_cur = $_SERVER['HTTP_REFERER'];
    $url_arr = explode('/admin',$url_cur);
    $smarty->assign('ur_here', $_LANG['lead_here']);
    $smarty->assign('url',$url_arr[0]);
    $smarty->display('lead.htm');
}
?>