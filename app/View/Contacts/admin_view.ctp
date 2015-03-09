<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'contacts', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($contact['Contact']['title'], array('controller' => 'contacts', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', $contact['Contact']['title']) ?>
<h1><?php echo h($contact['Contact']['title']) ?></h1>
<div>
	<div>
	<label><?php echo __('Name') ?></label>
	<?php echo nl2br($contact['Contact']['name']) ?>
	</div>	
	<div>
	<label><?php echo __('Email') ?></label>
	<?php echo nl2br($contact['Contact']['email']) ?>
	</div>
	<div>
	<label><?php echo __('Phone') ?></label>
	<?php echo nl2br($contact['Contact']['phone']) ?>
	</div>		
	<div>
	<label><?php echo __('Content') ?></label>
	<?php echo nl2br($contact['ContactContent']['content']) ?>
	</div>
</div>
<p><small>Created: <?php echo $contact['Contact']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')) ?></p>
