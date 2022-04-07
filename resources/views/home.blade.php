@extends('layouts.my_app')

@section('main')

{{--    <form action="{{ route('searchPrinters') }}" method="GET">--}}
        <p>
            search for printers near <input class="search-input-field" type="text" name="location" placeholder="street, city / zipcode">
            <input class="search-submit-button" type="submit">
        </p>
{{--    </form>--}}

    <div id="map"></div>

    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="{{ mix('js/index.js') }}"></script>

@endsection
