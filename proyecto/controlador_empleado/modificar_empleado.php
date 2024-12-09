<?php
include "../db.php";
$id=$_GET["id"];

$sql=$conn->query("select *from empleado where id_empleado=$id");

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <form class="col-4 p-5 m-auto" method="POST">

        <h2 class="text-center text-secondary">modificar empleado</h2>
        
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        
        include "../controlador_empleado/modificar2_empleado.php";
        
        while ($datos=$sql->fetch_object()) {?>

            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">Nombre</label>
                <input type="text" class="form-control" name=" nombre" value="<?= $datos->nombre?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="number" class="form-control" name="edad" value="<?= $datos->edad ?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de nacimiento</label>
                <input type="date" class="form-control" name=" fechaN" value="<?= $datos->fecha_nacimiento?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de contrato</label>
                <input type="date" class="form-control" name="  fechaC" value="<?= $datos->fecha_contrato?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono" value="<?= $datos->telefono?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" value="<?= $datos->correo?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cargo_ID</label>
                <input type="text" class="form-control" name="cargo" value="<?= $datos->cargo_ID?>">   
            </div>


            
        <?php }
        ?>
            

            
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Modificar Empleado</button>
    </form>

</body>
</html>