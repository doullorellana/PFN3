<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Models/User.php";

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
     * Muestra un formulario para editar un permiso de usuario.
     */
    public function edit($id)
    {
        $permisos = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/permisos/edit.php";
    }

    /**
     * Actualiza los datos de un permiso de usuario y envía al permiso a /permisos.
     */
    public function update($request)
    {
        // var_dump($request);
        
        $this->model->update($request);

        header("Location: /permisos");
    }

    /**
     * Guarda el registro de un nuevo permiso y envía al permiso a /permisos.
     * 
     * @param array $request Datos del permiso de usuario nuevo
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /permisos");
    }

}
