<?php $this->Html->addCrumb(__('Notice Comments'), array('controller' => 'blogs', 'action' => 'index')); ?>
<?php $this->Html->addCrumb(__('Notice Comment'), array('controller' => 'blogs', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Notice Comment')); ?>
<h1><?php echo h($blog['Blog']['title']); ?></h1>
<div><?php echo nl2br($blog['BlogContent']['content']); ?></div>
<p><small>Created: <?php echo $blog['Blog']['created']; ?></small></p>
<p><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></p>
