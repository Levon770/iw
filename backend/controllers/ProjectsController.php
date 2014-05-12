<?php

class ProjectsController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array(''),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update', 'index','view', 'admin','delete'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array(''),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Projects;
$model->timestamp = strtotime('now'); 
$model->views = 0;
if(isset($_POST['Projects']))
{

$model->attributes=$_POST['Projects'];
        $path = $this->randstring(); $model->folder = $path;
        $thumbpath = $path.'/thumbs';
        mkdir(getcwd().'/frontend/www/userfiles/projects/'.$path);  
        mkdir(getcwd().'/frontend/www/userfiles/projects/'.$path.'/thumbs');

$logoUpload=CUploadedFile::getInstance($model,'image');
$gallery = CUploadedFile::getInstances($model, 'gallery');
    //Uploading main image
    if(!empty($logoUpload)){ 
      $rnd = rand(0,9999); 
      $fileNameImage = "{$rnd}-{$logoUpload}"; 
      $model->image = $fileNameImage; 
    }

    //Uploading gallery images
        if (!empty($gallery) !=NULL){
                            if($filez=$this->uploadMultifile($model,'gallery',$path ,500,500));
                            {
                            $model->gallery=implode(",", $filez);
                            $this->uploadMultifile($model,'gallery',$thumbpath ,200,200);
                            }
         }
         //END
if($model->save()){ 
      if(!empty($logoUpload)){ 
        $logoUpload->saveAs(Yii::app()->basePath.'/../frontend/www/userfiles/projects/'.$path.'/'.$fileNameImage); 
        $logo= Yii::app()->image->load(Yii::app()->basePath.'/../frontend/www/userfiles/projects/'.$path.'/'.$fileNameImage);
		    $logo->resize(400, 400);
		    $logo->save();
      } 
      
    $this->redirect(array('view','id'=>$model->id)); 
    } 
  }

$this->render('create',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionUpdate($id)
{
$model=$this->loadModel($id);
 $thumbpath = $model->folder.'/thumbs';
if(isset($_POST['Projects']))
{
	$model->attributes=$_POST['Projects'];
	$_POST['Projects']['image'] = $model->image;
		$logoUpload=CUploadedFile::getInstance($model,'image');
    //Uploading gallery images
        if (!empty($gallery) !=NULL){
                            if($filez=$this->uploadMultifile($model,'gallery',$path ,500,500));
                            {
                            $model->gallery=implode(",", $filez);
                            $this->uploadMultifile($model,'gallery',$thumbpath ,200,200);
                            }
         }
         //END
if($model->save()){ 
      if(!empty($logoUpload)){ 
        $logoUpload->saveAs(Yii::app()->basePath.'../frontend/www/userfiles/projects/'.$model->folder.'/'.$model->image); 
        $logo= Yii::app()->image->load(Yii::app()->basePath.'/../frontend/www/userfiles/projects/'.$model->folder.'/'.$model->image);
		$logo->resize(400, 400);
		$logo->save();
      } 
    $this->redirect(array('view','id'=>$model->id)); 
    }
}
$this->render('update',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Projects');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionAdmin()
{
$model=new Projects('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Projects']))
$model->attributes=$_GET['Projects'];

$this->render('admin',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function loadModel($id)
{
$model=Projects::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function uploadMultifile ($model,$attr,$path, $w, $h)
        {
            $sfile=CUploadedFile::getInstances($model, $attr);
            $z=count($sfile);
                
            if($sfile ){
      foreach ($sfile as $i=>$files){  
        $formatName="{$files}";
        $formatNamet="0".$formatName;
        $filepath=Yii::app()->basePath.'/../frontend/www/userfiles/projects/'.$path.'/'.$formatName;
        
        $files->saveAs($filepath, FALSE);
        $this->imgResize($filepath,$w, $h) ;
                    $ffile[$i]=$formatName;
                  }
          return ($ffile);
          }
         }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function imgResize($img, $w, $h){
          $preview= Yii::app()->image->load($img);
        $preview->resize($w, $h);
        $preview->save();
             
         }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function randstring($length=10)
{
    $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
    $final_rand='';
    for($i=0;$i<$length; $i++)
    {
        $final_rand .= $chars[ rand(0,strlen($chars)-1)];
 
    }
    return $final_rand;
}      
}
