<?php

    require_once("../Models/Conexion.php");
    require_once("../Models/consultas.php");
  

    $id = $_POST['id'];
    $tipo = $_POST['Tipo'];
    $categoria = $_POST['Categoria'];
    $precio = $_POST['precio'];
    $tamano = $_POST['tamaño'];
    $ciudad = $_POST['ciudad'];
    $Localidad = $_POST['Localidad'];

    $objConsultas = new Consultas();
    $result = $objConsultas -> actualizarInmueble($id,$tipo,$categoria,$precio,$tamano,$ciudad,$Localidad);

?>