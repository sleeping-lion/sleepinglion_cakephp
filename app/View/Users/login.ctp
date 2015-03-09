<?php $this -> Html -> addCrumb('User', array('controller' => 'users', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb('Login', array('controller' => 'users', 'action' => 'login')) ?>
<?php $this -> assign('title', __('Login')) ?>
<div class="users form">
	<?php echo $this -> Form -> create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Please enter your email and password'); ?>
		</legend>
		<?php 
			echo $this -> Form -> input('email', array('type' => 'email', 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
			echo $this -> Form -> input('encrypted_password', array('label'=>__('Password'),'type'=>'password','div' => array('class' => 'form-group'), 'class' => 'form-control'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end(array('label' => __('Login'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary')); ?>
</div>