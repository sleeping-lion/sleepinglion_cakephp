<?php $this->Html->addCrumb(__('Question Comment'), array('controller' => 'question_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Add Question Comment'), array('controller' => 'question_comments', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Question Comment')) ?>
<?php
echo $this->Form->create(' QuestionComment');
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('content',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>__('Save Article'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>