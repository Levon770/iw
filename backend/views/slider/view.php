

<h2>View Slider #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'titleam',
		'titleen',
		'image',
),
)); ?>
