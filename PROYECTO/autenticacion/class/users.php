<?php
session_start();

class Users{
	
	public $objDb;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	
	public function __construct(){
		
		$this->objDb = new Database();
		$this->objSe = new Sessions();
		
	}
	
	public function login_in(){
		
		$query = "SELECT * FROM users, profiles WHERE users.loginUsers = '".$_POST["usern"]."' 
			AND users.passUsers = '".$_POST["passwd"]."' AND users.idprofile = profiles.idProfile ";
		$this->result = $this->objDb->select($query);
		$this->rows = mysql_num_rows($this->result);
		if($this->rows > 0){
			
			if($row=mysql_fetch_array($this->result)){
				
				$this->objSe->init();
				$this->objSe->set('user', $row["loginUsers"]);
				$this->objSe->set('iduser', $row["idUsers"]);
				$this->objSe->set('idprofile', $row["idprofile"]);
				
				$this->useropc = $row["nameProfi"];

				$_SESSION["usuario"] = $row["nameUser"];
				// $cedula = $_SESSION["cedula"];
				
				switch($this->useropc){
					
					case 'Standard':
						header('Location: ../iniciar_sesion.php');
						break;
						
					case 'Administrador':
						header('Location: ../products.php');
						break;					
				}
				
			}
			
		}else{
			
			header('Location: ../iniciar_sesion.php?error=1');
			
		}
		
	}
	
}

?>