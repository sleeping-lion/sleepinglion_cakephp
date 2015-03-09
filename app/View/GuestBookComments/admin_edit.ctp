<?php $this->Html->addCrumb(__('Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Edit Guest Book Comment'), array('controller' => 'guest_book_comments', 'action' => 'edit', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Edit Guest Book Comment')) ?>
<?php
echo $this->Form->create('GuestBookComment');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Comment'));
?>