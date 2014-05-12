<?php
$name = 'name'.Yii::app()->language;
$title = 'title'.Yii::app()->language;
?>
<div class="prlistview">
	<div class="prlistviewheader">
	<?php echo CHtml::Image('/emo/frontend/www/userfiles/technologs/'.$data->image,$data->$name,array('width'=>'110', 'align'=>'left'));?>
	<span class="prtitle"><?php echo $data->$name?></span>
	</div>
	<div class="ordericon">
	<i class="icon-tag"></i><?php echo $data->category->$title;?><br/>
	<i class="icon-skype "></i><?php echo $data->skype?><br/>
	<i class="icon-map-marker"></i><?php echo $data->phone?><br/>
	<i class="icon-envelope"></i><?php echo $data->email?></div>
</div>

