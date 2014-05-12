<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('slider-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2> Slider list</h2>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$model->search(),
    'type'=>'striped',
    'template'=>"{items}\n{pager}",
    'filter' => $model,
    'columns'=>array(
       		
          array('class'=>'bootstrap.widgets.TbImageColumn',
                    'imagePathExpression'=>'(!empty($data->image)) ? Yii::app()->request->baseUrl."/../../frontend/www/userfiles/slider/".$data->image : ""',
                    //'imagePathExpression'=>'',
                    'usePlaceKitten'=>FALSE,
                    'htmlOptions'=>array('width'=>'150'),
                    ),
          array('name'=>'titleam', 'header'=>'Title (armenian)' ), 
          array('name'=>'titleen', 'header'=>'Title (english)' ), 
          array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl'=>'Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey))',
		'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("id"=>$data->primaryKey))',
		'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete",array("id"=>$data->primaryKey))',
            'header'=>'Խմբագրել'
	)
)
));   
     ?>
