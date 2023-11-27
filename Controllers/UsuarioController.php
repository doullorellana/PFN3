<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class UsuarioController
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
        $usuarios= $this->model->all();

        include $_SERVER["DOCUMENT_ROOT"] . "../views/usuarios/read.php";
    }

    /**
     * Muestra un formulario para crear un nuevo usuario.
     */
    public function create()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/usuarios/create.php";
    }

    /**
     * Muestra un formulario para editar un usuario.
     */
    public function edit($id)
    {
        $usuarios = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/usuarios/edit.php";
    }

    /**
     * Actualiza los datos de un usuario y envía al usuario a /usuarios.
     */
    public function update($request)
    {
        $this->model->update($request);

        header("Location: /usuarios");
    }

    /**
     * Guarda el registro de un nuevo usuario y envía al usuario a /usuarios.
     * 
     * @param array $request Datos del usuario nuevo
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /usuarios");
    }

    /**
     * Eliminar el registro de un usuario y envía al usuario a /usuario.
     */
    public function delete($id)
    {
        $this->model->destroy($id);

        header("Location: /usuarios");
    }
}
