<?php $this->pageTitle=Yii::app()->name; ?>

<div class="span6"><?php $this->widget( 'bootstrap.widgets.TbBox',
    array(
        'title' => 'Create Content',
        'headerIcon' => '',
        'content' => $this->renderPartial('pages/createlist', array(), true),
    	)
	);
?></div>
<div class="span6">
<?php $this->widget( 'bootstrap.widgets.TbBox',
    array(
        'title' => 'Content List',
        'headerIcon' => '',
        'content' => $this->renderPartial('pages/list', array(), true),
    	)
	);
?></div>