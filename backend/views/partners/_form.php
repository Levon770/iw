<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'partners-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'titleam',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'titleen',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'link',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>250)); ?>
	<?php if(!empty($model->image)) echo Chtml::image('/iw/frontend/www/userfiles/partners/'.$model->image,'',array('width'=>'150'))?>

		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model, 'type',  
              array('0' => 'General', '1' => 'Main'));?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
