async function logout(token) {
    try {
        const formData = new FormData();
        formData.append("token", token);
        const respuesta = await axios.delete('/services/login.php', formData);
        window.location.href = '/home';
    } catch(e) {
        //TBD
        console.log(e);
    }
}