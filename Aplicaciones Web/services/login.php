<?php
    require_once(dirname(__FILE__) . "/../classes/sessions.php");

    $method = $_SERVER["REQUEST_METHOD"];

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    // Get the full URL
    $current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $parsing = parse_url($current_url);
    $query = $parsing["query"] ? $parsing["query"] : "";
    $queryParams = explode("&", $query);
    $filter = [];

    for ($i=0; $i < count($queryParams); $i++) { 
        $parameter = $queryParams[$i];
        if($parameter === "") {
            continue;
        }

        $splitted = explode("=", $parameter);
        $filter[$splitted[0]] = $splitted[1];
    }

    $servername = "localhost";
    $username = "root";
    $password = "utt";
    $database = "UTTEscolar";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        print("Error?");
        var_dump($conn->connect_error);
        //die("Connection failed: " . $conn->connect_error);
    }

    switch ($method) {
        case 'POST':
            //Buscar el usuario y contraseña en la BDD
            $loginValue = $_POST["login"];
            $passwordValue = $_POST["password"];

            $sql = "SELECT * FROM Students WHERE (studentID = '$loginValue' OR email='$loginValue') AND pass = '$passwordValue'";
            $result = $conn->query($sql);
            $logeado = mysqli_num_rows($result) === 1;

            if($logeado) {
                header("HTTP/1.1 200 OK");
                $tokenDate = date("Y-m-d H:i:s");
                $token = base64_encode("$loginValue/$tokenDate");
                setcookie("UTT_SSID", $token, time() + (86400 * 30), "/", "", false, true);
                Database::getInstance()->addSession($token);
                echo $token;
            } else {
                header("HTTP/1.1 403 Forbidden");
                echo "false";
            }
            break;
        
        case 'PUT':
            //Verificar si el usuario existe, con su sesión o auth y actualizar los datos...
            break;

        case 'DELETE': 
            //Verificar si el usuario existe, con su sesión o auth y deshabilitarlo...
            break;

        case 'GET': 
            //Conectarse a la BDD
            $studentID = $filter["studentID"];
            $sql = "SELECT * FROM Students WHERE studentID = '$studentID'";
            var_dump($sql);
            $result = $conn->query($sql);
            var_dump($result);
            //Extraer el usuario de los queryParams
            break;
    };

    /*const admin = ["login" => "admin", "password" => "admin123"];
    
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    header("Content-Type: text/plain");
    if($login === admin["login"] && $password === admin["password"] ) {
        header("HTTP/1.1 200 OK");
        echo "Bienvenido admin";
    } else {
        header("HTTP/1.1 403 Forbidden");
        echo "Login: $login, Pass: $password";
    }*/
?>