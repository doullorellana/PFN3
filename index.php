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
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/PermisoController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/MaestroController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/ClaseController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/HomeController.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/Controllers/AlumnoController.php");

    // ENRUTADOR
    $loginController = new LoginController();
    $permisoController = new PermisoController();
    $maestroController = new MaestroController();
    $claseController = new ClaseController();
    $homeController = new HomeController();
    $alumnoController = new AlumnoController();

    // Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
    $route = explode("?", $_SERVER["REQUEST_URI"]);

    $method = $_SERVER["REQUEST_METHOD"];


    if ($method === "POST") {
        switch ($route[0]) {
            case '/login':
                $loginController->login($_POST["email"], $_POST["password"]);
                break;

                // Opciones correspondiente a los Permisos de los Usuarios
            case '/permisos/create':
                $permisoController->store($_POST);
                break;

            case '/permisos/update':
                // var_dump($_POST);
                $permisoController->update($_POST);
                break;

                // Opciones correspondiente a la gestion de los Maestros
            case '/maestros/delete':
                break;
                $maestroController->delete($_POST["id"]);

            case '/maestros/create':
                $maestroController->store($_POST);
                break;

            case '/maestros/update':
                $maestroController->update($_POST);
                break;

                // Opciones correspondiente a la gestion de los Alumnos
            case '/alumnos/delete':
                $alumnoController->delete($_POST["id"]);
                break;

            case '/alumnos/create':
                $alumnoController->store($_POST);
                break;

            case '/alumnos/update':
                $alumnoController->update($_POST);
                break;


                // Opciones correspondiente a la gestion de las Clases
            case '/clases/delete':
                $claseController->delete($_POST["id"]);
                break;

            case '/clases/create':
                $claseController->store($_POST);
                break;

            case '/clases/update':
                $claseController->update($_POST);
                break;

                // Opciones por default de no encontrar ninguna de las anteriores
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

                // Opciones correspondiente a los Permisos de Usuarios
            case '/permisos':
                $permisoController->index();
                break;

            case '/permisos/edit':
                $permisoController->edit($_GET["id"]);
                break;

                // Opciones correspondiente a la gestion de los Maestros
            case '/maestros':
                $maestroController->index();
                break;

            case '/maestros/edit':
                $maestroController->edit($_GET["id"]);
                break;

            case '/maestros/create':
                $maestroController->create();
                break;

                // Opciones correspondiente a la gestion de los Alumnos
            case '/alumnos':
                $alumnoController->index();
                break;

            case '/alumnos/edit':
                $alumnoController->edit($_GET["id"]);
                break;

            case '/alumnos/create':
                $alumnoController->create();
                break;


                // Opciones correspondiente a la gestion de las Clases
            case '/clases':
                $claseController->index();
                break;

            case '/clases/edit':
                $claseController->edit($_GET["id"]);
                break;

            case '/clases/create':
                $claseController->create();
                break;

                // Opciones por default de no encontrar ninguna de las anteriores
            default:
                echo "NO ENCONTRAMOS LA RUTA.";
                break;
        }
    }
    ?>
</body>

</html>