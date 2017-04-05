<?php


if($_SESSION["typeUser"]<>'Admin'){
	header("location:index.php?action=ingresar");
	exit();
}

 ?>
<h1>Personas</h1>

	<table border="1">

		<thead>

			<tr>
				<th>Id</th>
				<th>Apellido</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>CUIL</th>
        <th>Fecha Nac.</th>
        <th>Sexo</th>
        <th>Telefono Fijo</th>
        <th>Telefono Movil</th>
        <th>Email</th>
				<th>Dirección</th>
				<th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>
			<?php
			$ver = new ControllerPerson();
			$ver->vistaPersonController();
			$ver->borrarPersonController();

			 ?>

		</tbody>
	</table>

	<?php
	if(isset($_GET["action"])){
		if($_GET["action"]=="cambio"){
			echo "Cambio Exitoso";
		}
	}
	 ?>
