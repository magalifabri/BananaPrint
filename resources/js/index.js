mapboxgl.accessToken = 'pk.eyJ1IjoibWFnYWxpLWYiLCJhIjoiY2wxbmc2bTcxMHA5dzNpcXJ3NG5iOGc4eCJ9.hc1mwIb1k0yBsaY__Dcecw';

const getCoordsFromAddress = async () => {
    const mapboxClient = mapboxSdk({accessToken: mapboxgl.accessToken});

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
            console.log(feature);
            createMap(feature);
        });
}


const createMap = (data) => {
    if (!data[0][0]) {
        return;
    }

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [data[0][0], data[1][0]],
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

