<?php $this -> Html -> addCrumb(__('Guest Books'), array('controller' => 'guestBooks', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guestBooks', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Guest Book')); ?>
<h1><?php echo h($guestBook['GuestBook']['title']); ?></h1>
<div><?php echo nl2br($guestBook['GuestBookContent']['content']); ?></div>
<p><small>Created: <?php echo $guestBook['GuestBook']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
