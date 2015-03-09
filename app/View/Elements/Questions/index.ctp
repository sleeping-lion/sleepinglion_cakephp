<article id="sl_main_question" class="sl_main_list">
	<h3><?php echo __('Question') ?></h3>
	<?php if(count($questions)): ?>
	<ul>
		<?php foreach ($questions as $index => $question): ?>
		<li>
			<?php echo $this -> Html -> link($this->Text->truncate($question['Question']['title'],30), array('controller' => 'questions', 'action' => 'view',$question['Question']['id'])) ?>
			<span class="sl_created_at"><?php echo $this->App->getFormatDate($question['Question']['created_at']) ?></span>					
		</li>
		<?php endforeach ?>
		<?php unset($questions) ?>
		<?php unset($question) ?>
  </ul>
  <?php else: ?>
  <p><?php echo __('No Article') ?></p>
  <?php endif ?>
  <?php echo $this -> Html -> link(__('more'), array('controller' => 'questions', 'action' => 'index'),array('class'=>'more')) ?>
</article>