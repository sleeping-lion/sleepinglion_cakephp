<section id="sl_guest_book_comment_index">	
	<?php if(count($guestBookComments)): ?>
	<?php foreach ($guestBookComments as $guestBookComment): ?>
	<article class="media well well-sm">
		<?php if(isset($guestBookComment['photo'])): ?>
		<?php echo $this -> Html -> link($this->Html->image('/files/blog/photo/'.$blog['Blog']['id'].'/thumb_'.$blog['Blog']['photo'], array('alt' =>$blog['Blog']['title'])), array('action' => 'index','?'=>array('id'=>$blog['Blog']['id'])),array('escape'=>false,'class'=>'pull-left')) ?>
		<?php endif ?>
		<div class="media-body">			
			<h4 class="media-heading" itemprop="name"><?php if(isset($guestBookComment['GuestBookComment']['user_id'])): ?><?php echo $guestBookComment['User']['name'] ?><?php else: ?><?php echo $guestBookComment['GuestBookComment']['name'] ?><?php endif ?></h4>
			<p itemprop="description"><?php echo nl2br($guestBookComment['GuestBookComment']['content']) ?></p>
		</div>
	</article>
	<?php endforeach ?>
	<?php unset($guestBookComments) ?>
	<?php unset($guestBookComment) ?>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>				
	<?php endif ?>
</section>
