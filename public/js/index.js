/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
// FLASH MESSAGE
var flashMessage = document.querySelector('.flash-message');

if (flashMessage) {
  setTimeout(function () {
    flashMessage.style.opacity = '0';
  }, 3000);
} // MENU BUTTON


var menuButton = document.querySelector('.menu-toggle-button');
var navElem = document.querySelector('nav');
menuButton.addEventListener('click', function () {
  menuButton.classList.toggle('active');
  navElem.classList.toggle('active');
}); // INSTRUCTION SELECTION
// owner-seeker toggle

var yesButton = document.querySelector('.selection .button.yes');
var noButton = document.querySelector('.selection .button.no');
var ownerPartDiv = document.querySelector('.instructions .owner.part');
var seekerPartDiv = document.querySelector('.instructions .seeker.part');
yesButton.addEventListener('click', function () {
  if (!yesButton.classList.contains('active')) {
    yesButton.classList.toggle('active');
    ownerPartDiv.classList.toggle('active');
    noButton.classList.toggle('active');
    seekerPartDiv.classList.toggle('active');
  }
});
noButton.addEventListener('click', function () {
  if (!noButton.classList.contains('active')) {
    yesButton.classList.toggle('active');
    ownerPartDiv.classList.toggle('active');
    noButton.classList.toggle('active');
    seekerPartDiv.classList.toggle('active');
  }
}); // reward swapping

var rewardInsertSpan = document.querySelector('span.reward-insert');
var rewards = ['apples', // 'bananas',
// 'oranges',
// 'bananas',
// 'cookies',
// 'bananas',
// 'muffins',
// 'bananas',
// 'flowers',
// 'bananas',
'chocolates' // 'bananas',
];
var i = 0;
setInterval(function () {
  rewardInsertSpan.style.opacity = '0';
  setTimeout(function () {
    rewardInsertSpan.textContent = rewards[i++] + '!';
    rewardInsertSpan.style.opacity = '1';

    if (i === rewards.length) {
      i = 0;
    }
  }, 100);
}, 3000);
/******/ })()
;