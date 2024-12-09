<?php
include "..//db.php";
$id=$_GET["id"];

$sql=$conn->query("select *from inventario where id_inventario=$id");

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

        <h2 class="text-center text-secondary">modificar productor</h2>
        
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        
        include "../controlador_inventario/modificar2_inventario.php";
        
        while ($datos=$sql->fetch_object()) {?>

            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">cantidad disponible</label>
                <input type="number" class="form-control" name=" cantidad" value="<?= $datos->cantidad_disponible ?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de entrada</label>
                <input type="date" class="form-control" name=" fechaE" value="<?= $datos->fecha_entrada ?>">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de salida</label>
                <input type="date" class="form-control" name="  fechaS" value="<?= $datos->fecha_salida ?>">   
            </div>
            
        <?php }
        ?>
            

            
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Modificar producto</button>
    </form>

</body>
</html>