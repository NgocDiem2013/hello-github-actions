
<div id="filtering_menu">
	<div class="page-header">
		<div class="filtering-box-left">
			<form method="GET" name="90day_ago" action="#" style="float:left;margin-right:10%;">
				<?php /*
				<input type="hidden" name="from" value="<?php echo date('Y-m-d', strtotime('- 90day', strtotime('-1day'))); ?>" />
				<input type="hidden" name="to" value="<?php echo date('Y-m-d', strtotime('-1day')); ?>" />
				*/ ?>
				<input type="hidden" name="period" value="90day" />
				<a href="javascript:void(0)" class="serch_date_a <?=(isset($period)&&$period=='90day') ? 'fitter_active':''?>" onclick="this.parentNode.submit()">90日間</a>
			</form>
			<form method="GET" name="30day_ago" action="#" style="float:left;margin-right:10%;">
				<?php /*
				<input type="hidden" name="from" value="<?php echo date('Y-m-d', strtotime('- 30day', strtotime('-1day'))); ?>" />
				<input type="hidden" name="to" value="<?php echo date('Y-m-d', strtotime('-1day')); ?>" />
				*/ ?>
				<input type="hidden" name="period" value="30day" />
				<a href="javascript:void(0)" class="serch_date_a <?=(isset($period)&&$period=='30day') ? 'fitter_active':''?>" onclick="this.parentNode.submit()">30日間</a>
			</form>
			<form method="GET" name="7day_ago" action="#" style="float:left;margin-right:10%;">
				<?php /*
				<input type="hidden" name="from" value="<?php echo date('Y-m-d', strtotime('-7day', strtotime('-1day'))); ?>" />
				<input type="hidden" name="to" value="<?php echo date('Y-m-d', strtotime('-1day')); ?>" />
				*/ ?>
				<input type="hidden" name="period" value="7day" />
				<a href="javascript:void(0)" class="serch_date_a <?=(isset($period)&&$period=='7day') ? 'fitter_active':''?>" onclick="this.parentNode.submit()">7日間</a>
			</form>
			<div style="clear:both;"></div>
		</div>

		<link rel="stylesheet" href="/css/droppy.css" />
		<script src="/js/jquery.droppy.js"></script>
		<script type='text/javascript'>
			function submitAction(url) {
			  $('form').attr('action', url);
			  $('form').submit();
			}
			$(function() {
				$('#nav').droppy({
					speed: 100
				});
			});
		</script>
		<style>
		.droppy {
			background:none !important;
		}
		.submit_button span {
			border:none;
			padding:2px 0px;
			background:none;
			margin:0 !important;
			display:block;
		}
		.droppy ul li a{
			padding:15px 0px;
			text-align:center;
		}
		.droppy ul li{
			margin-top:1px;
		}
		#filtering_menu .submit_button {
		    background-color: #5951d8;
		    color: #fff;
		    border:1px solid #5951d8;
		    padding:5px 30px 5px 20px;
		    line-height: 1;
		    margin-left:20px;
		    border-radius: 3px;
		    vertical-align: 0;
		    background-image: url(.././images/icon/download.png);
		    background-size: 22px;
		    background-repeat: no-repeat;
		    background-position: center right;
		    margin-bottom: -8px !important;
		}
		@media screen and (max-width:480px) {
			input[type=text] {
				font-size: 16px;
			}
		}
		</style>

		<div class="filtering-box-right">
			<form method="GET" name="serch_date" action="#">
				<?php if($current_page == 'followers') { ?>
					<div>
						<div style="display:inline-table">
							<input type="text" id="from" name="from" value="<?php echo $from; ?>" readonly="readonly" autocomplete="off" />
							<span>〜</span>
							<input type="text" id="to" name="to" value="<?php echo $to; ?>" readonly="readonly" autocomplete="off" />
						</div>
						<span class="line-sp">
						<ul id="nav" style="display:inline-table;margin:1px 3px 0px 0px;">
							<li class="submit_button"><span class="line-sp">エクスポート</span>
								<ul style="display:none;">
									<li><a href="javascript:void(0)" onclick="submitAction('/export/<?=$current_page?>_age_gender_csv')">年齢 / 性別</a></li>
									<li><a href="javascript:void(0)" onclick="submitAction('/export/<?=$current_page?>_country_csv')">国別</a></li>
									<li><a href="javascript:void(0)" onclick="submitAction('/export/<?=$current_page?>_city_csv')">地域別</a></li>
									<li><a href="javascript:void(0)" onclick="submitAction('/export/<?=$current_page?>_online_followers_csv')">オンラインフォロワー</a></li>
								</ul>
							</li>
						</ul>
						</span>
					</div>
				<?php } else if($current_page == 'media' OR $current_page == 'story') { ?>
					<style>
					@media screen and (min-width:901px) {
						.filtering_menu_media {
							padding-right:163px;
						}
					}
					</style>
					<div class="filtering_menu_media">
						<input type="text" id="from" name="from" value="<?php echo $from; ?>" autocomplete="off" />
						<span>〜</span>
						<input type="text" id="to" name="to" value="<?php echo $to; ?>" autocomplete="off" />
					</div>
				<?php } else { ?>
					<input type="text" id="from" name="from" value="<?php echo $from; ?>" autocomplete="off" />
					<span>〜</span>
					<input type="text" id="to" name="to" value="<?php echo $to; ?>" autocomplete="off" />
					<!-- <span class="line-sp"><input type="submit" value="エクスポート" onclick="submitAction('/export/<?=$current_page?>_csv')" disabled  /></span> -->
					<span class="line-sp"><a class="submit_button" href="javascript:void(0)" onclick="submitAction('/export/<?=$current_page?>_csv')">エクスポート</a></span>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
