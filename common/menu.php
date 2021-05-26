<div id="side_menu">
	<div class="navToggle"><div class="icon"></div></div>
	<div class="account">
	<p class="account-icon">
		<?php if(isset($current_account) && isset($current_account->profile_picture_url)):?>
		<img src="<?=$current_account->profile_picture_url?>">
		<?php else: ?>
		<img src="/images/profile/face-profile.png">
		<?php endif; ?>
	</p>
	<p>
		<?php if(isset($current_account)):?>
		@<?=$current_account->ig_account_name?>
		<?php else: ?>
		@アカウント名
		<?php endif; ?>
	</p>
	</div>

	<div id="menu-nav" class="panel">
		<ul>
		<li>

		<div class="panel-default">
			<div class="list-group">
				<a class="list-group-item <?=($current_page=='performance') ? 'list-group-item-success' : ''?>" href="/performance"><span class="icon"><img src="/images/icon/performance.png"></span>パフォーマンス</a>
				<a class="list-group-item <?=($current_page=='followers') ? 'list-group-item-success' : ''?>" href="/followers"><span class="icon"><img src="/images/icon/follower.png"></span>フォロワー</a>
				<a class="list-group-item <?=($current_page=='media') ? 'list-group-item-success' : ''?>" href="/media"><span class="icon"><img src="/images/icon/post.png"></span>投稿</a>
				<a class="list-group-item <?=($current_page=='story') ? 'list-group-item-success' : ''?>" href="/story"><span class="icon"><img src="/images/icon/story.png"></span>ストーリーズ</a>
				<a class="list-group-item <?=($current_page=='profile') ? 'list-group-item-success' : ''?>" href="/profile"><span class="icon"><img src="/images/icon/profile.png"></span>プロフィール</a>
			</div>

			<div class="list-group line-top">
				<a class="list-group-item" href="https://s3-ap-northeast-1.amazonaws.com/ownly-support/pdf/Insight%20Suite%E6%93%8D%E4%BD%9C%E3%83%9E%E3%83%8B%E3%83%A5%E3%82%A2%E3%83%AB.pdf" target="_blank"><span class="icon"><img style="display:none;" src="/images/icon/profile.png"></span>操作マニュアル</a>
			</div>

			<div class="list-group line-top">
				<a class="list-group-item" href="/member/switch" ><span class="icon"><img style="display:none;" src="/images/icon/profile.png"></span>アカウント切り替え</a>
				<a class="list-group-item" href="/member/modify" ><span class="icon"><img style="display:none;" src="/images/icon/profile.png"></span>登録情報変更</a>
				<a class="list-group-item" href="/member/logout" ><span class="icon"><img style="display:none;" src="/images/icon/profile.png"></span>ログアウト</a>
				<?php /*
				<a class="list-group-item" href="#" ><span class="icon"><img src="/images/icon/ugc.png"></span>UGCウォッチ</a>
				<a class="list-group-item" href="#" ><span class="icon"><img src="/images/icon/hashtag.png"></span>ハッシュタグランキング</a>
				*/ ?>
			</div>
		</div>
		</li>
		</ul>
	</div><!--end menu-->
</div>





<script >
$(".navToggle").on("click", function(){
$(this).toggleClass("open");
$("#menu-nav").toggleClass("active");
})
//# sourceURL=pen.js
</script>
