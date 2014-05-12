<?php

class SolutionController extends Controller
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
'actions'=>array('create','update', 'index','view','admin','delete'),
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
$model=new Solution;
$model->views = 0;


if(isset($_POST['Solution']))
{
$model->attributes=$_POST['Solution'];
$imagefile = CUploadedFile::getInstances($model, 'gallery');
		$path = $this->randstring(); $model->folder = $path;
        $thumbpath = $path.'/thumbs';
        mkdir(getcwd().'/frontend/www/userfiles/solutions/'.$path);  
        mkdir(getcwd().'/frontend/www/userfiles/solutions/'.$path.'/thumbs');
		
		if (!empty($imagefile) !=NULL){
	                       		if($filez=$this->uploadMultifile($model,'gallery',$path ,960,960));
		                        {
		                        $model->gallery=implode(",", $filez);
		                        $this->uploadMultifile($model,'gallery',$thumbpath ,320,320);
		                        }
	                        }
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('create',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Solution']))
{
$model->attributes=$_POST['Solution'];
$imagefile = CUploadedFile::getInstances($model, 'image');
			if (!empty($imagefile) !=NULL){
	                       		if($filez=$this->uploadMultifile($model,'image',$path ,960,960));
		                        {
		                        $model->image=implode(",", $filez);
		                        $this->uploadMultifile($model,'image',$thumbpath ,320,320);
		                        }
	                        }
if($model->save())
$this->redirect(array('view','id'=>$model->id));
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
$dataProvider=new CActiveDataProvider('Solution');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionAdmin()
{
$model=new Solution('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Solution']))
$model->attributes=$_GET['Solution'];

$this->render('admin',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function loadModel($id)
{
$model=Solution::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='solution-form')
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
				$filepath=Yii::app()->basePath.'/../frontend/www/userfiles/solutions/'.$path.'/'.$formatName;
				
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
