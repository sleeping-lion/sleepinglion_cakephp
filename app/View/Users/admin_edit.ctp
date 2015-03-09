<?php $this -> Html -> addCrumb('User', array('controller' => 'users', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb('Edit User', array('controller' => 'users', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Edit User')) ?>
<?php
echo $this -> Form -> create('User');
echo $this -> Form -> input('email', array('type' => 'email','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('password', array('type' => 'password','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php if($this->request->data['User']['photo']): ?>
<?php echo $this -> Html -> link($this->Html->image('/files/user/photo/'.$this->request->data['User']['id'].'/thumb_'.$this->request->data['User']['photo'], array('alt' =>$this->request->data['User']['name'])), array('action' => 'index','?'=>array('id'=>$this->request->data['User']['id'])),array('escape'=>false)) ?>
<?php endif ?>
<?php
echo $this -> Form -> input('photo', array('type' => 'file', 'div' => array('class' => 'form-group')));
echo $this -> Form -> input('photo_dir', array('type' => 'hidden', 'div' => array('class' => 'form-group'), 'class' => 'form-control'));

echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>