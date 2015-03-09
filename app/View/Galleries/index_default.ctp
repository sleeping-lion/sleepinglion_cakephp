<?php $this -> Html -> addCrumb(__('Gallery'), array('controller' => 'galleries', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Gallery')); ?>
<section id="sl_gallery_index">
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
			<?php if(count($galleries)): ?>
    	<?php foreach ($galleries as $gallery): ?>
    		<tr>
        		<td class="sl_t_id"><?php echo $gallery['Gallery']['id'] ?></td>
        		<td class="sl_t_title"><?php echo $this -> Html -> link($this->Text->truncate($gallery['Gallery']['title'],50), array('controller' => 'notices', 'action' => 'view', $gallery['Gallery']['id'])) ?></td>
        		<td class="sl_t_name"><?php echo $gallery['User']['name'] ?></td>
        		<!-- <td class="sl_t_count"><?php echo $gallery['Gallery']['count'] ?></td> -->
        		<td class="sl_t_created_at"><?=$this -> App -> getFormatDate($gallery['Gallery']['created_at'], 3); ?></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($galleries); ?>
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
