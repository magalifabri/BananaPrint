/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
// FLASH MESSAGE
var flashMessage = document.querySelector('.flash-message');
setTimeout(function () {
  console.log('here');
  flashMessage.style.opacity = '0';
}, 3000); // MENU BUTTON

var menuButton = document.querySelector('.menu-toggle-button');
var navElem = document.querySelector('nav');
menuButton.addEventListener('click', function () {
  menuButton.classList.toggle('active');
  navElem.classList.toggle('active');
});
/******/ })()
;