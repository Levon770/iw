<h3><?php echo $model->titleam;?></h3>
<div class="span4">
<?php $this->widget( 'bootstrap.widgets.TbBox',
    array(
        'title' => 'What is it',
        'headerIcon' => '',
        'content' => $model->whaten,
    	)
	);
?>
</div>

<div class="span4">
<?php $this->widget( 'bootstrap.widgets.TbBox',
    array(
        'title' => 'Why it',
        'headerIcon' => '',
        'content' => $model->whyen,
    	)
	);
?>
</div>

<div class="span4">
<?php $this->widget( 'bootstrap.widgets.TbBox',
    array(
        'title' => 'how it works',
        'headerIcon' => '',
        'content' => $model->howen,
    	)
	);
?>
</div>
<hr/>

<!-- Showing -->
<?php
	$links =preg_replace('/watch\\?v\\=/', 'embed/', $model->video);
	$ylink =preg_replace('/http:/', '', $links);
?>
<div>
<?php 
	$img = explode(',', $model->gallery);
	foreach($img as $item){
		echo CHtml::image('/iw/frontend/www/userfiles/solutions/'.$model->titleam.'/thumbs/'.$item,'', array('class'=>'viewimgs'));
	}
?>
</div>
<center>
	<iframe width="400" height="300" src="<?php echo $ylink?>" frameborder="0" allowfullscreen></iframe>
</center>