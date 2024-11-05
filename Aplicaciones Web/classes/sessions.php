<?php
    class Database {
        private static $sessionInstance = null;

        private $conn = null;
        public function __construct() {
            $servername = "localhost";
            $username = "root";
            $password = "utt";
            $database = "UTTEscolar";
            $this->conn = new mysqli($servername, $username, $password, $database);
        }

        public function query($sql): mysqli_result {
            $result = $this->conn->query($sql);
            return $result;
        }

        public function addSession(string $token, string $studentID) {
            $sql = "INSERT INTO Sessions VALUES('$token', '$studentID', TRUE)";
            $result = $this->conn->query($sql);
        }

        public function checkSession(string $token): string {
            $sql = "SELECT session FROM Sessions WHERE token = '$token'";
            $result = $this->conn->query($sql);
            $hasSession = mysqli_num_rows($result) === 1;
            return $hasSession ? "true" : "false";
        }

        public function logOutSession(string $token): string {
            $sql = "UPDATE Sessions SET session = FALSE WHERE token = '$token'";
            $result = $this->conn->query($sql);
            return $result ? "true" : "false";
        }

        public function getAll() {
            $sql = "SELECT session FROM Sessions";
            $result = $this->conn->query($sql);
            var_dump($result);
        }

        public static function getInstance() {
            if (is_null(self::$sessionInstance)) {
                self::$sessionInstance = new Database();
            }

            return self::$sessionInstance;
        }
    }
?>