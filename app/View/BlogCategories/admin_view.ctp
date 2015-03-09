<?php $this -> Html -> addCrumb(__('Blog Category'), array('controller' => 'blog_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Blog Category'), array('controller' => 'blog_categories', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Blog Category')) ?>
<h1><?php echo h($blogCategory['BlogCategory']['title']) ?></h1>
<div></div>
<p><small>Created: <?php echo $blogCategory['BlogCategory']['created_at'] ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')) ?></p>
