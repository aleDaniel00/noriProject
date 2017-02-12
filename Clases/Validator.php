<?php
// Validator.php

class Validator {
	public $errores = array(); // Mensajes de error
	public $campos = array(); // Campos del form
	public $requerimientos = array();
	
	public function __construct($metodo, $reqs) {
		switch(strtolower($metodo)) {
			case 'get':
				$this->campos = $_GET;
				break;
			
			case 'post':
				$this->campos = $_POST;
				break;
			
			default:
				throw new Exception("Método inválido. Debe ser GET o POST");
		}
		$this->requerimientos = $reqs;
		$this->validar();
	}
	
	public function validar() {
		// Recorro los campos y obtengo sus requerimientos
		foreach($this->requerimientos as $campo => $validaciones) {
			// Recorro las validaciones
			foreach($validaciones as $key => $value) {
				/*
				array('required')
				array('minLength' => 4)
				*/
				
				// ej: $key: 0, $value: 'required'
				if(is_int($key)) {
					// Armo nombre del método. Ej: validarRequired
					$metodo = "validar" . ucfirst($value);
					
					// Verifico que el método exista en la clase
					if(!method_exists($this, $metodo)) {
						throw new Exception("No existe la validación " . $value . ".");
					}
					
					// Ejecuto el método
					if(!$this->$metodo($campo)) {
						break;
					}
				} else { // ej: $key: minLength, $value: 4
					// Armo nombre del método. Ej: validarMinLength
					$metodo = "validar" . ucfirst($key);
					
					// Verifico que el método existe en la clase
					if(!method_exists($this, $metodo)) {
						throw new Exception("No existe la validación " . $key . ".");
					}
					
					// Ejecuto el método
					if(!$this->$metodo($campo, $value)) {
						break;
					}
				}
			}
		}
	}
	
	public function esValido() {
		return empty($this->errores);
	}
	
	public function validarRequired($campo) {
		// Ej: $_POST['nombre']
		if(empty($this->campos[$campo])) {
			$this->errores[$campo] = "Este campo es obligatorio.";
			return false;
		}
		return true;
	}
	
	public function validarIsNumber($campo) {
		if(!is_numeric($this->campos[$campo])) {
			$this->errores[$campo] = "Este campo debe ser numérico.";
			return false;
		}
		return true;
	}
	
	public function validarMinLength($campo, $valor) {
		if(strlen($this->campos[$campo]) < $valor) {
			$this->errores[$campo] = "Este campo debe tener al menos " . $valor . " caracteres.";
			return false;
		}
		return true;
	}
	
	public function validarCompare($campo, $campoAComparar) {
		if($this->campos[$campo] != $this->campos[$campoAComparar]) {
			$this->errores[$campo] = "Los campos no coinciden.";
			return false;
		}
		return true;
	}
	
	public function validarMail($campo) {
		if(!filter_var($this->campos[$campo], FILTER_VALIDATE_EMAIL)) {
			$this->errores[$campo] = "Este campo NO tiene formato de email.";
			return false;
		}
		return true;
	}
}