<?php
/**
 * 外送系统
 * @author 灯火阑珊
 * @QQ 2471240272
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');
global $_W, $_GPC;
$ta = trim($_GPC['ta']) ? trim($_GPC['ta']) : 'index';

if($ta == 'location'){
	$location_x = floatval($_GPC['location_x']);
	$location_y = floatval($_GPC['location_y']);
	if(empty($location_x) || empty($location_y)) {
		imessage(error(-1, '地理位置不完善'), '', 'ajax');
	}
	pdo_query('delete from ' . tablename('tiny_wmall_deliveryer_location_log') . ' where addtime <= :addtime', array(':addtime' => TIMESTAMP - 10 * 86400));
	pdo_update('tiny_wmall_deliveryer', array('location_x' => $location_x, 'location_y' => $location_y), array('uniacid' => $_W['uniacid'], 'id' => $_W['deliveryer']['id']));
	$data = array(
		'uniacid' => $_W['uniacid'],
		'deliveryer_id' => $deliveryer['id'],
		'location_x' => $location_x,
		'location_y' => $location_y,
		'addtime' => TIMESTAMP,
		'addtime_cn' => date('Y-m-d H:i:s'),
	);
	pdo_insert('tiny_wmall_deliveryer_location_log', $data);
	imessage(error(0, ''), '', 'ajax');
}