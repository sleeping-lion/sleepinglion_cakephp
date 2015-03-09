<?php $this -> Html -> addCrumb(__('Guest Books'), array('controller' => 'guest_books', 'action' => 'index')); ?>
<?php $this -> Html -> addCrumb(__('Edit Guest Book'), array('controller' => 'guest_books', 'action' => 'edit', $this -> params['id'])); ?>
<?php $this -> assign('title', __('Edit Guest Book')); ?>
<?php
echo $this -> Form -> create('GuestBook');
echo $this -> Form -> input('title');
echo $this -> Form -> input('GuestBookContent.content');
echo $this -> Form -> end(__('Save Article'));
?>