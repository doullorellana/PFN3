<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS TailWindcss CLI -->
    <link href="../css/output.css" rel="stylesheet">

    <title>University | Funval</title>
</head>

<body>
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/LoginController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/HomeController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/UsuarioController.php");

    // ENRUTADOR
    $loginController = new LoginController();
    $homeController = new HomeController();
    $usuarioController = new UsuarioController();

    // Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
    $route = explode("?", $_SERVER["REQUEST_URI"]);

    $method = $_SERVER["REQUEST_METHOD"];


    if ($method === "POST") {
        switch ($route[0]) {
            case '/login':
                $loginController->login($_POST["email"]);
                break;

            case '/usuarios/delete':
                $usuarioController->delete($_POST["id"]);
                break;

            case '/usuarios/create':
                $usuarioController->store($_POST);
                break;

            case '/usuarios/update':
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
                $loginController->index();
                break;
            case '/dashboard':
                $loginController->dashboard();
                break;

            case '/usuarios':
                $usuarioController->index();
                break;

            case '/usuarios/edit':
                $usuarioController->edit($_GET["id"]);
                break;

            case '/usuarios/create':
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