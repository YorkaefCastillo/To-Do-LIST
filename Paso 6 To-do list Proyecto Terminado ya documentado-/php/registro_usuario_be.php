<?php
// Incluye el archivo de conexión a la base de datos.
include 'conexion_be.php';

// Obtiene los valores enviados desde un formulario.
$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Encripta la contraseña utilizando bcrypt.
$contrasena_cifrada = password_hash($contrasena, PASSWORD_BCRYPT);

// Construye la consulta para insertar los datos en la base de datos.
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) 
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_cifrada')";

// Verifica si el correo o el usuario ya existen en la base de datos. 
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
// Ejecuta la consulta para insertar los datos en la base de datos.
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
// Cierra la conexión a la base de datos.
mysqli_close($conexion);
?>