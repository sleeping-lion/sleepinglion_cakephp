<?php $this->Html->addCrumb(__('Blog Comment'), array('controller' => 'blog_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Blog Comment'), array('controller' => 'blog_comments', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Blog Comment')) ?>
<h1><?php echo h($blog['Blog']['title']); ?></h1>
<div><?php echo nl2br($blog['BlogContent']['content']); ?></div>
<p><small>Created: <?php echo $blog['Blog']['created']; ?></small></p>
<p><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></p>
