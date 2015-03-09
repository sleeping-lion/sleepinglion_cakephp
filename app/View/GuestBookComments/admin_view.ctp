<?php $this->Html->addCrumb(__('Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Guest Book Comment')) ?>
<h1><?php echo h($guestBookComment['GuestBookComment']['title']) ?></h1>
<div><?php echo nl2br($guestBookComment['GuestBookComment']['comment']) ?></div>
<p><small>Created: <?php echo $guestBookComment['GuestBookComment']['created_at'] ?></small></p>
<p><?php echo $this->Html->link(__('List'), array('action' => 'index')) ?></p>
