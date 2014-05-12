<?php
$title= 'title'.Yii::app()->language;
$tech = $this->getTechnologs($data->id);
?>
<div style="margin-bottom:150px;">
<div class="span3 partnerslists">
	<h4><?php echo Chtml::link($data->$title, $data->url, array('class'=>'partlink', 'target'=>'_blank'))?></h4>
	<?php echo
	Chtml::Image('/emo/frontend/www/userfiles/Partners/'.$data->image,$data->$title, array('width'=>'150'))

	?>
	

</div>
	<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$tech,
'itemView'=>'_techlist',
'summaryText'=>'',
)); ?>
</div>
<div class="clearfix"></div>

