document.addEventListener('DOMContentLoaded', () => {
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const navbar = document.getElementById('navbar');
    const sideMenu = document.getElementById('side-menu');
    const menuClose = document.querySelector('.menu-close');

    // Mostrar el menú de navegación
    bar.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });

    // Ocultar el menú si se hace clic en el botón de cerrar
    if (close) {
        close.addEventListener('click', () => {
            navbar.classList.remove('active');
        });
    }

    // Mostrar el menú lateral
    bar.addEventListener('click', () => {
        sideMenu.style.transform = 'translateX(0)';
    });

    // Ocultar el menú lateral
    if (menuClose) {
        menuClose.addEventListener('click', () => {
            sideMenu.style.transform = 'translateX(-100%)';
        });
    }

    // Hacer clic fuera del menú para cerrarlo
    document.addEventListener('click', (event) => {
        if (!sideMenu.contains(event.target) && !bar.contains(event.target)) {
            sideMenu.style.transform = 'translateX(-100%)';
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Mostrar/Ocultar el menú lateral
    const bar = document.getElementById('bar');
    const sideMenu = document.getElementById('side-menu');
    const closeMenu = document.querySelector('.menu-close');

    bar.addEventListener('click', () => {
        sideMenu.style.transform = 'translateX(0)';
    });

    closeMenu.addEventListener('click', () => {
        sideMenu.style.transform = 'translateX(-100%)';
    });

    // Mostrar/Ocultar submenús
    const sectionTitles = document.querySelectorAll('#side-menu .section-title');
    sectionTitles.forEach((title) => {
        title.addEventListener('click', () => {
            const subMenu = title.nextElementSibling; // Busca el submenú relacionado
            if (subMenu.style.display === 'block') {
                subMenu.style.display = 'none'; // Oculta si está visible
            } else {
                subMenu.style.display = 'block'; // Muestra si está oculto
            }
        });
    });
});

