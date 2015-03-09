<?php $this -> Html -> addCrumb(__('Gallery Categories'), array('controller' => 'gallery_categories', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Gallery Categories')); ?>
<h1><?=h($notice['Notice']['title']); ?></h1>
<div><?php echo nl2br($notice['NoticeContent']['content']); ?></div>
<p><small>Created: <?=$notice['Notice']['created']; ?></small></p>
<p><?=$this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
