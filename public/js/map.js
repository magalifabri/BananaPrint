/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/map.js ***!
  \*****************************/
var apiToken = 'pk.eyJ1IjoibWFnYWxpLWYiLCJhIjoiY2wxbmc2bTcxMHA5dzNpcXJ3NG5iOGc4eCJ9.hc1mwIb1k0yBsaY__Dcecw';
mapboxgl.accessToken = apiToken; // CREATE MAP

var getColor = function getColor(isColor, isDouble) {
  if (isColor === 'color') {
    if (isDouble === 'double-sided') {
      return '#ffc000';
    } else {
      return '#ffdc4a';
    }
  } else {
    if (isDouble === 'double-sided') {
      return '#7a7a7a';
    } else {
      return '#bebebe';
    }
  }
};

var map;

var createMap = function createMap(data) {
  if (!data[0][0]) {
    return;
  }

  map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [3.7303, 51.0500],
    zoom: 10,
    cooperativeGestures: true // allows the user to scroll the page without unintentionally zooming or panning the map (https://docs.mapbox.com/mapbox-gl-js/example/cooperative-gestures/)

  }); // add markers to map

  data[0].forEach(function (element, index) {
    var lng = element;
    var lat = data[1][index];
    var color = data[2][index] ? 'color' : 'grayscale';

    var _double = data[3][index] ? 'double-sided' : 'single-sided';

    var printerId = data[4][index];
    var popup = new mapboxgl.Popup({
      offset: 25
    }).setHTML("<p>".concat(color, " </p>") + "<p>".concat(_double, " </p>") + "<br>" + "<p><a href=\"/contact-owner/".concat(printerId, "\" class=\"button-style-1\">contact</a></p>"));
    new mapboxgl.Marker({
      color: getColor(color, _double)
    }).setLngLat([lng, lat]).setPopup(popup).addTo(map);
  }); // add geocoder search box to the map
  // code taken from https://docs.mapbox.com/mapbox-gl-js/example/mapbox-gl-geocoder/

  var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl
  });
  document.querySelector('.geocoder').appendChild(geocoder.onAdd(map)); // add geolocate control to the map
  // code snippet taken from https://docs.mapbox.com/mapbox-gl-js/example/locate-user/

  var geolocator = new mapboxgl.GeolocateControl({
    positionOptions: {
      enableHighAccuracy: true
    },
    // When active the map will receive updates to the device's location as it changes.
    trackUserLocation: true,
    // Draw an arrow next to the location dot to indicate which direction the device is heading.
    showUserHeading: true
  });
  document.querySelector('.geolocator').appendChild(geolocator.onAdd(map));
};

var run = function run() {
  fetch('/get-printers-info').then(function (response) {
    return response.json();
  }).then(function (data) {
    return createMap(data);
  });
};

run();
/******/ })()
;