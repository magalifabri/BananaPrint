<x-layout>

    <section class="intro">
        <img src="{{ asset('images/bananas.jpg') }}"
             alt="image of a woman's hand holding a bunch of banana on a yellow background">

        <div class="text-container">
            <h2>Connecting those without printers to those with, for little print jobs.</h2>
            <p>As reciprocation, we suggest a banana. By many claimed to be the ultimate healthy snack!</p>
        </div>
    </section>
    <p>
        search for printers near <input class="search-input-field" type="text" name="location"
                                        placeholder="street, city / zipcode">
        <input class="search-submit-button" type="submit">
    </p>

    <div id="map"></div>

    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="{{ mix('js/map.js') }}"></script>

</x-layout>
