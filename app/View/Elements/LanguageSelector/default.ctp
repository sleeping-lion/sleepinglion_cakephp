<form action="/language_select" style="float:right">
	<select name="language">
		<option value="kor" <?php if(!$this->Session->check('Config.language')): ?>selected="selected"<?php endif ?>><?php echo __d('language','Korean') ?></option>
		<option value="eng" <?php if($this->Session->read('Config.language')=='eng'): ?>selected="selected"<?php endif ?>><?php echo __d('language','English') ?></option>
		<option value="zho" <?php if($this->Session->read('Config.language')=='zho'): ?>selected="selected"<?php endif ?>><?php echo __d('language','Chinese') ?></option>
	</select>
	<input value="<?php echo __('Change Language') ?>" type="submit" />
</form>