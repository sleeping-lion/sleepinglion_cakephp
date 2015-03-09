<article id="sl_main_blog" class="sl_main_list">
	<h3><?php echo __('Blog') ?></h3>
	<?php if(count($blogs)): ?>
	<ul>
		<?php foreach ($blogs as $index => $blog): ?>
		<li <?php if(5<$index+1): ?><?php echo 'class="nm"' ?><?php endif ?>>
				<?php echo $this->html->link($this->Html->image('/files/blog/photo/'.$blog['Blog']['id'].'/thumb_'.$blog['Blog']['photo'], array('alt' =>$blog['Blog']['title'])),
				array('controller'=>'blogs','action'=>'view',$blog['Blog']['id']),array('escape'=>false)) ?>
			</li>
		<?php endforeach ?>
		<?php unset($blogs) ?>
		<?php unset($blog) ?>
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'blogs', 'action' => 'index'),array('class'=>'more')) ?> 
</article>