<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Blog')) ?>
<section id="sl_blog_index" itemscope itemprop="blogPosts" itemtype="http://schema.org/Blog">
	<ol class="nav nav-tabs sl_categories">
		<?php if(isset($blogCategories)): ?>
			<?php foreach($blogCategories as $key=>$value): ?>
			<li <?php if($key==$blogCategoryId): ?>class="active"<?php endif ?>>
				<?php echo $this -> Html -> link($value,array('action'=>'index','?'=>array('blog_category_id'=>$key))); ?>
		  </li>
			<?php endforeach ?>
		<?php else: ?>
		<li><?php echo _('No Article') ?></li>
		<?php endif ?>
	</ol>
	<?php if(count($blogs)): ?>
	<?php foreach ($blogs as $blog): ?>
	<article class="media" itemscope itemprop="blogPost" itemtype="http://schema.org/Blog">
		<?php if(isset($blog['Blog']['photo'])): ?>
		<?php echo $this -> Html -> link($this->Html->image('/files/blog/photo/'.$blog['Blog']['id'].'/thumb_'.$blog['Blog']['photo'], array('alt' =>$blog['Blog']['title'])), array('action' => 'view',$blog['Blog']['id']),array('escape'=>false,'class'=>'pull-left')) ?>
		<?php endif ?>
		<div class="media-body">
			<h4 class="media-heading" itemprop="name"><?php echo $this -> Html -> link($blog['Blog']['title'].$this->App->getFormatCommentCount($blog['Blog']['blog_comments_count']), array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['id'])); ?></h4>
			<p itemprop="description"><?php echo $this -> Html -> link($blog['Blog']['description'], array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['id'])); ?></p>
		</div>
	</article>
	<?php endforeach; ?>
	<?php unset($blogs); ?>	
	<?php else: ?>
	<article>
	<p><?php echo __('No Article') ?></p>
	</article>
	<?php endif ?>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add','?'=>array('blog_category_id'=>$blogCategoryId)),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")); ?>
		<?php echo $this-> element ('search');?>		
	</div>
</section>
