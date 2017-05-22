<h4>Formulario Crear Persona</h4>
<form method="post" onsubmit="return validarRegistro()">
	<input type="hidden" name="personRegistro" id="personRegistro" required>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Tipo de Usuario</label></div>
		<div class="col-md-12">
			<?php
			if($_SESSION["typeUser"]=='Preceptor/a'){
				echo '<input type="text" name="typeRegistro" Value="Alumno" readonly>';
			}else{
				?>
				<select class="control-form" name="typeRegistro">
						<option value="Alumno">Alumno</option>
						<option value="Docente">Docente</option>
						<option value="Tutor">Tutor</option>
						<option value="Director/a">Director/a</option>
						<option value="Preceptor/a">Preceptor/a</option>
						<option value="Admin">Administrador</option>
				</select>

			<?php
			}

			?>

  	</div>
  <?php
		if($_SESSION["typeUser"]<>'Preceptor/a'){
				echo '<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Estado de Usuario</label></div>';
		}
	?>

	<div class="col-md-12">
		<?php
		 if($_SESSION["typeUser"]=='Preceptor/a'){
			echo '<input type="hidden" name="statusRegistro" Value="Inactivo" readonly>';
		}else{
			?>
		<select class="control-form" name="statusRegistro">
				<option value="Inactivo">Inactivo</option>
				<option value="Activo">Activo</option>
		</select>
		<?php
		}

		?>

	</div>


	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Apellido</label></div>
		<div class="col-md-12">
			<input type="text" placeholder="Apellido" name="lastnameRegistro"
			<?php
			if(isset($_GET['id'])){
				echo "value='".$respuesta['lastname']."'";
			} ?>
			id="lastnameRegistro" required autofocus>
  	</div>
	</div>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="firstnameRegistro">Nombre</label></div>
		<div class="col-md-12">
			<input type="text" placeholder="Nombre" name="firstnameRegistro"
			<?php
			if(isset($_GET['id'])){
				echo "value='".$respuesta['firstname']."'";
			} ?>
			 id="firstnameRegistro" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="dniRegistro">DNI</label></div>
		<div class="col-md-12">
		  <input type="text" placeholder="DNI" name="dniRegistro"
			<?php
			if(isset($_GET['id'])){
				echo "value='".$respuesta['dni']."'";
			} ?>
			 id="dniRegistro" required>
	  </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="cuilRegistro">CUIL</label></div>
    <div class="col-md-12">
      <input type="text" placeholder="CUIT" name="cuilRegistro"
			<?php
			if(isset($_GET['id'])){
				echo "value='".$respuesta['cuil']."'";
			} ?>
			  id="cuilRegistro" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="birthdayRegistro">Fecha Nac</label></div>
    <div class="col-md-12">
      <input type="date" placeholder="Fecha Nacimiento" name="birthdayRegistro"  id="birthdayRegistro" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="sexoRegistro">Sexo</label></div>
    <div class="col-md-12">
			<select class="control-form" name="sexoRegistro" id="sexoRegistro">
				<?php
				if(isset($_GET['id'])){
					if($respuesta['sexo']=="M"){
					echo '<option value="M" selected>Masculino</option>';
					echo '<option value="F">Femenino</option>';
					}else{
					echo '<option value="M">Masculino</option>';
					echo '<option value="F" selected>Femenino</option>';
					}
				}else{
					echo '<option value="M">Masculino</option>';
					echo '<option value="F">Femenino</option>';
				}

				?>

			</select>

    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="phoneRegistro">Telefono Fijo</label></div>
    <div class="col-md-12">
      <input type="text" placeholder="Teléfono Fijo" name="phoneRegistro"  id="phoneRegistro" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="movilRegistro">Teléfono Celular</label></div>
    <div class="col-md-12">
      <input type="text" placeholder="Teléfono Celular" name="movilRegistro"  id="movilRegistro" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="emailRegistro">Email</label></div>
    <div class="col-md-12">
      <input type="email" placeholder="Email" name="emailRegistro"  id="emailRegistro" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="direccionRegistro">Dirección</label></div>
    <div class="col-md-12">
      <input type="text" placeholder="Dirección" name="addressRegistro"  id="addressRegistro" required>
    </div>
  </div>


	<div class="form-group">
		<input type="submit" value="Guardar">
  </div>
</form>
