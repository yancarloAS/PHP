<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="add">
        <header>
            <h2>Adicionar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../index.html" class="close"></a>
        </header>
        <form action="../Controllers/registrarInmueble.php" method="post" enctype="multipart/form-data">
            
            <input type="file" class="upload" aria-describedby="Foto Inmueble" name="foto" accept=".jpg, .png, .jpeg, .gif">
            <div class="select">
                <select name="Tipo">
                    <option value="">Seleccione Tipo de Inmueble...</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="select">
                <select name="Categoria">
                    <option value="">Seleccione Categoría...</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>
            <input type="number" placeholder="Precio..." name="Precio">
            <input type="number" placeholder="Tamaño..." name="Tamano">
            <input type="text" placeholder="Ciudad..." name="Ciudad">
            <input type="text" placeholder="Localidad..." name="Localidad">
            
            <button  type="submit" class="btn-home">Guardar</button>
        </form>
    </main>
</body>

</html>