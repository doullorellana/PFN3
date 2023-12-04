<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";

class ClaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Muestra una vista con todos las clases de los alumnos.
     */
    public function index()
    {
        $clases= $this->model->allClases();

        include $_SERVER["DOCUMENT_ROOT"] . "../views/clases/read.php";
    }
 
    /**
     * Muestra un formulario para crear una nueva clase para los alumnos.
     */
    public function create()
    {
        include $_SERVER["DOCUMENT_ROOT"] . "../views/clases/create.php";
    }

    /**
     * Muestra un formulario para editar una clase.
     */
    public function edit($id)
    {
        $clases = $this->model->find($id);

        include $_SERVER["DOCUMENT_ROOT"] . "../views/clases/edit.php";
    }

    /**
     * Actualiza los datos de una clase y envía la clase a /clases.
     */
    public function update($request)
    {
        $this->model->update($request);

        header("Location: /clases");
    }

    /**
     * Guarda el registro de una nueva clase y envía la clase a /clases.
     * 
     * @param array $request Datos de la clase nueva
     */
    public function store($request)
    {
        $response = $this->model->create($request);

        header("Location: /clases");
    }

    /**
     * Eliminar el registro de una clase y envía al clase a /clases.
     */
    public function delete($id)
    {
        $this->model->destroy($id);

        header("Location: /clases");
    }
}
