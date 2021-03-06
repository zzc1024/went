<?php defined('IN_IA') or exit('Access Denied');?><?php  include itemplate('public/header', TEMPLATE_INCLUDEPATH);?>
<div class="page clearfix">
	<h2>服务费率</h2>
	<div class="alert alert-warning">
		如需要给不同的门店设置不同的佣金计算方式, 请到<a href="<?php  echo iurl('merchant/account/index');?>" target="_blank">"财务中心-门店账户-账户设置"</a>里进行设置
	</div>
	<form class="form-horizontal form form-validate" id="form1" action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">外卖单佣金计算方式</label>
			<div class="col-sm-9 col-xs-12 toggle-tabs" data-content=".fee-takeout-type">
				<div class="radio radio-inline">
					<input type="radio" value="1" name="fee_takeout[type]" id="fee-takeout-type-1" <?php  if($serve_fee['fee_takeout']['type'] == 1 || empty($serve_fee['fee_takeout']['type'])) { ?>checked<?php  } ?>>
					<label for="fee-takeout-type-1" class="toggle-role" data-target="fee-takeout-1">订单百分比抽成</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" value="2" name="fee_takeout[type]" id="fee-takeout-type-2" <?php  if($serve_fee['fee_takeout']['type'] == 2) { ?>checked<?php  } ?>>
					<label for="fee-takeout-type-2" class="toggle-role" data-target="fee-takeout-2">固定抽成</label>
				</div>
			</div>
		</div>
		<div class="toggle-content fee-takeout-type">
			<div class="toggle-pane <?php  if($serve_fee['fee_takeout']['type'] == 1 || empty($serve_fee['fee_takeout']['type'])) { ?>active<?php  } ?>" id="fee-takeout-1">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="price" name="fee_takeout[items_yes][]" id="fee-takeout-items-price" <?php  if(in_array('price', $serve_fee['fee_takeout']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-takeout-items-price">商品费用</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="box_price" name="fee_takeout[items_yes][]" id="fee-takeout-items-box-price" <?php  if(in_array('box_price', $serve_fee['fee_takeout']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-takeout-items-box-price">餐盒费</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="pack_fee" name="fee_takeout[items_yes][]" id="fee-takeout-items-pack-fee" <?php  if(in_array('pack_fee', $serve_fee['fee_takeout']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-takeout-items-pack-fee">包装费</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="delivery_fee" name="fee_takeout[items_yes][]" id="fee-takeout-items-delivery-fee" <?php  if(in_array('delivery_fee', $serve_fee['fee_takeout']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-takeout-items-delivery-fee">配送费(仅限店内配送模式)</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">不抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="store_discount_fee" name="fee_takeout[items_no][]" id="fee-takeout-items-discount" <?php  if(in_array('store_discount_fee', $serve_fee['fee_takeout']['items_no'])) { ?>checked<?php  } ?>>
								<label for="fee-takeout-items-discount">商户活动补贴</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成比例：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_takeout[fee_rate]" value="<?php  echo $serve_fee['fee_takeout']['fee_rate'];?>" class="form-control"/>
								<span class="input-group-addon">%，最低抽成金额</span>
								<input type="text" name="fee_takeout[fee_min]" value="<?php  echo $serve_fee['fee_takeout']['fee_min'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="toggle-pane <?php  if($serve_fee['fee_takeout']['type'] == 2) { ?>active<?php  } ?>" id="fee-takeout-2">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成金额：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_takeout[fee]" value="<?php  echo $serve_fee['fee_takeout']['fee'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">自提单佣金计算方式</label>
			<div class="col-sm-9 col-xs-12 toggle-tabs" data-content=".fee-selfDelivery-type">
				<div class="radio radio-inline">
					<input type="radio" value="1" name="fee_selfDelivery[type]" id="fee-selfDelivery-type-1" <?php  if($serve_fee['fee_selfDelivery']['type'] == 1 || empty($serve_fee['fee_selfDelivery']['type'])) { ?>checked<?php  } ?>>
					<label for="fee-selfDelivery-type-1" class="toggle-role" data-target="fee-selfDelivery-1">订单百分比抽成</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" value="2" name="fee_selfDelivery[type]" id="fee-selfDelivery-type-2" <?php  if($serve_fee['fee_selfDelivery']['type'] == 2) { ?>checked<?php  } ?>>
					<label for="fee-selfDelivery-type-2" class="toggle-role" data-target="fee-selfDelivery-2">固定抽成</label>
				</div>
			</div>
		</div>
		<div class="toggle-content fee-selfDelivery-type">
			<div class="toggle-pane <?php  if($serve_fee['fee_selfDelivery']['type'] == 1 || empty($serve_fee['fee_selfDelivery']['type'])) { ?>active<?php  } ?>" id="fee-selfDelivery-1">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="price" name="fee_selfDelivery[items_yes][]" id="fee-selfDelivery-items-price" <?php  if(in_array('price', $serve_fee['fee_selfDelivery']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-selfDelivery-items-price">商品费用</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="box_price" name="fee_selfDelivery[items_yes][]" id="fee-selfDelivery-items-box-price" <?php  if(in_array('box_price', $serve_fee['fee_selfDelivery']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-selfDelivery-items-box-price">餐盒费</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="pack_fee" name="fee_selfDelivery[items_yes][]" id="fee-selfDelivery-items-pack-fee" <?php  if(in_array('pack_fee', $serve_fee['fee_selfDelivery']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-selfDelivery-items-pack-fee">包装费</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">不抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="store_discount_fee" name="fee_selfDelivery[items_no][]" id="fee-selfDelivery-items-discount" <?php  if(in_array('store_discount_fee', $serve_fee['fee_selfDelivery']['items_no'])) { ?>checked<?php  } ?>>
								<label for="fee-selfDelivery-items-discount">商户活动补贴</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成比例：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_selfDelivery[fee_rate]" value="<?php  echo $serve_fee['fee_selfDelivery']['fee_rate'];?>" class="form-control"/>
								<span class="input-group-addon">%，最低抽成金额</span>
								<input type="text" name="fee_selfDelivery[fee_min]" value="<?php  echo $serve_fee['fee_selfDelivery']['fee_min'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="toggle-pane <?php  if($serve_fee['fee_selfDelivery']['type'] == 2) { ?>active<?php  } ?>" id="fee-selfDelivery-2">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成金额：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_selfDelivery[fee]" value="<?php  echo $serve_fee['fee_selfDelivery']['fee'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">店内单佣金计算方式</label>
			<div class="col-sm-9 col-xs-12 toggle-tabs" data-content=".fee-instore-type">
				<div class="radio radio-inline">
					<input type="radio" value="1" name="fee_instore[type]" id="fee-instore-type-1" <?php  if($serve_fee['fee_instore']['type'] == 1 || empty($serve_fee['fee_instore']['type'])) { ?>checked<?php  } ?>>
					<label for="fee-instore-type-1" class="toggle-role" data-target="fee-instore-1">订单百分比抽成</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" value="2" name="fee_instore[type]" id="fee-instore-type-2" <?php  if($serve_fee['fee_instore']['type'] == 2) { ?>checked<?php  } ?>>
					<label for="fee-instore-type-2" class="toggle-role" data-target="fee-instore-2">固定抽成</label>
				</div>
			</div>
		</div>
		<div class="toggle-content fee-instore-type">
			<div class="toggle-pane <?php  if($serve_fee['fee_instore']['type'] == 1 || empty($serve_fee['fee_instore']['type'])) { ?>active<?php  } ?>" id="fee-instore-1">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="price" name="fee_instore[items_yes][]" id="fee-instore-items-price" <?php  if(in_array('price', $serve_fee['fee_instore']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-instore-items-price">商品费用</label>
							</div>
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="serve_fee" name="fee_instore[items_yes][]" id="fee-instore-items-serve-fee" <?php  if(in_array('serve_fee', $serve_fee['fee_instore']['items_yes'])) { ?>checked<?php  } ?>>
								<label for="fee-instore-items-serve-fee">店内单服务费</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">不抽成项目：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="checkbox checkbox-inline">
								<input type="checkbox" value="store_discount_fee" name="fee_instore[items_no][]" id="fee-instore-items-discount" <?php  if(in_array('store_discount_fee', $serve_fee['fee_instore']['items_no'])) { ?>checked<?php  } ?>>
								<label for="fee-instore-items-discount">商户活动补贴</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成比例：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_instore[fee_rate]" value="<?php  echo $serve_fee['fee_instore']['fee_rate'];?>" class="form-control"/>
								<span class="input-group-addon">%，最低抽成金额</span>
								<input type="text" name="fee_instore[fee_min]" value="<?php  echo $serve_fee['fee_instore']['fee_min'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="toggle-pane <?php  if($serve_fee['fee_instore']['type'] == 2) { ?>active<?php  } ?>" id="fee-instore-2">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成金额：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_instore[fee]" value="<?php  echo $serve_fee['fee_instore']['fee'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">买单佣金计算方式</label>
			<div class="col-sm-9 col-xs-12 toggle-tabs" data-content=".fee-paybill-type">
				<div class="radio radio-inline">
					<input type="radio" value="1" name="fee_paybill[type]" id="fee_paybill-type-1" <?php  if($serve_fee['fee_paybill']['type'] == 1 || empty($serve_fee['fee_paybill']['type'])) { ?>checked<?php  } ?>>
					<label for="fee_paybill-type-1" class="toggle-role" data-target="fee_paybill-1">订单百分比抽成</label>
				</div>
				<div class="radio radio-inline">
					<input type="radio" value="2" name="fee_paybill[type]" id="fee_paybill-type-2" <?php  if($serve_fee['fee_paybill']['type'] == 2) { ?>checked<?php  } ?>>
					<label for="fee_paybill-type-2" class="toggle-role" data-target="fee_paybill-2">固定抽成</label>
				</div>
			</div>
		</div>
		<div class="toggle-content fee-paybill-type">
			<div class="toggle-pane <?php  if($serve_fee['fee_paybill']['type'] == 1 || empty($serve_fee['fee_paybill']['type'])) { ?>active<?php  } ?>" id="fee_paybill-1">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成比例：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_paybill[fee_rate]" value="<?php  echo $serve_fee['fee_paybill']['fee_rate'];?>" class="form-control"/>
								<span class="input-group-addon">%，最低抽成金额</span>
								<input type="text" name="fee_paybill[fee_min]" value="<?php  echo $serve_fee['fee_paybill']['fee_min'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="toggle-pane <?php  if($serve_fee['fee_paybill']['type'] == 2) { ?>active<?php  } ?>" id="fee_paybill-2">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
					<div class="col-sm-9 col-xs-12">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">抽成金额：</label>
						<div class="col-sm-9 col-xs-12">
							<div class="input-group">
								<input type="text" name="fee_paybill[fee]" value="<?php  echo $serve_fee['fee_paybill']['fee'];?>" class="form-control"/>
								<span class="input-group-addon">元</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">最低提现金额</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" digits="true" name="get_cash_fee_limit" value="<?php  echo $serve_fee['get_cash_fee_limit'];?>" class="form-control"/>
					<span class="input-group-addon">元</span>
				</div>
				<div class="help-block">只能填写整数，不填写为不限制</div>
				<div class="help-block">
					如需要给不同的门店设置不同的提现费率, 请到<a href="<?php  echo iurl('merchant/account/index');?>" target="_blank">"财务中心-门店账户-账户设置"</a>里进行设置
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现费率</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" name="get_cash_fee_rate" value="<?php  echo $serve_fee['get_cash_fee_rate'];?>" class="form-control"/>
					<span class="input-group-addon">%</span>
				</div>
				<div class="help-block">
					商户申请提现时，每笔申请提现扣除的费用，默认为空，即提现不扣费，支持填写小数
					<br>
					<strong clas="text-danger">商户入驻时的默认提现费率</strong>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现费用</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon">最低</span>
					<input type="text" name="get_cash_fee_min" value="<?php  echo $serve_fee['get_cash_fee_min'];?>" class="form-control"/>
					<span class="input-group-addon">元</span>
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon">最高</span>
					<input type="text" name="get_cash_fee_max" value="<?php  echo $serve_fee['get_cash_fee_max'];?>" class="form-control"/>
					<span class="input-group-addon">元</span>
				</div>
				<div class="help-block">
					商户提现时，提现费用的上下限，最高为空时，表示不限制扣除的提现费用
					<br>
					例如：提现100元，费率5%，最低1元，最高2元，商户最终提现金额=100-2=98
					<br>
					例如：提现100元，费率5%，最低1元，最高10元，商户最终提现金额=100-100*5%=95
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现周期</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="number" name="fee_period" value="<?php  echo $serve_fee['fee_period'];?>" class="form-control"/>
					<span class="input-group-addon">天</span>
				</div>
				<div class="help-block">
					<strong class="text-danger">提现周期设置为0， 表示不限制提现周期。</strong>
					<br>
					例如：提现周期设置为7天，即至少在上次提现7天后，才可以进行下次提现。
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">将服务费率设置同步到所有商户</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<label class="checkbox-inline">
						<input type="checkbox" name="sync" value="1"/> 将服务费率设置同步到所有商户
					</label>
				</div>
				<div class="help-block">同步后,所有商户的服务费率规则都会被设置为这个规则</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" value="提交" class="btn btn-primary col-lg-1">
		</div>
	</form>
</div>
<?php  include itemplate('public/footer', TEMPLATE_INCLUDEPATH);?>