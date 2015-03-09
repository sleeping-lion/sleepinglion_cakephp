<!DOCTYPE html>
<html>
<head>
	<title><?php echo __('Homepage Title') ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this-> fetch('css');
		echo $this->Html->meta('keywords','slboard,php,게시판,무료게시판,공개게시판,cakephp,rails,cms');
	?>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="author" content="Sleeping-Lion" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<?php echo $this->element ('header')?>
<section id="mom">
	<section id="main" class="container">
		<?php if($this->params['controller']!='home'): ?>
		<div class="page-header">
			<h1 itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement"><span itemprop="headline"><?php echo $this -> fetch('title')?></span></h1>
			<?php echo $this->Html->getCrumbList(array('class'=>'breadcrumb'),__('Home')); ?>
		</div>
		<?php else: ?>
<section id="slboard_main" class="slboard_main">
<?php echo $this->element('jumbotron')?>	
</section>
		<?php endif ?>
		<?php if($this->params['controller']!='pages'): ?>		
		<section class="sub_main">
		<?php endif ?>
			<?php echo $this->Session->flash('auth')?>			
			<?php echo $this->Session->flash()?>
			<?php // echo $this->element('ad') ?>
			<?php echo $this->fetch('content')?>
		<?php if($this->params['controller']!='pages'): ?>		
		</section>
		<?php endif ?>
		<?php if($this->params['controller']!='pages'): ?>
		<?php echo $this->element('aside')?>
		<?php endif ?>		
	</section>
</section>
<?php echo $this-> element ('footer')?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"></div>
<?php echo $this->Html->script(array('jquery.tools.min.js','bootstrap.min.js','plugin/jquery.tagcanvas.min.js','common.js')) ?>
<?php echo $this -> fetch('script')?>
</body>
</html>
