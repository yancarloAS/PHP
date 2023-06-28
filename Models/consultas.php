<?php
class Consultas{

    public function crearUsuario($identificacion, $nombres, $apellidos, $telefono, $correo, $clave, $rol){
        // creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        //VALIDAMOS SI LA IDENTIFICACION O EL EMAIL YA SE ENCUENTRAN 
        // guardamos la instruccion de la consulta SELECT...
        $consultar= "SELECT * FROM usuarios WHERE id=:identificacion OR correo=:correo";

        // PREPARAMOS LO NECESARIO PARA EJECUTAR LA CONSULTA
        $result=$conexion->prepare($consultar);

        // convertimos los argumentos en parametros,necesarioas para la consulta en la base de datos...
        $result->bindParam(":identificacion",$identificacion);
        $result->bindParam(":correo",$correo);
        
        // ejecutamos la consulta INSERT.
        $result->execute();
        
        // Convertimos $result en un arreglo(Segmentar o dividir cada uno de los datos)
        $f=$result->fetch();

        // Validamos la informacion
        if ($f) {
            echo '<script> alert("Los datos ingresados ya se encuentarn almacenados")</script>';
            echo '<script> location.href = "../Views/register.php"</script>';
        }else {
            
        // guardamos la instruccion de la consulta insert que queremos realizar en la variable insertar
        $insertar ="INSERT INTO usuarios(id,nombre,apellido,telefono,correo,clave,rol)VALUES (:identificacion, :nombre, :apellido, :telefono, :correo, :clave, :rol)";
        // preparamos todo lo necesario para ejecutar la consulta anterior
        $result = $conexion->prepare($insertar);
        // convertimos los argumentos en parametros
        $result->bindParam(":identificacion",$identificacion);
        $result->bindParam(":nombre",$nombres);
        $result->bindParam(":apellido",$apellidos);
        $result->bindParam(":telefono",$telefono);
        $result->bindParam(":correo",$correo);
        $result->bindParam(":clave",$clave);
        $result->bindParam(":rol",$rol);
        // ejecutamos la consulta INSERT.
        $result->execute();
        
        echo '<script> alert("Se a registrado con exito")</script>';
        echo '<script> location.href = "../Views/login.php"</script>';

        }
    }

    public function consultarInmuebles(){

        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        $consultar = "SELECT * FROM datos ORDER BY Id DESC";
        $result=$conexion->prepare($consultar);

        $result->execute();
        
        while($resultado = $result->fetch()){
            $f[]=$resultado;
        }
        return $f;

    }

    public function eliminarInmueble($id){

        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        $eliminar = "DELETE FROM datos WHERE Id=:id";
        $result = $conexion->prepare($eliminar);

        $result->bindParam(":id",$id);

        $result->execute();

        echo '<script> alert("Inmueble Eliminado")</script>';
        echo '<script> location.href = "../Views/InmoApartamentos.php"</script>';
    }


    // Funcion para traer la informacion 
    public function consultarInmuebleEdit($id){
        $f = null;

        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        $consultar= "SELECT * FROM datos WHERE id=:id";
        $result=$conexion->prepare($consultar);

        $result->bindParam(":id",$id);

        $result->execute();

        while($resultado = $result->fetch()){
            $f[]=$resultado;
        }
        return $f;
    }
    
    public function actualizarInmueble($id,$tipo,$categoria,$precio,$tamano,$ciudad,$Localidad){

        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();


        $actualizar ="UPDATE datos SET Tipo=:tipo, Categoria=:categoria, Precio=:precio, Tamaño=:tamano, Ciudad=:ciudad, Localidad=:Localidad WHERE Id=id";

        $result=$conexion->prepare($actualizar);
        
        $result->bindParam(":id",$id);
        $result->bindParam(":tipo",$tipo);
        $result->bindParam(":categoria",$categoria);
        $result->bindParam(":precio",$precio);
        $result->bindParam(":tamano",$tamano);
        $result->bindParam(":ciudad",$ciudad);
        $result->bindParam(":Localidad",$Localidad);

        $result->execute();
    }

}


?> 