
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


                    <div class="compact-total">
                        <div class="compact-box">
                            <ul class="compact-content">
                                <li class="bgk-purple"><span class="icon"><img src="./images/icon/follower.png"></span></li>
                                <li>
                                    <h3 class="title">現在のフォロワー数</h3>
                                    <p class="compact-number">
                                        <span id="current_followers_count" class="font32 color-purple"><?php //echo number_format($now_total_followers_count); ?></span>
                                        <span class="font8">Followers</span>
                                    </p>
																		<p class="compact-date">
																			<span class="disp_date_today"></span>
																		</p>
                                </li>
                            </ul>
                        </div>

                        <div class="compact-box">
                            <ul class="compact-content">
                                <li class="bgk-pink"><span class="icon"><img src="./images/icon/follower.png"></span></li>
                                <li class="headlist_fllowers_count_outer">
                                    <h3 class="title">期間指定最終日のフォロワー数<label class="tooltip_click gender_age_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>指定期間最終日におけるフォロワー数を表示ています。<br />フォロワー数はInsight Suiteに対象のインスタグラムアカウントが登録された日以前のデータは取得できません。</p>"></label></h3>
                                    <p class="compact-number">
                                        <span id="last_followers_count" class="font32 color-pink"><?php //echo number_format($last_day_total_followers_count); ?></span>
                                        <span class="font8">Followers</span>
                                    </p>
																		<p class="compact-date">
																			<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>
                    </div><!--end compact-total-->

										<?php if ($ig_id_regist_oldest > date('Y-m-d 00:00:00', strtotime($to))) { ?>
											<div style="width:100%;padding:80px 20px;background:#fff;margin-top:20px;">Insight Suiteに対象のインスタグラムアカウントが<br />登録された日以前のデータは取得できません。</div>
										<?php } else { ?>

                    <div class="box80 audience-wrap">
                      <h3>年齢 / 性別<label class="tooltip_click gender_age_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間最終日におけるフォロワーの年齢、性別の割合を表示しています。（ datetime_exchange_text ）<br />フォロワーの中で年齢性別を登録しているユーザのみの数値を表示しているため<br />フォロワー合計数と差異がある場合があります。<br />年齢・性別データはInsight Suiteに対象のインスタグラムアカウントが登録された日の前日より前のデータは取得できません。</p>"></label></h3>

											<div class="audience-gender-nodata"></div>

											<div class="audience-gender-outer">
	                      <ul class="audience-gender-content">
	                        <li class="gender-chart">
	                          <div class="gender-chart-box-left">
	                            <div class="audience-icon"><span class="icon"><img src="./images/icon/female.png"></span></div>
	                            <div class="font10 f-bold">すべての女性</div>
															<div>
																<span id="female_rate"><?php //echo $female_rate; ?></span>%
																(<span id="female_total"><?php //echo $female_total; ?></span>)
															</div>
	                          </div><!--end gender-chart-box-->
	                          <div class="gender-chart-box-right">
	                            <div id="target_graph_female_gneder_age"></div>
	                          </div><!--end gender-chart-box-->
	                        </li>

	                        <li class="gender-chart">


	                          <div class="gender-chart-box-right">
	                            <h4>年齢</h4>
	                            <div id="target_graph_male_gneder_age"></div>
	                          </div><!--end gender-chart-box-->
	                          <div class="gender-chart-box-left">
	                              <div class="audience-icon"><span class="icon"><img src="./images/icon/male.png"></span></div>
	                              <div class="font10 f-bold">すべての男性</div>
	                              <div>
																	<span id="male_rate"><?php //echo $male_rate; ?></span>%
																	(<span id="male_total"><?php //echo $male_total; ?></span>)
																</div>
	                          </div><!--end gender-chart-box-->

	                        </li>

	                      </ul>
											</div>
                    </div><!---end audience-wrap -->

                    <div class="box80 audience-wrap">

												<div style="" class="chart-box_title">
														<h3>国別 / 地域別<label class="tooltip_click area_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>画面右上の指定期間最終日における国別、地域別のフォロワー数を表示しています。（ datetime_exchange_text ）<br />フォロワーの中で居住地域を登録しているユーザのみの数値を表示しているため<br />フォロワー合計数と差異がある場合があります。<br />国別・地域別データはInsight Suiteに対象のインスタグラムアカウントが登録された日の前日より前のデータは取得できません。</p>"></label></h3>
												</div>

												<div class="area-chart-nodata"></div>

												<div class="area-chart-outer">
	                        <div class="box_haft p_t20 p_b20">
	                            <div id="country_table"></div>
	                        </div>
	                        <div class="box_haft p_t20 p_b20">
	                            <div id="pref_table"></div>
	                        </div>
												</div>
                    </div><!-- ↑地域 -->

                    <div class="box80 audience-wrap">

												<div class="online-followers-nodata"></div>

												<div class="online-followers-outer">
	                        <div class="box_haft p_t20 p_b20"><!-- ↓曜日別オンラインフォロワー数 -->
	                        	<div style="" class="chart-box_title">
															<h3>曜日別(３日前を起点としたデータ)<label class="tooltip_click profile_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>オンラインフォロワー数はデータ取得日の３日前のデータが取得可能なため、指定期間終了日から３日前のデータを起点に１週間分を表示しています。</p>"></label></h3>
														</div>
	                          <div id="online_followers_week_chart"></div>
	                        </div><!-- ↑曜日別オンラインフォロワー数 -->
	                        <div class="box_haft p_t20 p_b20"><!-- ↓時間別オンラインフォロワー数 -->
														<div style="" class="chart-box_title">
															<h3>時間帯別(３日前のデータ)<label class="tooltip_click profile_graph_tip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>オンラインフォロワー数はデータ取得日の３日前のデータが取得可能なため、指定期間終了日から３日前のデータを表示しています。</p>"></label></h3>
														</div>
	                          <div id="online_followers_daytime_chart"></div>
	                        </div><!-- ↑時間別オンラインフォロワー数 -->
												</div>
                    </div><!-- ↑オンラインフォロワー数 -->

									<?php } ?>

                </div><!--end content--wrap_box-->
            </div><!--end content--wrap-->
            <?=$template_parts['footer']?>
        </div><!--/.main -->
    </div><!--/.container -->

		<input type="hidden" id="oldest_datepicker_date" value="<?=date("Y-m-d", strtotime($ig_id_regist_oldest));?>" />
		<!-- <input type="hidden" id="latest_datepicker_date" value="<?=date("Y-m-d", strtotime("-1day"));?>" /> -->

		<!-- データロードを関数化 -->
		<script>
			// $(window).on('load resize', function () {
			$(function(){
				var from	= $("#from").val();
				var to		= $("#to").val();
				data_loader(from, to);
			});

			//各種グラフデータ等の読み込み
			function data_loader(from, to) {
				'use strict';

				var now				= new Date();
				var tmp_to		= new Date(to);
				$(".disp_date_today").text(now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate() + "現在");
				$(".disp_date_to").text(tmp_to.getFullYear() + "/" + zeroPadding((tmp_to.getMonth()+1), 2) + "/" + tmp_to.getDate());

				google.charts.load('current', {packages:['table']});
				google.charts.load('current', {packages: ['corechart']});

				var postData = {"from":from, "to":to};

				//インスタグラムアカウントの登録日をDate形式で設定
				var $ig_date = "<?=$ig_id_regist_oldest?>";
				var $ig_id_regist_oldest	= new Date(moment("<?=$ig_id_regist_oldest?>").format("L"));
				//アカウント登録日以前のデータを表示しようとした場合のエラー文
				var $graph_prev_ig_id_regist_html = "<div style='border:1px solid #eee;margin:10px;padding:30px 10px;'><p>Insight Suiteに対象のインスタグラムアカウントが<br />登録された日以前のデータは取得できません。</p></div>";
				//表示できるデータがなかった場合のエラー文
				var $graph_no_data_html = "<div style='border:1px solid #eee;margin:10px;padding:50px 10px;'><p>No data</p></div>";

				//フォロワー数
				$.get("/followers/get_followers_count/",
					postData,
					function(data){
						var data = JSON.parse(data);
						var $post_date_to					= new Date(moment(postData["to"]).format("L"));
						$("#current_followers_count").text(data["current_followers_count"]);
						$("#last_followers_count").text(data["last_followers_count"]);

						if ($ig_id_regist_oldest > $post_date_to) {
							$('.headlist_fllowers_count_outer .compact-date .disp_date_to').text('登録日以前は取得不能');
						}
						// $('.last_followers_count_tip').attr('date-tooltip-datetime', $data_gender_age["period_datetime"]);
					}
				);

				//年齢性別のデータリスト
				$.get("/followers/graph_gender_age/",
					postData,
					function(data){

						var $data_gender_age = JSON.parse(data);

						var $post_date_to					= new Date(moment(postData["to"]).format("L"));
						if ($ig_id_regist_oldest > $post_date_to) {
							$(".audience-gender-outer").hide();
							$(".audience-gender-nodata").show();
							$(".audience-gender-nodata").html($graph_prev_ig_id_regist_html);
						} else {
							if (data){
								$(".audience-gender-outer").show();
								$(".audience-gender-nodata").hide();

								$('.gender_age_graph_tip').attr('date-tooltip-datetime', $data_gender_age["period_datetime"]);

								$("#male_rate").text($data_gender_age["male_rate"]);
								$("#male_total").text($data_gender_age["male_total"]);
								$("#female_rate").text($data_gender_age["female_rate"]);
								$("#female_total").text($data_gender_age["female_total"]);
								google.charts.setOnLoadCallback(function(){
									drawFemGenAge($data_gender_age["c_data_female"], $data_gender_age["arr_tick"], 'target_graph_female_gneder_age');
									drawMaleGenAge($data_gender_age["c_data_male"], $data_gender_age["arr_tick"], 'target_graph_male_gneder_age');
								});
							} else {
								google.charts.setOnLoadCallback(function(){
									drawFemGenAge(0, 0, 'target_graph_female_gneder_age');
									drawMaleGenAge(0, 0, 'target_graph_male_gneder_age');
								});
							}
						}
					}
				);

				//国別、地域別テーブル
				$.get("/followers/graph_audience_area_table/",
					postData,
					function(data){
						data = JSON.parse(data);

						var $post_date_to					= new Date(moment(postData["to"]).format("L"));
						$('.area_graph_tip').attr('date-tooltip-datetime', data["period_datetime"]);
						if ($ig_id_regist_oldest > $post_date_to) {
							$(".area-chart-outer").hide();
							$(".area-chart-nodata").show();
							$(".area-chart-nodata").html($graph_prev_ig_id_regist_html);
						} else {
								$(".area-chart-outer").show();
								$(".area-chart-nodata").hide();

								google.charts.setOnLoadCallback(function(){
									drawAreaTable(data["country"], 'country_table');
									drawAreaTable(data["pref"], 'pref_table');
								});
						}
					}
				);

				//曜日別オンラインフォロワー数
				$.get("/followers/graph_online_follower_week/",
					postData,
					function(data){
						var data = JSON.parse(data);
						google.charts.setOnLoadCallback(function(){
							drawOnlineFollowersWeekChart(data, '', 'online_followers_week_chart');
						});
					}
				);

				//時間帯別オンラインフォロワー数
				$.get("/followers/graph_online_follower_daytime/",
					postData,
					function(data){
						var $data = get_data_tick_by_json(data);	//日付をラベルにする場合専用
						google.charts.setOnLoadCallback(function(){
							drawOnlineFollowersDaytimeChart($data["c_data"], $data["ticks"], '', 'online_followers_daytime_chart');
						});
					}
				);

				//指定期間最終日のオンラインフォロワー数
				$.get("/followers/get_followers_count/",
					postData,
					function(data){
						var $followers = JSON.parse(data);
						$("#current_followers_count").text($followers["current_followers_count"]);
						$("#last_followers_count").text($followers["last_followers_count"]);

					}
				);

				//女性の年代別構成比
		    function drawFemGenAge(data, $ticks, target_id) {
					var data = google.visualization.arrayToDataTable(data);

		      var options  = {
						animation				:
						{
							duration			: 2000,
							easing				: 'out',
							startup				: true,
						},
						chartArea				:
						{
							left					: 0,
							width					: '100%',
							height				: '70%'},
		        colors					: ['#ff759e'],
		  			legend					: 'none',
						baselineColor		: '#fff',
		        hAxis						:
						{
		          format				: 'decimal',
		          textStyle			:
							{
		            color				: '#999',
		            fontName		: 'Meiryo'
		          },
		          ticks					: $ticks,
		          direction			: -1,
		          gridlines			:
							{
		            color				: "#ddd",
		            count				: 4
		          }
		        },
		        vAxis 					:
						{
		          format				: 'decimal',
		          textStyle			:
							{
		            color				: '#999',
		            fontName		: 'Meiryo'
		          },
		        },
		        bars						: 'horizontal',
		        axes						:
						{
		          y: {
		            0: {side: 'right'}
		          }
		        },
						focusTarget			: 'category',
		      };

		      var chart = new google.visualization.BarChart(document.getElementById(target_id));
		      chart.draw(data, options);

		      var formatter = new google.visualization.NumberFormat({
		          pattern: '#,###;'
		      });
		      formatter.format(data, 1);

		   	}

				//男性の年代別構成比
				function drawMaleGenAge(data, $ticks, target_id) {
					var data = google.visualization.arrayToDataTable(data);

					var options  = {
						animation				:
						{
							duration			: 2000,
							easing				: 'out',
							startup				: true,
						},
						chartArea				:
						{
							top						: 10,
							left					: 38,
							width					: '80%',
							height				: '70%'
						},
						colors					: ['#75aaff'],
						legend					: 'none',
						baselineColor		: '#fff',
						hAxis						:
						{
							format				: 'decimal',
							ticks					: $ticks,
							textStyle 		:
							{
								color				: '#999',
								fontName		: 'Meiryo'
							},
							gridlines			:
							{
								color				: "#ddd",
								count				: 4,
							}
						},
						vAxis						:
						{
							format				: 'decimal',
							textStyle			:
							{
								color				: '#999',
								fontName		: 'Meiryo'
							},
						},
						bars						: 'horizontal',
						axes						:
						{
							y							:
							{
								0: {side: 'right'}
							}
						},
						focusTarget			: 'category',
					};
					var chart = new google.visualization.BarChart(document.getElementById(target_id));
					chart.draw(data, options);


					var formatter = new google.visualization.NumberFormat({
							pattern: '#,###;'
					});
					formatter.format(data, 1);

			 	}

				//国別地域別テーブル
				function drawAreaTable(data, taget_id) {
					var data = google.visualization.arrayToDataTable(data);

					var table = new google.visualization.Table(document.getElementById(taget_id));
					var options =
					{
						showRowNumber				: false,
						width								: '100%',
						height							: '200',
						sortAscending				: false,
						sortColumn					: 1,				//初期並べ替えカラム番号
						cssClassNames 			: 					//テーブル内クラス割当
						{
							headerRow					: 'graph_table_header_row',
							tableRow					: 'graph_table_row',
							oddTableRow				: 'graph_odd_table_row',
							hoverTableRow			: 'graph_hover_table_row',
							selectedTableRow	: 'graph_select_table_row',
						}
					} //end options
					table.draw(data, options);
				}

				//曜日別オンラインフォロワー数
				//メモ→maxcountの設定を動的にするか？
				function drawOnlineFollowersWeekChart(data, title, target_id) {
					var data = google.visualization.arrayToDataTable(data);

					var view = new google.visualization.DataView(data);
					view.setColumns([0, 1,
													 { calc: "stringify",
														 sourceColumn: 1,
														 type: "string",
														 role: "annotation" },
													 2]);

					var options = {
						title					: title,
						animation			:
						{
							duration		: 2000,
							easing			: 'out',
							startup			: true,
						},
						chartArea			:
						{
							width				: '80%',
							height			: '80%'
						},
						bar						:
						{
							groupWidth	: "85%"
						},
						legend				:
						{
							position		: "none"
						},
						focusTarget		: 'category',

					};

					var chart = new google.visualization.ColumnChart(document.getElementById(target_id));
					chart.draw(view, options);

				}

				//時間帯別オンラインフォロワー数
				function drawOnlineFollowersDaytimeChart(data, ticks, name_type, target_id) {
					//var arr01 = JSON.parse(data);
					var data = google.visualization.arrayToDataTable(data);

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
							format			: "H:00",
							ticks				: ticks,
							gridlines		:
							{
								color			: '#eee',
								count			: 3,
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
								count			: 1, 					//縦軸線の数（数値によっては正確に表現されないから注意）
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

					var formatter_date = new google.visualization.DateFormat({pattern: 'M/d H:00'});
					formatter_date.format(data, 0);

					var chart = new google.visualization.AreaChart(document.getElementById(target_id));
					chart.draw(data, options);

				}

				//Jsonデータからグラフ用データとラベル用データを取り出す（日付をラベルにする場合専用）
				function get_data_tick_by_json(data){
					var $i = 1;
					var $arr = JSON.parse(data);
					var $ticks = new Array($arr.length);
					//データ内の日付をDate形式に変更
					//横軸ラベル用データを作成→Date形式に変更
					for($i=1; $i<$arr.length; $i++){
						var $date			= new Date(moment($arr[$i][0]).format());
						$arr[$i][0]		= $date;
						$ticks[$i-1]	= $date;
					}
					var data				= {"c_data":$arr, "ticks":$ticks};
					return data;
				}

			}
		</script>




</body>
</html>
