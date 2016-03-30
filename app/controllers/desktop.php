<?php 

class Desktop extends Controller{
	protected $model;
	protected $view;
	
	function __construct($params){
		parent::__construct($params);
		$this->model=new mDesktop();
		$this->view= new vDesktop(null);
	}

	function home(){
	}


}