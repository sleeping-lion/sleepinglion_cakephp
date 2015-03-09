<?php $this -> Html -> addCrumb(__('Blog Categories'), array('controller' => 'blog_categories', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Blog Category'), array('controller' => 'blog_categories', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Blog Category')); ?>
<h1><?=h($notice['Notice']['title']); ?></h1>
<div><?php echo nl2br($notice['NoticeContent']['content']); ?></div>
<p><small>Created: <?=$notice['Notice']['created']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
