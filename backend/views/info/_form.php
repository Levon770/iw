<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'info-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nameam',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'nameen',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'adressam',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'adressen',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'phone1',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'phone2',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'mail',array('class'=>'span5','maxlength'=>250)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
