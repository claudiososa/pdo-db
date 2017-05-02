<h4>Formulario Crear Persona</h4>
<form method="post" onsubmit="return validarRegistro()">
	<input type="hidden" name="personRegistro" id="personRegistro" required>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Tipo de Usuario</label></div>
		<div class="col-md-12">
			<select class="control-form" name="typeRegistro">
					<option value="Alumno">Alumno</option>
					<option value="Docente">Docente</option>
					<option value="Tutor">Tutor</option>
					<option value="Director/a">Director/a</option>
					<option value="Preceptor/a">Preceptor/a</option>
					<option value="Admin">Administrador</option>
			</select>
  	</div>


	<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Estado de Usuario</label></div>
	<div class="col-md-12">
		<select class="control-form" name="statusRegistro">
				<option value="Inactivo">Inactivo</option>
				<option value="Activo">Activo</option>
		</select>
	</div>


	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="lastnameRegistro">Apellido</label></div>
		<div class="col-md-12">
			<input type="text" placeholder="Apellido" name="lastnameRegistro" id="lastnameRegistro" required>
  	</div>
	</div>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="firstnameRegistro">Nombre</label></div>
		<div class="col-md-12">
			<input type="text" placeholder="Nombre" name="firstnameRegistro" id="firstnameRegistro" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-12"><label class="control-label" for="dniRegistro">DNI</label></div>
		<div class="col-md-12">
		  <input type="text" placeholder="DNI" name="dniRegistro"  id="dniRegistro" required>
	  </div>
  </div>

  <div class="form-group">
    <div class="col-md-12"><label class="control-label" for="cuilRegistro">CUIL</label></div>
    <div class="col-md-12">
      <input type="text" placeholder="CUIT" name="cuilRegistro"  id="cuilRegistro" required>
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
      <input type="text" placeholder="Sexo" name="sexoRegistro"  id="sexoRegistro" required>
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
