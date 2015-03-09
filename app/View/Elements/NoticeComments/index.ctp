<section id="sl_notice_comment_index">	
	<?php if(count($noticeComments)): ?>
	<?php foreach ($noticeComments as $noticeComment): ?>
	<article class="media" itemscope itemprop="blogPost" itemtype="http://schema.org/Blog">
		<?php if(isset($notice['NoticeComment']['photo'])): ?>
		<?php echo $this -> Html -> link($this->Html->image('/files/blog/photo/'.$noticeComment['Blog']['id'].'/thumb_'.$noticeComment['NoticeComment']['photo'], array('alt' =>$noticeComment['NoticeComment']['title'])), array('action' => 'index','?'=>array('id'=>$blog['NoticeComment']['id'])),array('escape'=>false,'class'=>'pull-left')) ?>
		<?php endif ?>
		<div class="media-body">
			<h4 class="media-heading" itemprop="name"><?php echo $this -> Html -> link($noticeComment['NoticeComment']['title'], array('controller' => 'blogs', 'action' => 'view', $noticeComment['NoticeComment']['id'])); ?></h4>
			<p itemprop="description"><?php echo $this -> Html -> link($noticeComment['NoticeComment']['description'], array('controller' => 'blogs', 'action' => 'view', $noticeComment['NoticeComment']['id'])); ?></p>
		</div>
	</article>
	<?php endforeach ?>
	<?php unset($noticeComments) ?>
	<?php unset($noticeComment) ?>			
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>				
	<?php endif ?>
</section>
