<section id="sl_question_comment_index">	
	<?php if(count($questionComments)): ?>
	<?php foreach ($questionComments as $questionComment): ?>
	<article class="media well">
		<?php if(isset($questionComment['photo'])): ?>
		<?php echo $this -> Html -> link($this->Html->image('/files/blog/photo/'.$questionComment['id'].'/thumb_'.$questionComment['photo'], array('alt' =>$questionComment['title'])), array('action' => 'index','?'=>array('id'=>$questionComment['id'])),array('escape'=>false,'class'=>'pull-left')) ?>
		<?php endif ?>
		<div class="media-body">
			<h4 class="media-heading" itemprop="name"><?php if(isset($questionComment['QuestionComment']['user_id'])): ?><?php echo $questionComment['User']['name'] ?><?php else: ?><?php echo $questionComment['QuestionComment']['name'] ?><?php endif ?></h4>
			<p itemprop="description"><?php echo nl2br($questionComment['QuestionComment']['content']) ?></p>
		</div>
	</article>
	<?php endforeach ?>
	<?php unset($questionComments) ?>	
	<?php unset($questionComment) ?>
	<div id="sl_index_bottom_menu">
		<?php echo $this -> App -> pagination($this -> Paginator); ?>
	</div>
	<?php endif ?>
</section>
