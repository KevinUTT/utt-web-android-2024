<?php
    $method = $_SERVER["REQUEST_METHOD"];
    
    $servername = "localhost";
    $username = "root";
    $password = "utt";
    $database = "UTTEscolar";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    switch ($method) {
        case 'POST':
            $studentID = $_POST["studentID"];
            $name = $_POST["name"];
            $lastName = $_POST["lastName"];
            $secondLastName = $_POST["secondLastName"] ? $_POST["secondLastName"] : 'NULL';
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $NULL = NULL;
            $false = false;
            $date = date("Y-m-d H:i:s");
            
            $sql = "INSERT INTO Students VALUES('$studentID', '$name', '$lastName', '$secondLastName', '$email', '$pass', '$date', NULL, FALSE);";
            
            try {
                $result = $conn->query($sql);
                header("HTTP/1.1 201 Created");
                echo "true";
            } catch (Exception $e) {
                header("HTTP/1.1 409 Conflict");
                echo "false";
            }
            break;
        
        default:
            header("HTTP/1.1 405 Method Not Allowed");
            echo "No se permite esta acción :)";
        break;
    };
?>