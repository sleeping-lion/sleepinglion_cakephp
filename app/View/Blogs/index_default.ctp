<?php $this -> Html -> addCrumb(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Blog')) ?>
<section id="sl_notice_index">
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
       <th class="sl_t_name"><?php echo $this -> App -> getOrderLink($this -> Paginator,'User.name',__('Writer')) ?></th>
       <!-- <th class="sl_t_count"><?php echo $this -> App -> getOrderLink($this -> Paginator,'count') ?></th> -->
       <th class="sl_t_created_at"><?php echo $this -> App -> getOrderLink($this -> Paginator,'created_at') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($blogs)): ?>
    	<?php foreach ($blogs as $blog): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $blog['Blog']['id'] ?></td>
        		<td class="sl_t_title"><?php echo $this -> Html -> link($this->Text->truncate($blog['Blog']['title'],50), array('controller' => 'faqs', 'action' => 'view', $blog['Blog']['id'])) ?></td>
        		<td class="sl_t_name"><?php echo $blog['User']['name'] ?></td>
        		<!-- <td class="sl_t_count"><?php echo $blog['Blog']['count'] ?></td> -->
        		<td class="sl_t_created_at"><?=$this -> App -> getFormatDate($blog['Blog']['created_at'], 3); ?></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($blogs); ?>
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
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>"btn btn-default btn btn-default col-xs-12 col-md-2")) ?>
		<?php echo $this-> element ('search') ?>		
	</div>
</section>
