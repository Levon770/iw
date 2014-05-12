<?php

class PartnersController extends Controller
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function actionCreate()
{
	$model=new Partners;
	if(isset($_POST['Partners']))
	{
		$model->attributes=$_POST['Partners'];
		$logoUpload=CUploadedFile::getInstance($model,'image');
		if(!empty($logoUpload)){
				$rnd = rand(0,9999);
				$fileNameImage = "{$rnd}-{$logoUpload}";
			    $model->image = $fileNameImage;
			}
			
			
		if($model->save()){
			if(!empty($logoUpload)){
			            $logoUpload->saveAs(Yii::app()->basePath.'/../frontend/www/userfiles/partners/'.$fileNameImage);	
			            $logo= Yii::app()->image->load(Yii::app()->basePath.'/../frontend/www/userfiles/partners/'.$fileNameImage);
					    $logo->resize(300, 300);
					    $logo->save();
			        }
		$this->redirect(array('view','id'=>$model->id));
		}
	}

	$this->render('create',array(
	'model'=>$model,
	));
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function actionUpdate($id)
{
	$model=$this->loadModel($id);
	if(isset($_POST['Partners']))
	{
		$_POST['Partners']['image'] = $model->image;
		$logoUpload=CUploadedFile::getInstance($model,'image');
		$model->attributes=$_POST['Partners'];
		if($model->save()){
			if(!empty($logoUpload)){
	            $logoUpload->saveAs(Yii::app()->basePath.'/../frontend/www/userfiles/partners/'.$model->image);
	            $logo= Yii::app()->image->load(Yii::app()->basePath.'/../frontend/www/userfiles/partners/'.$model->image);
			    $logo->resize(300, 300);
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
$dataProvider=new CActiveDataProvider('Partners');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function actionAdmin()
{
$model=new Partners('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Partners']))
$model->attributes=$_GET['Partners'];

$this->render('admin',array(
'model'=>$model,
));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function loadModel($id)
{
$model=Partners::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='partners-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
