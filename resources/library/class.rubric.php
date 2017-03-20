<?php
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
                $stmt = $this->db->prepare("CREATE TABLE $table_name (
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
    }
?>
