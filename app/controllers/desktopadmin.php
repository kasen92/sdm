<?php 

class DesktopAdmin extends Controller{
	protected $model;
	protected $view;
	
	function __construct($params){
		parent::__construct($params);
		$this->model=new mDesktopAdmin();
		$this->view= new vDesktopAdmin(null);
	}

	function home(){		
	}

	function CargarDatosUsuarios(){
		$contadorvar=$this->model->obtenerDatosUsuarios();
		if ($contadorvar!=null){
			$output=utf8_string_array_encode($contadorvar);
			$this->ajax_set($output);
		}else{
			return false;
		}
	}

	function editarPerfilUsuario(){
		if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['contrasena']) && isset($_POST['rol'])){
			$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
			$nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
			$contrasena=filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);
			$rol=filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_STRING);

			$contadorvar=$this->model->editarDatosUsuarios($id, $nombre, $contrasena, $rol);
			if ($contadorvar==true){
				$output="OK";
				$this->ajax_set($output);
			}else{
				return false;
			}
		}
	}

	function deleteuser(){
		if(isset($_POST['id'])){
			$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
			$contadorvar=$this->model->deleteuser($id);
			if ($contadorvar==true){
				$output="OK";
				$this->ajax_set($output);
			}else{
				return false;
			}
		}
	}

}