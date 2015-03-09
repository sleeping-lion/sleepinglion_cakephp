<?php $this -> Html -> addCrumb(__('Guest Books'), array('controller' => 'guestBooks', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guestBooks', 'action' => 'view')); ?>
<?php $this -> assign('title', __('Guest Book')); ?>
<h1><?=h($guest_book['GuestBook']['title']); ?></h1>
<div><?php echo nl2br($guest_book['GuestBookContent']['content']); ?></div>
<p><small>Created: <?=$guest_book['GuestBook']['created']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
