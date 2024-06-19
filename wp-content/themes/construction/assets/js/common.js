document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('nav');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('show');
    });
});
