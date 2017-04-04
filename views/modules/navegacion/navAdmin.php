
<nav class="navbar ">
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
		<li><a href="index.php?action=salir">Salir</a></li>
		<li><a href='#'>

		<?php
		

		if(isset($_SESSION["typeUser"])){
			echo 'Tipo de usuario: '.$_SESSION["typeUser"];

		}
		 ?>
		 </a></li>
	</ul>
</nav>
