const apiToken = 'pk.eyJ1IjoibWFnYWxpLWYiLCJhIjoiY2wxbmc2bTcxMHA5dzNpcXJ3NG5iOGc4eCJ9.hc1mwIb1k0yBsaY__Dcecw';

mapboxgl.accessToken = apiToken;

// const getCoordsFromAddress = async (address) => {
//     const mapboxClient = mapboxSdk({accessToken: mapboxgl.accessToken});
//
//     mapboxClient.geocoding
//         .forwardGeocode({
//             query: address,
//             autocomplete: false,
//             limit: 1
//         })
//         .send()
//         .then((response) => {
//             if (
//                 !response ||
//                 !response.body ||
//                 !response.body.features ||
//                 !response.body.features.length
//             ) {
//                 console.error('Invalid response:');
//                 console.error(response);
//                 return;
//             }
//
//
//             const feature = response.body.features[0];
//             console.log(feature);
//             return feature;
//             // createMap(feature);
//         });
// }


// CREATE MAP

let map;

const createMap = (data) => {
    if (!data[0][0]) {
        return;
    }

    map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [3.7303, 51.0500],
        zoom: 10
    });

    // add markers to map
    data[0].forEach((element, index) => {
        const lng = element;
        const lat = data[1][index];
        new mapboxgl.Marker().setLngLat([lng, lat]).addTo(map);
    })
}

const run = () => {
    fetch('/get-all-locations')
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

