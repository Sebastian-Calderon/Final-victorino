<?php

if (!empty($_POST["btnregistro"]))  {
    if ( !empty($_POST["nombre"]) and !empty($_POST["edad"]) and !empty($_POST["fechaN"]) and !empty($_POST["fechaC"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"]) and !empty($_POST["cargo"]) ){
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $edad=$_POST["edad"];
        $fechaN=$_POST["fechaN"];
        $fechaC=$_POST["fechaC"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $cargo=$_POST["cargo"];
        

        $sql=$conn->query(" update empleado set nombre='$nombre', edad =$edad, fecha_nacimiento ='$fechaN', fecha_contrato ='$fechaC', direccion='$direccion', telefono =$telefono, correo ='$correo', cargo_ID='$cargo' where id_empleado=$id ");
        if($sql==1){
            header("location:../index_empleado.php");
            
        }else{
            echo  "<div class= 'alert alert-danger'>error al modificar producto</div>";
        }

    } else{
        echo "<div class= 'alert alert-warning'>campos vacios</div>";
    }
}


?>