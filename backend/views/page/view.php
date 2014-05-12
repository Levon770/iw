
<h2>View Page #<?php echo $model->id; ?></h2>

<?php
	$this->widget(
    'bootstrap.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            
            array('label' => 'Armenian', 'content' => $this->renderPartial('_views', array("model"=>$model, 'lang'=>'am'), true, true), 'active' => true,),
            array('label' => 'English', 'content' => $this->renderPartial('_views', array("model"=>$model, 'lang'=>'en'), true, true),),
        ),
    )
);
?>
