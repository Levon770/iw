<?php
/**
 * main.php
 *
 * This file holds frontend configuration settings.
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 */
$frontendConfigDir = dirname(__FILE__);

$root = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($frontendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');

$mainLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

$mainEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
	array(
                'name'=>'MafGroup',
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'frontend',
		// set parameters
		'params' => $params,
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('bootstrap', 'log'),
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
		'language' => 'en',
		// uncomment if a theme is used
		/*'theme' => '',*/
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			'common.components.*',
			'common.extensions.*',
			'common.models.*',
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*',
                        'application.modules.user.models.*',
                        'application.modules.user.components.*',
		),
                 'modules' => array(
                        'user'=>array(
                            # encrypting method (php hash function)
                            'hash' => 'md5',

                            # send activation email
                            'sendActivationMail' => true,

                            # allow access for non-activated users
                            'loginNotActiv' => false,

                            # activate user on registration (only sendActivationMail = false)
                            'activeAfterRegister' => false,

                            # automatically login from registration
                            'autoLogin' => true,

                            # registration path
                            'registrationUrl' => array('/user/registration'),

                            # recovery password path
                            'recoveryUrl' => array('/user/recovery'),

                            # login form path
                            'loginUrl' => array('/user/login'),

                            # page after login
                            'returnUrl' => array('/user/profile'),

                            # page after logout
                            'returnLogoutUrl' => array('/user/login'),
                        ),
			'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password' => 'aragast',
				'generatorPaths' => array(
					'bootstrap.gii'
				)
			)
		), 
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		/* 'modules' => array(), */
		'components' => array(
                        'format'=>array(
                            
                            'numberFormat'=>array('thousandSeparator'=>'.'),
                        ),
                        'messages'=>array(
                            'basePath'=>Yiibase::getPathOfAlias('common.messages')
                        ),
                        'bootstrap' => array(
				'class' => 'common.extensions.bootstrap.components.Bootstrap',
				'responsiveCss' => true,
			),
			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
			),
			'db' => array(
				'connectionString' => $params['db.connectionString'],
				'username' => $params['db.username'],
				'password' => $params['db.password'],
				'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
				'enableParamLogging' => YII_DEBUG,
				'charset' => 'utf8',
                                 'tablePrefix' => 'tbl_'
			),
			'urlManager'=>array(
                            //'class'=>'application.components.UrlManager',
                            'urlFormat'=>'path',
                            'showScriptName'=>false,
                            'rules'=>array(
                                '<language:(am|ru|en)>/' => 'site/index',
                                '<language:(am|ru|en)>/about' => 'site/about',
                                '<language:(am|ru|en)>/calculator' => 'site/calculator',
                                 '<language:(am|ru|en)>/technologs' => 'site/technologs',
                                '<language:(am|ru|en)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
                                '<language:(am|ru|en)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                                '<language:(am|ru|en)>/<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
                                '<language:(am|ru|en)>/<controller:\w+>/'=>'<controller>/index',
                                '<language:(am|ru|en)>/<module:\w+>/<controller:\w+>/<action:\w+>/*' => '<module>/<controller>/<action>',
                              
                            ),
                         ),
			/* make sure you have your cache set correctly before uncommenting */
			/* 'cache' => $params['cache.core'], */
			/* 'contentCache' => $params['cache.content'] */
		),
            'params'=>array(
            	'adminEmail' => 'info@ce.am',
                'languages'=>array('ru'=>'<img src="/emo/frontend/www/img/ru.png">', 'am'=>'<img src="/emo/frontend/www/img/hy.png">', 'en'=>'<img src="/emo/frontend/www/img/en.png">'),
            ),
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);