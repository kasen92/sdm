<?php

	class User {
		public $id;
		public $nombre;
		public $contrasena;
		public $rol;

		function __construct($id, $nombre, $contrasena, $rol){
			$this->id=$id;
			$this->nombre=$nombre;
			$this->contrasena=$contrasena;
			$this->rol=$rol;
		}
	}