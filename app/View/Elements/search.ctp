<div class="col-xs-12 col-md-10">
<form class="form-inline" id="sl_search_form" role="form" method="get" style="float:right">
	<?php echo $this->Form->input('search_type',array('type'=>'select','name'=>'search_type','div'=>array('class'=>'form-group'),'class'=>'form-control','options'=>$searchTypeOption,'selected'=>$searchType));?>
	<?php echo $this->Form->input('search_type',array('type'=>'search','name'=>'search_text','div'=>array('class'=>'form-group'),'class'=>'form-control','value'=>$searchText,'placeholder'=>__('insert search word'),'maxlength'=>60,'required'=>"required"));?>
	<input type="submit" class="btn btn-default" value="<?php echo __('Search') ?>" />
</form>
</div>