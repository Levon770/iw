<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="forminline">
	<?php echo $form->textFieldRow($model,'titleam',array('class'=>'span5','maxlength'=>250)); ?>
	</div>

	<div class="forminline">
	<?php echo $form->textFieldRow($model,'titleen',array('class'=>'span5','maxlength'=>250)); ?>
	</div><br/><hr/>

	<div class="forminline">
	<?php echo $form->textAreaRow($model,'descam',array('rows'=>15, 'cols'=>50, 'class'=>'span5')); ?>
	</div>

	<div class="forminline">
	<?php echo $form->textAreaRow($model,'descen',array('rows'=>15, 'cols'=>50, 'class'=>'span5')); ?>
	</div><br/>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
