<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')); ?>
<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'view', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Blog')); ?>
<section id="sl_blog_show" itemscope itemprop="blogPost" itemtype="http://schema.org/Blog">	
	<div class="slboard_content">
		<div class="sl_content_header box_header">
			<h2 itemprop="name"><?php echo $blog['Blog']['title'] ?></h2>
			<span class="none" itemprop="genre"><%=@blog.blog_category_id %></span>
			<p>작성자 :   &nbsp;&nbsp;&nbsp; <?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $blog['Blog']['created_at'] ?></span><span class="none" itemprop="dateModified"><?php echo $blog['Blog']['updated_at'] ?></span></p>			
		</div>
		<div class="sl_content_main">
			<div class="sl_content_text" itemprop="text"><?php echo nl2br($blog['BlogContent']['content']); ?></div>
		</div>
	</div>	
	<?php if(count($blog_comments)): ?>
	<div class="box">
		<div class="box_header">
			<h2>댓글</h2>
			<div class="box_icon">
				<a href="#" class="btn_minimize"><i class="glyphicon glyphicon-chevron-up"></i></a>
				<a href="#" class="btn_close"><i class="glyphicon glyphicon-remove"></i></a>
			</div>
		</div>
		<div class="box_content">
			<ul class="sl_comment_list_layer media-list">
				
			</ul>
				
		</div>
	</div>
	<?php endif ?>
	<div class="box">
		<div class="box_header">
			<h2>댓글 쓰기</h2>
			<div class="box_icon">
				<a href="#" class="btn_minimize"><i class="glyphicon glyphicon-chevron-up"></i></a>
				<a href="#" class="btn_close"><i class="glyphicon glyphicon-remove"></i></a>
			</div>
		</div>
		<div class="box_content">
			
		</div>
	</div>
	<div id="sl_content_bottom_menu">
		<?php echo $this -> Html -> link(__('List'), array('action' => 'index')); ?>
	</div>
</section>

