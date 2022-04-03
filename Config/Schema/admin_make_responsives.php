<?php 
class AdminMakeResponsivesSchema extends CakeSchema {

	public $file = 'admin_make_responsives.php';

	public function before($event = []) {
		return true;
	}

	public function after($event = []) {
	}

	public $admin_make_responsives = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'],
		'flg_enable' => ['type' => 'boolean', 'null' => true, 'default' => null, 'comment' => '利用する'],
		'modified' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '更新日時'],
		'created' => ['type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1]
		],
		'tableParameters' => []
	];

}