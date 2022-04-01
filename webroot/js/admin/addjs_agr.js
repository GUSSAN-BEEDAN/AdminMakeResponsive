/**
 * [ADMIN] AdminGoResponsive
 * @link			http://www.tsukurun.co.jp/
 * @link			http://web-model.com/
 * @author			daruma&namio(tsukurun)
 * @license			MIT
 */

function metaSetting() {
var doc = document;
var head = doc.getElementsByTagName("head")[0];
var meta = doc.createElement("meta");
meta.setAttribute("name","viewport");
meta.setAttribute("content","width=device-width, initial-scale=1");
head.appendChild(meta);
}
metaSetting();

$(function(){

	$('#GlobalMenu').prepend('<div class="menu_button"><span>MENU</span></div>');

	$("#GlobalMenu .menu_button").click(function(event) {
		event.preventDefault();
		$('#GlobalMenu ul').slideToggle(250);
	});


	function elementMoving() {
		var browserWidth = $(window).width();

		if(browserWidth <= 640) {
			$('#ContentsBody h1').prependTo('#ContentsBody');
			$('#SideBar').insertBefore('#ToTop');
			$('#Contents, #SideBar, .favorite-menu-list, .favolite-menu-tools').removeAttr('style');
		} else {
			$('#ContentsBody h1').insertAfter('#ContentsMenu');
			$('#SideBar').prependTo('#Wrap');
		}

		if(browserWidth <= 787) {
			$('#FooterLogo').insertAfter('#FooterLink');
		} else {
			$('#FooterLogo').prependTo('#FooterInner');
		}

	}
	elementMoving();
	$(window).resize(function(){
			elementMoving();
	});

	function goTop() {
	  var pagetop = $('#ToTop');
	  $(window).scroll(function () {
	     if ($(this).scrollTop() > 100) {
			 		pagetop.fadeIn();
	     } else {
			 		pagetop.fadeOut();
	     }
	  });
	}
	goTop();

});
