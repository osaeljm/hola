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
		
		$query = "SELECT * FROM Usuario, Perfil WHERE Usuario.LoginUsuario = '".$_POST["usern"]."' 
			AND Usuario.ContrasenaUsuario = '".$_POST["passwd"]."' AND Usuario.IdPerfil = Perfil.IdPerfil ";
		$this->result = $this->objDb->select($query);
		$this->rows = mysql_num_rows($this->result);
		if($this->rows > 0){
			
			if($row=mysql_fetch_array($this->result)){
				
				$this->objSe->init();
				$this->objSe->set('usuario', $row["LoginUsuario"]);
				$this->objSe->set('idusuario', $row["IdUsuario"]);
				$this->objSe->set('idperfil', $row["IdPerfil"]);
				
				$this->useropc = $row["NombrePerfil"];

				$_SESSION["idusuario"] = $row["IdUsuario"];
				$_SESSION["usuario"] = $row["NombreUsuario"];
				$_SESSION["idperfil"] = $row["IdPerfil"];

				// $cedula = $_SESSION["cedula"];
				
				switch($this->useropc){
					
					case 'Cliente':
						header('Location: ../products.php');
						break;
						
					case 'Administrador':
						header('Location: ../perfil.php');
						break;					
				}
				
			}
			
		}else{
			
			header('Location: ../iniciar_sesion.php?error=1');
			
		}
		
	}
	
}

?>