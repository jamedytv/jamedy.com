<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('HTML5');
	}
	
	protected function _initAutoloader()
	{
		spl_autoload_register(function ($class) {
			$path = str_replace( '_', '/', $class );
			include APPLICATION_PATH . '/classes/' . $path . '.class.php';
		});
	}
	
	protected function _initRoutes()
	{
		
	}

}

