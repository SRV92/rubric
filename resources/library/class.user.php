<?php
    class User
    {
        private $db;

        // constructor takes connection as parameter (this is probably true for all classes that access database)
        public function __construct($conn)
        {
            $this->db = $conn;
        }

        // function to register a new user
        // pass in required parameters to populate database
        public function register($first_name, $last_name, $user_name, $user_email, $user_password)
        {
            try {
                $new_password = password_hash($user_password, PASSWORD_DEFAULT);

                // SQL statement to be held in variable
                $stmt = $this->db->prepare('INSERT INTO users(user_name, user_email, user_password)
                                            VALUES(:user_name, :user_email, :user_password)');

                $stmt->bindparam(':user_name', $user_name);
                $stmt->bindparam(':user_email', $user_email);
                $stmt->bindparam(':user_password', $new_password);
                $stmt->execute();

                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // function for users to log in
        // takes username or email to get ID
        public function login($user_name, $user_email, $user_password)
        {
            try {
                $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:user_name OR user_email=:user_email LIMIT 1");
                $stmt->execute(array(':user_name' => $user_name, ':user_email' => $user_email));
                $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($stmt->rowCount() > 0) {
                    if (password_verify($user_password, $user_row['user_password'])) {
                        $_SESSION['user_session'] = $user_row['user_id'];

                        return true;
                    } else {
                        return false;
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        // function to log the user out
        public function logout()
        {
            // destroy all data registered to the session
            session_destroy();
            // unset a given variable
            unset($_SESSION['user_session']);
        }

        // function to check if users are logged in
        public function is_logged_in()
        {
            if (isset($_SESSION['user_session'])) {
                return true;
            } else {
                return false;
            }
        }

        // function to redirect user
        public function redirect($url) {
            header("Location: $url");
        }
    }
