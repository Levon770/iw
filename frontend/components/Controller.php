<?php
/**
 * Controller.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/23/12
 * Time: 12:55 AM
 */
class Controller extends CController {

	public $breadcrumbs = array();
	public $menu = array();
        
        
       public function __construct($id,$module=null){
            parent::__construct($id,$module);
            // If there is a post-request, redirect the application to the provided url of the selected language 
            if(isset($_POST['language'])) {
                $lang = $_POST['language'];
                $MultilangReturnUrl = $_POST[$lang];
                $this->redirect($MultilangReturnUrl);
            }
            // Set the application language if provided by GET, session or cookie
            if(isset($_GET['language'])) {
                Yii::app()->language = $_GET['language'];
                Yii::app()->user->setState('language', $_GET['language']); 
                $cookie = new CHttpCookie('language', $_GET['language']);
                $cookie->expire = time() + (60*60*24*365); // (1 year)
                Yii::app()->request->cookies['language'] = $cookie; 
            }
            else if (Yii::app()->user->hasState('language'))
                Yii::app()->language = Yii::app()->user->getState('language');
            else if(isset(Yii::app()->request->cookies['language']))
                Yii::app()->language = Yii::app()->request->cookies['language']->value;
        }
        public function createMultilanguageReturnUrl($lang='en'){
            if (count($_GET)>0){
                $arr = $_GET;
                $arr['language']= $lang;
            }
            else 
                $arr = array('language'=>$lang);
            return $this->createUrl('', $arr);
        }
        
        
        
         function cat(){
            $model = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from(category)
                    ->queryAll();
                return $model    ;
        }
        
         public function count(){
              $status="active";
            $count = Yii::app()->db->createCommand()
                    ->select('Sum(total) AS sum')
                    ->from('basket')
                    ->where('basket.uid=:uid AND status = :status',array(':uid'=>Yii::app()->user->id, ':status'=>$status))
                    ->queryRow();
            return $count;
        }
}
