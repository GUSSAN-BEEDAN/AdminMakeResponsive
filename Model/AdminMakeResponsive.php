<?php
class AdminMakeResponsive extends AppModel {
/**
 * モデル名
 *
 */
	var $name = 'AdminMakeResponsive';

/**
 * 設定状態を取得する
 *
 */
	function getEnable(){
		$getEnable = null;
		$data = [];
		$data = $this->find('first');
		if (
			(isset($data['AdminMakeResponsive']))
			&&(isset($data['AdminMakeResponsive']['flg_enable']))
			){
			$getEnable = $data['AdminMakeResponsive']['flg_enable'];
		}
		return $getEnable;
	}

/**
 * 設定データを取得する
 *
 */
	function getSetdatas(){
		$getSetdatas = null;
		$data = [];
		$data = $this->find('first');
		if (
			(isset($data['AdminMakeResponsive']))
			){
			$getSetdatas = $data['AdminMakeResponsive'];
		}
		return $getSetdatas;
	}


/**
 * テーマカラー設定を保存する
 * lib/Baser/Model/ThemeConfig.phpを参考にして作成
 * 
 */
	public function addColorConfig($data){
		$configPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'Lib' . DS . 'addcolorconfig.css';
		if (!file_exists($configPath)) {
			return false;
		}
		$File = new File($configPath);
		$config = $File->read();
		$settings = [
			'ADMINMAIN' => 'admin_color_main',
			'ADMINSUB' => 'admin_color_sub'
		];
		$settingExists = false;
		foreach($settings as $key => $setting) {
			if (empty($data['AdminMakeResponsive'][$setting])) {
				$config = preg_replace("/\n.+?" . $key . ".+?\n/", "\n", $config);
			} else {
				$config = str_replace($key, '#' . $data['AdminMakeResponsive'][$setting], $config);
				$settingExists = true;
			}
		}
		$File = new File(APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'webroot' . DS . 'css' . DS . 'admin' . DS . 'addcolor_3rd.css', true, 0644);
		$File->write($config);
		$File->close();
	}


/**
 * テーマカラー設定を保存する（toolbarおよびログイン画面用）
 * 
 */
	public function addColorConfigToolbar($data){
		$configPath = APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'Lib' . DS . 'addcolorconfig_toolbar.css';
		if (!file_exists($configPath)) {
			return false;
		}
		$File = new File($configPath);
		$config = $File->read();
		$settings = [
			'ADMINMAIN' => 'admin_color_main',
			'ADMINSUB' => 'admin_color_sub'
		];
		$settingExists = false;
		foreach($settings as $key => $setting) {
			if (empty($data['AdminMakeResponsive'][$setting])) {
				$config = preg_replace("/\n.+?" . $key . ".+?\n/", "\n", $config);
			} else {
				$config = str_replace($key, '#' . $data['AdminMakeResponsive'][$setting], $config);
				$settingExists = true;
			}
		}
		$File = new File(APP . 'Plugin' . DS . 'AdminMakeResponsive' . DS . 'webroot' . DS . 'css' . DS . 'admin' . DS . 'addcolor_3rd_toolbar.css', true, 0644);
		$File->write($config);
		$File->close();
	}
}
	