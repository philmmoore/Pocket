<?php
 	
	include $base_dir.'../system/config/globals.php';
	define('TEST_APP_DIR', $base_dir.'../'.APP_DIR);
	define('TEST_SYSTEM_DIR', $base_dir.'../'.SYSTEM_DIR);

	function moduleModels($class){

		$ignore = array('.','..');
		$base = TEST_APP_DIR.'/modules';
		$dirs = scandir($base);

		foreach ($dirs as $dir){
			if (is_dir($base.'/'.$dir) && !in_array($dir, $ignore)){
				$file = $base.'/'.$dir.'/models/'.strtolower($class).'.php';
				if (is_file($file)){
					include_once $file;
				}
			}
		}

	}

	function moduleControllers($class){

		$ignore = array('.','..');
		$base = TEST_APP_DIR.'/modules';
		$dirs = scandir($base);

		foreach ($dirs as $dir){
			if (is_dir($base.'/'.$dir) && !in_array($dir, $ignore)){
				$file = $base.'/'.$dir.'/controller.php';
				if (is_file($file)){
					include_once $file;
				}
			}
		}

	}

	function systemClasses($class){
		$file = TEST_SYSTEM_DIR.'/'.strtolower($class).'.php';
		if (is_file($file)){
			include_once $file;
		}
	}

	function helpers($class){
		$file = TEST_SYSTEM_DIR.'/helpers/'.strtolower($class).'.php';
		if (is_file($file)){
			include_once $file;
		}
	}

	spl_autoload_register('systemClasses');
	spl_autoload_register('helpers');
	spl_autoload_register('moduleControllers');
	spl_autoload_register('moduleModels');

	App::setEnvironment($_SERVER['SERVER_NAME'], $base_dir.'../');

?>