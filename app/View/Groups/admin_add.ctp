<?php $this -> Html -> addCrumb(__('Group'), array('controller' => 'groups', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Group'), array('controller' => 'groups', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Group')) ?>
<?php
echo $this -> Form -> create('Group');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>