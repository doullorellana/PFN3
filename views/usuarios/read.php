<?php
!isset($usuarios) && header("Location: /usuarios");

session_start();
$_SESSION["usuarioid_edit"] = $usuarios["id"];
?>

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
            <th>Rol</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($usuarios as $usuario) {
            switch ($usuario["rol_id"]) {
                case 1:
                    $rol = "Admin";
                    break;
                case 2:
                    $rol = "Maestro";
                    break;
                case 3:
                    $rol = "Alumno";
                    break;
            };
            $status = $usuario["estatus"] == 1 ? "Activo" : "Inactivo";

        ?>
            <tr>
                <td><?= $usuario["id"] ?></td>
                <td><?= $usuario["username"] ?></td>
                <td><?= $usuario["password"] ?></td>
                <td><?= $usuario["name"] ?></td>
                <td><?= $usuario["email"] ?></td>
                <td><?= $rol ?></td>
                <td><?= $status ?></td>
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