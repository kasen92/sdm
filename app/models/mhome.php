<?php

class mHome extends Model{

	function __construct(){
		parent::__construct();
	}

	function login($usuario,$contrasena){
		try{
			$sql="SELECT id, nombre, contrasena, rol FROM usuarios WHERE nombre=? AND contrasena=?";
			$this->Query($sql);
			$this->Bind(1,$usuario);
			$this->Bind(2,$contrasena);
			$this->Execute();
			if($this->RowCount()==1){
				$usuario=$this->Single();
				Session::set('connect',TRUE);
       			Session::set('usuario',new User($usuario["id"],$usuario["nombre"],$usuario["contrasena"],$usuario["rol"]));
       			return TRUE;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
	}

}