<?php $this -> Html -> addCrumb(__('History'), array('controller' => 'histories', 'action' => 'index')) ?>
<?php $this -> assign('title', __('History')) ?>
<section id="sl_history_index">
	<article class="table-responsive">
	<table width="100%" cellpadding="0" cellspacing="0" class="table table-striped">
		<colgroup>
			<col />
			<col />
			<col />
		</colgroup>
		<thead>
			<tr>
				<th class="sl_t_id"><?php echo $this -> App -> getOrderLink($this -> Paginator,'id') ?></th>
       <th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($histories)): ?>
    	<?php foreach ($histories as $history): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $history['History']['id']; ?></td>
        		<td class="sl_t_title"><?php echo $this -> Html -> link($history['History']['title'], array('controller' => 'histories', 'action' => 'view', $history['History']['id'])); ?></td>
        		<td class="sl_t_created_at"><?=$this -> App -> getFormatDate($history['History']['created_at'], 3); ?></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($histories); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="3"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	</article>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator) ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")) ?>
		<?php echo $this-> element ('search') ?>		
	</div>
</section>
