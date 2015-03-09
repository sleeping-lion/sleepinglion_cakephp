<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo __('Homepage Title') ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap.min.css','admin/index'));
	?>
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<![endif]-->
</head>
<body>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php echo $this->element ('Admin/header');?>
<section id="mom">
	<section id="main" class="container">
		<?php if($this->params['controller']!='home'): ?>
		<div class="page-header">
			<h1 itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement"><span itemprop="headline"><?php echo $this -> fetch('title'); ?></span></h1>
			<?php echo $this->Html->getCrumbList(array('class'=>'breadcrumb'),__('Home')); ?>
		</div>
		<?php else: ?>
				
		<?php endif ?>
		<section class="sub_main">		
			<?php echo $this->Session->flash('auth'); ?>			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->element('ad') ?>
			<?php echo $this->element ('Admin/aside');?>			
			<?php echo $this->fetch('content'); ?>
		</section>
	</section>
</section>
<?php echo $this-> element ('Admin/footer');?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"></div>
<?php echo $this->Html->script(array('jquery.tools.min.js','bootstrap.min.js','common.js')); ?>
<?php echo $this -> fetch('script'); ?>
</body>
</html>
