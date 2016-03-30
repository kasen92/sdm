<?php

	class DB extends PDO{
		static $_instance;

		public function __construct(){
			//recuperar dades configuració de Config.json
			$config=Registry::getInstance();
			$dbconf=(array)$config->dbconf;
			
			$dsn=$dbconf['driver'].':dbname='.$dbconf['dbname'].';host='.$dbconf['dbhost'];
			$usr=$dbconf['dbuser'];
			$pwd=$dbconf['dbpass'];

			try{
				parent::__construct($dsn,$usr,$pwd);
			}catch(PDOexception $e){
				echo $e->getMessage();
			}


		}
		
		static function singleton(){
			if(!(self::$_instance instanceof self)){
				self::$_instance=new self();
			}
			return self::$_instance;
		}
	}


 ?>