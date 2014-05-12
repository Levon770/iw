<?php
	$links =preg_replace('/watch\\?v\\=/', 'embed/', $model->video);
	$ylink =preg_replace('/http:/', '', $links);
	//var_dump('http://www.youtube.com/embed/_-XNxrl2vhg');echo "<br/>";
	//var_dump($link);exit;
	//var_dump('<iframe width="640" height="390" src="//www.youtube.com/embed/_-XNxrl2vhg" frameborder="0" allowfullscreen></iframe>');echo "<br/>";
	//var_dump('<iframe width="400" height="450" src="'.$link.'" frameborder="0" allowfullscreen></iframe>');exit;

	?>
<div class="span8">
<h3><?php echo $model->titleen?></h3>
<?php $link = '/iw/frontend/www/userfiles/events/'.$model->folder.'/'.$model->image?>
<img src="<?php echo $link;?>" title="" alt="" width="200"  align="left" class="tabimg">
<p><b>Teaser: </b> <?php echo $model->teaseren?></p>
<div class="clearfix"></div> 
<p><b>Description: </b><?php echo $model->descen?></p>

</div>
<div class="span3">

	
	 
	<b>Created at:</b> <?php echo date('d.m.Y H:i', $model->timestamp)?>
	
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