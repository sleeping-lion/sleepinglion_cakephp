<?php $this->Html->addCrumb(__('Notice Comment'), array('controller' => 'notice_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Edit Notice Comment'), array('controller' => 'notice_comments', 'action' => 'edit', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Edit Notice Comment')) ?>
<?php
echo $this->Form->create('NoticeComment');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Article'));
?>