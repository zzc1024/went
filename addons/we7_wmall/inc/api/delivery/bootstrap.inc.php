<?php




defined('IN_IA') || exit('Access Denied');
global $_W;
global $_GPC;
$_POST = &$_POST;
mload()->classs('TyAccount');
mload()->model('common');
mload()->model('store');
mload()->model('order');
mload()->model('deliveryer');
define('IN_DELIVERYAPP', 1);
if (in_array($do, array('login'))) 
{
	$result = api_check_sign($_POST, $_POST['sign']);
	if (!($result)) 
	{
	}
}
else 
{
	$token = trim($_POST['token']);
	if (empty($token)) 
	{
		message(ierror(-1, '身份验证失败, 请重新登陆'), '', 'ajax');
	}
	$deliveryer = pdo_get('tiny_wmall_deliveryer', array('uniacid' => $_W['uniacid'], 'token' => $token));
	if (empty($deliveryer)) 
	{
		message(ierror(-1, '身份验证失败, 请重新登陆'), '', 'ajax');
	}
	if (empty($deliveryer['is_errander']) && empty($deliveryer['is_takeout'])) 
	{
		message(ierror(-1, '您没有抢单的权限, 请联系平台管理员分配接单权限'), '', 'ajax');
	}
	$_W['deliveryer'] = $_W['we7_wmall']['deliveryer']['user'] = $deliveryer;
	$_W['is_agent'] = is_agent();
	$_W['agentid'] = 0;
	if ($_W['is_agent']) 
	{
		$_W['agentid'] = $_W['deliveryer']['agentid'];
		if (empty($_W['agentid'])) 
		{
			message(ierror(-1, '未找到配送员所属的代理区域,请先给配送员分配所属的代理'), '', 'ajax');
		}
	}
}
$_W['we7_wmall']['config'] = get_system_config();
$config_takeout = $_W['we7_wmall']['config']['takeout'];
$config_delivery = $_W['we7_wmall']['config']['delivery'];
$config_errander = get_plugin_config('errander');
?>