$(function() {
	$('#ContentsBody .bca-main__header').prepend(
		'<div class="toggle_btn"><span></span><span></span><span></span><span></span></div>'
	);
	$('#Wrap').append('<div id="mask"></div>');
});

$(function() {
	var $body = $('body');
	var $btn = $('.toggle_btn');
	var $mask = $('#mask');

	// サイドバーの表示、非表示切り替え
	$btn.on('click', function() {
		// サイドバーの表示
		if (!$body.hasClass('open')) {
			$body.removeClass('close');
			$body.addClass('open');
			window.scrollTo(0, 0);
		} else {
			// サイドバーの非表示
			$body.addClass('close');
			$body.removeClass('open');
			window.scrollTo(0, 0);
			const hidden = document.querySelector('.bca-nav');
			//hiddenアニメーションが完了したらbodyからcloseクラスを削除する
			//サイドバーのheightが、フッター下部固定レイアウト用の100%vhに影響してしまうため
			hidden.addEventListener('animationend', function() {
				$body.removeClass('close');
			});
		}
	});

	// マスク部クリック時のサイドバー非表示
	$mask.on('click', function() {
		$body.addClass('close');
		$body.removeClass('open');
		window.scrollTo(0, 0);
		const hidden = document.querySelector('.bca-nav');
		//hiddenアニメーションが完了したらbodyからcloseクラスを削除する
		hidden.addEventListener('animationend', function() {
			$body.removeClass('close');
		});
	});
});