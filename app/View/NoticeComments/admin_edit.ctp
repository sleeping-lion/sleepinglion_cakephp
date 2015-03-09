<?php $this->Html->addCrumb(__('Notice Comments'), array('controller' => 'blogs', 'action' => 'index')); ?>
<?php $this->Html->addCrumb(__('Edit Notice Comment'), array('controller' => 'blogs', 'action' => 'edit', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Edit Notice Comment')); ?>
<?php
echo $this->Form->create('Blog');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Article'));
?>