<?php $this -> Html -> addCrumb(__('Contacts'), array('controller' => 'questions', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'question', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Contacts')); ?>
<h1><?php echo h($question['Contacts']['title']); ?></h1>
<div><?php echo nl2br($question['ContactsContent']['content']); ?></div>
<p><small>Created: <?php echo $question['Contacts']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
