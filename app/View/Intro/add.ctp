<?php $this->Html->addCrumb(_('Intro'), array('controller' => 'galleries', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(_('new Intro'), array('controller' => 'galleries', 'action' => 'new')) ?>
<?php
echo $this->Form->create('Intro');
echo $this->Form->input('gallery_category_id',array('type'=>'select','div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('title',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('Gallery.photo', array('type' => 'file','div'=>array('class'=>'form-group')));
echo $this->Form->input('Gallery.photo_dir', array('type' => 'hidden','div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->end(array('label'=>_('Save Intro'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>
