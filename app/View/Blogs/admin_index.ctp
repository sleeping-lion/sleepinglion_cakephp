<?php $this->Html->addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Blog')) ?>
<section id="sl_blog_index">
	<article class="table-responsive">
  <table width="100%" cellpadding="0" cellspacing="0" class="table slboard_list">
    <colgroup>
      <col width="100px" />
      <col />
      <col width="70px" />
      <col />
      <col />      
    </colgroup>
    <thead>
    	<tr>
				<th class="sl_t_id"><?php echo $this -> App -> getOrderLink($this -> Paginator,'id',__('Id')) ?></th>
       <th class="sl_t_title"><?php echo $this -> App -> getOrderLink($this -> Paginator,'title') ?></th>
       <th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'count',__('Count')) ?></th>
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
       <th class="sl_t_manage"><?php echo __('Manage') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($blogs)): ?>			
    	<?php foreach ($blogs as $blog): ?>
    		<tr>
        		<td><?php echo $blog['Blog']['id']; ?></td>
        		<td>
        			<?php echo $this -> Html -> link($blog['Blog']['title'], array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['id'])); ?>
        		</td>
        		<td></td>
        		<td><p class="sl_registered_date"><?php echo $this -> App -> getFormatDate($blog['Blog']['created_at'], 3); ?></p></td>
        		<td>
					<?php echo $this -> Html -> link('<span class="glyphicon glyphicon-pencil"></span>'
					,array('action'=>'edit',$blog['Blog']['id']),array('class'=>'btn sl_edit_link','escape'=>false)) ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-trash"></span>',array('action' => 'delete',$blog['Blog']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false,'confirm' => __('Are you sure you wish to delete this article?'))) ?>
				<?php if($blog['Blog']['enable']): ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ok-circle"></span>',array('action' => 'change_status',$blog['Blog']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php else: ?>
				<?php echo $this -> Form-> postLink('<span class="glyphicon glyphicon-ban-circle"></span>',array('action' => 'change_status',$blog['Blog']['id']),array('class'=>'btn sl_delete_form_link','escape'=>false)) ?>
				<?php endif ?>			
        		</td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($blogs) ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="3"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?>    		
		</tbody>
	</table>
	</article>
	<div id="sl_bottom_menu">
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>'btn btn-default')) ?>
		<?php echo $this -> App-> pagination($this -> Paginator) ?>
	</div>
</section>


