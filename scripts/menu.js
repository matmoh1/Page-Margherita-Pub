const menu = document.querySelector('.burger');
const activeElements = document.querySelectorAll('.jsActive');

function activateMenu() {
    activeElements.forEach(element => {
        element.classList.toggle('active');
    });
}

menu.addEventListener('click', activateMenu);