<?php $this -> Html -> addCrumb(__('Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'contacts', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Contact')); ?>
<h1><?php echo h($contact['Contact']['title']); ?></h1>
<div><?php echo nl2br($contact['ContactContent']['content']); ?></div>
<p><small>Created: <?php echo $contact['Contact']['created']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
