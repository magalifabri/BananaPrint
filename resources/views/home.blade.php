<x-layout>

    <section class="intro">
        <h2 class="header">Connecting those without printers to those with, for little print jobs.</h2>

        <img src="{{ asset('images/bananas.jpg') }}"
             alt="image of a woman's hand holding a bunch of banana on a yellow background">

        <p class="subtext">As reciprocation, we suggest a banana. By many claimed to be the ultimate healthy snack!</p>
    </section>

    <section class="instructions">
        <div class="selection">
            <p class="instructions-header">Do you have a printer?</p>

            <div class="buttons">
                <span class="button yes active">yes</span>
                <span class="button no">no</span>
            </div>
        </div>

        <div class="parts-container">
            <div class="part owner active">
                <h2 class="part-header">Print for your community in exchange for <span
                        class="reward-insert">bananas!</span></h2>

                <div class="text-container">
                    <p>Setting up is super easy!</p>

                    <ol>
                        <li>create an <a href="{{ route('register') }}">account</a></li>
                        <li>add a printer on your <a href="{{ route('dashboard') }}">dashboard</a></li>
                        <li>keep an eye on your regular mailbox for print requests</li>
                    </ol>

                    <p>That's all!</p>
                </div>
            </div>

            <div class="part seeker">
                <h2 class="part-header">Effortlessly reach out to printer-owners</h2>

                <div class="text-container">
                    <p>It only takes a couple minutes!</p>

                    <ol>
                        <li>create an <a href="{{ route('register') }}">account</a></li>
                        <li>select a printer-owner from the <a href="#map">map</a></li>
                        <li>fill in the form & hit send</li>
                        <li>keep an eye on your regular mailbox for a reply</li>
                    </ol>

                    <p>Done!</p>
                </div>

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
