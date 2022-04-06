mapboxgl.accessToken = 'pk.eyJ1IjoibWFnYWxpLWYiLCJhIjoiY2wxbmc2bTcxMHA5dzNpcXJ3NG5iOGc4eCJ9.hc1mwIb1k0yBsaY__Dcecw';

// const map = new mapboxgl.Map({
//     container: 'map',
//     style: 'mapbox://styles/mapbox/streets-v11',
//     center: [-74.5, 40],
//     zoom: 9
// });

// const mapboxClient = mapboxSdk({accessToken: mapboxgl.accessToken});
//
// mapboxClient.geocoding
//     .forwardGeocode({
//         query: 'kraaistraat 18 9000 Belgium',
//         autocomplete: false,
//         limit: 1
//     })
//     .send()
//     .then((response) => {
//         if (
//             !response ||
//             !response.body ||
//             !response.body.features ||
//             !response.body.features.length
//         ) {
//             console.error('Invalid response:');
//             console.error(response);
//             return;
//         }
//
//         const feature = response.body.features[0];
//
//         const map = new mapboxgl.Map({
//             container: 'map',
//             style: 'mapbox://styles/mapbox/streets-v11',
//             center: feature.center,
//             zoom: 10
//         });
//
// // Create a marker and add it to the map.
//         new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
//     });

const mapboxClient = mapboxSdk({accessToken: mapboxgl.accessToken});

let feature;

const getFeature = async () => {
    mapboxClient.geocoding
        .forwardGeocode({
            query: 'kraaistraat 18 9000 Belgium',
            autocomplete: false,
            limit: 1
        })
        .send()
        .then((response) => {
            if (
                !response ||
                !response.body ||
                !response.body.features ||
                !response.body.features.length
            ) {
                console.error('Invalid response:');
                console.error(response);
                return;
            }

            feature = response.body.features[0];
            createMap(feature);
        });
}

const createMap = (feature) => {
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: feature.center,
        zoom: 10
    });

// Create a marker and add it to the map.
    new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
}

const run = async () => {
    await getFeature();
    // console.log('B');
    // createMap(feature);
}
run();
