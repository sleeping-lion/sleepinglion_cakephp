<?php $this -> Html -> addCrumb(__('Guest Books'), array('controller' => 'guest_books', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Add Guest Book'), array('controller' => 'guest_books', 'action' => 'add')); ?>
<?php $this -> assign('title', __('Add Gallery Category')); ?>
<?php
echo $this -> Form -> create('GuestBook');
echo $this -> Form -> input('title');
echo $this -> Form -> input('GuestBookContent.content');
echo $this -> Form -> end(__('Save Article'));
?>