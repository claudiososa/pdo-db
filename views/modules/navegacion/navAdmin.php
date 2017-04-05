
<nav class="navbar ">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php">5159</a>
	</div>


  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
		<li><a href="index.php">Registro</a></li>
		<?php
		if(isset($_SESSION["typeUser"]))
		{
			echo '<li><a href="index.php?action=ok">Inicio</a></li>';
		}else{
     echo '<li><a href="index.php?action=ingresar">Ingreso</a></li>';
		}
 		?>
		<li><a href="index.php?action=usuarios">Usuarios</a></li>
		<li><a href="index.php?action=createPerson">Crear Personas</a></li>
		<li><a href="index.php?action=person">Listar Personas</a></li>


		<li><a href="index.php?action=salir">Salir</a></li>
		<li><a href='#'>

		<?php


		if(isset($_SESSION["typeUser"])){
			echo 'Tipo de usuario: '.$_SESSION["typeUser"];

		}
		 ?>
		 </a></li>
	</ul>
</div>
</div>
</nav>
