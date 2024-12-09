<?php

if (!empty($_POST["btnregistro"])){
    if (!empty($_POST["codigo"]) and !empty($_POST["nombre"]) and !empty($_POST["edad"]) and !empty($_POST["fechaN"]) and !empty($_POST["fechaC"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["cargo"]) ){
        $codigo=$_POST["codigo"];
        $nombre=$_POST["nombre"];
        $edad=$_POST["edad"];
        $fechaN=$_POST["fechaN"];
        $fechaC=$_POST["fechaC"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];  
        $cargo=$_POST["cargo"];            
        
        $sql=$conn->query("INSERT INTO empleado (id_empleado, nombre, edad, fecha_nacimiento, fecha_contrato, direccion, telefono, correo, cargo_ID) VALUES ($codigo, '$nombre', $edad, '$fechaN', '$fechaC', '$direccion', $telefono, '$correo', '$cargo')");
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