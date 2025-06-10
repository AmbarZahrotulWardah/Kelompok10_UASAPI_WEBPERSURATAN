import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// dark-mode.js
document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById('darkToggle');
    const html = document.documentElement;

    // Apply saved theme on load
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
    }

    toggle.addEventListener('click', () => {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    });
});

