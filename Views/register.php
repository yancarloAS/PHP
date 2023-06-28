<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main class="login register" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tus Datos y Crea una Nueva. Recuerda elegir tu rol.</p>
        <form action="../Controllers/registrarUser.php" method="post">
            <input type="number" placeholder="Identificación" name="identificacion">
            <input type="text" placeholder="Nombres" name="nombre">
            <input type="text" placeholder="Apellidos" name="apellido">
            <input type="number" placeholder="Teléfono" name="telefono">
            <input type="email" placeholder="Correo Electrónico" name="correo">            
            <input type="password" placeholder="Contraseña" name="clave">
            <div class="select">
                <select name="rol">
                    <option value="">Seleccione Rol</option>
                    <option value="1">Usuario</option>
                    <option value="2">Inmobiliaria</option>
                </select>
            </div>
            <button type="submit">Crear Mi Cuenta</button>
        </form>
    </main>
</body>

</html>