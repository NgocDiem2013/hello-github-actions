
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
                                <span id="current_media_count" class="font32 color-purple"><?php //echo number_format($total_items); ?></span>
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
                                <span id="range_media_count" class="font32 color-green"><?php //echo number_format($max_items); ?></span>
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

						<!-- Loading image -->
						<div class="fakeLoader"></div>

						<div class="box80 media-wrap media_none" style="display:none;">指定期間に投稿がありません。</div>
						<div class="box80 media-wrap media_outer">
							<h3>投稿ごとのインサイト</h3>
							<div class="compact-sort">
								<div class="media_order_list"></div>
							</div>
							<div id="media_list"></div>
						</div>
				</div><!--end content--wrap_box-->
			</div><!--end content--wrap-->
			<?=$template_parts['footer']?>
		</div><!--/.main -->
	</div><!--/.container -->


<!-- Modal Box -->
	<div id="modal_box" style="display:none;">
		<div class="detail_insights_modal_box">
			<div class="detail_insights_info_area">
				<!-- <div class="detail_insights_modal_box-left">
					<div class="detail_media_img" style="display:none;">
						<a href="#" target="_blank" title="" class="detail_media_insights_modal_permalink"><img src="/images/no_image.png" id="detail_insights_data_media_url" style="width:200px;" alt="" /></a>
					</div>
					<div class="detail_media_video" style="display:none;">
						<a href="#" target="_blank" title="" class="detail_media_insights_modal_permalink"><video src="" poster="/images/no_image.png" id="detail_insights_data_video_url" autoplay controls style="width:200px;height:200px;border:none;" ></video></a>
					</div>
					<div class="detail_like_count">
						<span><i class="fas fa-thumbs-up"></i><span class="detail_insights_data_thumbs_up"></span></span>
						<span><i class="fas fa-comment-alt"></i><span class="detail_insights_data_comments_count"></span></span>
					</div>
					<div class="detail_insights">
						<div class="detail_insights_param">
							<label>インプレッション数</label>
							<label><spna class="detail_insights_data_impressions"></span></label>
							<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>投稿の総閲覧数（ datetime_exchange_text ）</p>"></label>
						</div>
						<div class="detail_insights_param">
							<label>リーチ数</label>
							<label><spna class="detail_insights_data_reach"></span></label>
							<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>投稿を閲覧したアカウント数（ datetime_exchange_text ）</p>"></label>
						</div>
						<div class="detail_insights_param">
							<label>保存数</label>
							<label><spna class="detail_insights_data_saved"></span></label>
							<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>投稿がコレクションに保存された数（ datetime_exchange_text ）</p>"></label>
						</div>
						<div class="detail_insights_param">
							<label>エンゲージ数</label>
							<label><spna class="detail_insights_data_engagement"></span></label>
							<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="" data-tooltip-text="<p class='tooltip_text'>投稿に対してのエンゲージメント数（ datetime_exchange_text ）</p>"></label>
						</div>
						<div class="detail_insights_param">
							<div class="video_views_box">
								<label>動画再生数</label>
								<label><spna class="detail_insights_data_video_views"></span></label>
							</div>
						</div>
						<div class="detail_reg_date">
							<span class="detail_insights_data_post_datetime"></span>
							<label class="tooltip_click" data-tooltip-text="<p class='tooltip_text'>投稿時間</p>"></label>
						</div>
					</div>
				</div>
				<div class="detail_insights_modal_box-right">
					<div class="detail_modal_caption">
						<p class="detail_insights_data_caption"></p>
					</div>
				</div>
				<div style="clear:both;"></div> -->
			</div><!-- end detail_insights_modal_box -->
			<div style="margin-top:20px;">

				<div>

					<div class="detail_modal_form">
						<form method="GET" name="serch_date" action="#">
							<input type="text" id="detail_media_insights_modal_from" name="detail_media_insights_modal_from" value="<?php echo date('Y-m-d', strtotime("-7day")); ?>" autocomplete="off" />
							<span>〜</span>
							<input type="text" id="detail_media_insights_modal_to" name="detail_media_insights_modal_to" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" />
							<input type="hidden" id="detail_media_insights_modal_media_id" name="detail_media_insights_modal_media_id" value="" />
						</form>
					</div>
				</div>
				<div class="detail_graph_area">

					<?php /*
					<div>
						<!-- グラフ（差分データ） -->
						<h2>各日差分データグラフ</h2>
						<div id="target_graph_impressions" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_reach" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_saved" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_engagement" style="height:200px;"></div>
						<!-- グラフ（差分データ） -->
					</div>
					*/ ?>

					<div style="margin-top:20px;">
						<?php /*<h2>オリジナルデータグラフ</h2>*/ ?>
						<div id="target_graph_impressions_raw" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_reach_raw" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_saved_raw" style="margin-bottom:20px;height:200px;"></div>
						<div id="target_graph_engagement_raw" style="height:200px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div style="text-align:center;"><a href="javascript:void(0)" data-izimodal-close="">Close</a></div>
	</div>
	<!-- Modal Box -->

	<input type="hidden" id="oldest_datepicker_date" value="<?=date("Y-m-d", strtotime($oldest_media_post_datetime));?>" />


<style>
.mCS-my-theme.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{ background-color: rgba(0, 0, 0, 0.4); }
.mCS-my-theme.mCSB_scrollTools .mCSB_draggerRail{ background-color: rgba(0, 0, 0, 0.15); }
</style>
<!-- load iziModal pulgins -->

<script type="text/javascript">

$(function(){

	$(window).on('load resize', function(){
		var $view_width = $(window).width();
		var $order_list_html = '';

			$order_list_html += '<ol>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_media_post_datetime" data-sort-by="media_post_datetime">投稿日</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_impressions" data-sort-by="impressions_count">インプレッション数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_reach" data-sort-by="reach_count">リーチ数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_engagement" data-sort-by="engagement_count">エンゲージメント数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_like_count" data-sort-by="like_count">いいね！数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_comments_count" data-sort-by="comments_count">コメント数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_saved" data-sort-by="saved_count">保存数</a></li>';
			$order_list_html += '		<li><a href="javascript:void(0)" class="sort_by_btn serch_date_a sort_by_video_views" data-sort-by="video_views_count">動画再生数</a></li>';
			$order_list_html += '		<li style="clear:both;"></li>';
			$order_list_html += '</ol>';

		$('.media_order_list').html($order_list_html);
		//並び替え処理（PC用）
		$(".sort_by_btn").on("click", function(){
			var from			= $('#from').val();
			var to				= $('#to').val();
			var per_page	= "";
			var sort_by		= $(this).attr("data-sort-by");
			var asc_desc	= "";
			data_loader(from, to, per_page, sort_by, asc_desc);
		});

		//並び替え処理（スマホ用）
		$(".sort_by_select").on("change", function(){
			var from			= $('#from').val();
			var to				= $('#to').val();
			var per_page	= "";
			var sort_by		= $(this).val();
			var asc_desc	= "";

			data_loader(from, to, per_page, sort_by, asc_desc);
		});
	});


	$('#modal_box').iziModal({
		width: '80%',
		fullscreen: true,
		padding: 20,
		theme: 'light',
		overlayColor: 'rgba(0, 0, 0, 0.7)',
		transitionIn: 'fadeInRight',
		transitionOut: 'fadeOutUp',
		focusInput:false,
	});

	$(".detail_modal_caption").mCustomScrollbar({
		axis:"y",
		scrollbarPosition:"inside",
		theme:"my-theme",
	});

	var from			= $('#from').val();
	var to				= $('#to').val();
	var per_page	= getParam('per_page');
	var sort_by		= getParam('sort_by');
	sort_by				= !sort_by ? "media_post_datetime" : sort_by;
	var asc_desc	= getParam('asc_desc');
	data_loader(from, to, per_page, sort_by, asc_desc);



	$.fakeLoader({
		spinner:'spinner6',
		bgColor:'rgba(168,168,168,0.4);'
	});

});


//モーダル用DatePicker→モーダル内とメインページのDatepickerが連動しないように分ける
$(function() {

  var dp_options = {
    gotoCurrent: false,
    maxDate:-1, //前日より後は指定不可
    dateFormat: "yy-mm-dd",
    numberOfMonths: 1,
    monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
    dayNames: ['日', '月', '火', '水', '木', '金', '土'],
    dayNamesMin: ['日', '月', '火', '水', '木', '金', '土'],
    onSelect:function(date, obj){
      var from			= $("#detail_media_insights_modal_from").val();
      var to				= $("#detail_media_insights_modal_to").val();
			var $media_id	= $("#detail_media_insights_modal_media_id").val();
      //開始日と終了日が逆転した場合の回避
      if (from > to) {
        switch (obj["id"]){
          case "to":
              to		= new Date(to);
              from	= new Date(to.getFullYear(), zeroPadding(to.getMonth(), 2), zeroPadding((to.getDate()-7), 2));
              $("#from").val(from.getFullYear()+"-"+zeroPadding((from.getMonth()+1), 2)+"-"+zeroPadding(from.getDate(), 2));
              break;
          case "from":
              from	= new Date(from);
              to		= new Date(from.getFullYear(), zeroPadding(from.getMonth(), 2), zeroPadding((from.getDate()+7), 2));
              $("#to").val(to.getFullYear()+"-"+zeroPadding((to.getMonth()+1), 2)+"-"+zeroPadding(to.getDate()), 2);
              break;
          default :
              break;
        }

        from	= from.getFullYear()+"-"+zeroPadding((from.getMonth()+1), 2)+"-"+zeroPadding(from.getDate(), 2);
        to		= to.getFullYear()+"-"+zeroPadding((to.getMonth()+1), 2)+"-"+zeroPadding(to.getDate(), 2);

      }
      disp_media_detail_modal($media_id)
			disp_media_detail_chart_modal($media_id, from, to);
    }
  };

  $("#detail_media_insights_modal_from").datepicker(dp_options);
  $("#detail_media_insights_modal_to").datepicker(dp_options);

});

//投稿一覧をAJAXで表示
function data_loader(from, to, per_page, sort_by, asc_desc){

	//並び替え順リンクの装飾処理
	$(".compact-sort").find(".fitter_active").removeClass("fitter_active");
	$(".sort_by_"+sort_by).addClass("fitter_active");

	var now				= new Date();
	var tmp_from	= new Date(from);
	var tmp_to		= new Date(to);
	$(".disp_date_today").text(now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate() + "現在");
	$(".disp_date_from").text(tmp_from.getFullYear() + "/" + zeroPadding((tmp_from.getMonth()+1), 2) + "/" + zeroPadding(tmp_from.getDate(), 2));
	$(".disp_date_to").text(tmp_to.getFullYear() + "/" + zeroPadding((tmp_to.getMonth()+1), 2) + "/" + zeroPadding(tmp_to.getDate(), 2));

	var postData = 		{"from":from, "to":to, "per_page":per_page, "sort_by":sort_by, "asc_desc":asc_desc};
	$.get("/media/get_media_count/",
		postData,
		function(data){
			media_count = JSON.parse(data);
			$("#current_media_count").text(media_count["current_media_count"]);
			$("#range_media_count").text(media_count["range_media_count"]);

			//現在のページ数が投稿数を超えている場合、エラー回避のためリダイレクト
			if(per_page > media_count["range_media_count"]){
				location.href = "/media/?from="+from+"&to="+to+"&sort_by="+sort_by+"&asc_desc="+asc_desc;
			}
		}
	);

	//ページングを有効にするためにはGET送信しか許されない
	$.get({
			url:"/media/get_media_list_sort_V/",
			data:postData,
			beforeSend:function(){
				$(".fakeLoader").show();
			},
	}).done(function(data){
			var $media_list				= JSON.parse(data);
			var $media_insight		= $media_list['media_insights'];
			var $media_id_arr			= $media_list['media_id_arr'];
			var $page_link				= $media_list['page_link'];
			var $item_per_page		= $media_list['item_per_page'];
			var $media_data				= $media_list['media_data'];
			//ページングの表示
			// $(".paging").html($page_link);

			var $now_page_media_count	= $media_id_arr.length; //現ページで取得した投稿数( < media_per_page)

			//データをAJAXで受け取りデータをアサイン
			if ($now_page_media_count > 0) {
					$(".media_outer").show();
					$(".media_none").hide();
					var Addhtml = "";
					$media_id_arr.forEach(function(val){

						//画像が空の場合、別イメージ
						var $media_url	= !$media_data[val]["media_url"]? "/images/no_image.png" : $media_data[val]["media_url"];

						Addhtml +='<div class="media-box">';
						Addhtml +='	<div class="media-box-content">';
						Addhtml +='		<div class="media_img">';
						Addhtml +='				<img src="'+ $media_url +'" class="btn_media_detail insights_data_media_url" style="cursor:pointer;" alt="" id="'+ val +'" />';
						Addhtml +='		</div>';
						Addhtml +='		<div style="position:absolute;top:13px;left:13px;z-index:999;">';
						if ($media_data[val]["media_type"] === 'CAROUSEL_ALBUM') {
						Addhtml +='			<object type="image/svg+xml" data="/images/svg/icon_carousel.svg" style="width:2vw;min-width:15px;max-width:20px;filter: drop-shadow(3px 3px 3px rgba(0,0,0,0.9));"></object>';
						} else if ($media_data[val]["media_type"] === 'VIDEO') {
							Addhtml +='			<object type="image/svg+xml" data="/images/svg/icon_movie.svg" style="width:2vw;min-width:15px;max-width:20px;filter: drop-shadow(3px 3px 3px rgba(0,0,0,0.9));"></object>';
						} else {
							Addhtml +='			';
						}
						Addhtml +='		</div>';
						Addhtml +='		<div class="like_count">';
						Addhtml +='			<span><i class="fas fa-thumbs-up"></i><span class="insights_data_thumbs_up">'+ $media_insight[val]["like_count"] +'</span></span>';
						Addhtml +='			<span><i class="fas fa-comment-alt"></i><span class="insights_data_comments_count">'+ $media_insight[val]["comments_count"] +'</span></span>';
						Addhtml +='		</div>';
						Addhtml +='		<div class="insights">';
						Addhtml +='			<div class="insights_param">';
						Addhtml +='				<label>インプレッション数</label>';
						Addhtml +='				<label><spna class="insights_data_impressions">'+ $media_insight[val]["impressions"] +'</span></label>';
						Addhtml +='				<label class="tooltip_click insights_tooltip" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿の総閲覧数（ datetime_exchange_text ）</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='			<div class="insights_param">';
						Addhtml +='				<label>リーチ数</label>';
						Addhtml +='				<label><spna class="insights_data_reach">'+ $media_insight[val]["reach"] +'</span></label>';
						Addhtml +='				<label class="tooltip_click insights_tooltip" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿を閲覧したアカウント数（ datetime_exchange_text ）</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='			<div class="insights_param">';
						Addhtml +='				<label>保存数</label>';
						Addhtml +='				<label><spna class="insights_data_saved">'+ $media_insight[val]["saved"] +'</span></label>';
						Addhtml +='				<label class="tooltip_click insights_tooltip" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿がコレクションに保存された数（ datetime_exchange_text ）</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='			<div class="insights_param">';
						Addhtml +='				<label>エンゲージ数</label>';
						Addhtml +='				<label><spna class="insights_data_engagement">'+ $media_insight[val]["engagement"] +'</span></label>';
						Addhtml +='				<label class="tooltip_click insights_tooltip" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿に対してのいいね！数、保存数、コメント数の合計（ datetime_exchange_text ）</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='			<div class="insights_param">';
						if($media_data[val]["media_type"] == "VIDEO"){
							Addhtml +='			<label>動画再生数</label>';
							Addhtml +='			<label><spna class="insights_data_video_views">'+ $media_insight[val]["video_views"] +'</span></label>';
						} else {
							Addhtml +='			<label style="color:gray;">動画再生数</label>';
							Addhtml +='			<label style="color:gray;"><spna class="insights_data_video_views">--</span></label>';
						}
						Addhtml +='				<label class="tooltip_click insights_tooltip" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>動画が再生された数（ datetime_exchange_text ）</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='			<div class="reg_date">';
						Addhtml +='				<span class="insights_data_post_datetime">投稿日:'+ $media_data[val]["media_post_datetime"] +'</span>';
						// Addhtml +='				<label class="tooltip_click" date-tooltip-datetime="'+ $media_insight[val]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿日時</p>"></label>';
						Addhtml +='			</div>';
						Addhtml +='		</div>';
						Addhtml +='	</div><!--end media-box-content-->';
						Addhtml +='</div><!--ebd media-box-->';
					});

					if ($page_link) {
						Addhtml +='<div class="media-pagination">';
						Addhtml +='	<div class="paging">'+ $page_link +'</div>';
						Addhtml +='</div>';
					}


					var $html = $(Addhtml)
		      $("#media_list").html($html);
		      $html.ready(function(){

						if($now_page_media_count == 0){
							$(".media_none").show();
							$(".media_outer").hide();
						}

						//ツールチップ共通スクリプト
						tooltip_common_script()

						//投稿詳細をモーダル表示
						// $(".btn_media_detail").modaal({
						//     content_source: '#modal_box',
						// 		animation: 'fade',
						// 		animation_speed:200
						// });
						$(".insights_data_media_url").on("click", function(){
							var $media_id = $(this).attr("id");
							var detail_media_insights_modal_from			= $("#detail_media_insights_modal_from").val();
							var detail_media_insights_modal_to				= $("#detail_media_insights_modal_to").val();

							disp_media_detail_modal($media_id);
							disp_media_detail_chart_modal($media_id, detail_media_insights_modal_from, detail_media_insights_modal_to);

							$('#modal_box').iziModal('open');
						});

					});

			} else {
				$(".media_none").show();
				$(".media_outer").hide();
			}
			$(".fakeLoader").hide();

		}).fail(function(XMLHttpRequest, textStatus, errorThrown){
          console.log("failed...");
          console.log("XMLHttpRequest : " + XMLHttpRequest.status);
          console.log("textStatus     : " + textStatus);
          console.log("errorThrown    : " + errorThrown.message);
					alert("通信エラーが発生しました。\n再度操作を行ってください。");
					$(".fakeLoader").hide();
    });

}

//投稿詳細をモーダルで表示
function disp_media_detail_modal($media_id) {
	var postData = {"media_id":$media_id};

	$(".detail_insights_info_area").html('<div style="height:450px;width:100px;"></div>');
	$.get("/media/media_detail_insight/",
	postData,
	function(data)
	{
		var $media_detail = JSON.parse(data);
		var $detail_media_url	= !$media_detail["media_data"]["media_url"]? "/images/no_image.png" : $media_detail["media_data"]["media_url"];
		var $detail_video_url	= !$media_detail["media_data"]["video_url"]? "/images/no_image.png" : $media_detail["media_data"]["video_url"];


		var Addhtml = "";
		Addhtml += '';
		Addhtml += '<div class="detail_insights_modal_box-left">';
		if ($media_detail["media_data"]["media_type"] === "VIDEO") {
			Addhtml += '	<div class="detail_media_video">';
			Addhtml += '		<a href="'+ $media_detail["media_data"]["permalink"] +'" target="_blank" title="" class="detail_media_insights_modal_permalink"><video src="'+ $detail_video_url +'" poster="'+ $detail_media_url +'" id="detail_insights_data_video_url" autoplay controls style="width:200px;height:200px;border:none;" ></video></a>';
			Addhtml += '	</div>';
		} else {
			Addhtml += '	<div class="detail_media_img">';
			Addhtml += '		<a href="'+ $media_detail["media_data"]["permalink"] +'" target="_blank" title="" class="detail_media_insights_modal_permalink"><img src="'+ $detail_media_url +'" id="detail_insights_data_media_url" style="width:200px;" alt="" /></a>';
			Addhtml += '	</div>';
		}
		Addhtml += '	<div class="detail_like_count">';
		Addhtml += '		<span><i class="fas fa-thumbs-up"></i><span class="detail_insights_data_thumbs_up">'+ $media_detail["insights"]["like_count"] +'</span></span>';
		Addhtml += '		<span><i class="fas fa-comment-alt"></i><span class="detail_insights_data_comments_count">'+ $media_detail["insights"]["comments_count"] +'</span></span>';
		Addhtml += '	</div>';
		Addhtml += '	<div class="detail_insights">';
		Addhtml += '		<div class="detail_insights_param">';
		Addhtml += '			<label>インプレッション数</label>';
		Addhtml += '			<label><spna class="detail_insights_data_impressions">'+ $media_detail["insights"]["impressions"] +'</span></label>';
		Addhtml += '			<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $media_detail["insights"]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿の総閲覧数（ datetime_exchange_text ）</p>"></label>';
		Addhtml += '		</div>';
		Addhtml += '		<div class="detail_insights_param">';
		Addhtml += '			<label>リーチ数</label>';
		Addhtml += '			<label><spna class="detail_insights_data_reach">'+ $media_detail["insights"]["reach"] +'</span></label>';
		Addhtml += '			<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $media_detail["insights"]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿を閲覧したアカウント数（ datetime_exchange_text ）</p>"></label>';
		Addhtml += '		</div>';
		Addhtml += '		<div class="detail_insights_param">';
		Addhtml += '			<label>保存数</label>';
		Addhtml += '			<label><spna class="detail_insights_data_saved">'+ $media_detail["insights"]["saved"] +'</span></label>';
		Addhtml += '			<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $media_detail["insights"]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿がコレクションに保存された数（ datetime_exchange_text ）</p>"></label>';
		Addhtml += '		</div>';
		Addhtml += '		<div class="detail_insights_param">';
		Addhtml += '			<label>エンゲージ数</label>';
		Addhtml += '			<label><spna class="detail_insights_data_engagement">'+ $media_detail["insights"]["engagement"] +'</span></label>';
		Addhtml += '			<label class="tooltip_click detail_insights_tooltip" date-tooltip-datetime="'+ $media_detail["insights"]["latest_batchrun_datetime"] +'" data-tooltip-text="<p class=\'tooltip_text\'>投稿に対してのエンゲージメント数（ datetime_exchange_text ）</p>"></label>';
		Addhtml += '		</div>';
		Addhtml += '		<div class="detail_insights_param">';
		if($media_detail["media_data"]["media_type"] == "VIDEO"){
			Addhtml += '			<div class="video_views_box">';
			Addhtml += '				<label>動画再生数</label>';
			Addhtml += '				<label><spna class="detail_insights_data_video_views">'+ $media_detail["insights"]["video_views"] +'</span></label>';
			Addhtml += '			</div>';
		} else {
			Addhtml += '			<div class="video_views_box" style="color:gray">';
			Addhtml += '				<label>動画再生数</label>';
			Addhtml += '				<label><spna class="detail_insights_data_video_views">--</span></label>';
			Addhtml += '			</div>';
		}
		Addhtml += '		</div>';
		Addhtml += '		<div class="detail_reg_date">';
		Addhtml += '			<span class="detail_insights_data_post_datetime">投稿日:'+ $media_detail["media_data"]["media_post_datetime"] +'</span>';
		// Addhtml += '			<label class="tooltip_click" data-tooltip-text="<p class=\'tooltip_text\'>投稿時間</p>"></label>';
		Addhtml += '		</div>';
		Addhtml += '	</div>';
		Addhtml += '</div>';
		Addhtml += '<div class="detail_insights_modal_box-right">';
		Addhtml += '	<div class="detail_modal_caption">';
		Addhtml += '		<p class="detail_insights_data_caption">'+ $media_detail["media_data"]["caption"] +'</p>';
		Addhtml += '	</div>';
		Addhtml += '</div>';
		Addhtml += '<div style="clear:both;"></div>';

		$(".detail_insights_modal_box").find("#detail_media_insights_modal_media_id").val($media_detail["media_data"]["media_id"]);
		var $html = $(Addhtml)
		$(".detail_insights_info_area").html($html);
		$html.ready(function(){

			//ツールチップ共通スクリプト
			tooltip_common_script();

		});

	});

}

//投稿詳細画面で各インサイト情報をグラフ表示
function disp_media_detail_chart_modal($media_id, from, to) {
	var postData = {"media_id":$media_id, "detail_media_insights_modal_from":from, "detail_media_insights_modal_to":to};

	//差分データグラフ
	$.get("/media/graph_media_detail_insight",
	postData,
	function(data){
		// グラフ表示用データ
		$data = JSON.parse(data);

		<?php /*
		var impressions      = get_data_tick_by_json($data["impressions"]); //日付をラベルにする場合専用
		var reach            = get_data_tick_by_json($data["reach"]); //日付をラベルにする場合専用
		var saved            = get_data_tick_by_json($data["saved"]); //日付をラベルにする場合専用
		var engagement       = get_data_tick_by_json($data["engagement"]); //日付をラベルにする場合専用
		*/ ?>
		var impressions_raw  = get_data_tick_by_json($data["impressions_raw"]); //日付をラベルにする場合専用
		var reach_raw        = get_data_tick_by_json($data["reach_raw"]); //日付をラベルにする場合専用
		var saved_raw        = get_data_tick_by_json($data["saved_raw"]); //日付をラベルにする場合専用
		var engagement_raw   = get_data_tick_by_json($data["engagement_raw"]); //日付をラベルにする場合専用
		var graph_disp_error = $data["error"];

		google.charts.setOnLoadCallback(function(){
			<?php /*
			graph_disp_error["impressions"] === 0 ? drawImpressionsChart(impressions["c_data"], impressions["ticks"], "インプレッション", "target_graph_impressions") : $("#target_graph_impressions").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["reach"] === 0 ? drawReachChart(reach["c_data"], reach["ticks"], "リーチ", "target_graph_reach") : $("#target_graph_reach").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["saved"] === 0 ? drawSavedChart(saved["c_data"], saved["ticks"], "保存", "target_graph_saved") : $("#target_graph_saved").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["engagement"] === 0 ? drawEngagementChart(engagement["c_data"], engagement["ticks"], "エンゲージメント", "target_graph_engagement") : $("#target_graph_engagement").html("<div style='height:100%;'>No data</div>");
			*/ ?>
			graph_disp_error["impressions_raw"] === 0 ? drawImpressionsRawChart(impressions_raw["c_data"], impressions_raw["ticks"], "インプレッション", "target_graph_impressions_raw")	: $("#target_graph_impressions_raw").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["reach_raw"] === 0 ? drawReachRawChart(reach_raw["c_data"], reach_raw["ticks"], "リーチ", "target_graph_reach_raw") : $("#target_graph_reach_raw").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["saved_raw"] === 0 ? drawSavedRawChart(saved_raw["c_data"], saved_raw["ticks"], "保存", "target_graph_saved_raw") : $("#target_graph_saved_raw").html("<div style='height:100%;'>No data</div>");
			graph_disp_error["engagement_raw"] === 0 	? drawEngagementRawChart(engagement_raw["c_data"], engagement_raw["ticks"], "エンゲージメント", "target_graph_engagement_raw") : $("#target_graph_engagement_raw").html("<div style='height:100%;'>No data</div>");

			// drawReachChart(reach["c_data"], reach["ticks"], "リーチ", "target_graph_reach");
			// drawSavedChart(saved["c_data"], saved["ticks"], "保存", "target_graph_saved");
			// drawEngagementChart(engagement["c_data"], engagement["ticks"], "エンゲージメント", "target_graph_engagement");
			// drawImpressionsRawChart(impressions_raw["c_data"], impressions_raw["ticks"], "インプレッション", "target_graph_impressions_raw");
			// drawReachRawChart(reach_raw["c_data"], reach_raw["ticks"], "リーチ", "target_graph_reach_raw");
			// drawSavedRawChart(saved_raw["c_data"], saved_raw["ticks"], "保存", "target_graph_saved_raw");
			// drawEngagementRawChart(engagement_raw["c_data"], engagement_raw["ticks"], "エンゲージメント", "target_graph_engagement_raw");
		});

	});

	// グラフ表示
	'use strict';

	// パッケージのロード
	google.charts.load('current', {packages: ['corechart']});

	//インプレッションチャート表示（差分データ）
	function drawImpressionsChart(data, ticks, name_type, set_id){
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
	//リーチチャート表示（差分データ）
	function drawReachChart(data, ticks, name_type, set_id){
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

	}//end drawReachChart
	//保存チャート表示（差分データ）
	function drawSavedChart(data, ticks, name_type, set_id){
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
	}//end drawSavedChart
	//エンゲージメントチャート表示（差分データ）
	function drawEngagementChart(data, ticks, name_type, set_id){
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
	}//end drawEngagementChart

	//インプレッションチャート表示
	function drawImpressionsRawChart(data, ticks, name_type, set_id){
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
	}//end drawImpressionsRawChart
	//リーチチャート表示
	function drawReachRawChart(data, ticks, name_type, set_id){
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
	}//end drawReachRawChart
	//保存チャート表示
	function drawSavedRawChart(data, ticks, name_type, set_id){
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
	}//end drawSavedRawChart
	//エンゲージメントチャート表示
	function drawEngagementRawChart(data, ticks, name_type, set_id){
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
	}//end drawEngagementRawChart

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

}

function nl2br(str) {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}
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
