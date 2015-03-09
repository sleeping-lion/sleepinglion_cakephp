<?php $this -> Html -> addCrumb(__('Faq Category'), array('controller' => 'faq_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Faq Category'), array('controller' => 'faq_categories', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Faq Category')) ?>
<h1><?=h($faqCategory['FaqCategory']['title']); ?></h1>
<div></div>
<p><small>Created: <?php echo $faqCategory['Notice']['created_at']; ?></small></p>
<p><?=$this -> Html -> link(__('List'), array('action' => 'index')); ?></p>
