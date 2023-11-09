<!DOCTYPE html>
<html>

<head>
    <title>Crear un Nuevo Archivo</title>
    <link rel="icon" type="png" href="imagenes/php.png">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <form action="crear_archivo.php" method="POST">
        <h2>Crear Archivo</h2><br>
        <div class="input_formulario">
            <label for="filename">Nombre del archivo:</label>
            <input type="text" id="filename" name="filename" required>
        </div>
        <label class="cont" for="content">Contenido:</label>
        <textarea id="content" name="content" rows="4" required></textarea><br>
        <?php
        session_start();

        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
            header('Location: index.html');
            exit();
        }

        $rol = $_SESSION['rol'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filename = $_POST['filename'];
            $contenido = $_POST['content'];

            //verifico el rol del usuario
            if ($rol === 'admin') {
                $archivoNuevo = fopen($filename, "w+"); //$permiso);
        
                if ($archivoNuevo) {
                    fwrite($archivoNuevo, $contenido);
                    fclose($archivoNuevo);
                    echo "Archivo '$filename' fue creado con éxito.";
                    echo "<br>";
                }
            } else {
                $permiso = "r";
                echo "No se puede crear el archivo, este usuario solo tiene permiso de lectura";
                echo "<br>";
            }
        }
        echo "<br>";
        ?>

        <input class="boton" type="submit" value="Crear">
    </form>

    <a href="opciones.php">
        <div><button class="boton2" id="salir">opciones</button></div>
    </a>
    </div>
</body>

</html>