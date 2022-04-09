<x-layout>

    <section class="intro">
        <h2 class="header">Connecting those without printers to those with, for little print jobs.</h2>

        <img src="{{ asset('images/bananas.jpg') }}"
             alt="image of a woman's hand holding a bunch of banana on a yellow background">

        <p class="subtext">As reciprocation, we suggest a banana. By many claimed to be the ultimate healthy snack!</p>
    </section>

    <section class="instructions">
        <div class="selection">
            <p class="header">Do you have a printer?</p>

            <div class="buttons">
                <span class="button yes active">yes</span>
                <span class="button no">no</span>
            </div>
        </div>

        <div class="parts-container">
            <div class="owner part active">
                <h2 class="header">owner header</h2>
            </div>

            <div class="seeker part">
                <h2 class="header">seeker header</h2>
            </div>
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
