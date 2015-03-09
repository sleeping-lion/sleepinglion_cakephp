<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'notices', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb($notice['Notice']['title'], array('controller' => 'portfolios', 'action' => 'view', $notice['Notice']['id'])); ?>
<?php $this -> assign('title', $notice['Notice']['title']); ?>
<section id="slboard_question_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($notice['Notice']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo _('label_name') ?> : <span  itemprop="author"><?php echo $notice['User']['name'] ?></span>&nbsp;&nbsp;&nbsp; 
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $notice['Notice']['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $notice['Notice']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($notice['NoticeContent']['content']); ?></div>
    </div>
  </div>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit'),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Html -> link(__('Delete'), array('action' => 'delete'),array('class'=>"btn btn-default")) ?>
   </div>
	</div>
</section>
