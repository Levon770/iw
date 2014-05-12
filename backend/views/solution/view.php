

<span style="float:left"><h2>Content #<?php echo $model->id; ?></h2></span>
<?php echo CHtml::Link('<i class="icon icon-pencil"></i> Edit', array('solution/update', 'id'=>$model->id), array('class'=>'editbtn')) ;?>
<?php echo '<div class="editbtn pageviews">'.$model->views.'</div>'?>
<div class='clearfix'></div>

<?php
	$this->widget(
    'bootstrap.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array('label' => 'Armenian', 'content' => $this->renderPartial('_viewam', array("model"=>$model), true, true), 'active' => true,),
            array('label' => 'English', 'content' => $this->renderPartial('_viewen', array("model"=>$model), true, true),),
        ),
    )
);
?>