<div id="sl_tag_cloud">
	<div id="myCanvasContainer">
		<canvas width="350" height="350" id="myCanvas">
			<p>Anything in here will be replaced on browsers that support the canvas element</p>
		</canvas>
	</div>
	<div id="tags">
		<ul>
			<?php $asideTags=$this->App->tag_cloud($asideTags,array('css1','css2','css3','css4')) ?>
			<?php foreach($asideTags as $index=>$value): ?>
			<li><?php echo $this->html->link($value['Tag']['name'],'/tags/'.$value['Tag']['name'],array('class'=>$value['Tag']['class'])) ?></li>
			<?php endforeach ?>
		</ul>
	</div>
</div>