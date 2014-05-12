<?php
$this->breadcrumbs=array(
	'Solutions',
);

$this->menu=array(
array('label'=>'Create Solution','url'=>array('create')),
array('label'=>'Manage Solution','url'=>array('admin')),
);
?>

<h1>Solutions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
