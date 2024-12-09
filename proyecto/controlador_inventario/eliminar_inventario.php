<?php

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conn->query("delete from inventario where id_inventario=$id");
    if($sql==1){
        echo '<div >Persona eliminada correctamente</div>';
    }else{
        echo '<div>error al eliminar</div>';
    }
}

?>