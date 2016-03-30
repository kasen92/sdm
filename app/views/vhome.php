<?php
	
class vHome extends View{

	function __construct($data=null){
		parent::__construct($data);
		$this->tpl=Template::load('home',$this->view_data);
		
	}

}