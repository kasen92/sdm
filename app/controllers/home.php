<?php
	
class Home extends Controller{
	protected $model;
	protected $view;
	
	function __construct($params){
		parent::__construct($params);
		$this->model=new mHome();
		$this->view=new vHome(null);
	}

	function home(){

	}

	function login(){			
		if(isset($_POST['usuario'])){
			$usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
			$contrasena=filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);
		
			$user=$this->model->login($usuario,$contrasena);
			if ($user==TRUE){
				$output=array('redirect'=>APP_W);
				$this->ajax_set($output);
			}else{ 
				Session::set('connect',False);
				Session::set('usuario',"");
				$output=array('redirect'=>APP_W.'register');
				$this->ajax_set($output);
			}
		}
	}

	function desconectar(){
		Session::set('connect',False);
		Session::set('nombre',"");
		header('Location: '.APP_W);
	}

}
