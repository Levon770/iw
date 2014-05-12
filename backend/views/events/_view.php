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

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('descam')); ?>:</b>
	<?php echo CHtml::encode($data->descam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descen')); ?>:</b>
	<?php echo CHtml::encode($data->descen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teaseram')); ?>:</b>
	<?php echo CHtml::encode($data->teaseram); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('teaseren')); ?>:</b>
	<?php echo CHtml::encode($data->teaseren); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery')); ?>:</b>
	<?php echo CHtml::encode($data->gallery); ?>
	<br />

	*/ ?>

</div>