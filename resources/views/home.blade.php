@extends('layouts.my_app')

@section('main')

    <p>main</p>

    <div id="map"></div>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="{{ mix('js/index.js') }}"></script>

@endsection
