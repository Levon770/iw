<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slider-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldRow($model,'titleam',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'titleen',array('class'=>'span4','maxlength'=>250)); ?>

	<?php echo $form->fileFieldRow($model,'image'); ?><br/>
	<?php if(!empty($model->image)){echo CHtml::Image(Yii::app()->request->baseUrl."/../../frontend/www/userfiles/slider/".$model->image, '', array("width"=>"150px" ) );}?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
