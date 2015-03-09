<?php $this -> Html -> addCrumb(__('History'), array('controller' => 'histories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($history['History']['title'], array('controller' => 'histories', 'action' => 'view',$this -> params['id'])) ?>
<?php $this -> assign('title', $history['History']['title']) ?>
<section id="slboard_history_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($history['History']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo _('label_name') ?> : <span  itemprop="author"><?php echo $history['User']['name'] ?></span>&nbsp;&nbsp;&nbsp; 
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $history['History']['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $history['History']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($history['History']['content']); ?></div>
    </div>
  </div>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$history['History']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$history['History']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
   </div>
	</div>
</section>
