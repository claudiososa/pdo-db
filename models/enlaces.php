<?php

class Paginas{

	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios"
			|| $enlaces == "editar" || $enlaces == "salir" || $enlaces == "person" || $enlaces == "editarPerson"
			|| $enlaces == "createPerson"  ){

			$module =  "views/modules/".$enlaces.".php";

		}

		else if($enlaces == "index"){

			$module =  "views/modules/registro.php";

		}

		else if($enlaces == "ok"){

			$module =  "views/modules/inicio.php";

		}
		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";

		}
		else if($enlaces == "fallo3intentos"){

			$module =  "views/modules/ingresar.php";

		}
		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";

		}
		else if($enlaces == "cambioperson"){

			$module =  "views/modules/person.php";

		}

		else{

			$module =  "views/modules/registro.php";

		}

		return $module;

	}

}

?>
