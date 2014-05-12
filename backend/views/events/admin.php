<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('events-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2>Events list</h2>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'events-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type' => 'striped',
'template' => "{items}",
'columns'=>array(
		array('name'=>'id', 'header'=>'Id', 'htmlOptions'=>array('style'=>'width: 40px')),
		array('name'=>'titleam', 'header'=>'Title (am)'),
		array('value'=>'(!empty($data->titleen))?"+":"-"', 'header'=>'Title (en)', 'htmlOptions'=>array('class'=>'tbold')),
		array('class'=>'bootstrap.widgets.TbImageColumn',
		                    'imagePathExpression'=>'(!empty($data->image)) ? Yii::app()->request->baseUrl."/../../frontend/www/userfiles/events/".$data->folder."/".$data->image : ""',
		                    //'imagePathExpression'=>'',
		                    'usePlaceKitten'=>FALSE,
		                    'htmlOptions'=>array('width'=>'80'),
		                    ),
		array('value'=>'(!empty($data->teaseram))?"+":"-"', 'header'=>'Teaser(am)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->descam))?"+":"-"', 'header'=>'Desc(am)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->teaseren))?"+":"-"', 'header'=>'Teaser(en)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->descen))?"+":"-"', 'header'=>'Desc(en)','htmlOptions'=>array('class'=>'tbold')),

		/*
		'teaseram',
		'teaseren',
		'image',
		'video',
		'gallery',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
