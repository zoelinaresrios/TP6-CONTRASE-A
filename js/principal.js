
function generarTextoRandom(longitud) {
    const caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let resultado = "";

    for (let i = 0; i < longitud; i++) {
        const indice = Math.floor(Math.random() * caracteres.length);
        resultado += caracteres.charAt(indice);
    }

    return resultado;
}

 
function generarCredenciales() {
    return {
        usuario: generarTextoRandom(8),
        password: generarTextoRandom(10)
    };
}

 
function registrarUsuario() {
    const email = document.getElementById("email").value;
    const respuesta = document.getElementById("respuesta");

    if (!email) {
        respuesta.innerText = "Ingrese un email válido";
        return;
    }

    const credenciales = generarCredenciales();

    fetch("php/mandar_credenciales.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            email: email,
            usuario: credenciales.usuario,
            password: credenciales.password
        })
    })
    .then(res => res.json())
    .then(data => {
        respuesta.innerText = data.mensaje;
    })
    .catch(() => {
        respuesta.innerText = "Error en el servidor";
    });
}