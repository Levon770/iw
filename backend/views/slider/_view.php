<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titleam')); ?>:</b>
	<?php echo CHtml::encode($data->titleam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titleen')); ?>:</b>
	<?php echo CHtml::encode($data->titleen); ?>
	<br />


</div>