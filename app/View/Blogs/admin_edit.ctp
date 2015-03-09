<?php $this->Html->addCrumb(__('Blogs'), array('controller' => 'blogs', 'action' => 'index')); ?>
<?php $this->Html->addCrumb(__('Edit Blog'), array('controller' => 'blogs', 'action' => 'edit', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Edit Blog')); ?>
<?php
echo $this->Form->create('Blog');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Article'));
?>