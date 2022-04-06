<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['BtnModificar']))
{
    $id = $_GET['ModId'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $dui = $_POST['dui'];

    if($llamado -> Actualizar($id, $nombre, $direccion, $telefono, $dui))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>
                        Modificado!
                    </div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>
                        Fallo!
                    </div>";
    }
}

if (isset($_GET['ModId']))
{
    $Id = $_GET['ModId'];
    $establecer = $conn -> prepare("SELECT * FROM clientes WHERE Id=?");
    $establecer->execute([$Id]);
    $registro = $establecer -> fetch(PDO::FETCH_OBJ);
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
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?php echo $registro->Nombre;?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input id="direccion" value="<?php echo $registro->Direccion;?>" class="form-control" type="text" name="direccion">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input id="telefono" value="<?php echo $registro->Telefono;?>" class="form-control" type="text" name="telefono">
                    </div>
                    <div class="form-group">
                        <label for="dui">DUI:</label>
                        <input id="dui" value="<?php echo $registro->Dui;?>" class="form-control" type="text" name="dui">
                    </div> <br>
                    <button class="btn btn-primary" name="BtnModificar" type="submit">Guardar</button>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>