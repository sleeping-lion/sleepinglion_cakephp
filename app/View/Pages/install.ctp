<?php $this -> Html -> addCrumb(__('Install'), array('controller' => 'pages', 'action' => 'install')) ?>
<?php $this -> assign('title', __('Install')) ?>
<section id="sl_install_index">
	<article>
		<h3>SLBoard 란?</h3>
		<p>천재 바로 밑의 프로그래머 잠자는-사자가  <a href="http://www.cakephp.org" target="_blank">CakePHP</a>로 작성한 게시판 프로그램입니다.</p>
	</article>
	<article>
		<h3>왜? 어떻게?  만들게 되었습니까?</h3>		
		<p>
			<a href="http://www.sleepinglion.pe.kr" target="_blank">잠자는 사자의 집</a>은 쓸만하게 만들어서 많은 사람들이 썻으면 좋겠으나 대중성이 떨어지는 <a href="http://www.rubyonrails.org" target="_blank">ROR</a>로 작성되어서 많은 사람이 쓰는데 무리가 있어서 대중적인 <a href="http://www.php.net" target="_blank">PHP</a>로 재작성(포팅)을 하기로 생각했습니다. 
			그래서  <a href="http://www.rubyonrails.org" target="_blank">ROR</a>과 가장 유사한  <a href="http://www.cakephp.org" target="_blank">CakePHP</a>로 재작성하여 구현하였습니다.		  					
		</p>
	</article>
	<article>
		<h3>사용하려면 어떻게 해야됩니까?</h3>
		<p>일반적인 CakePHP 설치,설정과  동일합니다.</p>
		<ol>
			<li>운영환경(PHP 5.3이상 권장,mod_rewrite사용 가능 권장)을 준비합니다.</li>
			<li>SLBoard를 <a href="https://github.com/sleeping-lion/slboard_cakephp/archive/master.zip" target="_blank">다운로드</a> 또는 git(git clone git://github.com/sleeping-lion/slboard_cakephp)를 이용하여 프로그램을 받아서 해당경로를 설정합니다.</li>
			<li>sql(slboard.sql)파일을 이용하여 테이블을 생성합니다. l<br />명령어 mysql -u 사용자  -p 데이터베이스 &gt; slboard.sql 
				</li>
			<li>config파일에 접속 정보를 설정합니다. <br />
				app/Config/database_example.php파일을 database.php로 이름을 바꾸고 데이터베이스 정보를 알맞게 넣어서  생성합니다.  / <a href="http://book.cakephp.org/2.0/en/development/configuration.html" target="_blank">CakePHP Database.php 작성법</a> 
				</li>
			<li>app/tmp, app/webroot/files 폴더를 생성하고 웹사용자가 쓸 수 있는 권한을 부여합니다.</li>
			<li>
				 app/Config/core.php의 보안키의 값을 다른 랜덤 값으로 바꿔 주세요<br />
					Configure::write('Security.salt',값);<br />
					Configure::write('Security.cipherSeed',값);				
			</li>
			<li>app/Config/boostrap.php의 키값을 자신의 구글 Recaptcha키 값으로 바꿔주세요<br />
					Configure::write('Recaptcha.publicKey',값);<br />
					Configure::write('Recaptcha.privateKey',값);					
			</li>
			<li>개발시에는 config/Core.php의 Configure::write('debug',값)의 값을 1이나 2로 하고 운영시에는 0으로 설정합니다.</li>			
		</ol>
		<p>
			
		</p>
	</article>
	<article>
		<h3>사용된 프로그램들</h3>
		<ol>
			<li>Css, Javascript(<a href="http://getbootstrap.com" target="_blank">Boostrap</a>,Jquery(plugins))</li>
			<li>Editor(<a href="http://www.ckeditor.com" target="_blank">Ckeditor</a>)</li>
			<li>Upload Plugin(<a href="https://github.com/josegonzalez/cakephp-upload" target="_blank">josegonzalez/cakephp-upload</a>)</li>
			<li>Recaptcha Pulgin(<a href="https://github.com/CakeDC/recaptcha" target="_blank">CakeDC/recaptcha</a>)</li>
			<li>Sitemap Plugin(<a href="https://github.com/loadsys/CakePHP-Sitemap" target="_blank">loadsys/CakePHP-Sitemap</a>)</li>			
		</ol>
	</article>
	<article>
		<h3>장점, 유용성은 어떤게 있나요?</h3>
		<div>
			CakePHP를 이용하면 이를 이용하지 않았을때보다 노력과 시간을 덜 들이고 품질 좋은 웹프로그램을 작성할수 있지만 <br />
			CakePHP에서 시작하여 사이트제작 위해서 기능을 구현하는 것 또한  많은 노력과 시간이 또한 소요됩니다.<br />
			SLBoard는 화면을  일반적인 웹프로그램에서 쓰는 기능들을  모두 구현하여 놓았기 때문에 이를 이용하면 제작 시간과 노력을 다시 한번 절감할수 있습니다.<br />
			<div>
			 <h4>구현 기능들</h4>
			 <ol>
			 	<li><a href="http://book.cakephp.org/2.0/en/tutorials-and-examples/simple-acl-controlled-application/simple-acl-controlled-application.html" target="_blank">CakePHP Acl</a>기능을 이용한 사용자 접근 권한 설정</li>
			 	<li><a href="http://book.cakephp.org/2.0/en/core-libraries/internationalization-and-localization.html" target="_blank">CakePHP Internationalization &amp; Localization</a>기능을 이용한 다국어 사이트 제작</li>
			 	<li><a href="http://getbootstrap.com" target="_blank">Boostrap</a>을 이용한 화면 구성</li>
			 	<li><a href="http://www.ckeditor.com" target="_blank">Ckeditor</a>을 이용한 에디터</li>
			 	<li><a href="https://github.com/josegonzalez/cakephp-upload" target="_blank">josegonzalez/cakephp-upload</a>를 이용한 사진 업로드 썸네일 생성</li>
			 	<li><a href="https://github.com/CakeDC/recaptcha" target="_blank">CakeDC/recaptcha</a>를 자동글쓰기 방지</li>
			 	<li><a href="https://github.com/loadsys/CakePHP-Sitemap" target="_blank">loadsys/CakePHP-Sitemap</a>을 이용한 Sitemap생성</li>
			 	<li>그 밖에 일반적인 사이트 기능 요소들</li>			 	
			 </ol>
			</div>
			또한 SLBoard는 아무런 제한 없는 자유소프트웨어로써 이를 이용하여 맘에 안드는 부분이나 부족한 부분은 수정하여 마음껏 사용할수 있습니다. <br />
			그 밖에 직접 사용이 아닌 CakePHP를 배워보려는 사람들에게는 좋은 예제가 될것입니다.
		</div>
	</article>
	<article>
		<h3>앞으로의 발전 방향</h3>
		<p>SLBoard는 앞으로도 계속적인 유지보수를 통해 계속 발전해 나갈것입니다. 
			또한 이를 이용한 자매품(쇼핑몰,구인구직)등도 제작해 나갈 예정이니 기대하고 봐주세요~
		</p>
	</article>	
</section>