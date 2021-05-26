<!DOCTYPE html>
<html lang="ja">
<head>
	<?=$template_parts['gtag_analy']?>
	<?=$template_parts['meta']?>
	<?=$template_parts['load_files']?>
	<style>
	.prev_oldest_datetime_error_text{
		margin-top:4px !important;
		font-size:0.7em;
		color:#888;
		display:none;
	}
	</style>

</head>
<body>

	<div class="container">
		<?=$template_parts['header']?>
		<div class="main">
			<?=$template_parts['menu']?>

			<div class="content--wrap">
				<div class="filter--wrap"><?=$template_parts['filter']?></div><!--end filter--wrap-->
				<div class="content--wrap_box">

					<div class="compact-total">
                        <div class="compact-box-4">
                            <ul class="compact-content">
                                <li class="bgk-purple"><span class="icon"><img src="/images/icon/follower_tim.png"></span></li>
                                <li class="headlist_followers_increase_outer">
                                	<h3 class="title">フォロワー増加数<label class="tooltip_click engagement_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中におけるフォロワー数の増減を表示しています。<br />フォロワー数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。<br />また、アカウント登録日の増加数は「0」として計算しています。</p>"></label></h3>
                                    <p class="compact-number">
                                        <span class="font32 color-pink" id="total_follower_increase"></span>
                                    </p>
																		<p class="prev_oldest_datetime_error_text">登録日以前は取得不能</p>
																		<p class="compact-date">
																			<span class="disp_date_from"></span>
																			<span>～</span>
																			<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>

                        <div class="compact-box-4">
                            <ul class="compact-content">
                                <li class="bgk-pink"><span class="icon"><img src="/images/icon/eye.png"></span></li>
                                <li class="headlist_impression_outer">
                                	<h3 class="title">インプレッション数</h3>
                                		<p class="compact-number">
                                        <span class="font32 color-pink" id="total_impressions"></span>
                                    </p>
																		<p class="prev_oldest_datetime_error_text">指定日以前のデータなし</p>
																		<p class="compact-date">
																			<span class="disp_date_from"></span>
																			<span>～</span>
																			<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>


                        <div class="compact-box-4">
                            <ul class="compact-content">
                                <li class="bgk-orange"><span class="icon"><img src="/images/icon/account_orange.png"></span></li>
                                <li class="headlist_reach_outer">
                                	<h3 class="title">リーチ数</h3>
                                    <p class="compact-number">
                                        <span class="font32 color-orange" id="total_reach"></span>
                                    </p>
																		<p class="prev_oldest_datetime_error_text">指定日以前のデータなし</p>
																		<p class="compact-date">
																			<span class="disp_date_from"></span>
																			<span>～</span>
																			<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>

                        <div class="compact-box-4">
                            <ul class="compact-content">
                                <li class="bgk-yellow"><span class="icon"><img src="/images/icon/account.png"></span></li>
                                <li class="headlist_engagement_outer">
                                	<h3 class="title">エンゲージメント数<label class="tooltip_click engagement_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における総投稿エンゲージメント数の増減を表示しています。<br />エンゲージメント数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。<br />また、アカウント登録日の増加数は「0」として計算しています。<br />※エンゲージメント数とは、インスタグラム投稿へのいいね！数、コメント数、保存数を合算した値です。</p>"></label></h3>
                                		 <p class="compact-number">
                                        <span class="font32 color-yellow" id="total_engagement"></span>
                                     </p>
																		 <p class="prev_oldest_datetime_error_text">登録日以前は取得不能</p>
																		 <p class="compact-date">
																			<span class="disp_date_from"></span>
																			<span>～</span>
																			<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>


                    </div><!--end compact-total-->





					<!-- グラフ表示用のDIVは必ず高さ指定を行う必要あり、サイズは好みで変えてOK -->
					<div class="box80">
						<div style="" class="chart-box_title">
							<h3>フォロワー増加数<label class="tooltip_click followers_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日のフォロワー数の増減を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />フォロワー数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。<br />また、アカウント登録日の増加数は「0」として計算しています。</p>"></label></h3>
						</div>
						<div id="target_graph_daily_followers" style="height:200px;"></div>
						<div style="" class="chart-box_title">
							<h3>フォロワー累計数<label class="tooltip_click followers_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日の総フォロワー数を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />フォロワー数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。</p>"></label></h3>
						</div>
						<div id="target_graph_total_followers" style="height:200px;"></div>
					</div>

					<div class="box80">
						<div style="" class="chart-box_title">
							<h3>インプレッション数<label class="tooltip_click impressions_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日の総投稿閲覧数の増減を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />インプレッション数はアカウント登録日より90日前のデータまで遡って取得しています。</p>"></label></h3>
						</div>
						<div id="target_graph_daily_impressions" style="height:200px;"></div>
						<!-- <div id="target_graph_total_impressions" style="height:200px;"></div> -->
					</div>

					<div class="box80">
						<div style="" class="chart-box_title">
							<h3>リーチ数<label class="tooltip_click reach_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日の総投稿リーチ数の増減を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />リーチ数はアカウント登録日より90日前のデータまで遡って取得しています。</p>"></label></h3>
						</div>
						<div id="target_graph_daily_reach" style="height:200px;"></div>
						<!-- <div id="target_graph_total_reach" style="height:200px;"></div> -->
					</div>

					<div class="box80">
						<div style="" class="chart-box_title">
							<h3>エンゲージメント増加数
								<label class="tooltip_click engagement_graph_tip" date-tooltip-datetime="" data-tooltip-text="
									<p class='tooltip_text'>画面右上の指定期間中における各日の総投稿エンゲージメント数の増減を表示しています。（ datetime_exchange_text ）<br />
										「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />
										エンゲージメント数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。<br />
										また、アカウント登録日の増加数は「0」として計算しています。<br />
										※エンゲージメント数とは、インスタグラム投稿へのいいね！数、コメント数、保存数を合算した値です。
									</p>">
								</label>
							</h3>
						</div>
						<div id="target_graph_daily_engagement" style="height:200px;"></div>
						<div style="" class="chart-box_title">
							<h3>エンゲージメント累計数<label class="tooltip_click engagement_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間中における各日の総投稿エンゲージメント数を表示しています。（ datetime_exchange_text ）<br />「アカウント登録日」はInsight Suiteに対象のインスタグラムアカウントが登録された日です。<br />エンゲージメント数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。<br />※エンゲージメント数とは、インスタグラム投稿へのいいね！数、コメント数、保存数を合算した値です。</p>"></label></h3>
						</div>
						<div id="target_graph_total_engagement" style="height:200px;"></div>
					</div>

				</div><!--end content--wrap_box-->
			</div><!--end content--wrap-->
			<?=$template_parts['footer']?>
		</div><!--/.main -->
	</div><!--/.container -->

	<?php $oldest_datepicker_date = $oldest_performance_insights_datetime ? $oldest_performance_insights_datetime : $ig_id_regist_oldest ; ?>
	<input type="hidden" id="oldest_datepicker_date" value="<?=date("Y-m-d", strtotime($oldest_datepicker_date));?>" />

<script>

// $(window).on('load resize', function () {
$(function(){
	var from	= $("#from").val();
	var to		= $("#to").val();
	data_loader(from, to);
});


//グラフ等表示用関数（AJAX対応）
function data_loader(from, to){
	'use strict';

	var tmp_from	= new Date(from);
	var tmp_to		= new Date(to);

	//インスタグラムアカウントの登録日をDate形式で設定
	var $ig_date = "<?=$ig_id_regist_oldest?>";
	var $oldest_followers_count_datetime = new Date(moment("<?=$oldest_followers_count_datetime?>").format("L"));
	var $oldest_impressions_datetime = new Date(moment("<?=$oldest_impressions_datetime?>").format("L"));
	var $oldest_reach_datetime = new Date(moment("<?=$oldest_reach_datetime?>").format("L"));
	var $oldest_engagement_datetime = new Date(moment("<?=$oldest_engagement_datetime?>").format("L"));
	var $ig_id_regist_oldest	= new Date(moment("<?=$ig_id_regist_oldest?>").format("L"));
	var $graph_prev_ig_id_regist_html = "<div style='border:1px solid #eee;margin:10px;padding:30px 10px;'><p>Insight Suiteに対象のインスタグラムアカウントが<br />登録された日以前のデータは取得できません。</p></div>";
	var $graph_no_data_html = "<div style='border:1px solid #eee;margin:10px;padding:50px 10px;'><p>No data</p></div>";
	var $graph_prev_oldest_datetime_html = "<div style='border:1px solid #eee;margin:10px;padding:30px 10px;'><p>指定日以前のデータはInsight Suiteにデータがありません。</p></div>";


	//各データの最古データの比較[ 開始日 ]
			//指定期間がアカウント登録日以前の場合→集計数値一覧の日付表示をアカウント登録日に固定
			var $headline_followers_datetime_from		= $ig_id_regist_oldest > tmp_from	? zeroPadding(($ig_id_regist_oldest.getMonth()+1), 2) + "/" + zeroPadding($ig_id_regist_oldest.getDate(), 2)	: zeroPadding((tmp_from.getMonth()+1), 2) + "/" + zeroPadding(tmp_from.getDate(), 2);
			var $headline_engagement_datetime_from	= $ig_id_regist_oldest > tmp_from	? zeroPadding(($ig_id_regist_oldest.getMonth()+1), 2) + "/" + zeroPadding($ig_id_regist_oldest.getDate(), 2)	: zeroPadding((tmp_from.getMonth()+1), 2) + "/" + zeroPadding(tmp_from.getDate(), 2);
			$(".headlist_followers_increase_outer .compact-date .disp_date_from").text($headline_followers_datetime_from);
			$(".headlist_engagement_outer .compact-date .disp_date_from").text($headline_engagement_datetime_from);

			//指定期間が最古データ以前の場合→集計数値一覧の日付表示を最古データ日付に固定
			var $headline_impressions_datetime_from	= $oldest_impressions_datetime > tmp_from	? zeroPadding(($oldest_impressions_datetime.getMonth()+1), 2) + "/" + zeroPadding($oldest_impressions_datetime.getDate(), 2)	: zeroPadding((tmp_from.getMonth()+1), 2) + "/" + zeroPadding(tmp_from.getDate(), 2);
			var $headline_reach_datetime_from				= $oldest_reach_datetime > tmp_from				? zeroPadding(($oldest_reach_datetime.getMonth()+1), 2) + "/" + zeroPadding($oldest_reach_datetime.getDate(), 2)							: zeroPadding((tmp_from.getMonth()+1), 2) + "/" + zeroPadding(tmp_from.getDate(), 2);
			$(".headlist_impression_outer .compact-date .disp_date_from").text($headline_impressions_datetime_from);
			$(".headlist_reach_outer .compact-date .disp_date_from").text($headline_reach_datetime_from);

	//各データの最古データの比較[ 終了日 ]
			//指定期間がアカウント登録日以前の場合→集計数値一覧の日付表示をアカウント登録日に固定
			var $headline_followers_datetime_to		= $ig_id_regist_oldest > tmp_to	? zeroPadding(($ig_id_regist_oldest.getMonth()+1), 2) + "/" + zeroPadding($ig_id_regist_oldest.getDate(), 2)	: zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2);
			var $headline_engagement_datetime_to	= $ig_id_regist_oldest > tmp_to	? zeroPadding(($ig_id_regist_oldest.getMonth()+1), 2) + "/" + zeroPadding($ig_id_regist_oldest.getDate(), 2)	: zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2);
			$(".headlist_followers_increase_outer .compact-date .disp_date_to").text($headline_followers_datetime_to);
			$(".headlist_engagement_outer .compact-date .disp_date_to").text($headline_engagement_datetime_to);

			//指定期間が最古データ以前の場合→集計数値一覧の日付表示を最古データ日付に固定
			var $headline_impressions_datetime_to	= $oldest_impressions_datetime > tmp_to	? zeroPadding(($oldest_impressions_datetime.getMonth()+1), 2) + "/" + zeroPadding($oldest_impressions_datetime.getDate(), 2)	: zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2);
			var $headline_reach_datetime_to				= $oldest_reach_datetime > tmp_to				? zeroPadding(($oldest_reach_datetime.getMonth()+1), 2) + "/" + zeroPadding($oldest_reach_datetime.getDate(), 2)							: zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2);
			$(".headlist_impression_outer .compact-date .disp_date_to").text($headline_impressions_datetime_to);
			$(".headlist_reach_outer .compact-date .disp_date_to").text($headline_reach_datetime_to);

	// $(".disp_date_to").text(zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2));

	// パッケージのロード
	google.charts.load('current', {packages: ['corechart']});

	var $data_graph_followers;
	var $data_graph_reach;
	var $data_graph_impressions;

	//インスタグラムアカウントの登録日をDate形式で設定
	var $today = new Date();
	var $ig_date = "<?=$ig_id_regist_oldest?>";
	var $ig_id_regist_oldest	= new Date(moment("<?=$ig_id_regist_oldest?>").format("L"));
	var $graph_prev_ig_id_regist_html = "<div style='border:1px solid #eee;margin:10px;padding:30px 10px;'><p>Insight Suiteに対象のインスタグラムアカウントが<br />登録された日以前のデータは取得できません。</p></div>";
	var $graph_just_ig_id_regist_html = "<div style='border:1px solid #eee;margin:10px;padding:30px 10px;'><p>Insight Suite登録当日はデータ取得が出来ないため<br />明日からデータ閲覧が可能になります。</p></div>";
	var $graph_no_data_html = "<div style='border:1px solid #eee;margin:10px;padding:50px 10px;'><p>No data</p></div>";

	var postData = {"from":from, "to":to};

	//指定期間リーチ数の取得
	// $.get("/performance/insights_total_count_Vi/reach/",
	// 	postData,
	// 	function(data){
	// 		$("#total_reach").text(data);
	// 	}
	// );

	//指定期間インプレッション数の取得
	// $.get("/performance/insights_total_count_Vi/impressions/",
	// 	postData,
	// 	function(data){
	// 		$("#total_impressions").text(data);
	// 	}
	// );

	//フォロワーグラフ
	$.get("/performance/graph_followers_Vi/",
		postData,
		function(data){
			var $data = JSON.parse(data);

			var $post_date_to	= new Date(moment(postData["to"]).format("L"));
			if ($ig_id_regist_oldest < $post_date_to) {
				//合計値
				var total = calc_total($data["daily"]);
				$('.headlist_followers_increase_outer .prev_oldest_datetime_error_text').hide();
				$('.headlist_followers_increase_outer .compact-date').show();
			} else {
				var total = '---';
				$('.headlist_followers_increase_outer .prev_oldest_datetime_error_text').show();
				$('.headlist_followers_increase_outer .compact-date').hide();
			}
			$('#total_follower_increase').text(total);

			//最終データ取得日をHTML内にフィード
			$('.followers_graph_tip').attr('date-tooltip-datetime', $data["latest_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data			= get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用
			var $g_total_data 		= get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var $graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){

				//指定日時とアカウント登録日を比較して表示内容を変更
				//登録日以前のデータは取得できない旨表示
				if ($ig_id_regist_oldest > $post_date_to) {
					$("#target_graph_daily_followers").html($graph_prev_ig_id_regist_html);
					$("#target_graph_total_followers").html($graph_prev_ig_id_regist_html);
				} else if (moment($ig_id_regist_oldest).format("YYYYMMDD") == moment($post_date_to).format("YYYYMMDD")) {
					$("#target_graph_daily_followers").html($graph_prev_ig_id_regist_html);
					$graph_disp_error["total"] === 0	? drawTotalFollowersChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_followers")	: $("#target_graph_total_followers").html($graph_no_data_html);
				} else {
					$graph_disp_error["daily"] === 0	? drawDailyFollowersChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_followers")	: $("#target_graph_daily_followers").html($graph_no_data_html);
					$graph_disp_error["total"] === 0	? drawTotalFollowersChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_followers")	: $("#target_graph_total_followers").html($graph_no_data_html);
				}

			});
		}
	);

	//インプレッション数グラフ
	$.get("/performance/graph_insights_Vi/impressions/",
		postData,
		function(data){
			var $post_date_to = new Date(moment(postData["to"]).format("L"));
			var $data = JSON.parse(data);
			//合計値
			if ($oldest_impressions_datetime <= $post_date_to) {
				var total = calc_total($data["daily"]);
				$('.headlist_impression_outer .prev_oldest_datetime_error_text').hide();
				$('.headlist_impression_outer .compact-date').show();
			} else {
				var total = '---';
				$('.headlist_impression_outer .prev_oldest_datetime_error_text').show();
				$('.headlist_impression_outer .compact-date').hide();
			}
			$('#total_impressions').text(total);

			//最終データ取得日をHTML内にフィード
			$('.impressions_graph_tip').attr('date-tooltip-datetime', $data["latest_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data = get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用
			// var $g_total_data = get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var $graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){
				if ($oldest_impressions_datetime > $post_date_to) {
					$("#target_graph_daily_impressions").html($graph_prev_oldest_datetime_html);
				} else {
					$graph_disp_error["daily"] === 0	? drawDailyImpressionsChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_impressions")	: $("#target_graph_daily_impressions").html($graph_no_data_html);
					// $graph_disp_error["total"] === 0	? drawTotalImpressionsChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_impressions")	: $("#target_graph_total_impressions").html($graph_no_data_html);
				}
			});
		}
	);

	//リーチ数グラフ
	$.get("/performance/graph_insights_Vi/reach/",
		postData,
		function(data){
			var $post_date_to = new Date(moment(postData["to"]).format("L"));
			var $data = JSON.parse(data);
			//合計値
			if ($oldest_reach_datetime <= $post_date_to) {
				var total = calc_total($data["daily"]);
				$('.headlist_reach_outer .prev_oldest_datetime_error_text').hide();
				$('.headlist_reach_outer .compact-date').show();
			} else {
				var total = '---';
				$('.headlist_reach_outer .prev_oldest_datetime_error_text').show();
				$('.headlist_reach_outer .compact-date').hide();
			}
			$('#total_reach').text(total);

			//最終データ取得日をHTML内にフィード
			$('.reach_graph_tip').attr('date-tooltip-datetime', $data["latest_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data = get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用
			// var $g_total_data = get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var $graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){
				if ($oldest_reach_datetime > $post_date_to) {
					$("#target_graph_daily_reach").html($graph_prev_oldest_datetime_html);
				} else {
					$graph_disp_error["daily"] === 0	? drawDailyReachChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_reach")	: $("#target_graph_daily_reach").html($graph_no_data_html);
					// $graph_disp_error["total"] === 0	? drawTotalReachChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_reach")	: $("#target_graph_total_reach").html($graph_no_data_html);
				}

			});
		}
	);

	//エンゲージメント数グラフ
	$.get("/performance/graph_user_engagement/",
		postData,
		function(data){

			var $data = JSON.parse(data);

			var $post_date_to = new Date(moment(postData["to"]).format("L"));
			if ($ig_id_regist_oldest < $post_date_to) {
				//合計値
				var total = calc_total($data["daily"]);
				$('.headlist_engagement_outer .prev_oldest_datetime_error_text').hide();
				$('.headlist_engagement_outer .compact-date').show();
			} else {
				var total = '---';
				$('.headlist_engagement_outer .prev_oldest_datetime_error_text').show();
				$('.headlist_engagement_outer .compact-date').hide();
			}
			//合計値
			// var total = calc_total($data["daily"]);
			$('#total_engagement').text(total);

			//最終データ取得日をHTML内にフィード
			$('.engagement_graph_tip').attr('date-tooltip-datetime', $data["latest_media_insights_datetime"]);

			// グラフ表示用データ
			var $g_daily_data = get_data_tick_by_json($data["daily"]);	//日付をラベルにする場合専用z
			var $g_total_data = get_data_tick_by_json($data["total"]);	//日付をラベルにする場合専用
			var $graph_disp_error	= $data["error"];
			google.charts.setOnLoadCallback(function(){

				//登録日以前のデータは取得できない旨表示
				if ($ig_id_regist_oldest > $post_date_to) {
					$("#target_graph_daily_engagement").html($graph_prev_ig_id_regist_html);
					$("#target_graph_total_engagement").html($graph_prev_ig_id_regist_html);
				} else if (moment($ig_id_regist_oldest).format("YYYYMMDD") === moment($post_date_to).format("YYYYMMDD")) {
					$("#target_graph_daily_engagement").html($graph_prev_ig_id_regist_html);
					$graph_disp_error["total"] === 0	? drawTotalEngagementChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_engagement")	: $("#target_graph_total_engagement").html($graph_no_data_html);
				} else {
					$graph_disp_error["daily"] === 0	? drawDailyEngagementChart($g_daily_data["c_data"], $g_daily_data["ticks"], "", "target_graph_daily_engagement")	: $("#target_graph_daily_engagement").html($graph_no_data_html);
					$graph_disp_error["total"] === 0	? drawTotalEngagementChart($g_total_data["c_data"], $g_total_data["ticks"], "", "target_graph_total_engagement")	: $("#target_graph_total_engagement").html($graph_no_data_html);
				}

			});
		}
	);

	// コールバックの登録
	// var type = "followers";

	//フォロワーチャート（デイリー増減）
	function drawDailyFollowersChart(data, ticks, name_type, set_id){
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
	//インプレッションチャート
	function drawDailyImpressionsChart(data, ticks, name_type, set_id){
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
	}//end drawImpressionsChart
	//リーチチャート
	function drawDailyReachChart(data, ticks, name_type, set_id){
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
	}//end drawimpressionsChart
	//エンゲージメントチャート
	function drawDailyEngagementChart(data, ticks, name_type, set_id){
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
	}//end drawimpressionsChart

	//フォロワーチャート（累計）
	function drawTotalFollowersChart(data, ticks, name_type, set_id){
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
	//インプレッションチャート（累計）
	function drawTotalImpressionsChart(data, ticks, name_type, set_id){
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
	}//end drawImpressionsChart
	//リーチチャート（累計）
	function drawTotalReachChart(data, ticks, name_type, set_id){
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
	}//end drawimpressionsChart
	//エンゲージメントチャート（累計）
	function drawTotalEngagementChart(data, ticks, name_type, set_id){
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
	}//end drawimpressionsChart

	//Jsonデータからグラフ用データとラベル用データを取り出す（日付をラベルにする場合専用）
	function get_data_tick_by_json(data){
		var $i = 1;
		var $arr = data;
		var $ticks = new Array(($arr.length-1));
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
		var arr = data;
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
