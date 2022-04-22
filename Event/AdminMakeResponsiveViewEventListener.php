<?php 
class AdminMakeResponsiveViewEventListener extends BcViewEventListener {
	public $events = [
		'beforeLayout',
	];
	public function beforeLayout(CakeEvent $event) {
		$View = $event->subject();
		App::import('Model', 'AdminMakeResponsive.AdminMakeResponsive');
		$_setdatas = new AdminMakeResponsive();
		$setdatas = $_setdatas->getSetdatas();
		if (BcUtil::loginUser()
			&&(isset($setdatas))
			&&(isset($setdatas['flg_enable']))
			&&($setdatas['flg_enable'] == 1)) {
			// ログイン時（レスポンシブ有効）
			if (BcUtil::isAdminSystem()
				&&(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')) {
				if ((isset($setdatas))
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)) {
					// admin-third（管理画面）（テーマカラー有効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles',['setdatas' => $setdatas]);
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);	
				} else {
					// admin-third（管理画面）（テーマカラー無効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);	
				}
			} else if (Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third') {
				if ((isset($setdatas))
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)) {
					// admin-third（ユーザー画面上管理ツールバー）（テーマカラー有効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else {
					// admin-third（ユーザー画面上管理ツールバー）（テーマカラー無効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				}				
			} else {
				// admin-second（管理画面、ユーザー画面上管理ツールバー共通）
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			}
		} else if ((isset($setdatas))
			&&(isset($setdatas['flg_enable']))
			&&($setdatas['flg_enable'] == 1)) {
			// ログオフ時（レスポンシブ有効）
			if (Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third') {
				if ((isset($setdatas))
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)) {
					// admin-third（ログイン画面）（テーマカラー有効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else {
					// admin-third（ログイン画面）（テーマカラー無効）
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				}
			} else {
				// admin-second（ログイン画面）
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			}
		} else if ((isset($setdatas))
			&&(isset($setdatas['flg_enable']))
			&&($setdatas['flg_enable'] == 0)
			&&(isset($setdatas['admin_color_enable']))
			&&($setdatas['admin_color_enable'] == 1)) {
			// レスポンシブ無効　テーマカラー有効
			if (Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third') {
				// admin-third（ログイン画面）
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else {
				// admin-second（ログイン画面）
				return;
			}
		} else {
			// レスポンシブ無効
			return;
		}
	}
}