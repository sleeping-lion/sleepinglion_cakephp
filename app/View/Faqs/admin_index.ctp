<?php $this -> Html -> addCrumb(__('Faqs'), array('controller' => 'faqs', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Faqs')); ?>
<section id="sl_faq_index">
	<article class="table-responsive">
	<table width="100%" cellpadding="0" cellspacing="0" class="table slboard_list">
		<colgroup>
			<col width="50px" />
			<col />
			<col width="100px" />
		</colgroup>
		<thead>
			<tr>
				<th><?php echo $this -> Paginator -> sort('id', 'Id'); ?></th>
       <th><?php echo $this -> Paginator -> sort('title', 'title'); ?></th>
       <th><?php echo $this -> Paginator -> sort('created', 'created'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($faqs)): ?>
    	<?php foreach ($faqs as $faq): ?>
    		<tr>
        		<td><?php echo $faq['Faq']['id']; ?></td>
        		<td><?php echo $this -> Html -> link($faq['Faq']['title'], array('controller' => 'faqs', 'action' => 'view', $faq['Faq']['id'])); ?></td>
        		<td><p class="sl_registered_date"><?=$this -> App -> getFormatDate($faq['Faq']['created_at'], 3); ?></p></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($faqs); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="3"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	</article>
	<div id="sl_bottom_menu">
		<?php echo $this -> Html -> link(__('New Faq'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>


