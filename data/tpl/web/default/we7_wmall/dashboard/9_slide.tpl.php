<?php defined('IN_IA') or exit('Access Denied');?><?php  include itemplate('public/header', TEMPLATE_INCLUDEPATH);?>
<?php  if($op == 'list') { ?>
<?php  if($_W['is_agent']) { ?>
<form action="" class="form-horizontal form-filter">
	<?php  echo tpl_form_filter_hidden('dashboard/slide/list');?>
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择代理区域</label>
		<div class="col-sm-4 col-xs-4">
			<select name="agentid" class="select2 js-select2 form-control width-130">
				<option value="0">选择代理区域</option>
				<?php  if(is_array($_W['agents'])) { foreach($_W['agents'] as $agent) { ?>
					<option value="<?php  echo $agent['id'];?>" <?php  if($agentid == $agent['id']) { ?>selected<?php  } ?>><?php  echo $agent['area'];?></option>
				<?php  } } ?>
			</select>
		</div>
	</div>
</form>
<?php  } ?>
<form action="./index.php?" class="form-horizontal form-filter" id="form-takeout">
	<div class="form-group">
		<label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片位置</label>
		<div class="col-sm-9 col-xs-12">
			<div class="btn-group">
				<div class="btn-group">
					<a href="<?php  echo ifilter_url('type:');?>" class="btn <?php  if($type == '') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">不限</a>
					<a href="<?php  echo ifilter_url('type:homeTop');?>" class="btn <?php  if($type == 'homeTop') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">首页</a>
					<a href="<?php  echo ifilter_url('type:orderDetail');?>" class="btn <?php  if($type == 'orderDetail') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">订单详情</a>
					<a href="<?php  echo ifilter_url('type:member');?>" class="btn <?php  if($type == 'member') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">会员中心</a>
					<a href="<?php  echo ifilter_url('type:paycenter');?>" class="btn <?php  if($type == 'paycenter') { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">收银台</a>
				</div>
			</div>
		</div>
	</div>
	
</form>
<form action="" class="form-table form" method="post">
	<div class="panel panel-table">
		<div class="panel-heading">
			<a href="<?php  echo iurl('dashboard/slide/post');?>" class="btn btn-primary btn-sm">添加幻灯片</a>
		</div>
		<div class="panel-body table-responsive js-table">
			<?php  if(empty($slides)) { ?>
				<div class="no-result">
					<p>还没有相关数据</p>
				</div>
			<?php  } else { ?>
				<table class="table table-hover">
					<thead>
					<tr>
						<th>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" name="id[]"/>
								<label></label>
							</div>
						</th>
						<th>图片</th>
						<th>排序</th>
						<?php  if($_W['is_agent']) { ?>
							<th>所属城市</th>
						<?php  } ?>
						<th>标题</th>
						<th>位置</th>
						<th>状态</th>
						<th class="text-right">操作</th>
					</tr>
					</thead>
					<?php  if(is_array($slides)) { foreach($slides as $slide) { ?>
						<tr>
							<td>
								<div class="checkbox checkbox-inline">
									<input type="checkbox" name="id[]" value="<?php  echo $slide['id'];?>"/>
									<label></label>
								</div>
							</td>
							<input type="hidden" name="ids[]" value="<?php  echo $slide['id'];?>">
							<td><img src="<?php  echo tomedia($slide['thumb']);?>" width="50"></td>
							<td>
								<input name="displayorders[]" value="<?php  echo $slide['displayorder'];?>" class="form-control width-100" required="true">
							</td>
							<?php  if($_W['is_agent']) { ?>
								<td><?php  echo toagent($slide['agentid'])?></td>
							<?php  } ?>
							<td>
								<input name="titles[]" value="<?php  echo $slide['title'];?>" class="form-control width-100" required="true">
							</td>
							<td>
								<?php  if($slide['type'] == 'homeTop') { ?>
								首页
								<?php  } else if($slide['type'] == 'member') { ?>
								会员中心
								<?php  } else if($slide['type'] == 'paycenter') { ?>
								收银台
								<?php  } else if($slide['type'] == 'orderDetail') { ?>
								订单详情
								<?php  } ?>
							</td>
							<td>
								<input type="checkbox" class="js-checkbox" data-on-text="开启" data-off-text="关闭" data-href="<?php  echo iurl('dashboard/slide/status', array('id' => $slide['id']));?>" data-name="status" value="1" <?php  if($slide['status'] == 1) { ?>checked<?php  } ?>>
							</td>
							<td class="text-right">
								<a href="<?php  echo iurl('dashboard/slide/post', array('id' => $slide['id']))?>" class="btn btn-default btn-sm" title="编辑" data-toggle="tooltip" data-placement="top" >编辑</a>
								<a href="<?php  echo iurl('dashboard/slide/del', array('id' => $slide['id']))?>" class="btn btn-default btn-sm js-post" data-confirm="确定删除该幻灯片?"> 删除</a>
							</td>
						</tr>
					<?php  } } ?>
				</table>
				<div class="btn-region clearfix">
					<div class="pull-left">
						<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
						<input type="submit" class="btn btn-primary btn-sm" name="submit" value="提交修改" />
						<?php  if($_W['is_agent']) { ?>
						<a href="<?php  echo iurl('dashboard/slide/slideagent')?>" class="btn btn-default btn-sm js-batch" data-batch="modal">批量操作</a>
						<?php  } ?>
					</div>
					<div class="pull-right">
						<?php  echo $pager;?>
					</div>
				</div>
			<?php  } ?>
		</div>
	</div>
</form>
<?php  } ?>

<?php  if($op == 'post') { ?>
<div class="page clearfix">
	<h2>编辑幻灯片</h2>
	<form class="form-horizontal form form-validate" id="form1" action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">幻灯片位置</label>
			<div class="col-sm-9 col-xs-12">
				<div class="radio radio-inline">
					<input type="radio" name="type" value="homeTop" id="type-0" <?php  if($slide['type'] == 'homeTop' || !$slide['type']) { ?>checked<?php  } ?>>
					<label for="type-0">首页</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" name="type" value="paycenter" id="type-1" <?php  if($slide['type'] == 'paycenter') { ?>checked<?php  } ?>>
					<label for="type-1">收银台</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" name="type" value="member" id="type-2" <?php  if($slide['type'] == 'member') { ?>checked<?php  } ?>>
					<label for="type-2">会员中心</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" name="type" value="orderDetail" id="type-3" <?php  if($slide['type'] == 'orderDetail') { ?>checked<?php  } ?>>
					<label for="type-3">订单详情</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">名称</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" name="title" value="<?php  echo $slide['title'];?>" required="true">
				<span class="help-block">仅用于区分,不在前台显示</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('thumb', $slide['thumb']);?>
				<div class="help-block">建议图片尺寸:640*240</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转链接</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" class="form-control" name="link" value="<?php  echo $slide['link'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序跳转链接(选填)</label>
			<div class="col-sm-9 col-xs-9 col-md-9">
				<?php  echo tpl_form_field_tiny_wxapp_link('wxapp_link', $slide['wxapp_link']);?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
			<div class="col-sm-9 col-xs-12">
				<input type="number" class="form-control" name="displayorder" value="<?php  echo $slide['displayorder'];?>">
				<span class="help-block">数字越大越靠前</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否启用</label>
			<div class="col-sm-9 col-xs-12">
				<div class="radio radio-inline">
					<input type="radio" name="status" value="1" id="status-1" <?php  if($slide['status'] == 1) { ?>checked<?php  } ?>>
					<label for="status-1">启用</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" name="status" value="0" id="status-0" <?php  if(!$slide['status']) { ?>checked<?php  } ?>>
					<label for="status-0">不启用</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-9 col-xs-9 col-md-9">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
				<input type="submit" value="提交" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
<?php  } ?>
<?php  include itemplate('public/footer', TEMPLATE_INCLUDEPATH);?>