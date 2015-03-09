<?php $this -> Html -> addCrumb(__('User'), array('controller' => 'users', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb($user['User']['name'], array('controller' => 'users', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', $user['User']['name']); ?>
<div>
	<div class="form-group">
	<label><?php echo __('Name') ?></label>
	<p><?php echo nl2br($user['User']['name']) ?></p>
	</div>	
	<div class="form-group">
	<label><?php echo __('Email') ?></label>
	<p><?php echo nl2br($user['User']['email']) ?></p>
	</div>
	<div class="form-group">
	<label><?php echo __('Description') ?></label>
	<p><?php echo nl2br($user['User']['description']) ?></p>
	</div>
</div>
<p><small><?php echo __('Created_at') ?> : <?php echo $user['User']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
