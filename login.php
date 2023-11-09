<?php
session_start(); //inicioamos sesión

// Definir como variables usuario y contraseña
$administrador = "admin";
$contrasenaAdmin = "1234";
//defino otros usuarios (clientes y contraseñas)
$clientes = [
    "cliente1" => "c123",
    "cliente2" => "c1234",
    "cliente3" => "c12345",
];
// Obtengo los datos del formulario y los alamaceno en las variables username y password
$username = $_POST['username'];
$password = $_POST['password'];

// Validacion de las credenciales administrador
if ($username === $administrador && $password === $contrasenaAdmin) { //si el usuario y contraseña coiniden se procede a la autenticación
    $_SESSION['usuario'] = $administrador; //guardo el usuario y la fecha (acceso)
    $_SESSION['rol'] = "admin";
    $_SESSION['acceso'] = date('Y-m-d H:i:s');
    header('Location: opciones.php'); //se redirige a opciones, ya que todo coincide
    //$_SESSION['session'] = true;
    //echo "has iniciado sesion" . $_SESSION['session'];
    //validacion clientes
} elseif (array_key_exists($username, $clientes) && $clientes[$username] === $password) {
    $_SESSION['usuario'] = $username;
    $_SESSION['rol'] = $clientes;
    $_SESSION['acceso'] = date('Y-m-d H:i:s');
    header('Location: opciones.php');

} else {
    header('Location: index.html'); //en caso de que no sea el usario lo redirigue a la pagina de inicio
    //echo "Error usuario o clave invalida";
}

?>