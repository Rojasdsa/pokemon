'use strict'

import * as bootstrap from 'bootstrap';

// ACTUALIZAR AÑO AUTOMÁTICAMENTE //

document.addEventListener('DOMContentLoaded', function () {
    let currentYearElement = document.getElementById("currentYear");

    if (currentYearElement) {
        let currentYear = new Date().getFullYear();
        currentYearElement.textContent = "®" + currentYear + " Proyecto Pokémon (Recuperación Cliente, Servidor, Diseño)";
    }
});

// CAMBIO DE ASPECTO SEGÚN ESTACIÓN //


// ELEGIR COLOR FAVORITO (user->color_preference) //

document.addEventListener('DOMContentLoaded', function () {
    // Asigna el color del usuario a los elementos con la clase correspondiente
    function applyUserColor(color, className) {
        const elements = document.getElementsByClassName(className);
        Array.from(elements).forEach(element => {
            element.style.backgroundColor = color;
        });
    }

    // Tu lógica para mostrar mensajes de éxito o error
    function showMessage(message, success) {
        if (success) {
            console.log('Éxito: ' + message);
        } else {
            console.log('Error: ' + message);
        }
    }

    // Agrega esta función para actualizar el color después de actualizar la preferencia de color
    function updateColorPreference() {
        const form = document.getElementById('colorPreferenceForm');
        if (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const formData = new FormData(form);
                
                fetch(form.action, {
                    method: form.method,
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        applyUserColor(data.color, 'color-pref-elem'); // Aplica a la clase 'color-pref-elem'
                        showMessage(data.message, true);
                    } else {
                        showMessage(data.message, false);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showMessage('Hubo un error al procesar la solicitud.', false);
                });
            });
        }
    }

    updateColorPreference();
});
