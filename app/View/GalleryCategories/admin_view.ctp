<?php $this -> Html -> addCrumb(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Gallery Category')) ?>
<h1><?=h($galleryCategory['GalleryCategory']['title']) ?></h1>
<div></div>
<p><small>Created: <?php echo $galleryCategory['GalleryCategory']['created_at']; ?></small></p>
<p><?=$this -> Html -> link(__('List'), array('action' => 'index')) ?></p>
