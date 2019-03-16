<?php defined('IN_IA') or exit('Access Denied');?><?php  include itemplate('public/header', TEMPLATE_INCLUDEPATH);?>
<div class="clearfix">
	<div class="panel panel-stat">
		<div class="panel-heading">
			<h3>顾客概括</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-3">
				<div class="title">今日新增(人)</div>
				<div class="num-wrapper">
					<a class="num" href="javascript:;"><?php  echo $stat['today_num'];?></a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="title">昨日新增(人)</div>
				<div class="num-wrapper">
					<a class="num" href="javascript:;"><?php  echo $stat['yesterday_num'];?></a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="title">本月新增(人)</div>
				<div class="num-wrapper">
					<a class="num" href="javascript:;"><?php  echo $stat['month_num'];?></a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="title">总顾客(人)</div>
				<div class="num-wrapper">
					<a class="num" href="javascript:;"><?php  echo $stat['total_num'];?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-trend">
		<div class="panel-heading">
			<h3>趋势图</h3>
		</div>
		<form action="" id="trade">
			<?php  echo tpl_form_field_daterange('time', array('start' => date('Y-m-d', $start),'end' => date('Y-m-d', $end)), '')?>
		</form>
		<div class="panel-body">
			<div style="margin-top:20px" id="chart-container">
				<canvas id="myChart" width="1200" height="300"></canvas>
			</div>
		</div>
	</div>
</div>
<script>
require(['daterangepicker'], function() {
	irequire(['chart'], function(){
		$('.daterange').on('apply.daterangepicker', function(ev, picker) {
			refresh();
		});

		var chart = null;
		var templates = {
			flow1: {
				label: '新增顾客(人)',
				fillColor : "rgba(36,165,222,0.1)",
				strokeColor : "rgba(36,165,222,1)",
				pointColor : "rgba(36,165,222,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(36,165,222,1)",
			}
		};

		function refresh() {
			$('#chart-container').html('<canvas id="myChart" width="1200" height="300"></canvas>');
			var url = location.href + '&#aaaa';
			var params = {
				'start': $('#trade input[name="time[start]"]').val(),
				'end': $('#trade input[name="time[end]"]').val()
			};
			$.post(url, params, function(data){
				var data = $.parseJSON(data)
				var datasets = data.datasets;
				var label = data.label;
				var ds = $.extend(true, {}, templates);
				ds.flow1.data = datasets.flow1;
				var lineChartData = {
					labels : label,
					datasets : [ds.flow1]
				};
				var ctx = document.getElementById("myChart").getContext("2d");
				chart = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
			});
		}
		refresh();
	});
});
</script>
<?php  include itemplate('public/footer', TEMPLATE_INCLUDEPATH);?>