<?php
/**
 * Include posts
 */
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

}