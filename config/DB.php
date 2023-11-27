<?php
class DB
{
    public static function query($query)
    {
        try {
            $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

            $mysqli = new mysqli($config["db_host"], $config["db_username"], $config["db_password"], $config["db_name"]);

            $res = $mysqli->query($query);
            $data = $res->fetch_all(MYSQLI_ASSOC);

            $mysqli->close();

            return $data;
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}