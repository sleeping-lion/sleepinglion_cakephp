<?php $this -> Html -> addCrumb(__('User'), array('controller' => 'notices', 'action' => 'index')); ?>
<?php $this -> assign('title', __('User')) ?>
<section id="sl_notice_index" class="table-responsive">
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
				<th class=""><?php echo $this -> App -> getOrderLink($this -> Paginator,'group_id') ?></th>
       <th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
       <th class="sl_t_manage"><?php echo __('Manage') ?></th>       
			</tr>
		</thead>
		<tbody>
			<?php if(count($users)): ?>
    	<?php foreach ($users as $user): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $user['User']['id']; ?></td>
        		<td class=""><?php echo $user['Group']['title'] ?></td>
        		<td class="sl_t_title"><?php echo $this -> Html -> link($user['User']['email'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>
        		<td class="sl_t_created_at"><?=$this -> App -> getFormatDate($user['User']['created_at'], 3); ?></td>
        		<td class="sl_t_manage">
					<?php echo $this -> Html -> link('<span class="glyphicon glyphicon-pencil"></span>'
					,array('action'=>'edit',$user['User']['id']),array('class'=>'btn sl_edit_link','escape'=>false)) ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-trash"></span>',array('action' => 'delete',$user['User']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false,'confirm' => __('Are you sure you wish to delete this article?'))) ?>
				<?php if($user['User']['enable']): ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ok-circle"></span>',array('action' => 'change_status',$user['User']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php else: ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ban-circle"></span>',array('action' => 'change_status',$user['User']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php endif ?>												
        		</td>        		
    		</tr>
    		<?php endforeach ?>
    		<?php unset($users) ?>
    		<?php unset($user) ?>    		
    		<?php else: ?>
    		<tr>
    			<td colspan="3"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> Html -> link(__('New User'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>			
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>
