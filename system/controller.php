<?php 

	namespace PocketFramework;

	class Controller {

		public $params;
		public $view;

		public function __construct(){
			$this->params = \PocketFramework\Router::$route->params;
			$this->view = new \PocketFramework\View;
		}

	}

?>