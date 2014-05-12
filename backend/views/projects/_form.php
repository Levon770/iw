<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="span9">	
	<div class="forminline">
		<?php echo $form->textFieldRow($model,'titleam',array('class'=>'span4','maxlength'=>250, 'hint'=>'Type title in armenian language')); ?>
	</div>

	<div class="forminline">
		<?php echo $form->textFieldRow($model,'titleen',array('class'=>'span4','maxlength'=>250, 'hint'=>'Type title in english language')); ?>
	</div>
    <br/>
    <p style="margin-top:60px;"></p>

    <div class="forminline">
		<?php echo $form->textAreaRow($model,'teaseram',array('rows'=>10, 'cols'=>50, 'class'=>'span3', 'hint'=>'Short description')); ?>
	</div>
	<div class="forminline">
		<?php echo $form->textAreaRow($model,'descam',array('rows'=>10, 'cols'=>50, 'class'=>'span5', 'hint'=>'Full description')); ?>
	</div>
	<br/>

	<div class="forminline">
		<?php echo $form->textAreaRow($model,'teaseren',array('rows'=>10, 'cols'=>50, 'class'=>'span3', 'hint'=>'Short description')); ?>
	</div>
	<div class="forminline">
		<?php echo $form->textAreaRow($model,'descen',array('rows'=>10, 'cols'=>50, 'class'=>'span5', 'hint'=>'Full description')); ?>
	</div>
</div>

<div class="span3">


	<?php echo $form->fileFieldRow($model,'image', array('hint'=>'main image')); ?>
	<?php if(!empty($model->image)) echo Chtml::image('/iw/frontend/www/userfiles/projects/'.$model->folder.'/'.$model->image,'',array('width'=>'150'))?>

	<?php echo $form->textAreaRow($model,'video',array('rows'=>6, 'cols'=>50, 'class'=>'span3', 'hint'=>'youtube link')); ?>

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
        		echo CHtml::Image('/iw/frontend/www/userfiles/projects/'.$model->folder.'/thumbs/'.$item,'',array('width'=>'80', 'style'=>'margin:5px 10px'));
        	}
        	}?>
</div>
<br/>
<div class="clearfix"></div>
<div class="  form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
