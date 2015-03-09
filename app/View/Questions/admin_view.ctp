<?php $this -> Html -> addCrumb(__('Questions'), array('controller' => 'questions', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'question', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Question')); ?>
<h1><?php echo h($question['Question']['title']); ?></h1>
<div><?php echo nl2br($question['QuestionContent']['content']); ?></div>
<p><small>Created: <?php echo $question['Question']['created']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
