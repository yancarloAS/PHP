<?php

require_once("../Models/Conexion.php");
require_once("../Models/Insertarinmueble.php");

$tipo = $_POST['Tipo'];
$categoria = $_POST['Categoria'];
$precio = $_POST['Precio'];
$tamano = $_POST['Tamano'];
$ciudad = $_POST['Ciudad'];
$Localidad = $_POST['Localidad'];

if ( strlen($tipo)>0 && strlen($categoria)>0 && strlen($precio)>0 && strlen($tamano)>0 && strlen($ciudad)>0 && strlen($Localidad)>0 ) {

    //  Guardamos la ruta en al variable foto en la cual se registrara  en la base de datos
    $foto="../upload/".$_FILES['foto']['name'];
    // Movemos el archivo de su ubicacicon inicial a una carpeta Upload
    $mover = move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

    $objConsultas = new Guardar();
    $result = $objConsultas -> Insertarinmueble($tipo, $categoria, $precio, $tamano, $ciudad, $Localidad,$foto);
 }
else{
    echo '<script> alert("Por favor complete todos los campos") </script>';
    echo '<script> location.href = "../Views/InmoApartamentos.php"</script>'; 
}

?>