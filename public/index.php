<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

//@todo clean this up, maybe a config file and maybe not globals.
define('DEFAULT_SEARCH_STRING', 'hip-hop');
define('DEFAULT_CRITERIA', 'nas');
define('DEFAULT_VIDEO_ID', '1000111');

/**Routing Info*/
$FrontController=Zend_Controller_Front::getInstance();
$Router = $FrontController->getRouter();

$Router->addRoute("search", new Zend_Controller_Router_Route(
		'/find/:searchString',
		array(  'searchString' => DEFAULT_SEARCH_STRING,
				'controller' => 'video',
				'action' => 'search'
		)));

$Router->addRoute("browse", new Zend_Controller_Router_Route(
		'/sounds-like/:criteria',
		array(  'criteria' => DEFAULT_CRITERIA,
				'controller' => 'video',
				'action' => 'browse'
		)));

$Router->addRoute("watch", new Zend_Controller_Router_Route(
		'/watch/:id',
		array(  'id' => DEFAULT_VIDEO_ID,
				'controller' => 'video',
				'action' => 'watch'
		)));

$application->bootstrap()
            ->run();