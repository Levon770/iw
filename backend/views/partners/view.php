
<h2>View Partners #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'titleam',
		'titleen',
		'link',
		array(
		 	'label'=>'Partner`s logo',
		 	'type'=>'image', 
			'value'=>Yii::app()->request->baseUrl."/../../frontend/www/userfiles/partners/".$model->image , 
                    ),
),
)); ?>
