<?php 
	defined('IN_IA') or exit('Access Denied');
	global $_W,$_GPC;
	if( empty( $_GPC['password'] ) ) $this->result(1, '请填写验证码');
	if( $_GPC['password'] != $this->module['config']['frompass'] ) $this->result(1, '验证码不正确');


	if( $_GPC['op'] == 'list' ) {

		$where = array('uniacid' => $_W['uniacid']);

		if( $_GPC['type'] == 1 ) $where['isread'] = 0;
		if( $_GPC['type'] == 2 ) $where['isread'] = 1;

		$info = Util::getAllDataInSingleTable('zofui_sitetemp_form',$where,$_GPC['page'],10,' `id` DESC ',false,false);
		$list = $info[0];
		
		if( !empty( $list ) ) {
			foreach ($list as &$v) {
				$v['data'] = iunserializer( $v['data'] );
				$v['createtime'] = date('Y-m-d H:i:s',$v['createtime']);
			}
		}
		
		
		$this->result(0, '',$list);
	
	}elseif( $_GPC['op'] == 'readit' ) {
		
		pdo_update('zofui_sitetemp_form',array('isread'=>1),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));	
		$this->result(0, '');
		
	}

	