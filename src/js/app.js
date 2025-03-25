document.addEventListener('DOMContentLoaded', function () {
    eventLinstener();
    darkMode();
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);
    if (prefiereDarkMode.matches) {
        document.body.classList.add("darkMode");
    } else {
        document.body.classList.remove("darkMode");
    }

    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add("darkMode");
        } else {
            document.body.classList.remove("darkMode");
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener ('click', function() {
        document.body.classList.toggle('darkMode');
    });
}

function eventLinstener() {
    const menuResponsive = document.querySelector(".mostrar-menu");

    menuResponsive.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive () {
    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove ('mostrar')
    } else {
        navegacion.classList.add ('mostrar')
    }
}