const { default: axios } = require("axios");

// Obtiene los datos de la API de la URL y te devuelve su correspondiente JSON

async function obtenerDatos(url) { 

    respuesta = {};

    const promise = axios.get(url);
    
    const dataPromise = promise.then((response) => respuesta);

    return respuesta;

}

function obtenerEventos(url,campos) {
    
    const promise = axios.get(url);

    promise.then();

}

export default obtenerDatos;

