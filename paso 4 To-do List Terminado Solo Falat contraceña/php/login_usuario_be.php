<?php
session_start();

include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
//$hash_contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
$_SESSION['correo_usuario'] = $correo;

if (mysqli_num_rows($validar_login) > 0) {
    # code...
    $_SESSION['usuario'] = $correo;
    header("location: ../ToDo/Todo.php");
    exit;
} else {
    echo '
            <script>
            alert("Usuario no existe, porfavor verifique los datos introducidos");
            window.location = "../Index.php";
            </script>
            ';
    exit;
}







?>