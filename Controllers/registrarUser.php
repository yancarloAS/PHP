<?php
    /*enlasamos las dependecioas necesarias*/
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");

    //capturamos en variable los valores enviados desde el formulario
    //  a traves del metodo post y los name en los campos

    $identificacion = $_POST['identificacion'];
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];


    // validamos que los campos esten llenos 

    if ( strlen($identificacion)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($telefono)>0 && strlen($correo)>0 && strlen($clave)>0 && strlen($rol) ) {
        // validamos que la clave sea mayor a 6 caracteres
        if(strlen($clave)>6){
            //encriptamos la clave
            $clave = md5($clave);
            //creamos un objeto a partir de la clase consultas
            // para enviar los datos o argumentos a la funcion 
            // una clase puede tener muchos comentarios
            $objConsultas = new Consultas();
            $result = $objConsultas -> crearUsuario($identificacion, $nombres, $apellidos, $telefono, $correo, $clave, $rol);
            echo '<script> alert("El usuario se creo exitosamente")</script>';
            echo '<script> location.href = "../Views/register.php"</script>';
            
           
        }else {
            echo '<script> alert("Por favor ingrese una contraseña superior a 6 caracteres")</script>';
            echo '<script> location.href = "../Views/register.php"</script>';
        }
    

    }
    else{
        echo '<script> alert("Por favor complete todos los campos") </script>';
        echo '<script> location.href = "../Views/register.php"</script>';
    }

?>