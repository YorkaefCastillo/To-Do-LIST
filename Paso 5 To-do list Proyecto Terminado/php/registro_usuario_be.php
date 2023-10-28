<?php
include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Encriptar la contraseña utilizando bcrypt
$contrasena_cifrada = password_hash($contrasena, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_cifrada')";

// Verificar que el correo o el usuario no se repita en la base de datos  
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($verificar_correo) > 0 || mysqli_num_rows($verificar_usuario) > 0) {
    echo '
        <script>
        alert("Este correo o usuario ya está registrado");
        window.location = "../Index.php";
        </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
        alert("Usuario almacenado exitosamente");
        window.location = "../Index.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Error al almacenar el usuario. Inténtalo de nuevo.");
        window.location = "../Index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>