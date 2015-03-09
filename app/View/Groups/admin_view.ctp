<?php $this -> Html -> addCrumb(__('Group'), array('controller' => 'notices', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($group['Group']['title'], array('controller' => 'notices', 'action' => 'view', $group['Group']['id'])) ?>
<?php $this -> assign('title', __('Group')) ?>
<section id="slboard_question_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($group['Group']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $group['Group']['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $group['Group']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"></div>
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
