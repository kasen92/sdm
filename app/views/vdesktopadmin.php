<?php
	/**
	 *  vHome
	 *  Prepares and loads the corresponding Template
	 *  @author Toni
	 * 
	 * */
	class vDesktopAdmin extends View{

		function __construct($data=null){
			parent::__construct($data);
			$this->tpl=Template::load('desktopadmin',$this->view_data);
			
		}

	}