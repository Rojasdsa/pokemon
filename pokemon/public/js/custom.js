'use strict';

// Muestra la opción subtype=null cambiandole el color
document.addEventListener('DOMContentLoaded', function () {
    let subtypeOption = document.querySelector('.hover-null');

    if (subtypeOption) {
        subtypeOption.addEventListener('mouseover', function () {
            subtypeOption.classList.add('hovered');
        });

        subtypeOption.addEventListener('mouseout', function () {
            subtypeOption.classList.remove('hovered');
        });
    }
});