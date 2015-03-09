<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit Question'), array('controller' => 'questions', 'action' => 'edit', $this -> request -> data['Question']['id'])) ?>
<?php $this -> assign('title', __('Edit Question')) ?>
<?php
echo $this -> Form -> create('Question');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('QuestionContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>