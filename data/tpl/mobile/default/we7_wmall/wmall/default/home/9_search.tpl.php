<?php defined('IN_IA') or exit('Access Denied');?><?php  include itemplate('public/header', TEMPLATE_INCLUDEPATH);?>
<style>
.footmark-warpper{
	bottom:4rem;
}
.home .store-list .common-no-con{
	top:50%;
	margin-top: -5rem;
	position: absolute;
}
.home .delivery-conditions{
	margin-top:.25rem;
}
.home .store-list .store-info{
	padding-bottom: 0;
}
.home header.bar{
	background-color: #7da6e8;
}
</style>
<div class="page home search" id="page-app-store-search">
	<header class="bar bar-nav">
		<a class="pull-left back" href="<?php  echo imurl('wmall/home/index');?>">
			<i class="icon icon-arrow-left"></i>
		</a>
		<a class="pull-right" href="<?php  echo imurl('wmall/home/hunt');?>">
			<i class="icon icon-search"></i>
		</a>
		<h1 class="title"><?php  if(!empty($carousel['title'])) { ?><?php  echo $carousel['title'];?><?php  } else { ?>全部商家<?php  } ?></h1>
	</header>
	<div class="content">
		<div class="hide bind-data" data-lat="<?php  echo $_GPC['__lat'];?>" data-lng="<?php  echo $_GPC['__lng'];?>" data-cid="<?php  echo $_GPC['cid'];?>" data-dis="<?php  echo $_GPC['dis'];?>" data-order="<?php  echo $_GPC['order'];?>"></div>
		<div id="search-container">
			<div class="store-list" id="store-list">
				<div class="common-no-con geolocationing">
					<img src= "<?php echo WE7_WMALL_TPL_URL;?>static/img/store_no_con.png" alt="" />
					<p>努力加载中...</p>
				</div>
				<div class="common-no-con geolocationfail hide">
					<img src= "<?php echo WE7_WMALL_TPL_URL;?>static/img/store_no_con.png" alt="" />
					<p>获取定位失败!您可以选择手动搜索地址</p>
					<a href="<?php  echo imurl('wmall/home/location')?>" class="btn-location">手动搜索地址</a>
				</div>
			</div>
		</div>
		<?php  include itemplate('public/copyright', TEMPLATE_INCLUDEPATH);?>
	</div>
	<!--<div class="footmark-warpper">-->
		<!--<a href="javascript:;" id="go-top" class="icon icon-up"></a>-->
		<!--<a href="<?php  echo imurl('wmall/home/footmark')?>" class="footmark"><i class="icon icon-footprint"></i></a>-->
	<!--</div>-->
	<?php  get_mall_danmu();?>
</div>

<script type="text/html" id="tpl-search">
	<{# var _filter = d.filter}>
	<div class="buttons-tab select-tab">
		<{# var _orderbys = d.orderbys}>
		<a href="javascript:;" class="button">
			<{d.orderTitle}> <span class="icon"></span>
		</a>
		<div class="drop-menu-list">
			<div class="list-block">
				<ul>
					<li><a class="list-button item-link border-1px-tb" href="<?php  echo imurl('wmall/home/search')?>&order=''&cid=<{_filter.cid}>&dis=<{_filter.dis}>"><span class="icon"></span>全部</a></li>
					<{# for(var i in _orderbys) { }>
					<li>
						<a class="list-button item-link border-1px-b"  href="<?php  echo imurl('wmall/home/search');?>&order=<{_orderbys[i].key}>&cid=<{_filter.cid}>&dis=<{_filter.dis}>">
							<span class="<{_orderbys[i].css}>"></span>
							<{_orderbys[i].title}>
							<{# if(_filter.order == _orderbys[i].key) { }>
							<i class="icon icon-selected"></i>
							<{# }}>
						</a>
					</li>
					<{# }}>
				</ul>
			</div>
		</div>
		<{# var _discounts = d.discounts}>
		<a href="javascript:;" class="button">
			<{d.discountTitle}> <span class="icon"></span>
		</a>
		<div class="drop-menu-list">
			<div class="list-block">
				<ul>
					<li><a class="list-button item-link border-1px-tb" href="<?php  echo imurl('wmall/home/search');?>&dis=''&cid=<{_filter.cid}>&order=<{_filter.order}>"><span class="icon"></span>全部</a></li>
					<{# for(var i in _discounts) {}>
					<li>
						<a class="list-button item-link border-1px-b" href="<?php  echo imurl('wmall/home/search');?>&dis=<{_discounts[i].key}>&cid=<{_filter.cid}>&order=<{_filter.order}>">
							<span class="<{_discounts[i].css}>"></span>
							<{_discounts[i].title}>
							<{# if(_filter.dis == _discounts[i].key) { }>
							<i class="icon icon-selected"></i>
							<{# }}>
						</a>
					</li>
					<{# }}>
				</ul>
			</div>
		</div>
	</div>
	<{# var _carousel = d.carousel}>
	<{# if(_carousel && _carousel.slide_status == 1 && _carousel.slide) {}>
		<div class="swiper-container slide border-1px-t" data-space-between='20' data-pagination='.swiper-pagination' data-autoplay="2000">
			<div class="swiper-wrapper">
				<{# for(var i = 0, len = _carousel.slide.length; i < len; i++) { }>
					<div class="swiper-slide" data-link="<{_carousel.slide[i].link}>">
						<img src="<{tiny.tomedia(_carousel.slide[i].thumb)}>" alt="">
					</div>
				<{# }}>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	<{# }}>
	<{# if(_carousel && _carousel.nav_status == 1 && _carousel.nav) {}>
		<div class="search-discount border-1px-tb">
			<{# for(var i = 0, len = _carousel.nav.length; i < len; i++) {}>
				<div class="discount-item pull-left <{# if(i == 0){}>border-1px-r<{# }}>" data-link="<{_carousel.nav[i].link}>">
					<div class="discount-item-info pull-left">
						<p class="store-title"><{_carousel.nav[i].title}></p>
						<p class="store-subtitle"><{_carousel.nav[i].sub_title}></p>
					</div>
					<div class="discount-item-image pull-left">
						<img src="<{tiny.tomedia(_carousel.nav[i].thumb)}>" alt="">
					</div>
					<div class="clearfix"></div>
				</div>
			<{# }}>
			<div class="clearfix"></div>
		</div>
	<{# }}>
	<div class="store-list lazyload-container" id="store-list">
		<{# var _stores = d.stores;}>
		<{# if(!_stores || _stores.length <= 0) { }>
			<div class="common-no-con" <{# if(_carousel.nav_status == 1 && _carousel.nav) {}>style="top: 40%"<{# }}>>
				<img src= "<?php echo WE7_WMALL_TPL_URL;?>static/img/store_no_con.png" alt="" />
				<p>附近没有发现符合条件的门店,我们正在努力覆盖中</p>
				<a href="<?php  echo imurl('wmall/home/location')?>" class="btn-location">切换地址</a>
			</div>
		<{# } else { }>
			<{# for(var i = 0, len = _stores.length; i < len; i++){ }>
			<div class="no-dist list-item border-1px-t" <{# if(_stores[i].is_rest == 1){ }>style="opacity: 0.3;"<{#}}> data-lat="<{_stores[i].location_x}>" data-lng="<{_stores[i].location_y}>">
				<a href="<{_stores[i].url}>">
					<div class="store-info row no-gutter">
						<div class="store-img col-25">
							<{# if(_stores[i].label_cn){ }>
							<span class="store-label" style="background-color: <{_stores[i].label_color}>"><{_stores[i].label_cn}></span>
							<{# } }>
							<img src="<?php echo WE7_WMALL_TPL_URL;?>static/img/hm.gif" class="lazyload lazyload-store" data-original="<{_stores[i].logo}>"  style="background: url('') center center no-repeat;">
							<{# if(_stores[i].is_rest == 1){ }>
							<div class="order-status">
								<span>店铺休息中</span>
							</div>
							<{# } }>
						</div>
						<div class="col-75">
							<div class="row no-gutter">
								<div class="col-60 text-ellipsis">
									<{_stores[i].title}>
								</div>
								<!-- <div class="money-info text-right">
									<{# if(_stores[i].token_status == '1'){ }>
									<span>券</span>
									<{# } }>
									<{# if(_stores[i].invoice_status == '1'){ }>
									<span>票</span>
									<{# } }>
									<span>付</span>
								</div> -->
							</div>
							<div class="rel-info">
								<div class="row no-gutter">
									<div class="col-60">
										<div class="star-rank">
											<span class="star-rank-outline">
												<span class="star-rank-active" style="width:<{_stores[i].score_cn}>%"></span>
											</span>
											<span class="sailed">
												月售 <{_stores[i].sailed}>
											</span>
										</div>
									</div>
									<!-- <{# if(_stores[i].delivery_mode == 2){ }>
									<div class="plateform-delivery"><span><?php  echo $_config_mall['delivery_title'];?></span></div>
									<{# } }> -->
								</div>
								<div class="delivery-conditions">
									起送<span class="color-danger">￥<{_stores[i].send_price}></span><span class="pipe">|</span>配送<span class="color-danger">￥<{_stores[i].delivery_price}></span><!-- <span class="pipe">|</span>约<span class="color-danger"><{_stores[i].delivery_time}>分钟</span> -->
									<div class="distance <{#if(!_stores[i].distance) {}>hide<{# } }>" data-in-business-hours="<{# if(_stores[i].is_in_business_hours){ }>1<{# } else { }>100000000<{# } }>"><i class="icon icon-lbs"></i>
										<{# if(_stores[i].distance < 1){ }>
											<{_stores[i].distance * 1000}>m
										<{# } }>

										<{# if(_stores[i].distance <= 10 & _stores[i].distance >= 1){ }>
											<{_stores[i].distance.toFixed(1)}>km
										<{# } }>

										<{# if(_stores[i].distance > 10){ }>
											<{_stores[i].distance.toFixed()}>km
										<{# } }>

										<{# if(isNaN(_stores[i].distance)){ }>
											<{_stores[i].distance}>
										<{# } }>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<div class="activity-containter">
					<{# var num = 0; }>
					<{# if(_stores[i].activity.num > 0){ }>
						<div class="dashed-line"></div>
						<{# if(_stores[i].activity.num > 2){ }>
							<div class="activity-num"><i class="icon icon-arrow-down"></i></div>
						<{# } }>
						<{# for(var j in _stores[i].activity['items']){ }>
							<{# num++ }>
							<{# var item = _stores[i].activity['items'][j]; }>
							<div class="<{item.type}> <{# if(num > 2){ }>activity-row hide<{# } }>"> <{item.title}></div>
						<{# } }>
					<{# } }>
				</div>
			</div>
			<{# } }>
		<{# } }>
	</div>
</script>

<script type="text/javascript" src="//webapi.amap.com/maps?v=1.4.1&key=550a3bf0cb6d96c3b43d330fb7d86950"></script>
<script>
$(function(){
	$(document).on('click', '.swiper-slide, .discount-item', function(){
		var url = $(this).data('link');
		if(!url) {
			return false;
		}
		location.href = url;
		return;
	});

	$(document).on('click', '.activity-containter', function(){
		if($(this).hasClass('active')) {
			$(this).find('.activity-row').addClass('hide');
			$(this).find('.activity-num i').addClass('fa-arrow-down').removeClass('fa-arrow-up');
		} else {
			$(this).find('.activity-row').removeClass('hide');
			$(this).find('.activity-num i').addClass('fa-arrow-up').removeClass('fa-arrow-down');
		}
		$(this).toggleClass('active');
	});

	$(document).on('click', '.home .select-tab a.button', function(){
		var flag = false;
		if($(this).hasClass('button-active')) {
			flag = true;
		}
		$('.home .select-tab a.button').removeClass('button-active');
		$('.home .drop-menu-list').hide();
		if(!flag) {
			$(this).addClass('button-active');
			$(this).next('.drop-menu-list').show();
		}
	});

	$(document).on("pageInit", "#page-app-store-search", function(e, id, page) {
		var $this = $(page).find('.bind-data');
		var params = {
			lat: $this.data('lat'),
			lng: $this.data('lng'),
			dis: $this.data('dis'),
			cid: $this.data('cid'),
			order: $this.data('order')
		}
		if(!params.lat || !params.lng) {
			tiny.getLocation(function(location) {
				params.lat = location.lat;
				params.lng = location.lng;
				getStoreList();
			});
			return false;
		} else {
			getStoreList();
		}
		function getStoreList() {
			if(!params.lat || !params.lng) {
				$('#store-list .geolocationing').addClass('hide');
				$('#store-list .geolocationfail').removeClass('hide');
				return false;
			}
			$.post("<?php  echo imurl('wmall/home/search/list');?>", params, function(data){
				var result = $.parseJSON(data);
				if(result.message.error != 0) {
					$.toast(result.message.message);
					return false;
				}
				require(['laytpl', 'tiny', 'jquery.lazyload'], function(laytpl, tiny){
					var tplHome = $('#tpl-search').html();
					laytpl(tplHome).render(result.message.message, function(html){
						$('#search-container').html(html);
						var memoryHeight = sessionStorage.getItem(pageId);
						$pageId.find('.content').scrollTop(parseInt(memoryHeight));

						$(".swiper-container.slide").swiper({
							autoplay: 3000
						});
						$('#search-container').find("img.lazyload").lazyload({
							container: $('.lazyload-container'),
							effect : 'fadeIn',
							threshold : 200
						});
					});
				});
			});
		}
	});
});
</script>
<?php  include itemplate('public/footer', TEMPLATE_INCLUDEPATH);?>