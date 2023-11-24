<?php
class Model
{
    private $db;
    protected $table;

    public function __construct()
    {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        try {
            $this->db = new mysqli(
                $config["db_host"],
                $config["db_username"],
                $config["db_password"],
                $config["db_name"]
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Método para todos los registros de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all()
    {
        $res = $this->db->query("select * from {$this->table}");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Método para obtener un registro por su id.
     *
     * @param integer $id Id de la fila (recurso) a buscar.
     * @return array Arreglo con los datos de la fila o recurso encontrado.
     */
    public function find($id)
    {
        $res = $this->db->query("select * from {$this->table} where id = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

    /**
     * Método para crear un nuevo registro en la tabla.
     *
     * @param array $data Arreglo asociativo con los datos a ingresar.
     * @return array Arreglo con los datos de la fila ingresada.
     */
    public function create($data)
    {
        try {
            // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
            $keys = array_keys($data);
            $keysString = implode(", ", $keys);

            $values = array_values($data);
            var_dump($data);
            
            $valuesString = implode("', '", $values);
            $query = "insert into {$this->table}($keysString) values ('$valuesString')";

            $res = $this->db->query($query);

            if ($res) {
                $ultimoId = $this->db->insert_id;
                $data = $this->find($ultimoId);

                return $data;
            } else {
                return "No se pudo crear el usuario";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Método para actualizar un registro en la tabla.
     *
     * @param array $data Arreglo asociatvo con los datos a actualizar.
     */
    public function update($data)
    {
        // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
        $updatePairs = [];

        foreach ($data as $key => $value) {
            $updatePairs[] = "$key = '$value'";
        }

        session_start();
        $query = "update {$this->table} set " . implode(", ", $updatePairs) . "where id = {$_SESSION["usuarioid_edit"]}";
        $this->db->query($query);
    }

    /**
     * Método para eliminar un registro en la tabla.
     *
     * @param integer $id
     */
    public function destroy($id)
    {
        $this->db->query("delete from {$this->table} where id = $id");
    }
}
?>
