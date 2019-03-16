<?php defined('IN_IA') or exit('Access Denied');?><?php  if($op == 'cancel') { ?>
<form class="form-horizontal form-validate" id="form-changes" action="<?php  echo iurl('member/getcash/cancel');?>" method="post" enctype="multipart/form-data">
	<input name="id" type="hidden" value="<?php  echo $id;?>"/>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">申请提现撤销</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">申请时间</label>
					<div class="col-sm-9 col-xs-12">
						<span><?php  echo date('Y-m-d H:i:s', $log['addtime'])?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">订单号</label>
					<div class="col-sm-9 col-xs-12">
						<span><?php  echo $log['trade_no'];?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">撤销金额</label>
					<div class="col-sm-9 col-xs-12">
						<span><?php  echo $log['get_fee'];?>元</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提示用户</label>
					<div class="col-sm-9 col-xs-12">
						<textarea name="remark"  class="form-control" required="true"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">提交</button>
				<button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
			</div>
		</div>
	</div>
</form>
<?php  } ?>