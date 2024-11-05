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
        const searchParams = window.location.search.substring(1, window.location.search.length);
        const paramsText = searchParams.split('&');
        const params = {};

        for (let i = 0; i < paramsText.length; i++) {
            const param = paramsText[i];
            const kvp = param.split('=');
            params[kvp[0]] = kvp[1];
        }

        if(params["redirect"]) {
            window.location.href = params["redirect"];
        }

    } catch(e) {
        mensaje.className = "alert alert-danger";
        mensaje.innerText = "Datos inválidos";
    }
}
