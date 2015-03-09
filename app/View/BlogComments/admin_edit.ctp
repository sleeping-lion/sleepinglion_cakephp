<?php $this->Html->addCrumb(__('Blog Comment'), array('controller' => 'blog_comments', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Edit Blog Comment'), array('controller' => 'blog_comments', 'action' => 'edit', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Edit Blog Comment')) ?>
<?php
echo $this->Form->create('Blog Comment');
echo $this->Form->input('title');
echo $this->Form->end(__('Save Article'));
?>