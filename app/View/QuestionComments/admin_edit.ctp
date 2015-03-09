<?php $this->Html->addCrumb(__('Question Comment'), array('controller' => 'question_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Edit Question Comment'), array('controller' => 'question_comments', 'action' => 'edit', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Edit Question Comment')) ?>
<?php
echo $this->Form->create('QuestionComment');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Article'));
?>