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
    <link rel="stylesheet" href="/registro/registro.css">
    <link rel="stylesheet" href="/shared/menu.css">
    <title>Registro UTT Escolar</title>
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
    <main class="container">
        <h3>¡Bienvenido!</h3>
        <hr>
        <h4>Por favor, regístrese :)</h4>
        <form id="register-form">
            <div class="mb-3">
                <label for="studentID" class="form-label">Matrícula</label>
                <input required type="number" class="form-control" id="studentID" name="studentID"
                    aria-describedby="matricula-hint">
                <div id="matricula-hint" class="form-text">Ingresa tu matrícula de 8 dígitos</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre(s)</label>
                <input type="text" required class="form-control" id="name" name="name" aria-describedby="name-hint">
                <div id="name-hint" class="form-text">Ingresa solo tu nombre o nombres</div>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Apellido Paterno</label>
                <input type="text" required class="form-control" id="lastName" name="lastName"
                    aria-describedby="lastName-hint">
                <div id="lastName-hint" class="form-text">Ingresa tu apellido paterno</div>
            </div>
            <div class="mb-3">
                <label for="secondLastName" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="secondLastName" name="secondLastName"
                    aria-describedby="secondLastName-hint">
                <div id="secondLastName-hint" class="form-text">Ingresa tu apellido materno</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" required class="form-control" id="email" name="email" aria-describedby="email-hint">
                <div id="email-hint" class="form-text">Ingresa tu correo</div>
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" required class="form-control" id="pass" name="pass"
                    aria-describedby="password-hint">
                <div id="password-hint" class="form-text">Ingresa tu contraseña</div>
            </div>

            <button type="submit" class="btn btn-primary d-block">Registrarse</button>
        </form>
    </main>
    <script src="/registro/registro.js"></script>
</body>

</html>