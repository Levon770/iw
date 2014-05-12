<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'solution-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>



<?php echo $form->errorSummary($model); ?>

	<div class="forminline">
		<?php echo $form->textFieldRow($model,'titleam',array('class'=>'span4','maxlength'=>250, 'hint'=>'Type title in armenian language')); ?>
	</div>

	<div class="forminline">
		<?php echo $form->textFieldRow($model,'titleen',array('class'=>'span4','maxlength'=>250, 'hint'=>'Type title in english language')); ?>
	</div><br/><hr/>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'whatam',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'whyam',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'howam',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div><br/><hr/>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'whaten',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'whyen',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div>

	<div class="forminline1">
	<?php echo $form->textAreaRow($model,'howen',array('rows'=>10, 'cols'=>50, 'class'=>'span4')); ?>
	</div><br/><hr/>

	

	<div class="forminline">
	<?php echo $form->textAreaRow($model,'video',array('rows'=>6, 'cols'=>50, 'class'=>'span5', 'hint'=>'youtube link')); ?>
	</div>

	<div class="forminline">
	<?php echo $form->labelEx($model,'gallery'); ?>
        <?php   
        $this->widget('CMultiFileUpload',
            array(
                 'model'=>$model,
                 'attribute' => 'gallery',
                 'accept'=> 'png|jpg|bmp|jpeg',
                 'denied'=>'Only images are allowed', 
                 'max'=>9,
                 'remove'=>'<img src="/iw/backend/www/images/remove.png" width="15" alt="remove" align="center"/>',
                 'duplicate'=>'Already Selected',
                
                 )
        );          ?>
       
        <?php echo $form->error($model,'image'); ?>
        <?php if(!empty($model->gallery)){
        	$img = explode(',',$model->gallery);
        	foreach ($img as $item){
        		echo CHtml::Image('/iw/frontend/www/userfiles/solutions/'.$model->titleam.'/thumbs/'.$item,'',array('width'=>'80', 'style'=>'margin:5px 10px'));
        	}
        	}?>
</div>
	</div>
	<br/>
	<div class="clearfix"></div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
