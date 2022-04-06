<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['BtnEliminar']))
{
    $id = $_GET['ElimId'];

    if($llamado -> Eliminar($id))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>
                        Eliminado!
                        <br>
                        <a class='btn btn-primary text-light' href='adminclientes.php' type='button'>Volver</a>
                    </div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>
                        Fallo!
                        <br>
                        <button class='btn btn-primary text-light' href='adminclientes.php' type='button'>Volver</button>
                    </div>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>Clientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Modificar Cliente</h3>
                <hr>
                <?php
                    if(isset($mensaje))
                    {
                        echo $mensaje;
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="label">Esta seguro que desea eliminar este cliente.</label>
                    </div> 
                    <br>
                    <button class="btn btn-primary" type="button"><a href="adminclientes.php" class="text-light">Cancelar</a></button>
                    <button class="btn btn-primary" name="BtnEliminar" type="submit">Eliminar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>