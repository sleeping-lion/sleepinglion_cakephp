<?php $this -> Html -> addCrumb(__('Contact'), array('controller' => 'contacts', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Contact'), array('controller' => 'contacts', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Contact')) ?>
<?php
echo $this -> Form -> create('Contact');
echo $this -> Form -> input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('email', array('type'=>'email','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('phone', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('ContactContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>