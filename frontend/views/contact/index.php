<?php
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
	'Contact',
);
?>

<h1><?php echo Yii::t('multi','Contact Us')?></h1>

<?php if (Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'contact-form',
	'enableClientValidation' => true,
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
)); ?>

	


	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('size'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>30,'maxlength'=>128)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>40)); ?>
		
	</div>
	<?php if (CCaptcha::checkRequirements()): ?>
	<?php $this->widget('CCaptcha'); ?>
	<?php echo $form->textField($model, 'verifyCode'); ?>
	
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->
<?php  endif; ?>