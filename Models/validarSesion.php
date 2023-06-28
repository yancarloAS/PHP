<?php
class Sesion{

    public function iniciarSesion($correo,$clave){
        // creamos el objeto de la conexion
        $objConexion = new Conexion();
        $conexion = $objConexion-> get_conexion();

        //VALIDAMOS SI LA IDENTIFICACION O EL EMAIL YA SE ENCUENTRAN 
        // guardamos la instruccion de la consulta SELECT...
        $consultar= "SELECT * FROM usuarios WHERE correo=:correo";

        // PREPARAMOS LO NECESARIO PARA EJECUTAR LA CONSULTA
        $result=$conexion->prepare($consultar);

        // convertimos los argumentos en parametros,necesarioas para la consulta en la base de datos...
        $result->bindParam(":correo",$correo);

        // ejecutamos la consulta INSERT...
        $result->execute();

        // Convertimos $result en un arreglo(Segmentar o dividir cada uno de los datos)    
        if ($f = $result->fetch()) {
            //Este if solo se cumple si el correo se encuentra registrado...
            // Validamos o comparamos las dos claves encriptadas...
            if ($f['clave']==$clave) {
                
                // Se realiza el inicio de Sesion...
                session_start();

                // Validamos Roles
                if ($f['rol']=="1") {
                    echo '<script> alert("Bienvenido Usuario")</script>';
                    echo '<script> location.href = "../Views/UserDashboard.php"</script>';
                }

                if ($f['rol']=="2") {
                    echo '<script> alert("Bienvenido Agente Inmobiliario")</script>';
                    echo '<script> location.href = "../Views/InmoDashboard.php"</script>';
                }

            }else {
                echo '<script> alert("Contraseña incorrecta")</script>';
                echo '<script> location.href = "../Views/login.php"</script>';
            }
        }else {
            echo '<script> alert("El correo ingresado no se encuentra en el sistema, verifique los datos ingresados o intente nuevamente")</script>';
            echo '<script> location.href = "../Views/login.php"</script>';
        }
    }

}

?>