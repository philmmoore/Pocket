<?php 

	class Controller {

		public $params;
		public $view;

		public function __construct(){
			$this->params = Router::$route->params;
			$this->view = new View;
		}

	}

?>