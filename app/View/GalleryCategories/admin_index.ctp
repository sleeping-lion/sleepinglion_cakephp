<?php $this -> Html -> addCrumb(__('Gallery Categories'), array('controller' => 'gallery_categories', 'action' => 'index')); ?>
<?php $this -> assign('title', __('Gallery Categories')); ?>
<section id="sl_gallery_category_index">
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
      	<th><?php echo $this -> Paginator -> sort('id', _('Id')); ?></th>
				<th><?php echo $this -> Paginator -> sort('title', _('title')); ?></th>
				<th><?php echo $this -> Paginator -> sort('count', _('count')); ?></th>				
				<th><?php echo $this -> Paginator -> sort('created', _('created')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($galleryCategories)): ?>			
    	<?php foreach ($galleryCategories as $galleryCategory): ?>
    		<tr>
        		<td><?php echo $galleryCategory['GalleryCategory']['id']; ?></td>
        		<td>
        			<?php echo $this -> Html -> link($galleryCategory['GalleryCategory']['title'], array('controller' => 'notices', 'action' => 'view', $galleryCategory['GalleryCategory']['id'])); ?>
        		</td>
        		<td></td>
        		<td><p class="sl_registered_date"><?php echo $this -> App -> getFormatDate($galleryCategory['GalleryCategory']['created_at'], 3); ?></p></td>
    		</tr>
    		<?php endforeach; ?>
    		<?php unset($notices); ?>
    		<?php else: ?>
    		<tr>
    			<td colspan="4"><?php echo __('No Article') ?></td>
    		</tr>
    		<?php endif ?>    		
		</tbody>
	</table>
	</article>
	<div id="sl_bottom_menu">
		<?php echo $this -> Html -> link(__('New Article'), array('action' => 'add'),array('class'=>'btn btn-default')); ?>
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
</section>


