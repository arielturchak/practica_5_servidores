<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: index.html');
    exit();
}

$files = array(); // Array para almacenar los archivos encontrados
$searchedFiles = array(); // Array para almacenar los archivos que coinciden con la búsqueda
$directory = "C:\xampp\htdocs";


?>
<!DOCTYPE html>
<html>

<head>
    <title>Buscar Archivo</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="png" href="imagenes/php.png">
</head>

<body>
    <form action="buscar_archivo.php" method="POST">
        <h2>Buscar un Archivo</h2><br>
        <div class="input_formulario">
            <label for="filename">Nombre del archivo:</label>
            <input type="text" id="archivos" name="filename" required>
        </div>
        <div class="php">
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $filename = $_POST["filename"];
                $files = glob("*" . $filename . "*");
                echo "<h3>Archivos encontrados:</h3>";
                foreach ($files as $file) {
                    echo $file;
                    echo "<br>";
                }
            } else {
                echo "No se encontraron archivos con ese nombre.";
            }
            ?>
        </div>
        <div class="input_formulario"><br>
            <input class="buscar" type="submit" value="Buscar">
        </div>
    </form>


    <div class="opciones-button">
        <a href="opciones.php">
            <div><button class="boton1" id="salir">opciones</button></div>
        </a>
    </div>
</body>

</html>