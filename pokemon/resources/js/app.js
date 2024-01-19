'use strict'

import * as bootstrap from 'bootstrap';


// VALIDACIONES EN JS

/* Login */
console.log('HASTA AQUÍ TODO BIEN');

document.addEventListener('DOMContentLoaded', function () {
    var loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function (event) {
        // Lógica de validación
        var emailInput = document.getElementById('email');
        var passwordInput = document.getElementById('password');

        if (!validarEmail(emailInput.value)) {
            alert('Por favor, ingresa una dirección de correo electrónico válida.');
            event.preventDefault();
            return;
        }

        if (passwordInput.value.length < 6) {
            alert('La contraseña debe tener al menos 6 caracteres.');
            event.preventDefault();
            return;
        }

        // Si llegamos a este punto, el formulario se envía correctamente
    });

    function validarEmail(email) {
        // Lógica simple de validación de correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});


// ACTUALIZAR AÑO AUTOMÁTICAMENTE
// Obtiene el elemento span por su id
document.addEventListener('DOMContentLoaded', function () {
    let currentYearElement = document.getElementById("currentYear");

    if (currentYearElement) {
        let currentYear = new Date().getFullYear();
        currentYearElement.textContent = "®" + currentYear + " Proyecto Pokémon (Recuperación Cliente, Servidor, Diseño)";
    }
});



// COLOR FAV DEL USER
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
            alert('Éxito: ' + message);
        } else {
            alert('Error: ' + message);
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
