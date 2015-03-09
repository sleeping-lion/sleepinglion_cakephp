<?php $this->Html->addCrumb(__('Gallery'), array('controller' => 'galleries', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Edit Gallery'), array('controller' => 'galleries', 'action' => 'edit', $this -> request -> data['Gallery']['id'])) ?>
<?php $this -> assign('title', __('Edit Gallery')) ?>
<?php
echo $this->Form->create('Gallery',array('type'=>'file'));
echo $this->Form->input('gallery_category_id',array('type'=>'select'));
echo $this->Form->input('title');
echo $this->Form->input('Gallery.photo', array('type' => 'file'));
echo $this->Form->input('Gallery.photo_dir', array('type' => 'hidden'));
echo $this->Form->end(__('Save Article'));
?>
