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
     * Método para todos los registros de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all_users_count()
    {
        $res = $this->db->query("select count(*) from usuarios");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Método para todos los usuarios ADMIN de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all_users_admin()
    {
        $res = $this->db->query("select count(*) from usuarios u
        inner join roles r on u.rol_id = r.id
        where r.rol = 'Admin'");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Método para todos los usuarios ADMIN de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all_users_student()
    {
        $res = $this->db->query("select count(*) from usuarios u
        inner join roles r on u.rol_id = r.id
        where r.rol = 'Alumno'");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Método para todos los usuarios ADMIN de la tabla.
     *
     * @return array Arreglo con todos los registro de la tabla.
     */
    public function all_users_teacher()
    {
        $res = $this->db->query("select count(*) from usuarios u
        inner join roles r on u.rol_id = r.id
        where r.rol = 'Maestro'");
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

    /**
     * Método para encontrar un dato utilizando la columna, operador y valor.
     *
     * @param string $column Columna de la tabla en la que se quiere buscar.
     * @param string $operator Operador para hacer la comparación. Ej: =, !=, <, >, etc.
     * @param string $value Valor a encontrar en la columna.
     * 
     * @return array Data encontrada.
     */
    public function where($column, $operator, $value)
    {
        $res = $this->db->query("select * from {$this->table} where $column $operator '$value'");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

     /**
     * Método para encontrar un dato utilizando la columna, operador y valor.
     *
     * @param string $column Columna de la tabla en la que se quiere buscar.
     * @param string $operator Operador para hacer la comparación. Ej: =, !=, <, >, etc.
     * @param string $value Valor a encontrar en la columna.
     * 
     * @return array Data encontrada.
     */
    public function whereLogin($columnA, $columnB, $operator, $value, $pass)
    {
        $query ="select m.id, m.nombre, m.apellido, m.email, m.password, r.rol, u.rol_id from usuarios u
        inner join maestros m on u.id = m.usuario_id
        inner join roles r on u.rol_id = r.id
        where $columnA $operator '$value' and $columnB $operator '$pass'
        union
        select a.id, a.nombre, a.apellido, a.email, a.password, ro.rol, us.rol_id from usuarios us
        inner join alumnos a on us.id = a.usuario_id
        inner join roles ro on us.rol_id = ro.id
        where $columnA $operator '$value' and $columnB $operator '$pass'";
        //var_dump($query);
        $res = $this->db->query("$query");
        //var_dump($res);
        $data = $res->fetch_all(MYSQLI_ASSOC);
        //var_dump($data);

        return $data;
    }
}
?>
