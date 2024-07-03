document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('nav');
    var closeMenu = document.getElementById('close-menu');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('show');
    });

    closeMenu.addEventListener('click', function() {
        nav.classList.remove('show');
    });
});
