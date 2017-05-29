$(document).ready(function() {
var valLetras = /^[A-ZÁÉÍÓÚÑÜ_\s-]+$/;
var valNumeros = /^[0-9]+$/;
var valCorreo = /^[A-Z0-9\._-]+@[A-Z0-9-]{2,}[.][A-Z]{2,4}|[.][A-Z]{2,4}$/;
var valDireccion = /^[A-ZÁÉÍÓÚÑÜ0-9\s._-]+$/;

  $("#submitRegistro").click(function(event) {
    /* Act on the event */
$("#error").remove();


if ( $("#lastnameRegistro").val() =="" || !valLetras.test($("#lastnameRegistro").val())) {
$("#lastnameRegistro").focus().after("<span class='error'>Campo obligatorio. (Solo letras mayúsculas)</span");

  return false;
}else {
$(".error").fadeOut();
 }

if ( $("#firstnameRegistro").val() =="" || !valLetras.test($("#firstnameRegistro").val())) {
$("#firstnameRegistro").focus().after("<span class='error'>Campo obligatorio.Solo letras mayúsculas.</span");
     return false
}else {
$(".error").fadeOut();
  }

if ($("#dniRegistro").val() =="" || !valNumeros.test($("#dniRegistro").val() )) {  $("#dniRegistro").focus().after("<span class='error'>Campo obligatorio. Solo números.</span>");
  return false
}else {
  $(".error").fadeOut();
}

if ($("#cuilRegistro").val() == "" || !valNumeros.test($("#cuilRegistro").val())) {
$("#cuilRegistro").focus().after("<span class='error'>Campo obligatorio. Solo números.</span>");
  return false
}else {
  $(".error").fadeOut();
}

//telefono fijo, celular e email no obligatorios
if ($("#phoneRegistro").val() != "" && !valNumeros.test($("#phoneRegistro").val())) {
$("#phoneRegistro").focus().after("<span class='error'>Ingrese solo números.</span>");
return false
}else {
  $(".error").fadeOut();
}

if ($("#movilRegistro").val() != "" && !valNumeros.test($("#movilRegistro").val())) {
$("#movilRegistro").focus().after("<span class='error'>Ingrese solo números.</span>");
return false
}else {
  $(".error").fadeOut();
}

if ($("#emailRegistro").val() != "" && !valCorreo.test($("#emailRegistro").val())) {
  $("#emailRegistro").focus().after("<span class='error'>Ingrese formato de email válido en mayúsculas. (Ejemplo: MICORREO@GMAIL.COM , MI CORREO@HOTMAIL.COM)");
  return false
}else {
  $(".error").fadeOut();
}

if ($("#addressRegistro").val() == "" || !valDireccion.test($("#addressRegistro").val())) {
  $("#addressRegistro").focus().after("<span class='error'>Campo obligatorio.Letras mayusculas y/o números");
  return false
}else {
  $(".error").fadeOut();
}
});


//  keyup


$("#lastnameRegistro").keyup(function(){
if ($(this).val() != "" && (valLetras.test($(this).val() ))){
    $(".error").fadeOut();
      return false;
}
});

$("#firstnameRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valLetras.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});

$("#dniRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valNumeros.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});

$("#cuilRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valNumeros.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});

$("#phoneRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valNumeros.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});

$("#emailRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valCorreo.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});


$("#addressRegistro").keyup(function() {
  /* Act on the event */
if ($(this).val() != "" && (valDireccion.test($(this).val() ))) {
  $(".error").fadeOut();
  return false;
}
});

});
