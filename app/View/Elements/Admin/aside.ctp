<aside>
	<nav>
		<ul class="nav nav-pills nav-stacked">				
			<li <?php if($this->params['controller']=='intro'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Intro'), array('controller' => 'intro', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='faqs'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Faq'), array('controller' => 'faqs', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='contacts'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Contact'), array('controller' => 'contacts', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='questions'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?></li>	
			<li <?php if($this->params['controller']=='galleries'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Gallery'), array('controller' => 'galleries', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='blogs'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Blog'), array('controller' => 'blogs', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='notices'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Notice'), array('controller' => 'notices', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='guest_books'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Guest Book'), array('controller' => 'guest_books', 'action' => 'index')) ?></li>
				
			<li <?php if($this->params['controller']=='users'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('User'), array('controller' => 'users', 'action' => 'index')) ?></li>	
  <li role="presentation" class="dropdown <?php if(!strcmp($this->params['controller'],'faq_categories') OR !strcmp($this->params['controller'],'gallery_categories') OR !strcmp($this->params['controller'],'blog_categories') OR !strcmp($this->params['controller'],'groups')): ?><?php echo ' active' ?><?php endif ?>">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
      <?php echo __('Categories') ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu">
			<li <?php if($this->params['controller']=='faq_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Faq Category'), array('controller' => 'faq_categories', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='gallery_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Gallery Category'), array('controller' => 'gallery_categories', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='blog_categories'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Blog Category'), array('controller' => 'blog_categories', 'action' => 'index')) ?></li>
			<li <?php if($this->params['controller']=='groups'): ?>class="active"<?php endif ?>><?=$this -> Html -> link(__('Group'), array('controller' => 'groups', 'action' => 'index')) ?></li>													
    </ul>
  </li>
  				
		</ul>
	</nav>
</aside>