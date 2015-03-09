<?php $this -> Html -> addCrumb(__('Faq Category'), array('controller' => 'faq_categories', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Add Faq Category'), array('controller' => 'faq_categories', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Add Faq Category')) ?>
<?php
echo $this -> Form -> create('FaqCategory');
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary'));
?>