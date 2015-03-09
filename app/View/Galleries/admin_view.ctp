<?php $this->Html->addCrumb(__('Gallery'), array('controller' => 'blogs', 'action' => 'index')) ?>
<?php $this->Html->addCrumb(__('Gallery'), array('controller' => 'blogs', 'action' => 'view', $this -> params['id'])) ?>
<?php $this -> assign('title', __('Gallery')) ?>
<section id="slboard_main" class="section">
<div class="section_top">
<h2>갤러리</h2>
</div>
<div class="slboard_content">
	<div class="slboard_content_header">
	<h3><!--{content.title}--></h3>
	<p>작성자 : <!--{content.name}-->&nbsp;&nbsp;&nbsp; 작성일 : <!--{=getFormatDate(content.registered_date,3)}--></p>
	</div>
	<div class="slboard_content_main">
	<p><a href="/upload/gallery_photo/show.php?filename={content.filename}" title=""><img src="/upload/gallery_photo/show.php?filename={content.filename}&thumb=4" alt="" /></a></p>
	</div>
</div>
<div id="bottom_menu">
	<!--{?_SESSION['ACCOUNT_ID']}-->
	<a href="new.php" class="new_link" title="새글 쓰기" ><span>글쓰기</span></a>
	<!--{/}-->
	<a href="index.php{?_GET['limit']}?limit={_GET['limit']}&amp;offset={_GET['offset']}{/}" class="list_link" title="목록으로 돌아가기" ><span>목록으로</span></a>
	<a rel="#overlay" href="check_edit_password.php?id={content.id}" class="check_edit_link" title="글수정" ><span>수정</span></a>
	<a rel="#overlay" href="check_delete_password.php?id={content.id}" class="check_delete_link" title="글삭제" ><span>삭제</span></a>
</div>
</section>