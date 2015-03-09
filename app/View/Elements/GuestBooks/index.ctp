<article id="sl_main_guest_book" class="sl_main_list">
	<h3><?php echo __('Guest Book') ?></h3>
	<?php if(count($guest_books)): ?>
	<ul>
		<?php foreach ($guest_books as $index => $quest_book): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($quest_book['GuestBook']['title'],30), array('controller' => 'guest_books', 'action' => 'view',$quest_book['GuestBook']['id'])) ?>
			<span class="sl_created_at"><?php echo $this->App->getFormatDate($quest_book['GuestBook']['created_at']) ?></span>				
		</li>		
		<?php endforeach ?>
		<?php unset($guest_books) ?>
		<?php unset($quest_book) ?>		
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'guest_books', 'action' => 'index'),array('class'=>'more')) ?>
</article>