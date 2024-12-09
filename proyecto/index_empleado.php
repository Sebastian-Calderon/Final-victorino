<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>empleado</title>

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

    <h1 class="text-center p-3">Empleados</h1>
    <?php
    include "db.php";
    include "controlador_empleado/eliminar_empleado.php";
    ?>
    <div class="container-fluid row">   
        <form class="col-4 p-5" method="POST">
        <h2 class="text-center text-secondary">Registrar un nuevo empleado</h2>
        <?php
        
        include "controlador_empleado/registro_empleado.php";
        ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">id</label>
                <input type="number" class="form-control" name=" codigo">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label text-center">Nombre</label>
                <input type="text" class="form-control" name=" nombre">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">edad</label>
                <input type="number" class="form-control" name="edad">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de nacimiento</label>
                <input type="date" class="form-control" name=" fechaN">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">fecha de contrato</label>
                <input type="date" class="form-control" name="  fechaC">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="telefono">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cargo_ID</label>
                <input type="text" class="form-control" name="cargo">   
            </div>

            

            
            <button type="submit" class="btn btn-primary" name="btnregistro" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-8">
            
            <table class="table">

                <thead class="etiquetas">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Edad</th>
                        <th scope="col">F. Nacimiento</th>
                        <th scope="col">F. Contrato</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">cargo_ID</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody id="datos">

                    <?php
                    include "db.php";
                    $sql = $conn->query(" select * from empleado");
                    while($datos=$sql->fetch_object()) { ?>
                        <tr>                       
                            <td text-center><?= $datos->id_empleado ?></td>
                            <td centrar><?= $datos->nombre ?></td>
                            <td><?= $datos->edad?></td>
                            <td><?= $datos->fecha_nacimiento?></td>
                            <td><?= $datos->fecha_contrato?></td>
                            <td><?= $datos->direccion?></td>
                            <td><?= $datos->telefono?></td>
                            <td><?= $datos->correo?></td>
                            <td><?= $datos->cargo_ID?></td>
                            
                            <td>
                                <a href="controlador_empleado/modificar_empleado.php?id=<?= $datos->id_empleado ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index_empleado.php?id=<?= $datos->id_empleado ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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