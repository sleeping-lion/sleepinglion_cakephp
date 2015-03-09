<div class="jumbotron hero-unit">
	<h1><?php echo __d('site','Main Title') ?></h1>
	<p class="lead"><?php echo __d('site','Main Description') ?></p>
	<?php echo $this->html->link(__d('site','SLBoard Dream'), array('controller'=>'pages','action'=>'popup'),array('class'=>"modal_link btn btn-large btn-success",'data-target'=>"#myModal",'data-toggle'=>"modal"))  ?>
</div>