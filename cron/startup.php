<?php 
// Define path to application directory
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

spl_autoload_register(function ($class) {
	if(strpos($class, "Application_Model_") !== false)
	{
		require_once APPLICATION_PATH . '/models/' . str_replace("Application_Model_", "", $class) . '.php'; 
	} else {
		$path = str_replace( '_', '/', $class );
		require_once APPLICATION_PATH . '/namespaces/' . $path . '.class.php';
	}
});
?>