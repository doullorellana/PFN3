<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS TailWindcss CLI -->
    <link href="../css/output.css" rel="stylesheet">

    <title>University | Doull</title>
</head>

<body>
    <?php
    header("Location: ../src/views/login.php");

    // ENRUTADOR
    require_once "./controllers/HomeController.php";
    require_once "./controllers/UsuarioController.php";

    $homeController = new HomeController();
    $usuarioController = new UsuarioController();

    // Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /usuarios?id=1
    $route = explode("?", $_SERVER["REQUEST_URI"]);

    $method = $_SERVER["REQUEST_METHOD"];


    if ($method === "POST") {
        switch ($route[0]) {
            case '/views/usuarios/delete':
                $usuarioController->delete($_POST["id"]);
                break;

            case '/views/usuarios/create':
                $usuarioController->store($_POST);
                break;

            case '/views/usuarios/update':
                $usuarioController->update($_POST);
                break;

            default:
                echo "NO ENCONTRAMOS LA RUTA.";
                break;
        }
    }

    if ($method === "GET") {
        switch ($route[0]) {
            case '/index.php':
                $homeController->index();
                break;

            case '/views/usuarios':
                $usuarioController->index();
                break;

            case '/views/usuarios/edit':
                $usuarioController->edit($_GET["id"]);
                break;

            case '/views/usuarios/create':
                $usuarioController->create();
                break;

            default:
                echo "NO ENCONTRAMOS LA RUTA.";
                break;
        }
    }
    ?>

</body>

</html>