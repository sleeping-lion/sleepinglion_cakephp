<header>
	<div class="pull-right">
		<?php echo $this -> Html -> link($this->Session->Read('Auth.User.name'),array('controller'=>'users','action'=>'edit',$this->Session->Read('Auth.User.id'))) ?><?php echo __('Welcome') ?>
		<?php echo $this -> Html -> link(__('Logout'),array('controller'=>'users','action'=>'admin_logout')) ?>
  </div>	
  <h1 class="pull-left"><a href="/admin">잠자는사자의 집 관리자</a></h1>	
</header>
