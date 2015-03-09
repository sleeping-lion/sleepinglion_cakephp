<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($question['Question']['title'], array('controller' => 'question', 'action' => 'view', $question['Question']['id'])) ?>
<?php $this -> assign('title', __('Question')) ?>
<h1><?php echo h($question['Question']['title']); ?></h1>
<div><?php echo nl2br($question['QuestionContent']['content']); ?></div>
<p><small>Created: <?php echo $question['Question']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
