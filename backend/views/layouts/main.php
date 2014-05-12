<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="en"/>

	<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	      media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"
	      media="screen, projection"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	      media="print"/>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/script.js"></script>
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
	      media="screen, projection"/>
	<![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<?php 
	 if (Yii::app()->user->name && !Yii::app()->user->isGuest){
	$this->widget('bootstrap.widgets.TbNavbar', array(
	'type' => 'inverse', // null or 'inverse'
	'brand' => 'IW',
	'brandUrl' => 'http://iworldarmenia.oom',
	'collapse' => true, // requires bootstrap-responsive.css
	'items' => array(
		array(
			'class' => 'bootstrap.widgets.TbMenu',
			'items' => array(
				array('label' => 'Home', 'url' => array('/site/index')),
				array('class'=>'bootstrap.widgets.TbMenu',
                                      'label' => 'Events', 
                                      'url' => '/events/admin',
                                      'items'=>array(
                                                array('label'=>'Create','url'=>array('events/create/')),
                                                array('label'=>'List','url'=>array('events/admin/'))
                                      )),
                                
                                array('class'=>'bootstrap.widgets.TbMenu',
                                      'label' => 'Projects', 
                                      'url' => '/projects/admin',
                                      'items'=>array(
                                                array('label'=>'Create','url'=>array('projects/create/')),
                                                array('label'=>'List','url'=>array('projects/admin/'))
                                      )),

                                array('class'=>'bootstrap.widgets.TbMenu',
                                          'label' => 'Solutions', 
                                          'url' => '/solution/admin',
                                          'items'=>array(
                                                    array('label'=>'Create','url'=>array('solution/create/')),
                                                    array('label'=>'List','url'=>array('solution/admin/')),
                                          )),
                                array('class'=>'bootstrap.widgets.TbMenu',
                                          'label' => 'Partners', 
                                          'url' => '/partners/admin',
                                          'items'=>array(
                                                    array('label'=>'Create','url'=>array('partners/create/')),
                                                    array('label'=>'List','url'=>array('partners/admin/'))
                                          )),
                                array('class'=>'bootstrap.widgets.TbMenu',
                                          'label' => 'Slider', 
                                          'url' => '/slider/admin',
                                          'items'=>array(
                                                    array('label'=>'Create','url'=>array('slider/create/')),
                                                    array('label'=>'List','url'=>array('slider/admin/'))
                                          )),
                                array('class'=>'bootstrap.widgets.TbMenu',
                                          'label' => 'Pages', 
                                          'url' => '/page/admin',
                                          'items'=>array(
                                                    array('label'=>'Create','url'=>array('page/create/')),
                                                    array('label'=>'List','url'=>array('page/admin/'))
                                          )),
                                
                               array('class'=>'bootstrap.widgets.TbMenu',
                                          'label' => 'Info', 
                                          'url' => array('/info/update/1'),
                                          ),
				
				array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
			),
		),
		
	),
));} ?>
	<!-- mainmenu -->
	<div class="container" style="margin-top:80px">
		<?php if (isset($this->breadcrumbs)): ?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>
		<hr/>
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> Levon H ().<br/>
			All Rights Reserved.
			
		</div>
		<!-- footer -->
	</div>
</div>
<!-- page -->

</body>
</html>