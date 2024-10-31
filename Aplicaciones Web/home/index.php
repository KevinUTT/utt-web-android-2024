<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/shared/constants.js"></script>
    <script src="/home/home.js"></script>
    <link rel="stylesheet" href="/home/home.css">
    <link rel="stylesheet" href="/shared/menu.css">
    <title>Inicio - UTT Escolar</title>
</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UTT Escolar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Iniciar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <?php
        require_once(dirname(__FILE__) . "/../classes/sessions.php");

        $SSID = $_COOKIE["UTT_SSID"];
        $hasSession = Database::getInstance()->checkSession($SSID ? $SSID : "N/A"); 
        echo "<div>Sesión: $hasSession<div>";
        if($hasSession) {
            echo "<button onclick='logout(\"" . $SSID ."\")'>Salir</button>";
        }
    ?>

</body>
</html>