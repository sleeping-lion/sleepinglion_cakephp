<article id="sl_main_notice" class="sl_main_list">
	<h3><?php echo __('Notice') ?></h3>
	<?php if(count($notices)): ?>
	<ul>
		<?php foreach ($notices as $index => $notice): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($notice['Notice']['title'],30), array('controller' => 'notices', 'action' => 'view',$notice['Notice']['id'])) ?>
			<span class="sl_created_at"><?php echo $this->App->getFormatDate($notice['Notice']['created_at']) ?></span>			
		</li>
		<?php endforeach ?>
		<?php unset($notices) ?>
		<?php unset($notice) ?>	
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'notices', 'action' => 'index'),array('class'=>'more')) ?>
</article>