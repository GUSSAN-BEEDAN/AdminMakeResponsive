<?php 
App::import('Controller', 'Plugins');
#class AdminMakeResponsiveController extends BcPluginAppController {
class AdminMakeResponsiveController extends AppController {
	public $name = 'AdminMakeResponsive';
	public $uses = ['Plugin', 'Content', 'AdminMakeResponsive.AdminMakeResponsive'];
	public $components = ['BcAuth','Cookie','BcAuthConfigure'];
	public function admin_index() {
		if (empty($this->request->data)) {
			$this->data = $this->AdminMakeResponsive->find('first');
		} else {
			$this->AdminMakeResponsive->set($this->request->data['AdminMakeResponsive']);
			$id = $this->request->data['AdminMakeResponsive']['id'];
			if ($this->AdminMakeResponsive->save(['conditions' => ['id' => $id]])) {
				$message = '設定を更新しました。';
				$this->setMessage($message, false, true);
				clearViewCache();
				$this->redirect(['controller' => 'admin_make_responsive', 'action' => 'index']);
			} else {
				$this->setMessage('エラーです。確認して下さい。', true);
			}
		}
		$this->set('flg_enable', $this->AdminMakeResponsive->getEnable());
		$this->pageTitle = '管理画面 レスポンシブ化';
		$this->render('index');	
	}
}