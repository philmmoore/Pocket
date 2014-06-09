<?php 

	namespace PocketFramework;

	class View {

		public $options;

		public function __construct(){

			$defaults = array(
				'inc_header_footer' => true,
				'header' => (\PocketFramework\Pocket::$config->defaults->view->header ? \PocketFramework\Pocket::$config->defaults->view->header : ''),
				'footer' => (\PocketFramework\Pocket::$config->defaults->view->footer ? \PocketFramework\Pocket::$config->defaults->view->footer : '')
			);

			$this->options = $defaults;

		}

		public function set($key, $options){
			$this->options[$key] = $options;
		}

		public function load(){
	
			if ($this->options['data']){
				$data = $this->options['data'];
				extract($data);
				unset($this->options['data']);
			}			

			// Parse View data
			$this->options = json_decode(json_encode($this->options));

			// Header 
			
			if ($this->options->inc_header_footer == true){
				if (isset($this->options->header) && ($this->options->header != '')){
					if (!include_once $this->options->header){
						throw new Exception('View header "'.$this->options->header.'" not found');
					}
				}
			}

			// View

			if (!include_once APP_DIR.'/modules/'.\PocketFramework\Router::$route->module.'/views/'.$this->options->view){
				throw new Exception('View "'.APP_DIR.'/modules/'.\PocketFramework\Router::$route->module.'/views/'.$this->options->view.'" not found');
			}

			// Footer
			
			if ($this->options->inc_header_footer == true){
				if (isset($this->options->footer) && ($this->options->footer != '')){
					if (!include_once $this->options->footer){
						throw new Exception('View footer "'.$this->options->footer.'" not found');
					}
				}
			}
		
		}

	}

?>
