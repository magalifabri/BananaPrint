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
});
/******/ })()
;