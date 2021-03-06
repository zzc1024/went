<?php defined('IN_IA') or exit('Access Denied');?><?php  include itemplate('public/header', TEMPLATE_INCLUDEPATH);?>
<form action="./index.php" class="form-horizontal form-filter">
	<?php  echo tpl_form_filter_hidden('service/comment/list');?>
	<input type="hidden" name="status" value="<?php  echo $status;?>"/>
	<input type="hidden" name="reply" value="<?php  echo $reply;?>"/>
	<input type="hidden" name="note" value="<?php  echo $note;?>"/>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">审核状态</label>
		<div class="col-sm-9 col-xs-12">
			<div class="btn-group">
				<a href="<?php  echo ifilter_url('status:-1');?>" class="btn <?php  if($status == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
				<a href="<?php  echo ifilter_url('status:0');?>" class="btn <?php  if($status == 0) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">待审核</a>
				<a href="<?php  echo ifilter_url('status:1');?>" class="btn <?php  if($status == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">审核通过</a>
				<a href="<?php  echo ifilter_url('status:2');?>" class="btn <?php  if($status == 2) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">审核未通过</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">评价管理</label>
		<div class="col-sm-9 col-xs-12">
			<div class="btn-group" style="margin-right: 5px">
				<a href="<?php  echo ifilter_url('reply:-1');?>" class="btn <?php  if($reply == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
				<a href="<?php  echo ifilter_url('reply:0');?>" class="btn <?php  if($reply == 0) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">未回复</a>
				<a href="<?php  echo ifilter_url('reply:1');?>" class="btn <?php  if($reply == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已回复</a>
			</div>
			<div class="btn-group" style="margin-right: 5px">
				<a href="<?php  echo ifilter_url('note:-1');?>" class="btn <?php  if($note == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
				<a href="<?php  echo ifilter_url('note:1');?>" class="btn <?php  if($note == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">有内容</a>
			</div>
			<?php  if(check_plugin_perm('ordergrant') && get_plugin_config('ordergrant.share.status')) { ?>
				<div class="btn-group">
					<a href="<?php  echo ifilter_url('is_share:-1');?>" class="btn <?php  if($is_share == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
					<a href="<?php  echo ifilter_url('is_share:0');?>" class="btn <?php  if($is_share == 0) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">未分享</a>
					<a href="<?php  echo ifilter_url('is_share:1');?>" class="btn <?php  if($is_share == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">已分享</a>
				</div>
			<?php  } ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品质量</label>
		<div class="col-sm-9 col-xs-12">
			<div class="btn-group">
				<a href="<?php  echo ifilter_url('goods_quality:-1');?>" class="btn <?php  if($goods_quality == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
				<a href="<?php  echo ifilter_url('goods_quality:1');?>" class="btn <?php  if($goods_quality == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">一星</a>
				<a href="<?php  echo ifilter_url('goods_quality:2');?>" class="btn <?php  if($goods_quality == 2) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">二星</a>
				<a href="<?php  echo ifilter_url('goods_quality:3');?>" class="btn <?php  if($goods_quality == 3) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">三星</a>
				<a href="<?php  echo ifilter_url('goods_quality:4');?>" class="btn <?php  if($goods_quality == 4) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">四星</a>
				<a href="<?php  echo ifilter_url('goods_quality:5');?>" class="btn <?php  if($goods_quality == 5) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">五星</a>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">配送服务</label>
		<div class="col-sm-9 col-xs-12">
			<div class="btn-group">
				<a href="<?php  echo ifilter_url('delivery_service:-1');?>" class="btn <?php  if($delivery_service == -1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
				<a href="<?php  echo ifilter_url('delivery_service:1');?>" class="btn <?php  if($delivery_service == 1) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">一星</a>
				<a href="<?php  echo ifilter_url('delivery_service:2');?>" class="btn <?php  if($delivery_service == 2) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">二星</a>
				<a href="<?php  echo ifilter_url('delivery_service:3');?>" class="btn <?php  if($delivery_service == 3) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">三星</a>
				<a href="<?php  echo ifilter_url('delivery_service:4');?>" class="btn <?php  if($delivery_service == 4) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">四星</a>
				<a href="<?php  echo ifilter_url('delivery_service:5');?>" class="btn <?php  if($delivery_service == 5) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">五星</a>
			</div>
		</div>
	</div>
	<div class="form-group form-inline">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">其他</label>
		<div class="col-sm-9 col-xs-12">
			<div class="js-daterange pull-left" data-form=".form-filter">
				<?php  echo tpl_form_field_daterange('addtime', array('start' => date('Y-m-d H:i', $starttime), 'end' => date('Y-m-d H:i', $endtime)), true);?>
			</div>
			<?php  if($_W['is_agent']) { ?>
				<select name="agentid" class="select2 js-select2 form-control width-130" style="margin: 2px 0 0 5px;">
					<option value="0">选择代理区域</option>
					<?php  if(is_array($_W['agents'])) { foreach($_W['agents'] as $agent) { ?>
						<option value="<?php  echo $agent['id'];?>" <?php  if($agentid == $agent['id']) { ?>selected<?php  } ?>><?php  echo $agent['area'];?></option>
					<?php  } } ?>
				</select>
			<?php  } ?>
			<select name="sid" class="form-control select2 js-select2 width-130" id="select-sid" style="margin: 2px 0 0 5px;">
				<option value="0" <?php  if(!$sid) { ?>selected<?php  } ?>>全部门店</option>
				<?php  if(is_array($stores)) { foreach($stores as $store) { ?>
					<option value="<?php  echo $store['id'];?>" <?php  if($store['id'] == $sid) { ?>selected<?php  } ?>><?php  echo $store['title'];?></option>
				<?php  } } ?>
			</select>
			<select name="deliveryer_id" class="form-control select2 width-130 js-select2">
				<option value="0" <?php  if($deliveryer_id == 0) { ?>select<?php  } ?>>配送员</option>
				<?php  if(is_array($deliveryers)) { foreach($deliveryers as $deliveryer) { ?>
					<option value="<?php  echo $deliveryer['id'];?>" <?php  if($deliveryer_id == $deliveryer['id']) { ?>selected<?php  } ?>><?php  echo $deliveryer['title'];?></option>
				<?php  } } ?>
			</select>
			<input type="text" name="keyword" value="<?php  echo $keyword;?>" class="form-control" placeholder="输入用户名/手机号/订单编号">
			<input type="text" name="uid" value="<?php  if(!empty($uid)) { ?><?php  echo $uid;?><?php  } ?>" class="form-control" placeholder="用户UID">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<button class="btn btn-primary">筛选</button>
		</div>
	</div>
</form>
<form action="" class="form-table form" method="post">
	<?php  if(!empty($comments)) { ?>
		<table class="table js-table">
			<thead class="navbar-inner">
				<tr>
					<th width="40">
						<div class="checkbox checkbox-inline">
							<input type="checkbox" name="id[]">
							<label></label>
						</div>
					</th>
					<th style="text-align: center;">评论内容</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($comments)) { foreach($comments as $comment) { ?>
					<tr>
						<td style="vertical-align: middle">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" name="ids[]" value="<?php  echo $comment['id'];?>">
								<label></label>
							</div>
						</td>
						<td>
							<div class="panel panel-comment">
									<div class="panel-body">
									<div class="comment-item clearfix">
										<div class="col-sm-2 col-md-2 col-lg-2 comment-item-left">
											<div class="customer-name"><?php  echo $comment['mobile'];?></div>
											<div class="store-title"><?php  echo $stores[$comment['sid']]['title'];?></div>
											<div class="seller">商品质量
												<?php 
										for($i = 0; $i < $comment['goods_quality']; $i++) {
											echo '<span><i class="fa fa-star star light"></i></span> ';
												}
												for($i = $comment['goods_quality']; $i < 5; $i++) {
												echo '<span><i class="fa fa-star star"></i></span> ';
												}
												?>
											</div>
											<div class="delivery">配送服务
												<?php 
										for($i = 0; $i < $comment['delivery_service']; $i++) {
											echo '<span><i class="fa fa-star star light"></i></span> ';
												}
												for($i = $comment['delivery_service']; $i < 5; $i++) {
												echo '<span><i class="fa fa-star star"></i></span> ';
												}
												?>
											</div>
											<div class="merit">综合评价：<?php  echo $comment['score'];?>星</div>
											<?php  if(!empty($comment['deliveryer_id'])) { ?>
												<div class="merit">配送员：<?php  echo $deliveryers[$comment['deliveryer_id']]['title'];?></div>
											<?php  } ?>
											<span class="delivery-time btn-gray hide">41分钟送达</span>
										</div>
										<div class="col-sm-10 col-md-10 col-lg-10 comment-item-right">
											<div class="comment-date">
												<?php  echo date('Y-m-d H:i', $comment['addtime'])?>
												&nbsp;
												<?php  if($comment['status'] == 1) { ?>
												<span class="tag tag-success">审核通过</span>
												<?php  } else if($comment['status'] == 2) { ?>
												<span class="tag tag-danger">审核未通过</span>
												<?php  } else { ?>
												<span class="tag tag-default">待审核</span>
												<?php  } ?>
												<?php  if(check_plugin_perm('ordergrant') && get_plugin_config('ordergrant.share.status')) { ?>
												<?php  if($comment['is_share'] == 1) { ?>
												<span class="tag tag-success">已分享</span>
												<?php  } else { ?>
												<span class="tag tag-danger">未分享</span>
												<?php  } ?>
												<?php  } ?>
												<a href="<?php  echo iurl('order/takeout/detail', array('id' => $comment['oid']));?>" target="_blank" class="pull-right check-order greenest">查看订单 <b class="fa fa-angle-right"></b></a>
											</div>
											<div class="comment-main">
												<div class="customer-comment"><?php  if(!empty($comment['note'])) { ?><?php  echo $comment['note'];?><?php  } else { ?>该用户没有填写评价内容<?php  } ?></div>
												<div class="comment-img">
													<?php  if(is_array($comment['thumbs'])) { foreach($comment['thumbs'] as $thumb) { ?>
													<a href="<?php  echo tomedia($thumb)?>" target="_blank"><img src="<?php  echo tomedia($thumb)?>" alt=""></a>
													<?php  } } ?>
												</div>
												<div class="seller-comment clearfix grayest">
													<?php  if(!empty($comment['data']['good'])) { ?>
													<div class="pull-left seller-comment-goods">
														<b class="fa fa-thumbs-o-up"></b>
														<?php  if(is_array($comment['data']['good'])) { foreach($comment['data']['good'] as $good) { ?>
														<span><?php  echo $good;?></span>
														<?php  } } ?>
													</div>
													<?php  } ?>
													<?php  if(!empty($comment['data']['bad'])) { ?>
													<div class="pull-left seller-comment-delivery">
														<b class="fa fa-thumbs-o-down"></b>
														<div class="comment-favor-oppose">
															<i class="icon favor"></i>
															<?php  if(is_array($comment['data']['bad'])) { foreach($comment['data']['bad'] as $bad) { ?>
															<span><?php  echo $bad;?></span>
															<?php  } } ?>
														</div>
													</div>
													<?php  } ?>
												</div>
												<a href="javascript:;" class="reply greenest" onclick="$(this).next('.reply-area').slideDown();"><b class="fa fa-comment-o"></b>回复</a>
												<div class="reply-area" <?php  if(!empty($comment['replytime'])) { ?>style="display:block"<?php  } ?>>
												<div class="reply-list">
													<div><span class="grayest">商家回复：</span></div>
													<?php  if(!empty($comment['replytime'])) { ?>
													<span class="grayest"><?php  echo date('Y-m-d H:i', $comment['replytime'])?></span>
													<?php  } ?>
												</div>
												<div class="input-area">
													<textarea class="form-control" placeholder="限300字符，请勿恶意回复，一经查实将严肃处理"><?php  echo $comment['reply'];?></textarea>
													<a href="javascript:;" class="btn btn-primary btn-reply" data-id="<?php  echo $comment['id'];?>">回复</a>
													<?php  if(empty($comment['replytime'])) { ?>
													<a href="javascript:;" class="btn btn-default" onclick="$(this).parents('.reply-area').slideUp();">取消</a>
													<?php  } ?>
													<a href="<?php  echo iurl('service/comment/status', array('comment_id' => $comment['id'], 'status' => 1))?>" class="btn btn-success js-post">审核通过</a>
													<a href="<?php  echo iurl('service/comment/status', array('comment_id' => $comment['id'], 'status' => 2))?>" class="btn btn-danger js-post">未通过</a>
													<?php  if(check_plugin_perm('ordergrant') && get_plugin_config('ordergrant.share.status')) { ?>
													<?php  if($comment['is_share'] == 1) { ?>
													<a href="<?php  echo iurl('service/comment/share', array('id' => $comment['id'], 'is_share' => 0))?>" class="btn btn-info js-post" data-confirm="确定要取消分享吗?">取消分享</a>
													<?php  } else { ?>
													<a href="<?php  echo iurl('service/comment/share', array('id' => $comment['id'], 'is_share' => 1))?>" class="btn btn-warning js-post" data-confirm="确定要分享吗?">分享</a>
													<?php  } ?>
													<?php  } ?>
												</div>
												<div class="arrow"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<div class="btn-region clearfix">
			<div class="pull-left">
				<a href="<?php  echo iurl('service/comment/group')?>" class="btn btn-primary js-batch" data-batch="modal">批量回复</a>
				<a href="<?php  echo iurl('service/comment/status', array('status' => 1))?>" class="btn btn-success js-batch" data-confirm="确定评论通过审核吗">审核通过</a>
				<a href="<?php  echo iurl('service/comment/status', array('status' => 2))?>" class="btn btn-danger js-batch" data-confirm="确定评论未通过审核吗">未通过</a>
			</div>
			<div class="pull-right">
				<?php  echo $pager;?>
			</div>
		</div>
	<?php  } else { ?>
		<div class="no-result">
			<p>还没有相关数据</p>
		</div>
	<?php  } ?>
</form>
<script>
$(function(){
	$(document).on('click', '.comment-item .btn-reply', function(){
		var id = $(this).data('id');
		var reply = $(this).prev('textarea').val();
		if(!reply) {
			Notify.info('回复内容不能为空');
			return false;
		}
		$(this).attr('disabled', true);
		$.post("<?php  echo iurl('service/comment/reply')?>", {id: id, reply: reply}, function(data){
			$(this).attr('disabled', false);
			var result = $.parseJSON(data);
			if(!result.message.errno) {
				Notify.success('回复成功', location.href);
			} else {
				Notify.error(result.message.message);
			}
		});
	});
});
</script>
<?php  include itemplate('public/footer', TEMPLATE_INCLUDEPATH);?>
