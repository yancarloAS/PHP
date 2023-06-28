<?php

function cargarInmuebles(){

    $objConsultas = new Consultas();
    $result = $objConsultas-> consultarInmuebles();

    foreach($result as $f){
        echo '
          <tr>
                <td>
                    <figure class="photo">
                     <img src=" '.$f['foto'].' " alt="">
                     </figure>
                         
                        <div class="info">
                         <h3>'.$f['Tipo'].'</h3>
                         <h4>'.$f['Precio'].'</h4>
                         <p>'.$f['Localidad'].'</p>
                        </div>
                        
                        <div class="controls">
                        <a href="InmoEdit.php?id_in='.$f['Id'].'" class="edit"></a>
                        <a href="../Controllers/eliminarInmueble.php?id_in='.$f['Id'].' " class="delete"></a>
                         </div>
                 </td>
            </tr>
        
        ';

    }

}

function cargarInmuebleEdit(){
    $id = $_GET['id_in'];

    $objConsultas = new Consultas();
    $result = $objConsultas->consultarInmuebleEdit($id);

    foreach($result as $f){
        echo'
            <form action="../Controllers/editarInmueble.php"  method="post">
                
                <div class="select">
                    <select name="Tipo"> 
                        <option value="'.$f['Tipo'].'">'.$f['Tipo'].' </option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Aparta Estudio">Aparta Estudio</option>
                        <option value="Casa">Casa</option>
                    </select>
                </div>
                <div class="select">
                    <select name="Categoria">
                        <option value="'.$f['Categoria'].'">'.$f['Categoria'].'</option>
                        <option value="Arriendo">Arriendo</option>
                        <option value="Venta">Venta</option>
                    </select>
                </div>
                <input type="number" placeholder="Precio..." name="precio" value="'.$f['Precio'].'">
                <input type="number" placeholder="Tamaño..." name="tamaño" value="'.$f['Tamaño'].'">
                <input type="text" placeholder="Ciudad..." name="ciudad" value="'.$f['Ciudad'].'">
                <input type="text" placeholder="Localidad..." name="Localidad" value="'.$f['Localidad'].'">
               
                <input type="text" placeholder="id..." name="id" value="'.$f['Id'].'" readonly="readonly">
                
                <button  type="submit" class="btn-home">Modificar</button>
            </form>
        ';
    }




}
?> 