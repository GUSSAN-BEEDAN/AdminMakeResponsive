<?php 
class AdminMakeResponsivesSchema extends CakeSchema {
	public $name = 'AdminMakeResponsives';
	public $file = 'admin_make_responsives.php';
	public $connection = 'plugin';
	public function before($event = array()) {
		return true;
	}
	public function after($event = array()) {
	}
	public $admin_make_responsives = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
		'flg_enable' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => '利用する'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
}