<?php $this -> Html -> script(array('plugin/jquery.easing.1.3.pack.js','plugin/jquery.tools.min.js','plugin/jquery.fancybox.pack.js','plugin/jquery.uri.js','intro/index.js'), array('inline' => false)); ?>
<?php $this -> Html -> css(array('plugin/jquery.fancybox.css'),array('inline' => false)); ?>
<?php $this->Html->addCrumb(__('Intro'), array('controller' => 'intro', 'action' => 'index')); ?>
<section id="sl_intro_index">
	<?php if(isset($user['User'])): ?>
  <article id="intro_main_content" itemscope itemtype="http://schema.org/Person">
    <?php if($userPhoto['UserPhoto']['photo']): ?>	
    <div id="sl_intro_left">
		<?php echo $this -> Html -> link($this->Html->image('/files/user_photo/photo/'.$userPhoto['UserPhoto']['id'].'/small_'.$userPhoto['UserPhoto']['photo'], array('alt' =>$user['User']['name'])),'/files/user_photo/photo/'.$userPhoto['UserPhoto']['id'].'/small_'.$userPhoto['UserPhoto']['photo'],array('escape'=>false,'class'=>'simple_image')) ?>
    </div>
    <?php endif ?>
    <div id="sl_intro_right">
      <h3><?php if($user['User']['alternate_name']): ?><?php echo $user['User']['alternate_name']; ?><?php else: ?><?php echo $user['User']['name']; ?><?php endif ?>  극비 신상공개!!!</h3>
      <dl>
        <dt>이름</dt>
        <dd itemprop="name"><?php echo $user['User']['name']; ?> <?php if($user['User']['alternate_name']): ?>,  보통 <span itemprop="additionalName"><?php echo $user['User']['alternate_name']; ?></span>로 불리운다<?php endif ?></dd>
        <?php if($user['User']['gender']): ?>
        <dt>성별</dt>
        <dd itemprop="gender"><?php echo $user['User']['gender']; ?></dd>
        <?php endif ?>
        <?php if($user['User']['birth_date']): ?>
        <dt>생일</dt>
        <dd itemprop="birthDate" datetime="<?php echo $user['User']['birthdate']; ?>"><?php echo $user['User']['birthdate']; ?></dd>
        <?php endif ?>
        <?php if($user['User']['job_title']): ?>
        <dt>직업</dt>
        <dd itemprop="jobTitle"><?php echo $user['User']['job_title']; ?></dd>
        <?php endif ?>     
        <dt>키</dt>
        <dd>180cm</dd>
        <dt>몸무게</dt>
        <dd>90kg</dd>
        <dt>좋아하는것</dt>
        <dd>개, 아이들, 철도, 프로그래밍, 리눅스, 중국요리</dd>
        <dt>싫어하는것</dt>
        <dd>자동차, 학교, 군대, 윈도우, 주한미군</dd>
      </dl>
      <?php if($user['User']['url']): ?>
      <span class="none" itemprop="url"><?php echo $user['User']['url']; ?></span>
      <?php endif ?>
    </div>
  </article>
  <?php else: ?>
  <p>사용자가 없습니다.</p>
  <?php endif ?>
		<div id="sl_gallery_slide">
		<a class="prev browse left"></a>
			<div class="scrollable">
				<?php if(count($userPhotos)): ?>	
				<div class="items">
					<?php foreach($userPhotos as $userPhotos_c): ?>					
					<ul class="item">
						<?php foreach($userPhotos_c as $userPhoto): ?>
						<li>
							<?php echo $this -> Html -> link($this->Html->image('/files/user_photo/photo/'.$userPhoto['UserPhoto']['id'].'/thumb_'.$userPhoto['UserPhoto']['photo'], array('alt' =>$user['User']['name'])), array('action' => 'index','?'=>array('id'=>$userPhoto['UserPhoto']['id'])),array('escape'=>false)) ?>
						</li>
						<?php endforeach ?>
					</ul>
					<?php endforeach ?>					
				</div>
			<?php else: ?>
			<ul>
				<li><?php echo __('No Article') ?></li>
			</ul>
			<?php endif ?>
			</div>
			<a class="next browse right"></a>			
		</div>
</section>