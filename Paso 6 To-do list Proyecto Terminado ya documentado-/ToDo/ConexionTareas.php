<?php
// Incluye el archivo de conexión a la base de datos.
include '../php/conexion_be.php';

// Inicia la gestión de sesiones.
session_start();

try {
    // Crea una instancia de PDO para la conexión a la base de datos.
    $conn = new PDO('mysql:host=localhost; dbname=todo_list_db', 'root', '');

} catch (PDOException $e) {
    echo "Error de conexion:" . $e->getMessage();
}

// Actualiza el estado de una tarea si se proporciona un ID y una marca de completado.
if (isset($_POST['id'])) {
    # code...
    $id = $_POST['id'];
    $completado = (isset($_POST['completado'])) ? 1 : 0;

    $sql = "UPDATE tareas SET completado =? WHERE tarea_id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$completado, $id]);

}

// Agrega una nueva tarea si se envía el formulario de agregar tarea.
if (isset($_POST['agregar_tarea'])) {
    # code...
    $tarea = ($_POST['tarea']);
    $descripcion = ($_POST['descripcion']);
    $fechaActual = date('Y-m-d');




    if (isset($_SESSION['correo_usuario'])) {
        $correoUsuario = $_SESSION['correo_usuario'];
    } else {
        echo "Error en el sistema";
    }

    $usuari = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE correo = '$correoUsuario'");

    foreach ($usuari as $usuario)
        ;


    $sql = 'INSERT INTO tareas(usuario,tarea_nombre,descripcion,fecha) VALUE(?,?,?,?)';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$usuario['usuario'], $tarea, $descripcion, $fechaActual]);

}

// Elimina una tarea si se proporciona su ID en la URL.
if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE FROM tareas WHERE tarea_id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
}

// Obtiene el usuario actual desde la sesión y consulta sus tareas.
if (isset($_SESSION['correo_usuario'])) {
    $correoUsuario = $_SESSION['correo_usuario'];
} else {
    echo "Error en el sistema";
}

$usuari = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE correo = '$correoUsuario'");

foreach ($usuari as $usuario)
    ;


$sql = "SELECT * FROM tareas WHERE usuario = '$usuario[usuario]'";
$registros = $conn->query($sql);






?>