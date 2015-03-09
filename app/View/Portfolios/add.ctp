<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'portfolios', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Portfolio'), array('controller' => 'Portfolios', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Portfolio')) ?>
<?php
echo $this -> Form -> create('Portfolio', array('type' => 'file'));
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('url', array('type'=>'url','div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('PortfolioContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('photo', array('type' => 'file', 'div' => array('class' => 'form-group')));
echo $this -> Form -> input('photo_dir', array('type' => 'hidden', 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>