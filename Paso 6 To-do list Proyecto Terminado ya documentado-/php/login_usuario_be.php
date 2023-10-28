<?php
// Inicia la gestión de sesiones en PHP.
session_start();

// Incluye el archivo de conexión a la base de datos.
include 'conexion_be.php';

// Obtiene el correo y la contraseña ingresados en el formulario.
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta la contraseña cifrada almacenada en la base de datos para el correo proporcionado.
$consulta_contrasena = mysqli_query($conexion, "SELECT contrasena FROM usuarios WHERE correo = '$correo'");
$fila_contrasena = mysqli_fetch_assoc($consulta_contrasena);
$contrasena_cifrada = $fila_contrasena['contrasena'];

// Verifica la contraseña utilizando password_verify().
if (password_verify($contrasena, $contrasena_cifrada)) {
    // Si la contraseña es válida, inicia sesión.
    $_SESSION['correo_usuario'] = $correo;
    $_SESSION['usuario'] = $correo;
    // Redirecciona al usuario a la página "Todo.php" en la carpeta "ToDo".
    header("location: ../ToDo/Todo.php");
    exit;
} else {
    // Si la contraseña no es válida, muestra un mensaje de alerta y redirecciona al usuario a "Index.php".
    echo '
        <script>
        alert("Usuario no existe o la contraseña es incorrecta. Por favor, verifica los datos introducidos.");
        window.location = "../Index.php";
        </script>
        ';
    exit;
}
?>