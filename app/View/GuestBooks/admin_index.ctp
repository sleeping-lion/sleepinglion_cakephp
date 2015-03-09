<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Guest Book')) ?>
<section id="sl_guest_book_index" class="table-responsive">
	<table width="100%" cellpadding="0" cellspacing="0" class="table slboard_list">
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
       <th class="sl_t_name"><?php echo $this -> App -> getOrderLink($this -> Paginator,'name',__('Writer')) ?></th>
       <!-- <th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'count') ?></th>-->       
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
       <th class="sl_t_manage"><?php echo __('Manage') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($guestBooks)): ?>
    	<?php foreach ($guestBooks as $guestBook): ?>
    		<tr>
        		<td><?php echo $guestBook['GuestBook']['id']; ?></td>
        		<td><?php echo $this -> Html -> link($guestBook['GuestBook']['title'], array('controller' => 'guest_books', 'action' => 'view', $guestBook['GuestBook']['id'])); ?></td>
        		<td><p class="sl_registered_date"><?=$this -> App -> getFormatDate($guestBook['GuestBook']['created_at'], 3); ?></p></td>
        		<td></td>
        		<td class="sl_t_manage">
					<?php echo $this -> Html -> link('<span class="glyphicon glyphicon-pencil"></span>'
					,array('action'=>'edit',$guestBook['GuestBook']['id']),array('class'=>'btn sl_edit_link','escape'=>false)) ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-trash"></span>',array('action' => 'delete',$guestBook['GuestBook']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false,'confirm' => __('Are you sure you wish to delete this article?'))) ?>
				<?php if($guestBook['GuestBook']['enable']): ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ok-circle"></span>',array('action' => 'change_status',$guestBook['GuestBook']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php else: ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ban-circle"></span>',array('action' => 'change_status',$guestBook['GuestBook']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php endif ?>											
        		</td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($guestBooks); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="5"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	<div id="sl_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>		
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>
	</div>
</section>


