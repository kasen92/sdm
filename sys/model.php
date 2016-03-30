<?php

	class Model{

		protected $db;
		protected $stmt;
		protected $transactionCounter = 0; 

		function __construct(){
			$this->db=DB::singleton();
		}

		function Query($query){
			$this->stmt=$this->db->prepare($query);
		}

		function Bind($param, $value, $type=null){

			if(is_null($type)){
				//Debemos averiguar que formato es
				if(is_null($value)){
					$type=PDO::PARAM_NULL;
				}else if(is_string($value)){
					$type=PDO::PARAM_STR;
				}else if(is_bool($value)){
					$type=PDO::PARAM_BOOL;
				}else if(is_int($value) || is_float($value)){
					$type=PDO::PARAM_INT;
				}
			}
			$this->stmt->bindValue($param,$value,$type);
		}

		function Execute(){
			$this->stmt->execute();
		}

		function ResultSet(){
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function Single(){
			return $this->stmt->fetch();
		}

		function RowCount(){
			return $this->stmt->RowCount();
		}

		function LastInsertId(){
			return $this->db->lastInsertId();
		}

		function BeginTransaction() 
	    { 
	        if($this->transactionCounter==0){
	        	$this->transactionCounter=1;
	        	return $this->db->beginTransaction(); 
	        } 
	        return false;
	    } 

	    function EndTransaction() 
	    { 
	       	if($this->transactionCounter==1){
	       		$this->transactionCounter=0;
	       		return $this->db->commit(); 
	       	}
	       return false;
	    } 

	    function cancelTransaction() 
	    { 
	        if($this->transactionCounter==1) 
	        { 
	            $this->transactionCounter=0; 
	            return $this->db->rollback(); 
	        }  
	        return false; 
	    } 
	    
	    function debugDumpParams(){
	    	return $this->stmt->debugDumpParams();	
	    }

	    function errorCode(){
	    	return $this->stmt->errorCode();	
	    }
	    
	}