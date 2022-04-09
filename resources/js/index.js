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

// owner-seeker toggle

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


// reward swapping

const rewardInsertSpan = document.querySelector('span.reward-insert');
const rewards = [
    'apples',
    // 'bananas',
    // 'oranges',
    // 'bananas',
    // 'cookies',
    // 'bananas',
    // 'muffins',
    // 'bananas',
    // 'flowers',
    // 'bananas',
    'chocolates',
    // 'bananas',
];
let i = 0;

setInterval(() => {
    rewardInsertSpan.style.opacity = '0';

    setTimeout(() => {
        rewardInsertSpan.textContent = rewards[i++] + '!';
        rewardInsertSpan.style.opacity = '1';

        if (i === rewards.length) {
            i = 0;
        }
    }, 100);
}, 3000)
