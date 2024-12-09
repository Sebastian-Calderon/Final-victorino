<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que desea eliminar");
            return respuesta
        }
    </script>

    <h1 class="text-center p-3">Inventario de producto</h1>
    <?php
    include "db.php";
    include "controlador_inventario/eliminar_inventario.php";
    ?>
    <div class="container-fluid row">   
        <form class="col-4 p-5" method="POST">
        <h2 class="text-center text-secondary">Registro de producto</h2>
        <?php
        
        include "controlador_inventario/registro_inventario.php";
        ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">id</label>
                <input type="number" class="form-control" name=" codigo">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">cantidad disponible</label>
                <input type="number" class="form-control" name=" cantidad">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">descripcion</label>
                <input type="text" class="form-control" name="descripcion">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de entrada</label>
                <input type="date" class="form-control" name=" fechaE">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de salida</label>
                <input type="date" class="form-control" name="  fechaS">   
            </div>

            
            <button type="submit" class="btn btn-primary" name="btnregistroI" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-8">
            
            <table class="table">

                <thead class="etiquetas">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">descripción</th>
                        <th scope="col">F. Entrada</th>
                        <th scope="col">F. Salida</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody id="datos">

                    <?php
                    include "db.php";
                    $sql = $conn->query(" select * from inventario");
                    while($datos=$sql->fetch_object()) { ?>
                        <tr>                       
                            <td text-center><?= $datos->id_inventario ?></td>
                            <td centrar><?= $datos->cantidad_disponible ?></td>
                            <td><?= $datos->descripcion ?></td>
                            <td><?= $datos->fecha_entrada ?></td>
                            <td><?= $datos->fecha_salida ?></td>
                            <td>
                                <a href="controlador_inventario/modificar_inventario.php?id=<?= $datos->id_inventario ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index_inventario.php?id=<?= $datos->id_inventario ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>

                    <?php }
                    ?>
                                                           
                </tbody>

                <a href="dashboard_admin.php"><button type="submit" class="btn btn-warning" name="btnregistroI" value="ok">Inicio</button></a>
            </table>
        </div>

    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>