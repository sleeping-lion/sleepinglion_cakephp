<?php $this -> Html -> addCrumb(__('Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Contacts')); ?>
<section id="sl_question_index" class="table-responsive">
  <table width="100%" cellpadding="0" cellspacing="0" class="table slboard_list">
    <colgroup>
      <col width="100px" />
      <col />
      <col width="70px" />
      <col width="130px" />
    </colgroup>
    <thead>
    	<tr>
      	<th><?php echo $this -> Paginator -> sort('id', _('Id')); ?></th>
				<th><?php echo $this -> Paginator -> sort('title', _('title')); ?></th>
				<th><?php echo $this -> Paginator -> sort('count', _('count')); ?></th>				
				<th><?php echo $this -> Paginator -> sort('created', _('created')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($questions)): ?>
    	<?php foreach ($questions as $question): ?>
    		<tr>
        		<td><?php echo $question['Question']['id']; ?></td>
        		<td>
        			<?php echo $this -> Html -> link($question['Question']['title'], array('controller' => 'questions', 'action' => 'view', $question['Question']['id'])); ?>
        		</td>
        		<td><?php echo $question['Question']['count'] ?></td>
        		<td><p class="sl_registered_date"><?php echo $this -> App -> getFormatDate($question['Question']['created_at'], 3); ?></p></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($questions); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="4"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?>
		</tbody>
	</table>
	<div id="sl_bottom_menu">
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add')); ?>
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>


