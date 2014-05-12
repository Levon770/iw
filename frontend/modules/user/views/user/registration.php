<div class="plogin">
    
         
<h3><?php echo UserModule::t("Registration"); ?></h3>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
	<div class="row">
            <?php echo $form->labelEx($model,'username'); ?>    
            <?php echo CHtml::activeTextField($model,'username') ?>
	</div>
	
	<div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo CHtml::activePasswordField($model,'password') ?>
	</div>
	
	<div class="row">
            <?php echo $form->labelEx($model,'verifyPassword'); ?>
            <?php echo CHtml::activePasswordField($model,'verifyPassword') ?>
            <p class="hint">
            <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
            </p>
	</div>
            
            
	<div class="row">
            <?php echo $form->labelEx($model,'email'); ?>
            <?php echo CHtml::activeTextField($model,'email') ?>
	</div>
            
	<div class="row">
            <?php echo $form->labelEx($model,'fname'); ?>
            <?php echo CHtml::activeTextField($model,'fname'); ?>
	</div>
            
        <div class="row">
            <?php echo $form->labelEx($model,'lname'); ?>
            <?php echo CHtml::activeTextField($model,'lname'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'mobile'); ?>
            <?php echo CHtml::activeTextField($model,'mobile'); ?>
	</div>

	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha', array('imageOptions'=>array('align'=>'center'),'buttonLabel'=>'<img src="/frontend/www/img/captcha_refresh.png" align="center">')); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>UserModule::t("Register")));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>Yii::t('multi','Reset')));?>
	</div>
	

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

</div>