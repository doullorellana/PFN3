<?php
!isset($usuarios) && header("Location: /usuarios");

session_start();
$_SESSION["usuarioid_edit"] = $usuarios["id"];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University | Funval</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    <form action="/usuarios/update" method="post">
        <div>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?= $usuarios["usuario"] ?>">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?= $usuarios["password"] ?>">
        </div>
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?= $usuarios["name"] ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= $usuarios["email"] ?>">
        </div>

        <button type="submit">Guardar</button>
    </form>


    <a href="/usuarios">VER LISTA DE USUARIOS</a>
</body>

</html>