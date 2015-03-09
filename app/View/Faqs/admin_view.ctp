<?php $this -> Html -> addCrumb(__('Faq'), array('controller' => 'faqs', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Faq'), array('controller' => 'faqs', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Faq')) ?>
<h1><?=h($faq['Faq']['title']); ?></h1>
<div><?php echo nl2br($faq['FaqContent']['content']) ?></div>
<p><small>Created: <?=$faq['Faq']['created_at']; ?></small></p>
<p><?php echo $this -> Html -> link(__('List'), array('action' => 'index')) ?></p>
