// FLASH MESSAGE

const flashMessage = document.querySelector('.flash-message');

setTimeout(() => {
    console.log('here');
    flashMessage.style.opacity = '0';
}, 3000);


// MENU BUTTON

const menuButton = document.querySelector('.menu-toggle-button');
const navElem = document.querySelector('nav');

menuButton.addEventListener('click', () => {
    menuButton.classList.toggle('active');
    navElem.classList.toggle('active');
})
