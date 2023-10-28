<?php
session_start();

include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Obtén la contraseña cifrada almacenada en la base de datos
$consulta_contrasena = mysqli_query($conexion, "SELECT contrasena FROM usuarios WHERE correo = '$correo'");
$fila_contrasena = mysqli_fetch_assoc($consulta_contrasena);
$contrasena_cifrada = $fila_contrasena['contrasena'];

// Verifica la contraseña utilizando password_verify()
if (password_verify($contrasena, $contrasena_cifrada)) {
    // Contraseña válida, inicia sesión
    $_SESSION['correo_usuario'] = $correo;
    $_SESSION['usuario'] = $correo;
    header("location: ../ToDo/Todo.php");
    exit;
} else {
    echo '
        <script>
        alert("Usuario no existe o la contraseña es incorrecta. Por favor, verifica los datos introducidos.");
        window.location = "../Index.php";
        </script>
        ';
    exit;
}
?>