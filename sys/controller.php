<?php
	/**
	 *  Controller
	 *  
	 *  @author Toni
	 *  @package sys
	 * 
	 * 
	 * */
	
	class Controller{
		protected $model;
		protected $view; 
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			$this->conf=Registry::getInstance();
		}

		protected function ajax_set($output){
			$output= json_encode($output); 
			// netegem buffer de sortida
			ob_clean();
			echo $output;
		}
		
	}