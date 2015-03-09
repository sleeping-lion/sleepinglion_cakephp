<?php $this -> Html -> script(array('plugin/jquery.easing.1.3.pack.js','plugin/jquery.tools.min.js','plugin/jquery.uri.js','faqs/index.js'), array('inline' => false)) ?>
<?php $this -> Html -> addCrumb(__('Faq'), array('controller' => 'faqs', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Faq')) ?>
<section id="sl_faq_index">
	<ol class="nav nav-tabs">
		<?php if(count($faqCategories)): ?>
			<?php foreach($faqCategories as $key=>$value): ?>
			<li <?php if($faqCategoryId==$key): ?>class="active"<?php endif ?>>
  			<?php echo $this->Html->link($value,array('controller'=>'faqs','action'=>'index','?'=>array('faq_category_id'=>$key))) ?>
		  </li>
			<?php endforeach ?>
			<?php unset($value) ?>
		<?php else: ?>	
		<li><?php echo __('No Category') ?></li>
		<?php endif ?>
	</ol>
	<article>
		<?php if(count($faqs)): ?>			
		<?php foreach($faqs as $index=>$value): ?>		
		<div class="panel <?php if(isset($faq)): ?><?php if($faq['Faq']['id']==$value['Faq']['id']): ?>panel-primary<?php else: ?>panel-default<?php endif ?><?php else: ?>panel-default<?php endif ?>">
  		<h3 class="panel-heading">
  		<?php echo $this->Html->link($value['Faq']['title'],array('controller'=>'faqs','action'=>'index','?'=>array('id'=>$value['Faq']['id']))) ?>
  		</h3>
  		<?php if(isset($faq)): ?>
			<?php if($faq['Faq']['id']==$value['Faq']['id']): ?>
			<div class="panel-body">
				<div class="faq_content">
				<?php echo nl2br($faq['FaqContent']['content']) ?>
				</div>
				<div class="sl_faq_menu">
					<?php echo $this -> Html -> link(__('Edit'),array('action'=>'edit',$value['Faq']['id']),array('class'=>'btn btn-default')) ?>
					<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$value['Faq']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
				</div>
			</div>
			<?php else: ?>
			<div class="panel-body" style="display:none">
				<div class="faq_content">
					
				</div>
				<div class="sl_faq_menu">
					<?php echo $this -> Html -> link(__('Edit'),array('action'=>'edit',$value['Faq']['id']),array('class'=>'btn btn-default')) ?>
					<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$value['Faq']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
				</div>				
			</div>				
			<?php endif ?>
			<?php else: ?>
			<div class="panel-body" style="display:none">
				<div class="faq_content">
					
				</div>
				<div class="sl_faq_menu">
					<?php echo $this -> Html -> link(__('Edit'),array('action'=>'edit',$value['Faq']['id']),array('class'=>'btn btn-default')) ?>
					<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$value['Faq']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
				</div>				
			</div>
			<?php endif ?>
  	</div>
  	<?php endforeach ?>
		<?php else: ?>
		<p><?php echo __('No Article') ?></p>
		<?php endif ?>
		<?php unset($value) ?>		 	
  </article>	
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add','?'=>array('faq_category_id'=>$faqCategoryId)),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")); ?>		
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>