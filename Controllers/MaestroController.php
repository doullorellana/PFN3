<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class MaestroController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Muestra una vista con todos los masestros.
     */
    public function index()
    {
        $maestros= $this->model->allMaestros();

        include $_SERVER["DOCUMENT_ROOT"] . "../views/maestros/read.php";
    }
 
    /**
     * Muestra un formulario para crear un nuevo masestro.
     */
    public function create()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/maestros/create.php";
    }

    /**
     * Muestra un formulario para editar un maestro.
     */
    public function edit($id)
    {
        $maestros = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/maestros/edit.php";
    }

    /**
     * Actualiza los datos de un maestro y envía al maestro a /maestros.
     */
    public function update($request)
    {
        $this->model->update($request);

        header("Location: /maestros");
    }

    /**
     * Guarda el registro de un nuevo maestro y envía al maestro a /maestros.
     * 
     * @param array $request Datos del maestro nuevo
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /maestros");
    }

    /**
     * Eliminar el registro de un maestro y envía al maestro a /maestro.
     */
    public function delete($id)
    {
        $this->model->destroy($id);

        header("Location: /maestros");
    }
}
