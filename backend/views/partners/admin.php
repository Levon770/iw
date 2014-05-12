<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('partners-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Partners</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'partners-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'type' => 'striped',
'template' => "{items}",
'columns'=>array(
		array('name'=>'id', 'header'=>'Id', 'htmlOptions'=>array('style'=>'width: 40px')),
		array('class'=>'bootstrap.widgets.TbImageColumn',
		                    'imagePathExpression'=>'(!empty($data->image)) ? Yii::app()->request->baseUrl."/../../frontend/www/userfiles/partners/".$data->image : ""',
		                    //'imagePathExpression'=>'',
		                    'usePlaceKitten'=>FALSE,
		                    'htmlOptions'=>array('width'=>'80'),
		                    ),
		array('name'=>'titleam', 'header'=>'Title (am)'),
		array('name'=>'titleen', 'header'=>'Title (en)'),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
