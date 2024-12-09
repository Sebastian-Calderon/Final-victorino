<?php

if (!empty($_POST["btnregistro"]))  {
    if ( !empty($_POST["cantidad"]) and !empty($_POST["descripcion"]) and !empty($_POST["fechaE"]) ){
        $id=$_POST["id"];
        $cantidad=$_POST["cantidad"];
        $descripcion=$_POST["descripcion"];
        $fechaE=$_POST["fechaE"];
        $fechaS = isset($_POST['fechaS']) ? $_POST['fechaS'] : null;

        $sql=$conn->query(" update inventario set cantidad_disponible='$cantidad', descripcion ='$descripcion', fecha_entrada ='$fechaE', fecha_salida ='$fechaS' where id_inventario=$id ");
        if($sql==1){
            header("location:../index_inventario.php");
            
        }else{
            echo  "<div class= 'alert alert-danger'>error al modificar producto</div>";
        }

    } else{
        echo "<div class= 'alert alert-warning'>campos vacios</div>";
    }
}


?>