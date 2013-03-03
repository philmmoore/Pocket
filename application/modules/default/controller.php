<?php 

	class Default_Controller extends Controller {

		public function __construct(){
			parent::__construct();
		}

		public function index(){

			$data['title']       = 'Hello World';
			$data['description'] = '';
			$data['keywords']    = '';
			
			$this->view->set('data', $data);
			$this->view->set('view', 'index.php');
			$this->view->load();

		}

	}

?>