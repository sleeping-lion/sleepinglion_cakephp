<?php $this -> Html -> addCrumb(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Guest Book')) ?>
<section id="sl_guest_book_index">
	<article class="table-responsive">
	<table width="100%" cellpadding="0" cellspacing="0" class="table table-striped">
		<colgroup>
			<col />
			<col />
			<col />
			<!-- <col />-->			
			<col />			
		</colgroup>
		<thead>
			<tr>	
				<th class="sl_t_id"><?php echo $this -> App -> getOrderLink($this -> Paginator,'id') ?></th>
       <th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
       <th class="sl_t_name"><?php echo $this -> App -> getOrderLink($this -> Paginator,'name',__('Writer')) ?></th>
       <!-- <th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'count') ?></th>-->       
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($guestBooks)): ?>
    	<?php foreach ($guestBooks as $guestBook): ?>
    		<tr>
        		<td><?php echo $guestBook['GuestBook']['id']; ?></td>
        		<td>
            		<?php echo $this -> Html -> link($this->Text->truncate($guestBook['GuestBook']['title'],50).$this->App->getFormatCommentCount($guestBook['GuestBook']['guest_book_comments_count']), array('controller' => 'guest_books', 'action' => 'view', $guestBook['GuestBook']['id'])); ?>
        		</td>
        		<td><?php if($guestBook['GuestBook']['user_id']): ?><?php echo $guestBook['User']['name'] ?><?php else: ?><?php echo $guestBook['GuestBook']['name'] ?><?php endif ?></td>
        		<!-- <td><?php echo $guestBook['GuestBook']['count'] ?></td> -->
        		<td><p class="sl_registered_date"><?=$this -> App -> getFormatDate($guestBook['GuestBook']['created_at'], 3); ?></p></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($guestBooks); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="4"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?> 
		</tbody>
	</table>
	</article>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator) ?>
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('rel'=>'nofollow','class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")) ?>
		<?php echo $this-> element ('search') ?>		
	</div>
</section>
