<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=todo_list_db', 'root', '');

} catch (PDOException $e) {
    echo "Error de conexion:" . $e->getMessage();
}


if (isset($_POST['id'])) {
    # code...
    $id = $_POST['id'];
    $completado = (isset($_POST['completado'])) ? 1 : 0;

    $sql = "UPDATE tareas SET completado =? WHERE tarea_id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$completado, $id]);

}

if (isset($_POST['agregar_tarea'])) {
    # code...
    $tarea = ($_POST['tarea']);
    $descripcion = ($_POST['descripcion']);
    $fechaActual = date('Y-m-d');

    $sql = 'INSERT INTO tareas(tarea_nombre,descripcion,fecha) VALUE(?,?,?)';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$tarea, $descripcion, $fechaActual]);

}

if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $sql = "DELETE FROM tareas WHERE tarea_id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]);
}


$sql = "SELECT * FROM tareas";
$registros = $conn->query($sql);


$sql = "SELECT usuario FROM usuarios";
$usuari = $conn->query($sql);

?>