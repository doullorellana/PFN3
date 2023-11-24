<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<body>
    <h1>Usuarios</h1>
    <p>Aquí verás a todos los usuarios del sistema.</p>
    <a href="/usuarios/create">CREAR NUEVO USUARIO</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Password</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
                <tr>
                    <td><?= $usuario["id"] ?></td>
                    <td><?= $usuario["usuario"] ?></td>
                    <td><?= $usuario["password"] ?></td>
                    <td><?= $usuario["name"] ?></td>
                    <td><?= $usuario["email"] ?></td>
                    <td>
                        <a href="/usuarios/edit?id=<?= $usuario["id"] ?>">Editar</a>
                        <form action="/usuarios/delete" method="post" style="display: inline;">
                            <input type="number" hidden value="<?= $usuario["id"] ?>" name="id">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>