
<nav class="navbar navbar-default">


	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php">5159</a>
	</div>


  <div class="navbar-collapse collapse" id="navbar1">
	<ul class="nav navbar-nav">

		<?php
		if(isset($_SESSION["typeUser"]))
		{
			echo '<li class="active"><a href="index.php?action=ok">Inicio</a></li>';
		}else{
     echo '<li><a href="index.php?action=ingresar">Ingreso</a></li>';
		}
 		?>
		<li><a href="index.php?action=createCourse">Cursos</a></li>
		<li><a href="index.php?action=usuarios">Usuarios</a></li>
		<li><a href="index.php?action=createPerson">Crear Personas</a></li>
		<li><a href="index.php?action=person">Listar Personas</a></li>
		<li><a href="index.php?action=searchPerson">Buscar Persona</a></li>


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

</nav>
