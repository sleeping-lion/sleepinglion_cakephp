<article id="sl_main_blog" class="sl_main_list">
	<h3><?php echo __('Blog') ?></h3>

	<?php if(isset($blogs)): ?>
	<ul>
		<?php foreach ($blogs as $index => $blog_value): ?>
		<li <?php if(5<$index+1): ?><?php echo 'class="nm"' ?><?php endif ?>>
				<?php echo $this->html->link($this->Html->image('/files/blog/photo/'.$blog_value['Blog']['id'].'/thumb_'.$blog_value['Blog']['photo'], array('alt' =>$blog_value['Blog']['title'])),
				array('controller'=>'blogs','action'=>'view',$blog_value['Blog']['id']),array('escape'=>false)) ?>
			</li>
		<?php endforeach ?>
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'blogs', 'action' => 'index'),array('class'=>'more')) ?> 
</article>