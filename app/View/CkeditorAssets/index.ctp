<?php $this -> Html -> script(array('plugin/jquery.easing.1.3.pack.js','plugin/jquery.tools.min.js','plugin/jquery.fancybox.1.3.4.js','plugin/jquery.uri.js','galleries/index.js'), array('inline' => false)); ?>
<?php $this -> Html -> css(array('plugin/jquery.fancybox-1.3.4.css'),array('inline' => false)); ?>
<?php $this -> Html -> addCrumb(__('Gallery'), array('controller' => 'galleries', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Gallery')); ?>

<section id="sl_gallery_index" class="table-responsive">
	<?php if(isset($galleryCategories)): ?>
	<ol class="nav nav-tabs sl_categories">
		<?php if(count($galleryCategories)): ?>			
		<?php foreach($galleryCategories as $key=>$value): ?>
		<li <?php if($galleryCategoryId==$key): ?>class="active"<?php endif ?>><?php echo $this -> Html -> link($value, array('controller' => 'galleries', 'action' => 'index','?'=>array('gallery_category_id'=>$key))) ?></li>
		<?php endforeach ?>
  	<?php else: ?>	
		<li><?php echo __('No Category') ?></li>
		<?php endif ?>
	</ol>
	<?php endif ?>
		
	<article <?php if(isset($gallery)): ?>itemscope itemtype="http://schema.org/ImageObject"<?php endif ?>>
	<?php if(isset($gallery)):  ?>
 	<div id="sl_gallery_left">
		<span class="none" itemprop="genre"><?php echo $gallery['Gallery']['title'] ?></span>
		<?php echo $this -> Html -> link($this->Html->image('/files/gallery/photo/'.$gallery['Gallery']['id'].'/small_'.$gallery['Gallery']['photo'], array('alt' =>$gallery['Gallery']['title'])).
		'<span id="gallery'.$gallery['Gallery']['id'].'_img'.$gallery['Gallery']['id'].'_span" class="image_caption" itemprop="name">'.$gallery['Gallery']['title'].'</span>', array('action' => 'view',$gallery['Gallery']['id']),array('escape'=>false,'class'=>'simple_image')) ?>
	</div>
	<div id="sl_gallery_right">
		<div itemprop="description"><?php echo nl2br($gallery['Gallery']['content']) ?></div>
		<div class="add_info"> / <span itemprop="dateCreated" datetime="<?php echo $gallery['Gallery']['created_at'] ?>"></span><span class="none" itemprop="dateModified" datetime="<?php echo $gallery['Gallery']['updated_at'] ?>"><?php echo $gallery['Gallery']['created_at'] ?></span></div> 
		<div id="sl_gallery_menu">
			<?php echo $this -> Html -> link(__('Edit'),array('action'=>'edit',$gallery['Gallery']['id']),array('class'=>'btn btn-default')) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$gallery['Gallery']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
		</div>
	</div>
		<!-- <div id="sl_gallery_right">
			<div><?php echo nl2br($gallery['Gallery']['content']) ?></div>
		</div> -->
		<?php unset($gallery) ?>
		<div id="sl_gallery_slide">
		<a class="prev browse left"></a>
			<div class="scrollable">
				<?php if(count($galleries)): ?>	
				<div class="items">
					<?php foreach($galleries as $galleries_c): ?>
					<ul class="item">
						<?php foreach($galleries_c as $gallery): ?>
						<li>
							<?php echo $this -> Html -> link($this->Html->image('/files/gallery/photo/'.$gallery['Gallery']['id'].'/thumb_'.$gallery['Gallery']['photo'], array('alt' =>$gallery['Gallery']['title'])), array('action' => 'index','?'=>array('id'=>$gallery['Gallery']['id'])),array('escape'=>false)) ?>
						</li>
						<?php endforeach ?>
					</ul>
					<?php endforeach ?>
				</div>
			<?php else: ?>
			<ul>
				<li><?php echo __('No Article') ?></li>
			</ul>
			<?php endif ?>
			<?php unset($galleries) ?>
			<?php unset($galleries_c) ?>			
			<?php unset($gallery) ?>					
			</div>
			<a class="next browse right"></a>			
		</div>
	</article>
	<?php else: ?>
	<p><?php echo __('No Article') ?></p>
	<?php endif ?>	
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add','?'=>array('gallery_category_id'=>$galleryCategoryId)),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")) ?>
		<?php echo $this-> element ('search');?>		
	</div>
</section>