<?php

	class View{

		protected $tpl;
		protected $view_data;
		
		function __construct($data=null){
			
			$conf=Registry::getInstance();
			// access to app_data that configures html-view
			$this->view_data=(array)$conf->app;

			if (!is_null($data)){
				$this->view_data += $data;
			}
			ob_start();
		}
		
	}