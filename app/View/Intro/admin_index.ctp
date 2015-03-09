<?php $this -> Html -> script(array('plugin/jquery.easing.1.3.pack.js','plugin/jquery.tools.min.js','plugin/jquery.fancybox.pack.js','plugin/jquery.uri.js','intro/index.js'), array('inline' => false)) ?>
<?php $this -> Html -> css(array('plugin/jquery.fancybox.css'),array('inline' => false)) ?>
<?php $this->Html->addCrumb(__('Intro'), array('controller' => 'intro', 'action' => 'index')) ?>
<?php $this -> assign('title', __('Intro')) ?>
<section>
	
</section>