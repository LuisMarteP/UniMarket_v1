/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */

// Scripts

window.addEventListener('DOMContentLoaded', event => {

    //////////////////////////////////////////////////////////////////////////
    ////////////Cargar la API de googleMaps////////////
    //////////////////////////////////////////////////////////////////////////
    let map;
    let marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8
        });

        map.addListener('click', function(event) {
            placeMarker(event.latLng);
        });
    }

    function placeMarker(location) {
        if (marker) {
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
        document.getElementById('inputCordenadasGPS').value = location.lat() + ', ' + location.lng();
    }

    // disponible globalmente
    window.initMap = initMap;

    // Inicializar el mapa cuando el modal se muestra
    $('#modalDirecciones').on('shown.bs.modal', function () {
        initMap();
    });


    //////////////////////////////////////////////////////////////////////////
    //////////////// Para categorias navegar en las opciones ////////////////
    /////////////////////////////////////////////////////////////////////////
        // Mostrar u ocultar los valores predefinidos según el tipo de atributo
        document.getElementById('tipoAtributo').addEventListener('change', function() {
            const valoresPredefinidos = document.getElementById('valoresPredefinidos');
            if (this.value === 'predefinido') {
                valoresPredefinidos.style.display = 'block';
            } else {
                valoresPredefinidos.style.display = 'none';
            }
        });
  


});