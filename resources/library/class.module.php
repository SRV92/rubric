<?php
    class Module
    {
        // local variable
        private $db;

        public function __construct($conn)
        {
            $this->db = $conn;
        }

        // function to create a module
        public function create_module_table($table_name)
        {
            try {
                $stmt = $this->db->prepare("CREATE TABLE $table_name (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        module_name VARCHAR(30) NOT NULL,
                        module_code VARCHAR(8) NOT NULL)");

                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // add row to module table
        public function add_module($value='')
        {
            # code...
        }

        public function edit_module($value='')
        {
            # code...
        }

        public function delete_module($value='')
        {
            # code...
        }

        public function get_columns($value='')
        {
            # code...
        }

        public function get_table_contents($value='')
        {
            # code...
        }

    }
 ?>
