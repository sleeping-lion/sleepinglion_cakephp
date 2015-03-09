<?php $this -> Html -> addCrumb(__('Portfolio'), array('controller' => 'portfolios', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit Portfolio'), array('controller' => 'portfolios', 'action' => 'edit', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Edit Portfolio')); ?>
<?php
echo $this -> Form -> create('GuestBook');
echo $this -> Form -> input('title');
echo $this -> Form -> input('GuestBookContent.content');
echo $this -> Form -> end(__('Save Article'));
?>