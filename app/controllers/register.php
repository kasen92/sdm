<?php
	
class Register extends Controller{
	protected $model;
	protected $view;
	
	function __construct($params){
		parent::__construct($params);
		$this->model=new mRegister();
		$this->view=new vRegister(null);
	}

	function home(){

	}


}