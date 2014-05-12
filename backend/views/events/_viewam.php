<?php
	$links =preg_replace('/watch\\?v\\=/', 'embed/', $model->video);
	$ylink =preg_replace('/http:/', '', $links);

	?>
<div class="span8">
<h3><?php echo $model->titleam?></h3>
<?php $link = '/iw/frontend/www/userfiles/events/'.$model->folder.'/'.$model->image?>
<img src="<?php echo $link;?>" title="" alt="" width="200"  align="left" class="tabimg">
<p><b>Teaser: </b> <?php echo $model->teaseram?></p>
<div class="clearfix"></div> 
<p><b>Description: </b><?php echo $model->descam?></p>

</div>
<div class="span3">

	
	
	<b>Created at:</b> <?php echo date('d.m.Y', $model->timestamp)?>
	
	<div>
		<b>Embed youtube link:</b><br/>
		<iframe width="350" height="250" src="<?php echo $ylink?>" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<div class="clearfix"></div>
<hr/>
<div>
<?php 
	$img = explode(',', $model->gallery);
	foreach($img as $item){
		echo CHtml::image('/iw/frontend/www/userfiles/events/'.$model->folder.'/thumbs/'.$item,'', array('class'=>'viewimg'));
	}
?>
</div>