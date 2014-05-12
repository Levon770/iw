<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('solution-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2>Solutions List</h2>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'solution-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'id', 'header'=>'Id', 'htmlOptions'=>array('style'=>'width: 40px')),
		'titleam',
		'titleen',
		array('value'=>'(!empty($data->whatam))?"+":"-"', 'header'=>'What(am)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->whyam))?"+":"-"', 'header'=>'Why(am)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->howam))?"+":"-"', 'header'=>'How(am)','htmlOptions'=>array('class'=>'tbold')),
		/*
		'whaten',
		'whyen',
		'howen',
		'gallery',
		'video',
		'views',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
