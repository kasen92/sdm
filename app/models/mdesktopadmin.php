<?php

class mDesktopAdmin extends Model{

	function __construct(){
		parent::__construct();
	}

	function obtenerDatosUsuarios(){
		try{
			$sql="SELECT id, nombre, contrasena, rol FROM usuarios";
			$this->Query($sql);
			$this->Execute();
			return $this->ResultSet();
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		return false;
	}

	function editarDatosUsuarios($id, $nombre, $contrasena, $rol){
		try{
			$sql="UPDATE usuarios SET nombre=?, contrasena=? WHERE id=?";
			$this->Query($sql);
			$this->Bind(1,$nombre);
			$this->Bind(2,$contrasena);
			$this->Bind(3,$id);
			$this->Execute();
			return true;
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		return false;
	}


	function deleteuser($id){
		try{
			$sql="DELETE FROM usuarios WHERE id=?";
			$this->Query($sql);
			$this->Bind(1,$id);
			$this->Execute();
			return true;
		}catch(PDOException $e){
			echo "Error: ".$e->getMessage();
		}
		return false;
	}
	
}