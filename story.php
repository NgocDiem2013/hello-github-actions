
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
                                <li class="bgk-purple"><span class="icon"><img src="/images/icon/follower_tim.png"></span></li>
                                <li>
                                    <h3 class="title">現在の投稿数</h3>
                                    <p class="compact-number">
                                        <span id="current_story_count" class="font32 color-purple"><?php //echo number_format($total_items); ?></span>
                                        <span class="font8">Posts</span>
                                    </p>
																		<p class="compact-date">
																				<span class="disp_date_today"></span>
																		</p>
                                </li>
                            </ul>
                        </div>

                        <div class="compact-box">
                            <ul class="compact-content">
                                <li class="bgk-green"><span class="icon"><img src="/images/icon/follower.png"></span></li>
                                <li>
                                    <h3 class="title">指定期間の投稿数</h3>
                                    <p class="compact-number">
                                        <span id="range_story_count" class="font32 color-green"><?php //echo number_format($max_items); ?></span>
                                        <span class="font8">Posts</span>
                                    </p>
																		<p class="compact-date">
																				<span class="disp_date_from"></span>
																				<span>～</span>
																				<span class="disp_date_to"></span>
																		</p>
                                </li>
                            </ul>
                        </div>
                    </div><!--end compact-total-->



						<div class="box80 media-wrap media_none" style="display:none;">指定期間に投稿がありません。</div>
            <div class="box80 media-wrap media_outer"><!-- Javascriptからストーリー一覧を読み込む --></div>

				</div><!--end content--wrap_box-->
			</div><!--end content--wrap-->
			<?=$template_parts['footer']?>
		</div><!--/.main -->
	</div><!--/.container -->


<!-- Modal Box -->
	<div id="modal_box" style="display:none;">
		<div class="detail_insights_modal_box"><!-- Javascriptから詳細画面データを読み込む --></div>
		<div style="text-align:center;"><a href="javascript:void(0)" data-izimodal-close="">Close</a></div>
	</div>
	<!-- Modal Box -->

<input type="hidden" id="oldest_datepicker_date" value="<?=date("Y-m-d", strtotime($oldest_story_post_datetime));?>" />

<script type="text/javascript">

$(function(){

	$('#modal_box').iziModal({
		width: '80%',
		fullscreen: true,
		padding: 20,
		theme: 'light',
		overlayColor: 'rgba(0, 0, 0, 0.7)',
		transitionIn: 'fadeInRight',
		transitionOut: 'fadeOutUp',
	});

	from			= $('#from').val();
	to				= $('#to').val();
	per_page	= getParam('per_page');
  data_loader(from, to, per_page);

  //開発メモ
  //HTML生成後にHTMLとして追加しているので、画面表示後に起動させたい動作はfunction data_loader内のhtml.ready(function(){}の中に記述

});

//投稿一覧をAJAXで表示
function data_loader(from, to, per_page){

	var now				= new Date();
	var tmp_from	= new Date(from);
	var tmp_to		= new Date(to);
	$(".disp_date_today").text(now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate() + "現在");
	$(".disp_date_from").text(tmp_from.getFullYear() + "/" + zeroPadding((tmp_from.getMonth()+1), 2) + "/" + tmp_from.getDate());
	$(".disp_date_to").text(tmp_to.getFullYear() + "/" + zeroPadding((tmp_to.getMonth()+1), 2) + "/" + tmp_to.getDate());

	var postData = {"from":from, "to":to, "per_page":per_page};

	$.get("/story/get_story_count/",
		postData,
		function(data){
			story_count = JSON.parse(data);
			$("#current_story_count").text(story_count["current_story_count"]);
			$("#range_story_count").text(story_count["range_story_count"]);

			//現在のページ数が投稿数を超えている場合、エラー回避のためリダイレクト
			if(per_page > story_count["range_story_count"]){
				location.href = "/story/?from="+from+"&to="+to;
			}
		}
	);

	//ページングを有効にするためにはGET送信しか許されない
	$.get("/story/get_story_list/",
		postData,
		function(data)
		{
			var $story_list				    = JSON.parse(data);
			var $story_insight		    = $story_list['story_insights'];
			var $story_id_arr			    = $story_list['story_id_arr'];
			var $page_link            = $story_list['page_link'];
			var $story_per_page       = $story_list['item_per_page'];
			var $story_data           = $story_list['story_data'];
      var $story_id_arr_by_day  = $story_list['story_id_arr_by_day'];
      var $date_list            = $story_list['date_list'];

			//ページングの表示
			// $(".paging").html($page_link);
			$now_page_story_count	= $date_list.length; //現ページで取得した投稿日数( < story_per_page)
			//データをAJAXで受け取りデータをアサイン
			$i = 0;
			if ($now_page_story_count > 0) {
					$(".media_outer").show();
					$(".media_none").hide();

          var Addhtml = '';
          for(var i in $date_list) {
              var $sid = $story_id_arr_by_day[$date_list[i]]; //投稿日単位のストーリーIDの配列
              var $total_impressions   = 0;
              var $total_reach         = 0;
              var $total_replies       = 0;
              var $total_taps_forward  = 0;
              var $total_taps_back     = 0;
              var $total_exits         = 0;
              for(var n1 in $sid) {
                $total_impressions   = $total_impressions + parseInt($story_insight[$sid[n1]]['impressions']);
                $total_reach         = $total_reach + parseInt($story_insight[$sid[n1]]['reach']);
                $total_replies       = $total_replies + parseInt($story_insight[$sid[n1]]['replies']);
                $total_taps_forward  = $total_taps_forward + parseInt($story_insight[$sid[n1]]['taps_forward']);
                $total_taps_back     = $total_taps_back + parseInt($story_insight[$sid[n1]]['taps_back']);
                $total_exits         = $total_exits + parseInt($story_insight[$sid[n1]]['exits']);
              }
              Addhtml += '<div class="story-box-content">';
							Addhtml += '    <div class="story-box-insihgts">';
							Addhtml += '      <p class="story-post-date">'+ $date_list[i] +'(<span class="story-post-count">'+ $sid.length +'</span><span style="font-size:0.5em;">Posts</span>)</p>';
							Addhtml += '      <div class="insights">';
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総インプレッション数</label>';
							Addhtml += '      		<label><span>'+$total_impressions+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>この日に投稿されたストーリーの総閲覧数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総リーチ数</label>';
							Addhtml += '      		<label><span>'+$total_reach+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>この日に投稿されたストーリーを閲覧したアカウント数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総リプライ数</label>';
							Addhtml += '      		<label><span>'+$total_replies+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>この日に投稿されたストーリーへの総リプライ数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							/*
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総taps_forward</label>';
							Addhtml += '      		<label><span>'+$total_taps_forward+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>「次の投稿へ」をタップした回数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総taps_back</label>';
							Addhtml += '      		<label><span>'+$total_taps_back+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>「前の投稿へ」をタップした回数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							Addhtml += '      	<div class="insights_param">';
							Addhtml += '      		<label>総exits</label>';
							Addhtml += '      		<label><span>'+$total_exits+'</span></label>';
							Addhtml += '      		<label class="tooltip_click detail_insights_tooltip tooltipstered" date-tooltip-datetime="'+ $story_insight[$date_list[i]]['batchrun_datetime'] +'" data-tooltip-text="<p class=\'tooltip_text\'>この投稿でストーリーの閲覧を止めた回数（ datetime_exchange_text ）</p>"></label>';
							Addhtml += '      	</div>';
							*/
							Addhtml += '    	</div>';
              Addhtml += '    </div>';
              Addhtml += '    <div class="story-box-slider slider mCustomScrollbar" data-mcs-theme="dark">';
							Addhtml += '          <ul>';
							// Addhtml += '          <ul class="slider">';
							for(var n2 in $sid) {
                if (!$story_data[$sid[n2]]["media_url"]) {
                  var $media_url	= "/images/no_image.png";
                } else {
                  var $media_url	= !$story_data[$sid[n2]]["media_url"] ? "/images/no_image.png" : $story_data[$sid[n2]]["media_url"];
                }

                Addhtml += '              <li class="story-slide-item" data-izimodal-group="group'+$date_list[i]+'" style="display: inline-block; width: 90%; margin:0px 15px 0px 3px; width:100px;">';
                Addhtml += '                <img src="'+ $media_url +'" style="cursor:pointer;" class="btn_story_detail insights_data_media_url trigger" id="'+ $sid[n2] +'" style="width:100px;">';
                Addhtml += '                <br />';
                Addhtml += '                <label><span class="insights_data_post_datetime">投稿日:'+$story_data[$sid[n2]]["story_post_day_and_time"]+'</span></label>';
                // Addhtml += '                <label class="tooltip_click" data-tooltip-text="<p class=\'tooltip_text\'>投稿時間</p>"></label>';
                Addhtml += '                <br />';
                Addhtml += '                <label style="color:red;"><span style="font-size:10px;">残り：</span><span class="insights_data_post_del_datetime_'+ $sid[n2] +'"></span></label>';
                Addhtml += '                <label class="tooltip_click" data-tooltip-text="<p class=\'tooltip_text\'>ストーリー掲載可能期限までの残り時間（投稿から24時間後）<br />投稿が任意に削除された場合でもこの時間には反映されません。</p>"></label>';
                Addhtml += '              </li>';
              }
              Addhtml += '        </ul>';
              Addhtml += '    </div>';
              Addhtml += '</div>';
          }
					if ($page_link) {
						Addhtml += '<div class="media-pagination">';
						Addhtml += '	<div class="paging">'+ $page_link +'</div>';
						Addhtml += '</div>';
					}


			}
      // console.log($html);
      var $html = $(".media_outer").html(Addhtml);
      $html.ready(function(){

          $(".slider").mCustomScrollbar({
						axis:"x",
						scrollbarPosition:"outside",
					});

					// $(".btn_story_detail").modaal({
					// 	content_source: '#modal_box',
					// 	animation: 'fade',
					// 	animation_speed:200,
					// });
					$(".btn_story_detail").on("click", function(){
						var $story_id = $(this).attr("id");
						disp_story_detail_modal($story_id);
					});

          for(var i in $date_list) {
            var $sid = $story_id_arr_by_day[$date_list[i]]; //投稿日単位のストーリーIDの配列
            for(var n2 in $sid) {
              var $post_datetime      = new Date(moment($story_data[$sid[n2]]["story_post_datetime"]).format());
              var $post_del_datetime  = $post_datetime.setDate($post_datetime.getDate() + 1);
              $(".insights_data_post_del_datetime_"+$sid[n2]).countdown($post_del_datetime, function(event) {
                $(this).text(
                  event.strftime('%H:%M:%S')
                );
              });
            }
          }


          //tooltip
          $(function() {
              $('.tooltip_click').text('[？]');
              $('.tooltip_hover').text('[？]');
              $('.tooltip_click').tooltipster({
                animation			: 'fade',
                delay					: 300,
                arrow					: false,
                theme					: 'tooltipster-shadow',
                trigger				: 'custom',
                triggerOpen		:
                {
                  click				: true,
                  tap					: true
                },
                triggerClose	:
                {
                  click				: true,
                  mouseleave	: true,
                  scroll			: true,
                  tap					: true
                },
                distance			: 10, //ツールチップと要素の距離
                side					: 'right',
                contentAsHTML : true,
                contentCloning: false,
								multiple      : true,
                //timer:300, //指定時間で消えるツールチップ
              }).on("mouseover", function(){
                var $tooltip_text = $(this).attr('data-tooltip-text'); //ツールチップで表示するテキスト
                //ツールチップ内に動的にテキストを表示する
                if ($tooltip_text.match(/ datetime_exchange_text /)) {
                  //ツールチップ内に時間を表示させる
                  var $tooltip_datetime_text = $(this).attr('date-tooltip-datetime');
                  $tooltip_text = !$tooltip_datetime_text ? $tooltip_text.replace(' datetime_exchange_text ', '閲覧数不足のためデータ取得できませんでした。') : $tooltip_text.replace(' datetime_exchange_text ', $tooltip_datetime_text+"時点");
                }
                $(this).tooltipster('content', $tooltip_text);
              });

          });

      });

			if($now_page_story_count == 0){
				$(".media_none").show();
				$(".media_outer").hide();
			}

		}
	);

}

//投稿詳細をモーダルで表示
function disp_story_detail_modal($story_id) {
	var postData = {"story_id":$story_id};

	$.get("/story/story_detail_insight/",
  	postData,
  	function(data)
  	{
  		$story_detail = JSON.parse(data);

			if (!$story_detail["story_data"]["media_url"]) {
				var $detail_media_url		= "/images/no_image.png";
			} else {
				var $detail_media_url		= $story_detail["story_data"]["media_url"];
				var $detail_video_url		= !$story_detail["story_data"]["video_url"] ? "/images/no_image.png" : $story_detail["story_data"]["video_url"];
			}

			var $Addhtml = '';
			$Addhtml += '<div style="float:left;width:30%;text-align:center;">';
			$Addhtml += '	<div class="detail_media_img">';

			if ($story_detail["story_data"]["media_type"] === "VIDEO") {
				$Addhtml += '		<video src="'+ $detail_video_url +'" poster="'+ $detail_media_url +'" id="detail_insights_data_video_url" autoplay controls style="width:80%;border:none;" ></video>';
			} else {
				$(".detail_insights_modal_box").find("#detail_insights_data_media_url").attr("src", $detail_media_url);
				$(".detail_insights_modal_box").find(".detail_media_img").show();
				$Addhtml += '		<img src="'+ $detail_media_url +'" class="detail_insights_data_media_url" style="width:80%;border:1px solid #eee;" alt="" id="'+ $story_detail["story_data"]["story_id"] +'" />';
			}

			$Addhtml += '	</div>';
			$Addhtml += '	<div class="detail_reg_date">';
			$Addhtml += '		<label>投稿日：<span class="detail_insights_data_post_datetime">'+ $story_detail["story_data"]["story_post_datetime"] +'</span></label>';
			$Addhtml += '		<!-- <label class="tooltip_click" data-tooltip-text="投稿時間"></label> -->';
			$Addhtml += '		<br />';
			$Addhtml += '		<label style="color:red;"><span style="font-size:10px;">残り：</span><span class="detail_insights_data_post_del_datetime"></span></label>';
			$Addhtml += '		<label class="tooltip_click" data-tooltip-text="ストーリー掲載可能期限までの残り時間（投稿から24時間後）<br />投稿が任意に削除された場合でもこの時間には反映されません。"></label>';
			$Addhtml += '	</div>';
			$Addhtml += '</div>';
			$Addhtml += '<div style="float:left;width:65%;">';
			$Addhtml += '	<div class="detail_caption" style="min-height:5em;">';
			$Addhtml += '		<p class="detail_insights_data_caption">'+ $story_detail["story_data"]["caption"] +'</p>';
			$Addhtml += '	</div>';
			$Addhtml += '	<div class="detail_insights">';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>インプレッション</label>';
			$Addhtml += '			<label><span class="detail_insights_data_impressions">'+ $story_detail["insights"]["impressions"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="投稿の総閲覧数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>リーチ数</label>';
			$Addhtml += '			<label><span class="detail_insights_data_reach">'+ $story_detail["insights"]["reach"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="投稿を閲覧したユーザ数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>リプライ</label>';
			$Addhtml += '			<label><span class="detail_insights_data_replies">'+ $story_detail["insights"]["replies"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="投稿への総リプライ数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>taps_forward</label>';
			$Addhtml += '			<label><span class="detail_insights_data_taps_forward">'+ $story_detail["insights"]["taps_forward"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="「次の投稿へ」をタップした回数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>taps_back</label>';
			$Addhtml += '			<label><span class="detail_insights_data_taps_back">'+ $story_detail["insights"]["taps_back"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="「前の投稿へ」をタップした回数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '		<div class="detail_insights_param">';
			$Addhtml += '			<label>exits</label>';
			$Addhtml += '			<label><span class="detail_insights_data_exits">'+ $story_detail["insights"]["exits"] +'</span></label>';
			$Addhtml += '				<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $story_detail["insights"]["batchrun_datetime"] +'" data-tooltip-text="この投稿でストーリーの閲覧を止めた回数（ datetime_exchange_text ）"></label>';
			$Addhtml += '		</div>';
			$Addhtml += '	</div>';
			$Addhtml += '</div>';
			$Addhtml += '<div style="clear:both;"></div>';

			var html = $('.detail_insights_modal_box').html($Addhtml);
			html.ready(function(){

				//モーダルオープン
				$('#modal_box').iziModal('open');

				var $post_datetime      = new Date(moment($story_detail["story_data"]["story_post_datetime"]).format());
				$post_datetime.setDate($post_datetime.getDate() + 1)
				var $post_del_datetime  = $post_datetime;
				$(".detail_insights_modal_box").find(".detail_insights_data_post_del_datetime").countdown($post_del_datetime, function(event) {
					$(this).text(
						event.strftime('%H:%M:%S')
					);
				});
			});
  	}
  );

}


//投稿詳細画面で各インサイト情報をグラフ表示
//グラフデータは一旦保留中→必要な場合投稿一覧ページからコード流用？
//日付選択も保留(datepickerも)


/**
 * Get the URL parameter value
 *
 * @param  name {string} パラメータのキー文字列
 * @return  url {url} 対象のURL文字列（任意）
 */
function getParam(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

</script>

</body>
</html>
