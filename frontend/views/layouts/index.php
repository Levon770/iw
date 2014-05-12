<?php
/**
 * main.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:31 AM
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
  
  <!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo h($this->pageTitle); /* using shortcut for CHtml::encode */ ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width,initial-scale=1">


  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css"/>
  <!--using less instead? file not included-->
  <!--<link rel="stylesheet/less" type="text/css" href="/less/styles.less">-->

  <!-- create your own: http://modernizr.com/download/-->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr-2.6.2.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/set.js"></script>

  <!--<script src="/less/less-1.3.0.min.js"></script>-->
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>

<body lang="<?php echo Yii::app()->language;?>">
    <div class="container" >
        
        
        
     </div>
    <header>
        <div class="container wrapper">
            <!--<div class="logo"><a href="#"><img src="/frontend/www/img/logo.png" width="" alt=""/></a></div>-->
            <div  id="language-selector" style="float:right; ">

                <?php 
                    $this->widget('application.components.widgets.LanguageSelector');
                ?>
                <!--<span >+456 455 78 98</span>-->
            </div>
            <div class="clearfix"></div>
            <div class="logo"><a href="#"> "МАФ Групп " OoO</a></div>
            
            
        </div>
        
            
            <div class="mainmenu">
            <div class="container">
                <?php
                     $this->widget('zii.widgets.CMenu', 
                        array(
                            'activeCssClass'=>'active',
                            'activateParents'=>true, 
                            'items'=>array(
                                array('label'=>Yii::t('multi','Home'), 'url'=>array('/')),
                                array('label'=>Yii::t('multi','Products'), 
                                      'url'=>array('/'),
                                      'items'=>array(
                                            array('label'=>Yii::t('multi','Meat'), 'url'=>array('/'.Yii::app()->language.'/product/meat')),
                                            array('label'=>Yii::t('multi','Milk'), 'url'=>array('/'.Yii::app()->language.'/product/milk')),
                                        ),
                                      ),
                                array('label'=>Yii::t('multi','Technologs'), 'url'=>array('/'.Yii::app()->language.'/technologs')),
                                 array('label'=>Yii::t('multi','Calculator'), 'url'=>array('/'.Yii::app()->language.'/calculator')),
                                array('label'=>Yii::t('multi','About'), 'url'=>array('/'.Yii::app()->language.'/about')),
                                array('label'=>Yii::t('multi','Contacts'), 'url'=>array('/'.Yii::app()->language.'/contact/index')),

                            ),

                      ));
                ?>
            </div>

            <div class="clearfix"></div>
            
            
        </div>
        <img src="/emo/frontend/www/img/sep.png" style="width:100%; margin-top: -4px;">
    </header>
    <div class="slider">
      <div class="container">
        <?php
          $sliders = Slider::model()->findAll();

          foreach($sliders as $i=>$slideritem){
            $slider[$i]=array('image'=>'/emo/frontend/www/userfiles/slider/'.$slideritem->image);
          }
          $this->widget('bootstrap.widgets.TbCarousel', array(
            'items'=>$slider,
            'htmlOptions'=>array('id'=>'myCarousel'),
          ));
        ?>
      </div>
    </div>
<div id="content">
   <div class="container">
            <?php echo $content?>
    </div> 
</div>

    <footer>
        
    </footer>
</body>
</html>
