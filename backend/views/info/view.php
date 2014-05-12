
<h2>View Info #<?php echo $model->id; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nameam',
		'nameen',
		'adressam',
		'adressen',
		'phone1',
		'phone2',
		'mail',
),
)); ?>
