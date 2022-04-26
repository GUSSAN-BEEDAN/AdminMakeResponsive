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
		
		if (BcUtil::loginUser()) {
			// ログイン時
			if (
				(isset($setdatas))
				&&(isset($setdatas['flg_enable']))
				&&($setdatas['flg_enable'] == 0)
				&&(isset($setdatas['admin_color_enable']))
				&&($setdatas['admin_color_enable'] == 0)
			) {
				// ＋レスポンシブ無効　＋テーマカラー無効
				return;
			};

			if ((BcUtil::isAdminSystem())
				&&(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')
			) {
				// admin-third（管理画面）
				if (
					(isset($setdatas))
					&&(isset($setdatas['flg_enable']))
					&&($setdatas['flg_enable'] == 1)
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)
				) {
					// ＋レスポンシブ有効　＋テーマカラー有効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles',['setdatas' => $setdatas]);
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else if (
					(isset($setdatas))
					&&(isset($setdatas['flg_enable']))
					&&($setdatas['flg_enable'] == 1)
				) {
					// ＋レスポンシブ有効　＋テーマカラー無効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else if (
					(isset($setdatas))
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)
				) {
					// ＋レスポンシブ無効　＋テーマカラー有効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else {
					// ＋レスポンシブ無効　＋テーマカラー無効
					return;
				}
			} else if (
				(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')
			) {
				// admin-third（ユーザー画面上管理ツールバー）
				if (
					(isset($setdatas))
					&&(isset($setdatas['flg_enable']))
					&&($setdatas['flg_enable'] == 1)
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)
				) {
					// ＋レスポンシブ有効　＋テーマカラー有効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else if (
					(isset($setdatas))
					&&(isset($setdatas['flg_enable']))
					&&($setdatas['flg_enable'] == 1)
				) {
					// ＋レスポンシブ有効　＋テーマカラー無効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else if (
					(isset($setdatas))
					&&(isset($setdatas['admin_color_enable']))
					&&($setdatas['admin_color_enable'] == 1)
				) {
					// ＋レスポンシブ無効　＋テーマカラー有効
					$View->start('admin_make_responsive');
					$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles',['setdatas' => $setdatas]);
					$View->end();
					$View->append('css', $AdminMakeResponsive);
				} else {
					// ＋レスポンシブ無効　＋テーマカラー無効
					return;
				}
			} else if (
				(isset($setdatas))
				&&(isset($setdatas['flg_enable']))
				&&($setdatas['flg_enable'] == 1)
			) {
				// admin-second（管理画面、ユーザー画面上管理ツールバー 共通）
				// ＋レスポンシブ有効
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else {
				// ＋レスポンシブ無効
				return;
			}
		} else if (
			(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')
		) {
			// ログオフ時 admin-third（ログイン画面対象）
			if (
				(isset($setdatas))
				&&(isset($setdatas['flg_enable']))
				&&($setdatas['flg_enable'] == 1)
				&&(isset($setdatas['admin_color_enable']))
				&&($setdatas['admin_color_enable'] == 1)
			) {
				// ＋レスポンシブ有効　＋テーマカラー有効
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else if (
				(isset($setdatas))
				&&(isset($setdatas['flg_enable']))
				&&($setdatas['flg_enable'] == 1)
			) {
				// ＋レスポンシブ有効　＋テーマカラー無効
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else if (
				(isset($setdatas))
				&&(isset($setdatas['admin_color_enable']))
				&&($setdatas['admin_color_enable'] == 1)
			) {
				// ＋レスポンシブ無効　＋テーマカラー有効
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addcolorfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else {
				// （レスポンシブ無効）（テーマカラー無効）
				return;
			}
		} else {
			// ログオフ時 admin-second（ログイン画面対象）
			$View->start('admin_make_responsive');
			$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
			$View->end();
			$View->append('css', $AdminMakeResponsive);
		}
	}
}