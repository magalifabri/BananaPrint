// FLASH MESSAGE

const flashMessage = document.querySelector('.flash-message');

if (flashMessage) {
    setTimeout(() => {
        flashMessage.style.opacity = '0';
    }, 3000);
}


// MENU BUTTON

const menuButton = document.querySelector('.menu-toggle-button');
const navElem = document.querySelector('nav');

menuButton.addEventListener('click', () => {
    menuButton.classList.toggle('active');
    navElem.classList.toggle('active');
})


// INSTRUCTION SELECTION

const yesButton = document.querySelector('.selection .button.yes');
const noButton = document.querySelector('.selection .button.no');
const ownerPartDiv = document.querySelector('.instructions .owner.part');
const seekerPartDiv = document.querySelector('.instructions .seeker.part');

yesButton.addEventListener('click', () => {
    if (!yesButton.classList.contains('active')) {
        yesButton.classList.toggle('active');
        ownerPartDiv.classList.toggle('active');
        noButton.classList.toggle('active');
        seekerPartDiv.classList.toggle('active');
    }
})

noButton.addEventListener('click', () => {
    if (!noButton.classList.contains('active')) {
        yesButton.classList.toggle('active');
        ownerPartDiv.classList.toggle('active');
        noButton.classList.toggle('active');
        seekerPartDiv.classList.toggle('active');
    }
})
