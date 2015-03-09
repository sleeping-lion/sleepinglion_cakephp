<?php $this -> Html -> addCrumb(__('Notices'), array('controller' => 'notices', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Notice'), array('controller' => 'notices', 'action' => 'view', $notice['Notice']['id'])); ?>
<?php $this -> assign('title', __('Notice')); ?>
<section id="slboard_question_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($notice['Notice']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo __('Writer') ?> : <span  itemprop="author"><?php echo $notice['User']['name'] ?></span>&nbsp;&nbsp;&nbsp; 
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $notice['Notice']['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $notice['Notice']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($notice['NoticeContent']['content']); ?></div>
    </div>
  </div>
	<?php //echo $this->element('NoticeComments/index')?>
	<?php //echo $this->element('NoticeComments/add')?>  
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$notice['Notice']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$notice['Notice']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
   </div>
	</div>
</section>
