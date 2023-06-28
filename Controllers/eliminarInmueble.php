<?php
    
    require_once("../Models/Conexion.php");
    require_once("../Models/Consultas.php");

    // Aterrizamos la PK enviada por el method=GET
    $id = $_GET['id_in'];

    $objConsultas = new Consultas();
    $result = $objConsultas -> eliminarInmueble($id);

?>