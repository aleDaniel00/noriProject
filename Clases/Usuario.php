<?php

__autoload('DBConnection');


class Usuario {
	private $ID_USUARIO;
	private $NOMBRE;
	private $PASSWORD;
			
	public function __construct($id = null) {
		if(!is_null($id)) {
			// DB
			$query = "SELECT * FROM usuarios";
			$stmt = DBConnection::getStatement($query);
			$stmt->execute(array($id));
			$fila = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->cargarDeArray($fila);
		}
	}
	
	public static function login($mail,$pwd){
		$query = "SELECT * FROM usuarios WHERE NOMBRE = ? AND PASSWORD = ?";
		$stmt = DBConnection::getStatement($query);
		
		$stmt->execute(array($mail,$pwd));
	
		return $stmt->fetch();
		
	}
	public function cargarDeArray($fila) {
		foreach($fila as $prop => $valor) {
			$this->$prop = $valor;
		}
	}
	
	public static function getAll() {
		$query = "SELECT * FROM usuarios";
		$stmt = DBConnection::getStatement($query);
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	public function grabar() {
		$query = "INSERT INTO 
					usuarios 
					(NOMBRE,PASSWORD)
		    	VALUES(:nom,:pass);";
		$stmt = DBConnection::getStatement($query);
		$exito = $stmt->execute(
			array(
				':nom' => $this->NOMBRE,
				':pass' => $this->PASSWORD
			)				
		);
		if($exito) {
			header('Location:panelUsr.php');	
		} else {
			throw new Exception("Error en la consulta de inserción");
		} 
	}
	public static function cargarDeArrayModif($id) {
		$query = "SELECT * FROM usuarios WHERE ID_USUARIO = ?";
		$stmt = DBConnection::getStatement($query);
		$stmt->execute(array($id));
		return $stmt->fetchAll();
	}
	
	public function actualizar(){
		$query = "UPDATE 
					usuarios
					SET 
						NOMBRE=:nom,
						PASSWORD=:pass
												
					WHERE ID_USUARIO = :id
				;";
		$stmt = DBConnection::getStatement($query);
		$exito = $stmt->execute(
			array(
				':nom' => $this->NOMBRE,
				':pass' => $this->PASSWORD,
				':id' => $this->ID_USUARIO
			)
		);
		if($exito) {
			//echo 'exito';
			header('Location:panelUsr.php');	
		} else {
			throw new Exception("Error en la consulta de actaulizacion");
		} 
					
	}
	

	public function borrar($id) {
		$query = "DELETE FROM usuarios WHERE ID_USUARIO = ?;";
		$stmt = DBConnection::getStatement($query);
		$stmt->fetch(PDO::FETCH_ASSOC);
		$exito = $stmt->execute(array($id));
		return $stmt->fetchAll();
	}
	
	function setNOMBRE($nom) {
		$this->NOMBRE = $nom;
	}
	
	function getNOMBRE() {
		return $this->NOMBRE;
	}
	function setPASSWORD($pwd) {
		$this->PASSWORD = $pwd;
	}
	
	function getPASSWORD() {
		return $this->PASSWORD;
	}

}