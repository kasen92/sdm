<?php
	/**
	 *  vHome
	 *  Prepares and loads the corresponding Template
	 *  @author Toni
	 * 
	 * */
	class vDesktop extends View{

		function __construct($data=null){
			parent::__construct($data);
			$this->tpl=Template::load('desktop',$this->view_data);
			
		}

	}