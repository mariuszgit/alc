document.addEventListener('DOMContentLoaded', function() {
    const btn = document.querySelector('#nav-menu');
    btn.addEventListener('click', function() {
        const list = document.querySelector('.nav-list');
        list.classList.toggle('open');
    })
});