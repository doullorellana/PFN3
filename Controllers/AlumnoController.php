<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class AlumnoController
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

        include $_SERVER["DOCUMENT_ROOT"] . "../views/alumnos/read.php";
    }

    /**
     * Muestra un formulario para crear un nuevo alumno.
     */
    public function create()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/alumnos/create.php";
    }

    /**
     * Muestra un formulario para editar un alumno.
     */
    public function edit($id)
    {
        $usuarios = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/alumnos/edit.php";
    }

    /**
     * Actualiza los datos de un alumno y envía al alumno a /alumno.
     */
    public function update($request)
    {
        $this->model->update($request);

        header("Location: /alumnos");
    }

    /**
     * Guarda el registro de un nuevo alumno y envía al alumno a /alumno.
     * 
     * @param array $request Datos del usuario nuevo
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /alumnos");
    }

    /**
     * Eliminar el registro de un alumno y envía al alumno a /alumno.
     */
    public function delete($id)
    {
        $this->model->destroy($id);

        header("Location: /alumnos");
    }
}
