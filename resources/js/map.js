const apiToken = 'pk.eyJ1IjoibWFnYWxpLWYiLCJhIjoiY2wxbmc2bTcxMHA5dzNpcXJ3NG5iOGc4eCJ9.hc1mwIb1k0yBsaY__Dcecw';

mapboxgl.accessToken = apiToken;


// CREATE MAP

const getColor = (isColor, isDouble) => {
    if (isColor === 'color') {
        if (isDouble === 'double-sided') {
            return '#ffc000';
        } else {
            return '#ffdc4a';
        }
    } else {
        if (isDouble) {
            return '#7a7a7a';
        } else {
            return '#bebebe';
        }
    }
};


let map;

const createMap = (data) => {
    if (!data[0][0]) {
        return;
    }

    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [3.7303, 51.0500],
        zoom: 10,
        cooperativeGestures: true, // allows the user to scroll the page without unintentionally zooming or panning the map (https://docs.mapbox.com/mapbox-gl-js/example/cooperative-gestures/)
    });

    // add markers to map
    data[0].forEach((element, index) => {
        const lng = element;
        const lat = data[1][index];
        const color = data[2][index] ? 'color' : 'grayscale';
        const double = data[3][index] ? 'double-sided' : 'single-sided';
        const printerId = data[4][index];

        const popup = new mapboxgl.Popup({offset: 25}).setHTML(
            `<p>${color} </p>`
            + `<p>${double} </p>`
            + `<br>`
            + `<p><a href=\"/contact-owner/${printerId}\">contact</a></p>`
        );

        new mapboxgl.Marker({
            color: getColor(color, double),
        }).setLngLat([lng, lat]).setPopup(popup).addTo(map);
    });

    // add geocoder search box to the map
    // code taken from https://docs.mapbox.com/mapbox-gl-js/example/mapbox-gl-geocoder/
    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    document.querySelector('.geocoder').appendChild(geocoder.onAdd(map));

    // add geolocate control to the map
    // code snippet taken from https://docs.mapbox.com/mapbox-gl-js/example/locate-user/
    const geolocator = new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        // When active the map will receive updates to the device's location as it changes.
        trackUserLocation: true,
        // Draw an arrow next to the location dot to indicate which direction the device is heading.
        showUserHeading: true
    });

    document.querySelector('.geolocator').appendChild(geolocator.onAdd(map));
}

const run = () => {
    fetch('/get-printers-info')
        .then(response => response.json())
        .then(data => createMap(data));
}
run();


// SEARCH

const handleSearchInput = async () => {
    const searchInput = document.querySelector('.search-input-field').value;

    if (searchInput) {
        fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${searchInput}.json?limit=1&access_token=${apiToken}`)
            .then(response => response.json())
            .then(data => {
                const lng = data.features[0].center[0];
                const lat = data.features[0].center[1];

                map.flyTo({
                    center: [lng, lat],
                    essential: true // this animation is considered essential with respect to prefers-reduced-motion
                });
            });
    }
};

const searchButton = document.querySelector('.search-submit-button')
searchButton.addEventListener('click', handleSearchInput);
