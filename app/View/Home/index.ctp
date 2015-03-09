<?php $this -> Html -> script(array('index.js'), array('inline' => false)); ?>
<section id="main_main">
	<section class="row">	
		<?php echo $this->element('Notices/index') ?>
		<?php echo $this->element('Questions/index') ?>
		<?php echo $this->element('GuestBooks/index') ?>
	</section>
	<section class="row">
		<?php echo $this->element('Galleries/index') ?>
		<?php echo $this->element('Blogs/index') ?>
	</section>
</section>