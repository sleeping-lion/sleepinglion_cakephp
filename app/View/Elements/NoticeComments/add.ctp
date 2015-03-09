<?php echo $this->Form->create('NoticeComment',array('controller'=>'guest_book_comments','action'=>'add')); ?> 
<?php if(!$this->Session->check('Auth.User')): ?>
echo $this->Form->input('name',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('email',array('div'=>array('class'=>'form-group'),'class'=>'form-control'));
echo $this->Form->input('password',array('type'=>'password','div'=>array('class'=>'form-group'),'class'=>'form-control'));
<?php endif ?>
<?php
echo $this->Form->input('notice_id',array('type'=>'hidden','value'=>$notice['Notice']['id']));
echo $this->Form->input('content',array('div'=>array('class'=>'form-group'),'class'=>'form-control','id'=>'sl_content'));
echo $this->Form->end(array('label'=>__('Save Comment'),'div'=>array('class'=>'form-group'),'class'=>'btn btn-primary'));
?>