<section id="sl_blog_comment_index">	
	<?php if(count($blogComments)): ?>
	<?php foreach ($blogComments as $blogComment): ?>
	<article class="media">
		<?php if(isset($blogComment['photo'])): ?>
		<?php echo $this -> Html -> link($this->Html->image('/files/blog/photo/'.$blog['Blog']['id'].'/thumb_'.$blog['Blog']['photo'], array('alt' =>$blog['Blog']['title'])), array('action' => 'index','?'=>array('id'=>$blog['Blog']['id'])),array('escape'=>false,'class'=>'pull-left')) ?>
		<?php endif ?>
		<div class="media-body">
			<h4 class="media-heading" itemprop="name"><?php if(isset($blogComment['BlogComment']['user_id'])): ?><?php echo $blogComment['User']['name'] ?><?php else: ?><?php echo $blogComment['BlogComment']['name'] ?><?php endif ?></h4>
			<p itemprop="description"><?php echo nl2br($blogComment['BlogComment']['content']) ?></p>
		</div>
	</article>
	<?php endforeach ?>
	<?php unset($blogComments) ?>
	<?php unset($blogComment) ?>	
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>	
	<?php endif ?>
</section>
