<article id="sl_main_faq" class="sl_main_list">
	<h3><?php echo __('Faq') ?></h3>
	<?php if(count($faqs)): ?>
	<ul>
		<?php foreach ($faqs as $index => $faq): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($faq['Faq']['title'],30), array('controller' => 'notices', 'action' => 'view',$faq['Faq']['id'])) ?>
			<span class="sl_created_at"><?php echo $this->App->getFormatDate($faq['Faq']['created_at']) ?></span>			
		</li>
		<?php endforeach ?>
		<?php unset($faqs) ?>
		<?php unset($faq) ?>		
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'faqs', 'action' => 'index'),array('class'=>'more')) ?>
</article>