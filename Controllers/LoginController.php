<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/User.php";

class LoginController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Muestra una vista con el login.
     */
    public function index()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/login.php";
    }

    public function login($correo, $pass)
    {
        //var_dump($correo, $pass);
        $usuario = $this->model->whereLogin("correo","password", "=", $correo, $pass);

        if (count($usuario) === 1) {

            // switch ($usuario[0]["rol_id"]) {
            //     case '1':
            //         echo "Eres admin";
            //         break;
            //     case '2':
            //         echo "Eres maestro";
            //         break;
            //     case '3':
            //         echo "Eres alumno";
            //         break;
                
            //     default:
            //         echo "No tienes rol asignado";
            //         break;
            // }
            session_start();
            $_SESSION["user"] = $usuario[0];

            header("Location: /dashboard");
        } else {
            echo "Credenciales incorrectas";
            //include $_SERVER["DOCUMENT_ROOT"] . "../views/modal.php";
        }
    }

    public function dashboard()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/dashboard.php";
    }
}