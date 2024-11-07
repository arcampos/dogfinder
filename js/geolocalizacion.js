function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendLocation, showError);
    } else {
        alert("La geolocalización no es compatible con este navegador.");
    }
}

function sendLocation(position) {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    
    // Enviar la ubicación al servidor
    fetch('guardar_ubicacion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            latitude: lat,
            longitude: lon
        }),
    })
    .then(response => response.json())
    .then(data => {
        alert('¡Ubicación enviada! Latitud: ' + lat + ' , Longitud: ' + lon);
    })
    .catch((error) => {
        console.error('Error al enviar la ubicación:', error);
    });
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("El usuario denegó la solicitud de geolocalización.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("La información de la ubicación no está disponible.");
            break;
        case error.TIMEOUT:
            alert("La solicitud de geolocalización ha caducado.");
            break;
        case error.UNKNOWN_ERROR:
            alert("Ocurrió un error desconocido.");
            break;
    }
}

// Ejecutar cuando se cargue la página
window.onload = getLocation;
