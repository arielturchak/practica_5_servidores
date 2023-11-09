<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    //si el usuario no inicia sesion se lo redirige
    header('Location: index.html');
    exit();
}

//obtener el nombre del usuario y rol desde la sesion
$username = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

$clientes = [
    "cliente1" => "c123",
    "cliente2" => "c1234",
    "cliente3" => "c12345",
];

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../Formulario/css/estilos.css">
    <link rel="icon" type="png" href="imagenes/php.png">
    <title>Opciones del Directorio</title>
</head>

<body>
    <div class="contenedor">
        <h2>Bienvenido,
            <?php //opciones segun rol
            if ($rol === 'admin') { //opciones del administrador
                echo $username;
            } elseif ($rol === $clientes) {
                echo $username;
            } else {
                header("Location:index.html");
            }
            ?>
        </h2>
        <p>Fecha y hora de acceso:
            <?php echo $_SESSION['acceso']; ?>
        </p><br>
        <div class="input_formulario">
            <img class="input_icon" src="imagenes/mapa.png" alt="ruta actual">
            <div class="opcion"><a href="ruta_actual.php">Obtener la ruta actual</a></div>
        </div>

        <div class="input_formulario">
            <img class="input_icon" src="imagenes/buscar.png" alt="buscar">
            <div class="opcion"><a href="buscar_archivo.php">Buscar un fichero</a></div>
        </div>

        <div class="input_formulario">
            <img class="input_icon" src="imagenes/agregar.png" alt="crear fichero">
            <div class="opcion"><a href="crear_archivo.php">Crear un fichero</a></div>
        </div>
        <div>
            <a href="logout.php">
                <button class="boton" id="salir">cerrar sesión</button>
            </a>
        </div>

</body>

</html>