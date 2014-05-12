<?php
$this->breadcrumbs=array(
	'Partners',
);

$this->menu=array(
array('label'=>'Create Partners','url'=>array('create')),
array('label'=>'Manage Partners','url'=>array('admin')),
);
?>

<h1>Partners</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
