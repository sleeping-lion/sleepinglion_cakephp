<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'portfolios', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($portfolio['Portfolio']['title'], array('controller' => 'portfolios', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title',$portfolio['Portfolio']['title']) ?>
<section id="sl_portfolio_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($portfolio['Portfolio']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo _('label_name') ?> : <span  itemprop="author"><?php echo $portfolio['User']['name'] ?></span>&nbsp;&nbsp;&nbsp; 
     			<?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $portfolio['Portfolio']['created_at']; ?></span>
     			<span class="none" itemprop="dateModified"><?php echo $portfolio['Portfolio']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($portfolio['PortfolioContent']['content']); ?></div>
    </div>
  </div>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$portfolio['Portfolio']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$portfolio['Portfolio']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
   </div>
	</div>
</section>
