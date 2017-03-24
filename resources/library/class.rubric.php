<?php

// show data in json format for testing
// header('Content-Type: application/json');

require_once('class.schema.php');

class Rubric
{
    private $db;

// constructor takes the connection as a parameter
    public function __construct($conn)
    {
        $this->db = $conn;
    }
    // function to create a rubric table
    public function create_rubric_table($table_name)
    {
        try {
            // SQL statement to be held in variable
            $stmt = $this->db->prepare(
                "CREATE TABLE $table_name (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    criteria VARCHAR(30) NOT NULL,
                    fail VARCHAR(30) NOT NULL,
                    pass VARCHAR(30) NOT NULL,
                    merit VARCHAR(30) NOT NULL,
                    distinction VARCHAR(30) NOT NULL
                )");
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get_tables()
    {
        try {
            // sql statement to show to tables
                $stmt = $this->db->prepare(
                    'SHOW TABLES');

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN);

            if ($stmt->rowCount() > 0) {
                return array(
                        'rows_in_table' => $stmt->rowCount(),
                        'data' => array('tables' => $result));
            } else {
                return array(
                        'status' => 'ERROR',
                        'message' => 'No tables found in selected database.');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // get the contents of a specific table passed into the variable as parameter
    public function get_table_contents($table)
    {
        try {
            // gets list of the tables from this class
            $list_of_tables = $this->get_tables();

            if (in_array(
                $table, $list_of_tables['data']['tables'])) {
                $stmt = "SELECT * FROM ".$table;
                $stmt = $this->db->query($stmt);

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return array(
                        'table' => $table,
                        'rows_in_table' => $stmt->rowCount(),
                        'data' => $result);
            } else {
                return array(
                    'status' => 'ERROR',
                    'message' => 'Table was not found in selected database');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
