<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class PermisoController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Muestra una vista con todos los usuarios.
     */
    public function index()
    {
        $permisos= $this->model->all();

        include $_SERVER["DOCUMENT_ROOT"] . "../views/permisos/read.php";
    }

    /**
     * Muestra un formulario para editar un usuario.
     */
    public function edit($id)
    {
        $permisos = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/permisos/edit.php";
    }

    /**
     * Actualiza los datos de un usuario y envía al usuario a /usuarios.
     */
    public function update($request)
    {
        $this->model->update($request);

        header("Location: /permisos");
    }

    /**
     * Guarda el registro de un nuevo usuario y envía al usuario a /usuarios.
     * 
     * @param array $request Datos del usuario nuevo
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /permisos");
    }

}
