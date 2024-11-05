async function logout(token) {
    try {
        const data = {
            token: token
        }
        const respuesta = await axios.delete('/services/login.php', data);
        window.location.href = '/home';
    } catch(e) {
        //TBD
        console.log(e);
    }
}