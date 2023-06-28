<?php

    /*enlasamos las dependecioas necesarias*/
    require_once("../Models/Conexion.php");
    require_once("../Models/validarSesion.php");

    //capturamos en variable los valores enviados desde el formulario
    // a traves del metodo post y los name en los campos
    $correo = $_POST['correo'];
    $clave = md5($_POST['clave']);

    //creamos un objeto a partir de la clase consultas
    // para enviar los datos o argumentos a la funcion 
    // una clase puede tener muchos comentarios
    $objSesion = new Sesion();
    $result = $objSesion -> iniciarSesion($correo, $clave);
   
?>