<?php $this -> Html -> addCrumb(__('Faq'), array('controller' => 'faqs', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb(__('Edit Faq'), array('controller' => 'faqs', 'action' => 'add')) ?>
<?php $this -> assign('title', __('Edit Faq')) ?>
<?php echo $this -> Form -> create('Faq') ?>
<?php
echo $this -> Form -> input('faq_category_id', array('type' => 'select', 'div' => array('class' => 'form-group'), 'class' => 'form-control','selected'=>$faqCategoryId));
echo $this -> Form -> input('title', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
echo $this -> Form -> input('FaqContent.content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
?>
<?php echo $this -> Form -> end(array('label' => __('Save Article'), 'div' => array('class' => 'form-group'), 'class' => 'btn btn-primary')) ?>