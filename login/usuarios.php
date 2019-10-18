<?php

require "conexion.php";

class Usuarios {

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/
	static public function mostrarUsuario($tabla, $item, $valor) {

		if($item!=null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();
			return $stmt -> fetch();
		}

		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ingresoUsuario() {

		if(isset($_POST["usuario"])) {

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {

				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST["usuario"];

				$respuesta = Usuarios::mostrarUsuario($tabla, $item, $valor);

				// var_dump($respuesta["nombre"]);

				if ($_POST["usuario"] == $respuesta["usuario"] && $_POST["password"] == $respuesta["password"]) {


					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];

					echo '<script>
						window.location = "ingreso.php";
					</script>';

				} 

			}

		}

	}



}