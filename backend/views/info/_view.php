<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nameam')); ?>:</b>
	<?php echo CHtml::encode($data->nameam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nameen')); ?>:</b>
	<?php echo CHtml::encode($data->nameen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adressam')); ?>:</b>
	<?php echo CHtml::encode($data->adressam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adressen')); ?>:</b>
	<?php echo CHtml::encode($data->adressen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone1')); ?>:</b>
	<?php echo CHtml::encode($data->phone1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone2')); ?>:</b>
	<?php echo CHtml::encode($data->phone2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	*/ ?>

</div>