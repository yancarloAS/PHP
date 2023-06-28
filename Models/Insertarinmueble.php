<?php

class Guardar {
    
    public function Insertarinmueble($tipo, $categoria, $precio, $tamano, $ciudad, $localidad,$foto){
        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        $adicionar ="INSERT INTO datos(Tipo,Categoria,Precio,Tamaño,Ciudad,Localidad,foto) VALUES (:Tipo,:Categoria,:Precio,:Tamano,:Ciudad,:Localidad,:foto)";
        $result=$conexion->prepare($adicionar);


        $result->bindParam(":Tipo",$tipo);
        $result->bindParam(":Categoria",$categoria);
        $result->bindParam(":Precio",$precio);
        $result->bindParam(":Tamano",$tamano);
        $result->bindParam(":Ciudad",$ciudad);
        $result->bindParam(":Localidad",$localidad);
        $result->bindParam(":foto",$foto);

        $result->execute();

        echo '<script> alert("Se agrego con exito")</script>';
        echo '<script> location.href = "../Views/InmoDashboard.php"</script>';


    }

    


}


?>