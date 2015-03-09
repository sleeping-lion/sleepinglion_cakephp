<?php $this -> Html -> addCrumb(__('Group'), array('controller' => 'groups', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Group')) ?>
<section id="sl_group_index" class="table-responsive">
	<table width="100%" cellpadding="0" cellspacing="0" class="table table-striped">
		<colgroup>
			<col />
			<col />
			<col />
			<col />
			<col />			
		</colgroup>
		<thead>
			<tr>
				<th class="sl_t_id"><?php echo $this -> App -> getOrderLink($this -> Paginator,'id') ?></th>
       <th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
       <th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'blogs_count',__('Child Count')) ?></th>       
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
       <th class="sl_t_manage"><?php echo __('Manage') ?></th>       
			</tr>
		</thead>
		<tbody>
			<?php if(count($groups)): ?>
    	<?php foreach ($groups as $group): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $group['Group']['id']; ?></td>
        		<td class="sl_t_title"><?php echo $this -> Html -> link($group['Group']['title'], array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])); ?></td>
        		<td><?php echo $group['Group']['users_count'] ?></td>        		
        		<td class="sl_t_created_at"><?=$this -> App -> getFormatDate($group['Group']['created_at'], 3); ?></td>
        		<td class="sl_t_manage">
					<?php echo $this -> Html -> link('<span class="glyphicon glyphicon-pencil"></span>'
					,array('action'=>'edit',$group['Group']['id']),array('class'=>'btn sl_edit_link','escape'=>false)) ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-trash"></span>',array('action' => 'delete',$group['Group']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false,'confirm' => __('Are you sure you wish to delete this article?'))) ?>
				<?php if($group['Group']['enable']): ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ok-circle"></span>',array('action' => 'change_status',$group['Group']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php else: ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ban-circle"></span>',array('action' => 'change_status',$group['Group']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php endif ?>											
        		</td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($groups) ?>
    		<?php unset($group) ?>    		
    		<?php else: ?>
    		<tr>
    			<td colspan="5"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>			
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>
