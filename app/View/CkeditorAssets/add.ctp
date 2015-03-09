<?php $this->Html->addCrumb(__('Ckeditor Asset'), array('controller' => 'ckeditor_assets', 'action' => 'index')); ?>
<?php $this->Html->addCrumb(__('Add Ckeditor Asset'), array('controller' => 'ckeditor_assets', 'action' => 'add')); ?>
<?php $this -> assign('title', __('Add Ckeditor Asset')); ?>
<?php echo $this->Form->create('CkeditorAsset',array('type'=>'file','action'=>'add?CKEditorFuncNum=1')); ?>
<?php
echo $this->Form->input('upload', array('type' => 'file','name'=>'upload','div'=>array('class'=>'form-group')));
echo $this->Form->end(array('label'=>__('Save Ckeditor Asset'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>
