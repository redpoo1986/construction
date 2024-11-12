document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('nav');
    var closeMenu = document.getElementById('close-menu');

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('show');
        });
    }

    if (closeMenu && nav) {
        closeMenu.addEventListener('click', function() {
            nav.classList.remove('show');
        });
    }
});
