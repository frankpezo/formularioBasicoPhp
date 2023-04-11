<?php
//2. Comprobamos si se ha accedido al archivo mediante el formulario
$errores = '';
$enviar = '';
if( isset($_POST['submit'])){
  //2.1. Traemos los campos del formulario con el post
  $nombre = $_POST['nombre'];
  $correo = $_POST['email'];
  $mensaje = $_POST['mensaje'];
 // echo 'Tu nombre: '. $nombre; 

  //2.3. Comprobamos si los campos no están vacíos
  //nombre
  if(!empty($nombre)){
    $nombre = trim($nombre);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  }else{
    $errores .= 'Por favor ingresa un nombre <br />';
  } 

 //correo
 if(!empty($correo)){
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
  //Para comprobar que el correo es válido
  if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
    $errores.= "Ingrese un correo válido <br />";
  }

 }else{
    $errores .= "Ingrese un correo <br />";
 }

 //Mensaje
 if(!empty($mensaje)){
    $mensaje = trim($mensaje);
    $mensaje = htmlspecialchars($mensaje);
    $mensaje = stripslashes($mensaje);
 }else{
    $errores .= "Ingrese un mensaje <br />";
 }

 //Si no hay errores
 if(!$errores){
    $envioMensaje = 'frank@gmail.com';
    $asunto = 'Correo enviado desde miPagina.com';
    $mensajePreparado = "De: $nombre \n";
    $mensajePreparado .= "Correo: $correo \n";
    $mensajePreparado .= "Mensaje: " . $mensaje;
    //Usamos la función mail() para enviar el correo
    //Esta función no nos funcionará en el localhost utilizando el xamp,
    //solo funcionará en un servidor real, al menos que hagamos una configuración especial
   /*   */
    $enviar = 'true';
 }


}





//1. Incorporar el archivo de view
require 'index.View.php';
?>