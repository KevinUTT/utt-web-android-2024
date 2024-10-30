const formulario = document.getElementById('register-form');
formulario.addEventListener('submit', registrarUsuario);

async function registrarUsuario(event) {
    event.preventDefault();

    //Extraer los datos del formulario
    const formData = new FormData(formulario);
    try {
        const respuesta = await axios.post('/services/register.php', formData);
        Swal.fire({
            title: '¡Registro exitoso!',
            text: 'Has sido registrado correctamente :)',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    } catch(e) {
        Swal.fire({
            title: '¡No se ha podido registrar!',
            text: 'Verifica que tu matrícula o datos estén correctos y no estés ya registrado',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}