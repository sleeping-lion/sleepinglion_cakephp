<?php $this -> Html -> addCrumb(__('Group'), array('controller' => 'groups', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit Group'), array('controller' => 'groups', 'action' => 'edit', $this -> request -> data['Group']['id'])) ?>
<?php $this -> assign('title', __('Edit Group')) ?>
<?php
echo $this -> Form -> create('Group');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>