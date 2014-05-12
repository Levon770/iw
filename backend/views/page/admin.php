<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('page-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2>Manage Pages</h2>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'page-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array('name'=>'id', 'header'=>'Id', 'htmlOptions'=>array('style'=>'width: 40px')),
		array('name'=>'titleam', 'header'=>'Title (am)'),
		array('name'=>'titleen', 'header'=>'Title (en)'),
		array('value'=>'(!empty($data->descam))?"+":"-"', 'header'=>'Desc(am)','htmlOptions'=>array('class'=>'tbold')),
		array('value'=>'(!empty($data->descen))?"+":"-"', 'header'=>'Desc(en)','htmlOptions'=>array('class'=>'tbold')),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
