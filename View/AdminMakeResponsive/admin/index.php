<style>
.alh-description {
	margin-bottom: 10px;
	padding-bottom: 10px;
	border-bottom: 1px solid #eeeeea;
}
</style>

<div class="alh-description">
<p>管理画面（admin-second/admin-third対応）のレスポンシブ化を有効にします。</p>
<p>※ 画面のレイアウトが崩れるなど表示かおかしい場合は、baserCMSおよびブラウザのキャッシュをクリアするなどしてみてください。</p>
<p>※ それでも画面のレイアウトが崩れるなどの問題が改善しない場合は、チェックボックスをオフにしてください。</p>
</div>
<?php echo $this->BcForm->create('AdminMakeResponsive', array('url' => ['controller' => 'admin_make_responsive','action' => 'index'])) ?>
<?php echo $this->BcForm->hidden('AdminMakeResponsive.id') ?>
<table cellpadding="0" cellspacing="0" id="AdminMakeResponsiveTable" class="form-table bca-form-table">
	<tr>
		<th class="col-head bca-form-table__label">
			<?php echo $this->BcForm->label('AdminMakeResponsive.flg_enable', '管理画面 レスポンシブ化') ?>
		</th>
		<td class="col-input bca-form-table__input">
			<?php echo $this->BcForm->input('AdminMakeResponsive.flg_enable', ['type' => 'checkbox', 'label' => '有効にする', 'value' => '1']) ?>
			<?php echo $this->BcForm->error('AdminMakeResponsive.flg_enable') ?>
		</td>
	</tr>
</table>
<div class="submit bca-actions">
	<?php echo $this->BcForm->button(__d('baser', '保存'),
		[
			'div' => false,
			'class' => 'button bca-btn bca-actions__item',
			'data-bca-btn-type' => 'save',
			'data-bca-btn-size' => 'lg',
			'data-bca-btn-width' => 'lg',
		]);
		?>
</div>
<?php echo $this->BcForm->end() ?>
