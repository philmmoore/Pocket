<?php

	function getClassInfo($class){
		$return = new stdClass;
		$class = explode('\\', $class);
		$num_parts = count($class);
		$return->file = strtolower(end($class).'.php');
		if ($num_parts > 1){
			$return->module = strtolower($class[0]);
			$return->namespace = '\\'.implode('\\', $class);
		}
		return $return;
	}

	function sys($class){
		$class = getClassInfo($class);
		$file = SYSTEM_DIR.'/'.$class->file;
		if (is_file($file)){
			include_once $file;
		}
	}

	function module($class){
		$file = APP_DIR.'/modules/'.\PocketFramework\Router::$route->module.'/controller.php';
		if (is_file($file)){
			include_once $file;
		}
	}

	function helpers($class){
		$file = SYSTEM_DIR.'/helpers/'.strtolower($class).'.php';
		if (is_file($file)){
			include_once $file;
		}
	}

	function models($class){

		$class = getClassInfo($class);

		if (is_file(APP_DIR.'/modules/'.\PocketFramework\Router::$route->module.'/models/'.$class->file)){
			include_once APP_DIR.'/modules/'.\PocketFramework\Router::$route->module.'/models/'.$class->file;
		} else if (APP_DIR.'/modules/'.$class->module.'/models/'.$class->file) {
			include_once APP_DIR.'/modules/'.$class->module.'/models/'.$class->file;
		} else {

			$ignore = array('.','..');
			$base = APP_DIR.'/modules';
			$dirs = scandir($base);
			foreach ($dirs as $dir){
				if (is_dir($base.'/'.$dir) && !in_array($dir, $ignore)){

					$file = $base.'/'.$dir.'/models/'.$class->file.'.php';
					if (is_file($file)){
						include_once $file;
					}

				}
			}

		}
	}

	spl_autoload_register('sys');
	spl_autoload_register('module');
	spl_autoload_register('helpers');
	spl_autoload_register('models');

?>