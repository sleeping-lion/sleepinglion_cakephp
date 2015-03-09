<!DOCTYPE html>
<html>
<head>
	<title><?php echo __('Homepage Title') ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap.min.css','admin/login.css'));
		echo $this-> fetch('css');
		echo $this->Html->meta('keywords','slboard,php,게시판,무료게시판,공개게시판,cakephp,rails');
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
<body id="admin_login_page">
<?php echo $this -> element('Admin/login_header'); ?>
<section id="mom">
	<section id="main" class="container">
		<section class="sub_main">
			<?php echo $this -> fetch('content'); ?>
		</section>
	</section>
</section>
<?php echo $this -> element('Admin/login_footer', array(), array('cache' => true)); ?>
<?php  
// CDN   
// echo $this -> Html -> script(array('/js/jquery-2.1.1.min.js', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js'));
// LOCAL 
 echo $this -> Html -> script(array('/js/jquery-2.1.1.min.js', '/js/bootstrap.min.js'));

?>
<?php echo $this -> fetch('script'); ?>
</body>
</html>
