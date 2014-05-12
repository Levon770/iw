<?php
/**
 * SiteController.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:25 AM
 */
class SiteController extends Controller {
     public  $slider;
      public $layout='//layouts/content';

	public function accessRules() {
		return array(
			// not logged in users should be able to login and view captcha images as well as errors
			array('allow', 'actions' => array('index', 'captcha', 'about', 'error', 'contact','calculator','technologs')),
			// logged in users can do whatever they want to
			array('allow', 'users' => array('@')),
			// not logged in users can't do anything except above
			array('deny'),
		);
	}

	/**
	 * Declares class-based actions.
	 * @return array
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),
		);
	}

	/* open on startup */
	public function actionIndex() {
                $this->layout = '//layouts/index';
                $slider = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('slider')
                    ->queryAll();
                $this->render('index',array(
			'slider'=>$slider,
		));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function actionAbout() {
                $this->layout='//layouts/content';
                $model = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('pages')
                    ->where('id=1')
                    ->queryRow();
                $this->render('about',array(
			'model'=>$model,
		));
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function actionError() {
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function actionCalculator() {
		
				$this->render('calculator');
		
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function actionTechnologs() {
				$dataProvider=new CActiveDataProvider('Partners',
					array(	'criteria'=>array(
					            'order'=>'id DESC',
				            ),
							'pagination'=>array( 'pageSize'=>10),
				        )
					);
		
				$this->render('tech', array('dataProvider'=>$dataProvider,));
		
	}

	public function getTechnologs($id){
		
		$dataProviderProduct=new CActiveDataProvider('Technologs',
					array(	'criteria'=>array(
							'condition'=>'pid=:id',
							'params'=>array(':id'=>$id),
						),
							'pagination'=>array( 'pageSize'=>0),
				        )
					);
		return $dataProviderProduct;
	}


        
        

}