<?php $this -> Html -> addCrumb('User', array('controller' => 'users', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb('Add User', array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add User')) ?>
<?php
echo $this -> Form -> create('User',array('type'=>'file'));
echo $this -> Form -> input('email', array('type' => 'email','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('password', array('type' => 'password','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('UserPhoto.0.photo', array('type' => 'file', 'div' => array('class' => 'form-group')));
echo $this -> Form -> input('UserPhoto.0.photo_dir', array('type' => 'hidden', 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>