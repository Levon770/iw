<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titleam')); ?>:</b>
	<?php echo CHtml::encode($data->titleam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titleen')); ?>:</b>
	<?php echo CHtml::encode($data->titleen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('whatam')); ?>:</b>
	<?php echo CHtml::encode($data->whatam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('whyam')); ?>:</b>
	<?php echo CHtml::encode($data->whyam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('howam')); ?>:</b>
	<?php echo CHtml::encode($data->howam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('whaten')); ?>:</b>
	<?php echo CHtml::encode($data->whaten); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('whyen')); ?>:</b>
	<?php echo CHtml::encode($data->whyen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('howen')); ?>:</b>
	<?php echo CHtml::encode($data->howen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery')); ?>:</b>
	<?php echo CHtml::encode($data->gallery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>
	<br />

	*/ ?>

</div>