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
				if ((BcUtil::isAdminSystem())
				&&(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')
				){
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else if (Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third'){
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			} else {
				$View->start('admin_make_responsive');
				$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles',['setdatas' => $setdatas]);
				$View->end();
				$View->append('css', $AdminMakeResponsive);
			}
		} else if ((isset($setdatas))
		&&(isset($setdatas['flg_enable']))
		&&($setdatas['flg_enable'] == 1)) {
			if ((BcUtil::isAdminSystem())
			&&(Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third')
			){
			$View->start('admin_make_responsive');
			$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
			$View->end();
			$View->append('css', $AdminMakeResponsive);
		} else if (Configure::read('BcSite.admin_theme') === 'admin-third' || $View->viewVars['siteConfig']['admin_theme'] === 'admin-third'){
			$View->start('admin_make_responsive');
			$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_make_responsive_toolbar_addfiles',['setdatas' => $setdatas]);
			$View->end();
			$View->append('css', $AdminMakeResponsive);
		} else {
			$View->start('admin_make_responsive');
			$AdminMakeResponsive = $View->element('AdminMakeResponsive.admin/admin_go_responsive_addfiles',['setdatas' => $setdatas]);
			$View->end();
			$View->append('css', $AdminMakeResponsive);
		}
	} else {
		return;
	}
}
}