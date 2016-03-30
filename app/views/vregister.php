<?php
	
class vRegister extends View{

	function __construct($data=null){
		parent::__construct($data);
		$this->tpl=Template::load('register',$this->view_data);
		
	}

}