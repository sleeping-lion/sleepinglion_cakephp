<?php $this->Html->addCrumb(__('Blogs'), array('controller' => 'blogs', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Blogs')); ?>
<section id="sl_blog_index">
	<article class="table-responsive">
  <table width="100%" cellpadding="0" cellspacing="0" class="table slboard_list">
    <colgroup>
      <col width="100px" />
      <col />
      <col width="70px" />
      <col width="130px" />
    </colgroup>
    <thead>
    	<tr>
      	<th><?php echo $this -> Paginator -> sort('id', 'Id'); ?></th>
				<th><?php echo $this -> Paginator -> sort('title', 'title'); ?></th>
				<th><?php echo $this -> Paginator -> sort('count', 'count'); ?></th>				
				<th><?php echo $this -> Paginator -> sort('created', 'created'); ?></th>
			</tr>
		</thead>
		<tbody>
    	<?php foreach ($blogs as $blog): ?>
    		<tr>
        		<td><?php echo $blog['Blog']['id']; ?></td>
        		<td>
        			<?php echo $this -> Html -> link($blog['Blog']['title'], array('controller' => 'blogs', 'action' => 'view', $blog['Blog']['id'])); ?>
        		</td>
        		<td></td>
        		<td><p class="sl_registered_date"><?php echo $this -> App -> getFormatDate($blog['Blog']['created_at'], 3); ?></p></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($blogs); ?>
		</tbody>
	</table>
	</article>
	<div id="sl_bottom_menu">
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>
		<?php echo $this -> App-> pagination($this -> Paginator); ?>
	</div>
</section>


