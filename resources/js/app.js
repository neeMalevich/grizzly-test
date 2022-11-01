import './bootstrap';

import '../sass/app.scss'

const closeCookies = document.querySelector('#cookies__close');

closeCookies.addEventListener('click', function () {
    document.querySelector('#cookies').classList.add('fade');
});
