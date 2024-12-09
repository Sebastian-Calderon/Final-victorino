<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conn->query("delete from empleado where id_empleado=$id");
    if($sql==1){
        echo '<div>Empleado eliminado correctamente</div>';
    }else{
        echo '<div>error al eliminar</div>';
    }
}

?>