<?php

if (!empty($_POST["btnregistroI"])){
    if (!empty($_POST["codigo"]) and !empty($_POST["cantidad"]) and !empty($_POST["descripcion"]) and !empty($_POST["fechaE"]) ){
        $codigo=$_POST["codigo"];
        $cantidad=$_POST["cantidad"];
        $descripcion=$_POST["descripcion"];
        $fechaE=$_POST["fechaE"];
        $fechaS = isset($_POST['fechaS']) ? $_POST['fechaS'] : null;
        
        
        $sql=$conn->query("INSERT INTO inventario (id_inventario, cantidad_disponible, descripcion, fecha_entrada, fecha_salida) VALUES ($codigo, '$cantidad', '$descripcion', '$fechaE', '$fechaS')");
        if($sql==1){
            echo '<div class="alert alert-success"> Producto registrado correctamente </div>';
        }else{
            echo '<div class="alert alert-danger"> Error al registrar el producto </div>';
        }

    }else{
        echo '<div class="alert alert-warning"> alguno de los campos esta vacio </div>';
    }
}

?>