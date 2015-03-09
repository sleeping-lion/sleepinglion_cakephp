<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'view',$this -> params['id'])) ?>
<?php $this -> assign('title', __('Blog')) ?>
<section id="sl_blog_show" itemscope itemprop="blogPost" itemtype="http://schema.org/Blog">	
	<div class="slboard_content">
		<div class="sl_content_header box_header">
			<h2 itemprop="name"><?php echo $blog['User']['name'] ?></h2>
			<span class="none" itemprop="genre"><?php echo $blog['Blog']['blog_category_id'] ?></span>
			<p>작성자 :   &nbsp;&nbsp;&nbsp; <?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $blog['Blog']['created_at'] ?></span><span class="none" itemprop="dateModified"><?php echo $blog['Blog']['updated_at'] ?></span></p>			
		</div>
		<div class="sl_content_main">
			<div class="sl_content_text" itemprop="text"><?php echo nl2br($blog['BlogContent']['content']); ?></div>
		</div>
	</div>
	<?php echo $this->element('BlogComments/index')?>
	<?php echo $this->element('BlogComments/add')?>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$blog['Blog']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$blog['Blog']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
   </div>
	</div>
</section>

