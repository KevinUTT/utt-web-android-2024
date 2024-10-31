const formulario = document.getElementById("datos");
formulario.addEventListener('submit', login);

const mensaje = document.getElementById("mensaje");

async function login(event) {
    event.preventDefault();
    let form = event.target;
    const formData = new FormData(form);

    //AJAX con Axios
    try {
        const respuesta = await axios.post('/services/login.php', formData);
        mensaje.className = "alert alert-success";
        mensaje.innerText = "Loggeado :D";
    } catch(e) {
        mensaje.className = "alert alert-danger";
        mensaje.innerText = "Datos inválidos";
    }
}
