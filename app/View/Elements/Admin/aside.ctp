<aside>
	<nav>
		<ul class="nav nav-pills nav-stacked">
			<li <?php if($this->params['controller']=='intro'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Intro'), array('controller' => 'intro', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='faq_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Faq Category'), array('controller' => 'faq_categories', 'action' => 'index')); ?></li>										
			<li <?php if($this->params['controller']=='faqs'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('FAQ'), array('controller' => 'faqs', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='contacts'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Contact'), array('controller' => 'contacts', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='questions'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Question'), array('controller' => 'questions', 'action' => 'index')); ?></li>	
			<li <?php if($this->params['controller']=='gallery_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='galleries'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Gallery'), array('controller' => 'galleries', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='blog_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Blog Category'), array('controller' => 'blog_categories', 'action' => 'index')); ?></li>				
			<li <?php if($this->params['controller']=='blogs'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Blog'), array('controller' => 'blogs', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='notices'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('Notice'), array('controller' => 'notices', 'action' => 'index')); ?></li>
			<li <?php if($this->params['controller']=='guest_books'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(_('GuestBook'), array('controller' => 'guest_books', 'action' => 'index')); ?></li>
		</ul>
	</nav>
</aside>