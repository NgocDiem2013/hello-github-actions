<div id="header">
	<h1 class="page-header text-muted"><img src="/images/logo_white.png" alt="Insight Suite" title="Insight Suite"></h1>
</div>

<!-- インフォメーション表示領域 -->
<!-- load iziModal pulgins  (MIT LICENSE) -->
<link rel="stylesheet" href="/css/iziModal.min.css" />
<script type="text/javascript" src="/js/iziModal.min.js"></script>
<?php if (!empty($now_open_info_list)) { ?>
<div id="infomation_ticker">
		<ul>
				<?php foreach ($now_open_info_list as $info) { ?>
					<?php if (empty($delete_info_id) || !in_array($info->id, $delete_info_id)) { ?>
							<li><label class="btn_info_detail" data-izimodal-open=".modal_box_<?=$info->id?>"><?=$info->title;?></label><label class="btn_info_visble" data-information-id="<?=$info->id?>">×</label></li>
							<div class="modal_box_<?=$info->id?> izimodal" data-izimodal-iframeURL="<?=base_url()?>/ssbackend/information_detail/<?=$info->id?>"></div>
					<?php } ?>
				<?php } ?>
		</ul>
</div>
<?php } ?>
<!-- インフォメーション表示領域 -->
