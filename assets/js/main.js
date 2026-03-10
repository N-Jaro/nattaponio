/**
 * Main JavaScript for nattapon.io
 */

document.addEventListener('DOMContentLoaded', function () {
    // Add vanilla JS functionality here, for example, responsive menu toggling
    const menuToggle = document.querySelector('.menu-toggle');
    const siteNavigation = document.querySelector('#site-navigation');

    if (menuToggle && siteNavigation) {
        menuToggle.addEventListener('click', function () {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);

            const menu = siteNavigation.querySelector('ul');
            if (menu) {
                menu.classList.toggle('toggled');
            }
        });
    }
});
