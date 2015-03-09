<?php $this -> Html -> addCrumb(__('Galleries'), array('controller' => 'galleries', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Edit Gallery'), array('controller' => 'galleries', 'action' => 'edit', $this -> request -> data['Gallery']['id'])); ?>
<?php $this -> assign('title', __('Edit Gallery')); ?>
<?php echo $this -> Form -> create('Gallery', array('type' => 'file')); ?>
<?php echo $this -> Form -> input('gallery_category_id', array('type' => 'select', 'div' => array('class' => 'form-group'), 'class' => 'form-control')); ?>
<?php echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control')); ?>
<?php echo $this -> Form -> input('content', array('div' => array('class' => 'form-group'), 'class' => 'form-control')); ?>
<?php
echo $this -> Form -> input('Gallery.photo', array('type' => 'file', 'div' => array('class' => 'form-group')));
echo $this -> Form -> input('Gallery.photo_dir', array('type' => 'hidden', 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>
