<div class="plogin">
<!--    <script type="text/javascript">
            $("#modalDiv").css("display","block");
            $("#modalDiv").animate({opacity:'1'},200);
            $(".plogin").css("height","350px");
            </script>-->
<!--<div class="closeDiv"><img src="/frontend/www/img/close.png" width="40"></div>-->
<h3><?php echo UserModule::t("Login"); ?></h3>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>



<div class="form">
<?php echo CHtml::beginForm(); ?>

	
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		
		<?php echo CHtml::activeTextField($model,'username', array('value'=>'username', 'onfocus'=>"if (this.value == 'username') {this.value = '';$(this).css('color','#151515')}")) ?>
	</div>
	
	<div class="row">
		
		<?php echo CHtml::activeTextField($model,'password', array('value'=>'password','onfocus'=>"if (this.value == 'password') {this.setAttribute('type', 'password'), this.value = '';$(this).css('color','#151515')}")) ?>
	</div>
	
	<div class="row">
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>
	
	

	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'btn')); ?>
               
                
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>

</div>