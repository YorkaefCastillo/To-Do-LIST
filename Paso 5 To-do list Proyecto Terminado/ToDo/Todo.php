<?php
include("../ToDo/ConexionTareas.php");
include '../php/conexion_be.php';

if (!isset($_SESSION['usuario'])){
    echo'
    <script>
            alert("Por favor Inicia sesion");
            window.location = "../Index.php";
    </script>
    ';

    session_destroy();
    die();
}  

if(isset($_SESSION['correo_usuario'])) {
    $correoUsuario = $_SESSION['correo_usuario'];
} else {
}

$usuari = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE correo = '$correoUsuario'");

?>

<!doctype html>
<html lang="en">

<head>
    <title>To-Do List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../Activos/Css/Todo_list.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Victor+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

</head>




<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">
        <div class="mb-3">

            <?php foreach ($usuari as $usuario) { ?>
            <p class="usuario">Hola <?php echo $usuario['usuario'] ?></p>
            <?php } ?>


            <a href="../php/cerrar_sesion.php" class="btn btn-primary">Cerrar Sesion</a>

        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <h1>TO-DO LIST</h1>
            </div>
            <div class="card-body">



                <!--Entrada de Texto Tarea-->
                <div class="mb-3">
                    <form action="" method="post">
                        <label for="tarea" class="form-label">Tarea</label>
                        <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="helpId"
                            placeholder="Escriba su Tarea">

                        <!--Entrada de Tarea para descripcion-->
                        <br />
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>
                        <!--Boton de Agregar Tarea-->
                        <input name="agregar_tarea" id="agregar_tarea" class="btn btn-primary" type="submit"
                            value="Agregar Tarea">

                    </form>
                </div>

                <ul class="list-group">

                    <?php foreach ($registros as $registro) { ?>
                    <li class="list-group-item ">

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $registro['tarea_id']; ?>">


                            <input class="form-check-input float-start" type="checkbox" name="completado"
                                value="<?php echo $registro['completado']; ?>" id="" onChange="this.form.submit()"
                                <?php echo ($registro['completado'] == 1) ? 'checked' : ''; ?>>



                        </form>





                        <?php $registro['completado'] ?>
                        <span class="float-start <?php echo ($registro['completado'] == 1) ? 'subrayado' : ''; ?> ">
                            &nbsp; <?php echo $registro['tarea_nombre'] ?>
                        </span>





                        <h6 class="float-start">
                            &nbsp; <a href="?id=<?php echo $registro['tarea_id']; ?>"><span class="badge bg-danger"> x
                                </span></a>
                        </h6>


                        <span class="float-start">
                    <li
                        class="list-group-item custom-list-item <?php echo ($registro['completado'] == 1) ? 'borroso' : ''; ?>">
                        <?php echo $registro['descripcion'] . '<br>' . $registro['fecha'] ?>
                    </li>
                    </span>
                    </li>

                    <?php } ?>
                </ul>


            </div>
        </div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>