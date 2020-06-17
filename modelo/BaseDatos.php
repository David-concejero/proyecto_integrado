<?php

abstract class conectarBaseDatos{

	public static function hacerLogin(){
		try{
			$conexion = new PDO(
     			'mysql:host=localhost;dbname=cine',
     			'usuario_cine',
     			'Aabc123.',
      			 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
			return $conexion;
		}
		catch (PDOException $e) {
			echo "Error : " . $e->getMessage() . "<br/>";
		die();
		}
	}

	public static function hacerConsulta($consulta){
		$conexion = self::hacerLogin();
		$resultado_consulta = $conexion->prepare($consulta);
		$resultado_consulta->execute();
		$desconectar = self::desconectarBD($conexion);
		return $resultado_consulta;
	}

	public static function desconectarBD($conexion){
		$conexion = null;
		return $conexion;
	}

	
}

?>