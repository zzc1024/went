<?php
/**
 * 外送系统
 * @author 灯火阑珊
 * @QQ 2471240272
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');
include WE7_WMALL_PLUGIN_PATH . 'errander/model.php';
global $_W, $_GPC;
$ta = trim($_GPC['ta']) ? trim($_GPC['ta']) : 'list';
if(empty($_W['deliveryer']['is_errander'])) {
	imessage(error(-1, '您没有跑腿单的配送权限，请联系管理员授权'), '', 'ajax');
}

if($ta == 'list') {
	$condition = ' where uniacid = :uniacid and agentid = :agentid and is_pay = 1 and status != 4';
	$params = array(
		':uniacid' => $_W['uniacid'],
		':agentid' => $_W['agentid'],
	);
	$status = isset($_GPC['status']) ? intval($_GPC['status']) : 1;
	$condition .= ' and delivery_status = :status';
	$params[':status'] = $status;
	$can_collect_order = 1;
	if($config_errander['dispatch_mode'] != 1 && !$config_errander['can_collect_order']) {
		$can_collect_order = 0;
	}
	if($status == 1) {
		$condition .= " and {$_W['deliveryer']['work_status']} and {$can_collect_order}";
	} else {
		if($status == 4) {
			$condition .= ' and deliveryer_id = :deliveryer_id';
		} else {
			$condition .= ' and ((deliveryer_id = :deliveryer_id and transfer_delivery_status = 0) or (delivery_collect_type = :delivery_collect_type and transfer_deliveryer_id = :transfer_deliveryer_id and transfer_delivery_status = 1))';
			$params[':delivery_collect_type'] = 3;
			$params[':transfer_deliveryer_id'] = $_deliveryer['id'];
		}
		$params[':deliveryer_id'] = $_deliveryer['id'];
	}
	$pindex = max(1, intval($_GPC['page']));
	$psize = intval($_GPC['psize']);
	$orders = pdo_fetchall('SELECT * FROM' . tablename('tiny_wmall_errander_order') . $condition . ' order by id desc limit ' . ($pindex - 1)*$psize.','. $psize, $params);
	if(!empty($orders)) {
		$types = errander_types();
		foreach($orders as $key => &$row) {
			if($row['delivery_status'] == 1){
				$row['deliveryer_fee'] = errander_order_calculate_deliveryer_fee($row, $_deliveryer);
				$row['deliveryer_total_fee'] = $row['deliveryer_fee'] + $row['delivery_tips'];
			}
			$row['order_type_cn'] = $types[$row['order_type']]['text'];
			if(empty($row['buy_address'])) {
				$row['buy_address'] = '用户未指定,可自由选择';
			}
			if(empty($row['goods_price'])) {
				$row['goods_price'] = '未填写,请联系用户沟通';
			}
			$row['store2user_distance'] = $row['distance'] ? $row['distance'] : '未知';
			$row['store2deliveryer_distance'] = '未知';
			if(!empty($row['buy_location_x']) && !empty($row['buy_location_y'])) {
				if(!empty($deliveryer['location_x']) && !empty($deliveryer['location_y'])) {
					$row['store2deliveryer_distance'] = distanceBetween($row['buy_location_y'], $row['buy_location_x'], $deliveryer['location_y'], $deliveryer['location_x']);
					$row['store2deliveryer_distance'] = round($row['store2deliveryer_distance'] / 1000, 2);
				}
			}
			$row['addtime_cn'] = date('m-d H:i', $row['addtime']);
			$row['delivery_collect_type_cn'] = order_collect_type($row);
			$row['transfer_delivery_reason'] = $row['data']['transfer_delivery_reason'];
		}
	}
	$result = array(
		'orders' => $orders,
		'can_collect_order' => $can_collect_order,
		'deliveryer' => $_W['deliveryer'],
		'verification_code' => ($config_errander['verification_code'] == 1) ? 1 : 0
	);
	imessage(error(0, $result), '', 'ajax');
}

elseif($ta == 'status') {
	$id = intval($_GPC['id']);
	$type = trim($_GPC['type']);
	if(empty($id)) {
		imessage(error(-1, '请选择订单'), '', 'ajax');
	}
	$types = array('delivery_assign', 'delivery_instore', 'delivery_success', 'direct_transfer_reply', 'delivery_transfer', 'cancel', 'direct_transfer');
	if(!in_array($type, $types)) {
		imessage(error(-1, '订单操作有误'), '', 'ajax');
	}
	$extra = array(
		'deliveryer_id' => $deliveryer['id'],
	);
	if($type == 'delivery_success' && $config_errander['verification_code'] == 1) {
		$extra['code'] = intval($_GPC['code']);
		if(empty($extra['code'])) {
			imessage(error(-1, '请输入收货码'), '', 'ajax');
		}
	} elseif($type == 'direct_transfer_reply') {
		$extra['result'] = trim($_GPC['reply']);
	} elseif($type == 'delivery_transfer') {
		$extra['reason'] = trim($_GPC['reason']);
	} elseif($type == 'cancel') {
		$extra['reason'] = 'other';
		$extra['note'] = trim($_GPC['reason']);
		if(empty($extra['note'])) {
			imessage(error(-1, '取消订单原因不能为空'), '', 'ajax');
		}
	} elseif($type == 'direct_transfer') {
		$extra['from_deliveryer_id'] = $deliveryer['id'];
		$extra['to_deliveryer_id'] = intval($_GPC['deliveryer_id']);
		if($extra['to_deliveryer_id'] == $deliveryer['id']) {
			imessage(error(-1, '不能转单给自己'), '', 'ajax');
		}
	}
	$result = errander_order_status_update($id, $type, $extra);
	if(is_error($result)) {
		imessage($result, '', 'ajax');
	}
	if($type == 'cancel') {
		imessage(error(0, '取消订单成功'), '', 'ajax');
	}
	imessage(error(0, $result['message']), '', 'ajax');
}

elseif($ta == 'detail') {
	$id = intval($_GPC['id']);
	$order = errander_order_fetch($id);
	if(empty($order)) {
		imessage('订单不存在或已删除', '', 'error');
	}
	if((!empty($order['deliveryer_id']) && $order['deliveryer_id'] != $_deliveryer['id'] && !$order['transfer_delivery_status']) || ($order['transfer_delivery_status'] == 1 && $order['deliveryer_id'] != $_deliveryer['id'])) {
		imessage(error(-1, '该订单不是由您配送,无权查看订单详情'), '', 'ajax');
	}
	$order['deliveryer_transfer_status'] = 0;
	if($_deliveryer['perm_transfer']['status_errander'] == 1 && in_array($order['delivery_status'],array(2,3))) {
		$order['deliveryer_transfer_status'] = 1;
	}
	$order['deliveryer_cancel_status'] = 0;
	if($_deliveryer['perm_cancel']['status_errander'] == 1 && in_array($order['delivery_status'],array(2,3)) && $order['deliveryer_id'] == $_deliveryer['id']) {
		$order['deliveryer_cancel_status'] = '1';
	}
	if(empty($order['buy_address'])) {
		$order['buy_address'] = '用户未指定,可自由选择';
	}
	if(empty($order['goods_price'])) {
		$order['goods_price'] = '未填写,请联系用户沟通';
	}
	$pay_types = order_pay_types();
	$order['delivery_collect_type_cn'] = order_collect_type($order);
	$order['pay_type_cn'] = $pay_types[$order['pay_type']]['text'];
	$order['addtime_cn'] = date('Y-m-d H:i', $order['addtime']);
	$order['paytime_cn'] = date('Y-m-d H:i', $order['paytime']);
	$order['store2user_distance'] = $order['distance'] ? $order['distance'] : '未知';
	$order['store2deliveryer_distance'] = '未知';
	if(!empty($order['buy_location_x']) && !empty($order['buy_location_y'])) {
		if(!empty($deliveryer['location_x']) && !empty($deliveryer['location_y'])) {
			$order['store2deliveryer_distance'] = distanceBetween($order['buy_location_y'], $order['buy_location_x'], $deliveryer['location_y'], $deliveryer['location_x']);
			$order['store2deliveryer_distance'] = round($order['store2deliveryer_distance'] / 1000, 2);
			$order['store2deliveryer_distance'] = strval($order['store2deliveryer_distance']);
		}
	}

	$order['verification_code'] = ($config_errander['verification_code'] == 1) ? 1 : 0;
	$result = array(
		'order' => $order,
		'deliveryer' => $_deliveryer,
		'verification_code' => ($config_errander['verification_code'] == 1) ? 1 : 0
	);
	imessage(error(0, $result), '', 'ajax');
}

if($ta == 'op') {
	$id = intval($_GPC['id']);
	$order = errander_order_fetch($id);
	if(empty($order)) {
		imessage(error(-1, '订单不存在或已删除'), '', 'ajax');
	}
	$type = trim($_GPC['type']);
	if($type == 'transfer') {
		$result = $config_errander['deliveryer_transfer_reason'];
	} elseif($type == 'cancel') {
		$result = $config_errander['deliveryer_cancel_reason'];
	} elseif($type == 'direct_transfer') {
		$result = array_values(deliveryer_fetchall(0, array('order_type' => 'is_errander')));
	}
	imessage(error(0, $result), '', 'ajax');
}








