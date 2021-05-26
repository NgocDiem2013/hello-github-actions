<!DOCTYPE html>
<html lang="ja">
<head>
	<?=$template_parts['gtag_analy']?>
	<?=$template_parts['meta']?>
	<?=$template_parts['load_files']?>
</head>
<body>

	<div class="container">
		<?=$template_parts['header']?>
		<div class="main">
			<?=$template_parts['menu']?>

			<div class="content--wrap">
				<div class="filter--wrap"><?=$template_parts['filter']?></div><!--end filter--wrap-->
				<div class="content--wrap_box">

							<div class="chart-box">
								<div style="" class="chart-box_title">
									<h3>プロフィールビュー数<label class="tooltip_click profile_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日のプロフィール閲覧数を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />プロフィールビュー数はアカウント登録日より90日前のデータまで遡って取得しています。</p>"></label></h3>
									<p style="margin:0;" id="total_profile_views"><!-- 指定期間の合計プロフィールビュー数データをJqueryで入力 --></p>
								</div>
								<div id="target_graph_daily_profile_views" style="height:200px;"></div>
								<!-- <div id="target_graph_total_profile_views" style="height:200px;"></div> -->
							</div><!--end chart-box-->
							<div class="chart-box">
								<div style="" class="chart-box_title">
									<h3>ウェブサイトクリック数<label class="tooltip_click website_clicks_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日のウェブサイトクリック数を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />ウェブサイトクリック数はアカウント登録日より90日前のデータまで遡って取得しています。</p>"></label></h3>
									<p style="margin:0;" id="total_website_clicks"><!-- 指定期間の合計ウェブクリック数データをJqueryで入力 --></p>
								</div>
								<div id="target_graph_daily_website_clicks" style="height:200px;"></div>
								<!-- <div id="target_graph_total_website_clicks" style="height:200px;"></div> -->
							</div><!--end chart-box-->


				</div><!--end content--wrap_box-->
			</div><!--end content--wrap-->
			<?=$template_parts['footer']?>
		</div><!--/.main -->
	</div><!--/.container -->

	<input type="hidden" id="oldest_datepicker_date" value="<?=date("Y-m-d", strtotime($oldest_performance_insights_datetime));?>" />

<script>

// $(window).on('load resize', function () {
$(function(){
	var from	= $("#from").val();
	var to		= $("#to").val();
	data_loader(from, to);

});


//グラフ等表示用関数（AJAX対応）
function data_loader(from, to){

	// グラフ表示
	'use strict';

	// パッケージのロード
	google.charts.load('current', {packages: ['corechart']});

	var postData = {"from":from, "to":to};

	$.get("/performance/graph_insights_Vi/profile_views/",
		postData,
		function(data){
			var $data = JSON.parse(data);
			//合計値
			var total = calc_total(JSON.stringify($data["daily"]));
			$('#total_profile_views').text(total);

			//最終データ取得日をHTML内にフィード
			$('.profile_graph_tip').attr('date-tooltip-datetime', $data["latest_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data = get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用
			// var $g_total_data = get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){
				graph_disp_error["daily"] === 0	? drawDailyProfileViewsChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_profile_views")	: $("#target_graph_daily_profile_views").html("No data");
				// graph_disp_error["total"] === 0	? drawTotalProfileViewsChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_profile_views")	: $("#target_graph_total_profile_views").html("No data");
			});
		}
	);

	$.get("/performance/graph_insights_Vi/website_clicks/",
		postData,
		function(data){
			var $data = JSON.parse(data);
			//合計値
			var total = calc_total(JSON.stringify($data["daily"]));
			$('#total_website_clicks').text(total);

			//最終データ取得日をHTML内にフィード
			$('.website_clicks_graph_tip').attr('date-tooltip-datetime', $data["latest_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data = get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用
			// var $g_total_data = get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){
				graph_disp_error["daily"] === 0	? drawDailyWebsiteClicksChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_website_clicks")	: $("#target_graph_daily_website_clicks").html("No data");
				// graph_disp_error["total"] === 0	? drawTotalWebsiteClicksChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_website_clicks")	: $("#target_graph_total_website_clicks").html("No data");
			});
		}
	);



	// コールバックの登録
	var type = "followers";

	//プロフィールビューチャート
	function drawDailyProfileViewsChart(data, ticks, name_type, set_id){
		//var arr01	= JSON.parse(data);
		var data	= google.visualization.arrayToDataTable(data);
		var options = {
			title					: name_type,
			legend				: 'none',
			animation			:
			{
				duration		: 400,
				startup			: true,
				easing			: 'in',
			},
			chartArea			:
			{
				width				: '80%',
				height			: '65%',
			},
			colors				: ['#85a5c4'],
			lineWidth			: 2,					//線の太さ
			pointShape		: 'circle',		//データ地点ポインターの形
			pointSize			: 2, 					//データ地点ポインターの大きさ
			selectionMode	:'multiple',	//データ地点ポインターの選択数
			hAxis					:
			{
				format			: "M/d",
				ticks				: ticks,
				gridlines		:
				{
					color			: '#eee',
					count			: 4,
				},
				textStyle		:
				{
					color			: '#a3a3a3',
					fontSize	: '10px'
				},
			}, //end hAxis
			baselineColor	: "#eee",
			vAxis					:
			{ //縦軸系
				title				: '',
				gridlines		:
				{
					color			: '#eee', 		//補助線を非表示
					count			: 2, 					//縦軸線の数（数値によっては正確に表現されないから注意）
				},
				textStyle:
				{
					color			: '#a3a3a3',
					fontSize	: '10px',
				}
			}, //end vAxis
			tooltip				:
			{
				textStyle		:
				{
					color			: '#666',
					//fontName: <string>,
					fontSize	: '12px',
					bold			: true,
				}
			}, //end tooltip
			focusTarget		: 'category',
		} //end options

		//ツールチップの日付のフォーマット
		var dateformat = new google.visualization.DateFormat({
				pattern: 'YYYY年M月d日'
		});
		//ツールチップの数値のフォーマット
		dateformat.format(data, 0);
		var formatter = new google.visualization.NumberFormat({
				pattern: '#,###'
		});
		formatter.format(data, 1);

		var chart = new google.visualization.LineChart(document.getElementById(set_id));
		chart.draw(data, options);
	}//end drawFollowersChart
	//ウェブサイトクリックチャート
	function drawDailyWebsiteClicksChart(data, ticks, name_type, set_id){
		//var arr01	= JSON.parse(data);
		var data	= google.visualization.arrayToDataTable(data);
		var options = {
			title					: name_type,
			legend				: 'none',
			animation			:
			{
				duration		: 400,
				startup			: true,
				easing			: 'in',
			},
			chartArea			:
			{
				width				: '80%',
				height			: '65%',
			},
			colors				: ['#85a5c4'],
			lineWidth			: 2,					//線の太さ
			pointShape		: 'circle',		//データ地点ポインターの形
			pointSize			: 2, 					//データ地点ポインターの大きさ
			selectionMode	:'multiple',	//データ地点ポインターの選択数
			hAxis					:
			{
				format			: "M/d",
				ticks				: ticks,
				gridlines		:
				{
					color			: '#eee',
					count			: 4,
				},
				textStyle		:
				{
					color			: '#a3a3a3',
					fontSize	: '10px'
				},
			}, //end hAxis
			baselineColor	: "#eee",
			vAxis					:
			{ //縦軸系
				title				: '',
				gridlines		:
				{
					color			: '#eee', 		//補助線を非表示
					count			: 2, 					//縦軸線の数（数値によっては正確に表現されないから注意）
				},
				textStyle:
				{
					color			: '#a3a3a3',
					fontSize	: '10px',
				}
			}, //end vAxis
			tooltip				:
			{
				textStyle		:
				{
					color			: '#666',
					//fontName: <string>,
					fontSize	: '12px',
					bold			: true,
				}
			}, //end tooltip
			focusTarget		: 'category',
		} //end options

		//ツールチップの日付のフォーマット
		var dateformat = new google.visualization.DateFormat({
				pattern: 'YYYY年M月d日'
		});
		//ツールチップの数値のフォーマット
		dateformat.format(data, 0);
		var formatter = new google.visualization.NumberFormat({
				pattern: '#,###'
		});
		formatter.format(data, 1);

		var chart = new google.visualization.LineChart(document.getElementById(set_id));
		chart.draw(data, options);
	}//end drawFollowersChart
	//プロフィールビューチャート（指定期間累計推移）
	function drawTotalProfileViewsChart(data, ticks, name_type, set_id){
		//var arr01	= JSON.parse(data);
		var data	= google.visualization.arrayToDataTable(data);
		var options = {
			title					: name_type,
			legend				: 'none',
			animation			:
			{
				duration		: 400,
				startup			: true,
				easing			: 'in',
			},
			chartArea			:
			{
				width				: '80%',
				height			: '65%',
			},
			colors				: ['#85a5c4'],
			lineWidth			: 2,					//線の太さ
			pointShape		: 'circle',		//データ地点ポインターの形
			pointSize			: 2, 					//データ地点ポインターの大きさ
			selectionMode	:'multiple',	//データ地点ポインターの選択数
			hAxis					:
			{
				format			: "M/d",
				ticks				: ticks,
				gridlines		:
				{
					color			: '#eee',
					count			: 4,
				},
				textStyle		:
				{
					color			: '#a3a3a3',
					fontSize	: '10px'
				},
			}, //end hAxis
			baselineColor	: "#eee",
			vAxis					:
			{ //縦軸系
				title				: '',
				gridlines		:
				{
					color			: '#eee', 		//補助線を非表示
					count			: 2, 					//縦軸線の数（数値によっては正確に表現されないから注意）
				},
				textStyle:
				{
					color			: '#a3a3a3',
					fontSize	: '10px',
				}
			}, //end vAxis
			tooltip				:
			{
				textStyle		:
				{
					color			: '#666',
					//fontName: <string>,
					fontSize	: '12px',
					bold			: true,
				}
			}, //end tooltip
			focusTarget		: 'category',
		} //end options

		//ツールチップの日付のフォーマット
		var dateformat = new google.visualization.DateFormat({
				pattern: 'YYYY年M月d日'
		});
		//ツールチップの数値のフォーマット
		dateformat.format(data, 0);
		var formatter = new google.visualization.NumberFormat({
				pattern: '#,###'
		});
		formatter.format(data, 1);

		var chart = new google.visualization.AreaChart(document.getElementById(set_id));
		chart.draw(data, options);
	}//end drawFollowersChart
	//ウェブサイトクリックチャート（指定期間累計推移）
	function drawTotalWebsiteClicksChart(data, ticks, name_type, set_id){
		//var arr01	= JSON.parse(data);
		var data	= google.visualization.arrayToDataTable(data);
		var options = {
			title					: name_type,
			legend				: 'none',
			animation			:
			{
				duration		: 400,
				startup			: true,
				easing			: 'in',
			},
			chartArea			:
			{
				width				: '80%',
				height			: '65%',
			},
			colors				: ['#85a5c4'],
			lineWidth			: 2,					//線の太さ
			pointShape		: 'circle',		//データ地点ポインターの形
			pointSize			: 2, 					//データ地点ポインターの大きさ
			selectionMode	:'multiple',	//データ地点ポインターの選択数
			hAxis					:
			{
				format			: "M/d",
				ticks				: ticks,
				gridlines		:
				{
					color			: '#eee',
					count			: 4,
				},
				textStyle		:
				{
					color			: '#a3a3a3',
					fontSize	: '10px'
				},
			}, //end hAxis
			baselineColor	: "#eee",
			vAxis					:
			{ //縦軸系
				title				: '',
				gridlines		:
				{
					color			: '#eee', 		//補助線を非表示
					count			: 2, 					//縦軸線の数（数値によっては正確に表現されないから注意）
				},
				textStyle:
				{
					color			: '#a3a3a3',
					fontSize	: '10px',
				}
			}, //end vAxis
			tooltip				:
			{
				textStyle		:
				{
					color			: '#666',
					//fontName: <string>,
					fontSize	: '12px',
					bold			: true,
				}
			}, //end tooltip
			focusTarget		: 'category',
		} //end options

		//ツールチップの日付のフォーマット
		var dateformat = new google.visualization.DateFormat({
				pattern: 'YYYY年M月d日'
		});
		//ツールチップの数値のフォーマット
		dateformat.format(data, 0);
		var formatter = new google.visualization.NumberFormat({
				pattern: '#,###'
		});
		formatter.format(data, 1);

		var chart = new google.visualization.AreaChart(document.getElementById(set_id));
		chart.draw(data, options);
	}//end drawFollowersChart
	//Jsonデータからグラフ用データとラベル用データを取り出す（日付をラベルにする場合専用）
	function get_data_tick_by_json(data){
		var $i = 1;
		var $arr = data;
		var $ticks = new Array($arr.length);
		//データ内の日付をDate形式に変更
		//横軸ラベル用データを作成→Date形式に変更
		for($i=1; $i<$arr.length; $i++){
			var $date			= new Date(moment($arr[$i][0]).format("L"));
			$arr[$i][0]		= $date;
			$ticks[$i-1]	= $date;
		}
		var data				= {"c_data":$arr, "ticks":$ticks};
		return data;
	}

	function calc_total(data) {
		var arr = JSON.parse(data);
		var total = 0;
		for(var i=1; i<arr.length; i++){
			total += arr[i][1];
		}
		return total;
	}

}
</script>




</body>
</html>
