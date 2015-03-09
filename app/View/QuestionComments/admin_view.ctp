<?php $this->Html->addCrumb(__('Question Comment'), array('controller' => 'question_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Question Comment'), array('controller' => 'question_comments', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Question Comment')) ?>
<h1><?php echo h($questionComment['QuestionComment']['title']) ?></h1>
<div><?php echo nl2br($questionComment['QuestionComment']['comment']) ?></div>
<p><small>Created: <?php echo $noticeComment['QuestionComment']['created_at'] ?></small></p>
<p><?php echo $this->Html->link(__('List'), array('action' => 'index')) ?></p>
