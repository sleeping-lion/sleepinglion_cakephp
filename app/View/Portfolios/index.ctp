<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'portfolios', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Portfolio')); ?>
<section id="sl_portfolio_index">
	<?php if(count($portfolios)): ?>	
  <?php foreach($portfolios as $portfolio): ?>
  <article class="media">
		 <?php echo $this -> Html -> link($this->Html->image('/files/portfolio/photo/'.$portfolio['Portfolio']['id'].'/thumb_'.$portfolio['Portfolio']['photo'], array('alt' =>$portfolio['Portfolio']['title'])), array('action' => 'index','?'=>array('id'=>$portfolio['Portfolio']['id'])),array('escape'=>false,'class'=>'pull-left')) ?> 
    <div class="media-body">
      <h4 class="media-heading"><?php echo $this -> Html -> link($portfolio['Portfolio']['title'], array('controller' => 'portfolios', 'action' => 'view', $portfolio['Portfolio']['id'])); ?></h4>
      <?php echo $this -> Html -> link($portfolio['PortfolioContent']['content'], array('controller' => 'portfolios', 'action' => 'view', $portfolio['Portfolio']['id'])); ?>
      <br />
      <?php echo $this -> Html -> link($portfolio['Portfolio']['url'],$portfolio['Portfolio']['url'],array('target'=>'_blank')); ?>
    </div>
  </article>
  <?php endforeach ?>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")); ?>
		<?php echo $this-> element ('search');?>		
	</div>
</section>