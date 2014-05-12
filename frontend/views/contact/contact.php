<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$address = 'address'.Yii::app()->language;
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('multi','Contacts');

?>



<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>
<div class="map">
    <h3><?php echo Yii::t('multi','Contacts')?></h3>    
    <?php echo $info->map;?>

    <div class="adress">
        <span>Adress</span><?php echo $info->$address?><br/>
        <span>Phone</span><?php echo $info->phone?><br/>
        <span>Mobile</span><?php echo $info->mobile?><br/>
        <span>Skype</span><?php echo $info->skype?><br/>
        <span>email</span><?php echo $info->email?><br/>
    </div>
</div>



<div class="form-contanct">
<h3><?php echo Yii::t('multi','Feedback')?></h3>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('id'=>'contact-form'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
                <?php echo $form->textFieldRow($model, 'name', array('size'=>30));?>
	</div>

	<div class="row">
                <?php echo $form->textFieldRow($model, 'email', array('size'=>30));?>
		
	</div>

	<div class="row">
                <?php echo $form->textFieldRow($model, 'subject', array('size'=>30, 'maxlength'=>128));?>
	</div>

	<div class="row">
                 <?php echo $form->textFieldRow($model, 'body', array('rows'=>6, 'cols'=>40));?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row" style="padding:20px 0;">
		
		<div >
		<?php $this->widget('CCaptcha', array('imageOptions'=>array('align'=>'center'),'buttonLabel'=>'<img src="/frontend/www/img/captcha_refresh.png" align="center">')); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
                <?php echo $form->error($model,'verifyCode'); ?>
		<div class="hint">Խնդրում ենք մուտքագրել սիմվոլները այնպես, ինչպես նշված է նկարում
		</div>
		
	</div>
	<?php endif; ?>
        
        <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>Yii::t('multi','Submit')));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>Yii::t('multi','Reset')));?>
	</div>

<?php $this->endWidget(); ?>
</div>
<!-- form -->

<?php endif; ?>