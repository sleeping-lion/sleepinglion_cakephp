<?php $this -> Html -> addCrumb(__('Question'), array('controller' => 'questions', 'action' => 'index')) ?>
<?php $this -> Html -> addCrumb($question['Question']['title'], array('controller' => 'questions', 'action' => 'view', $question['Question']['id'])) ?>
<?php $this -> assign('title', $question['Question']['title']) ?>
<section id="slboard_question_show">
  <div class="slboard_content">
    <div class="sl_content_header">
      <h3 itemprop="name"><?php echo h($question['Question']['title']); ?></h3>
    </div>
    <div class="sl_content_main">
     		<p class="sl_content_info"><?php echo __('Writer') ?> : <span  itemprop="author"><?php if($question['Question']['user_id']): ?><?php echo $question['User']['name'] ?><?php else: ?><?php echo $question['Question']['name'] ?><?php endif ?></span>&nbsp;&nbsp;&nbsp; <?php echo __('Created_at') ?> : <span itemprop="dateCreated"><?php echo $question['Question']['created_at']; ?></span><span class="none" itemprop="dateModified"><?php echo $question['Question']['updated_at'] ?></span></p>    	
      <div class="sl_content_text" itemprop="text"><?php echo nl2br($question['QuestionContent']['content']); ?></div>
    </div>
  </div>
	<?php echo $this->element('QuestionComments/index')?>
	<?php echo $this->element('QuestionComments/add')?>
	<div id="sl_content_bottom_buttons">
		<div class="pull-left">
			<?php echo $this -> Html -> link(__('List'), array('action' => 'index'),array('class'=>"btn btn-default")) ?>
		</div>
		<div class="pull-right">
			<?php if($this->Session->check('Auth.User') AND ($question['Question']['user_id']==$this->Session->read('Auth.User.id'))): ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit',$question['Question']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Form-> postLink(__('Delete'),array('action' => 'delete',$question['Question']['id']),array('class'=>'btn btn-default','confirm' => __('Are you sure you wish to delete this article?'))) ?>
			<?php else: ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'check_password',$question['Question']['id']),array('class'=>"btn btn-default")) ?>
			<?php echo $this -> Html-> link(__('Delete'),array('action' => 'check_password',$question['Question']['id'],'?'=>array('delete'=>true)),array('class'=>'btn btn-default')) ?>
			<?php endif ?>
   </div>
	</div>
</section>
