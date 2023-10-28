<?php
// Inicia la gestión de sesiones en PHP.
session_start();
// Destruye todas las variables de sesión y finaliza la sesión.
session_destroy();
// Redirecciona al usuario a la página "Index.php" ubicada en el nivel superior.
header("location: ../Index.php")

    ?>