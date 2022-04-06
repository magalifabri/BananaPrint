@extends('layouts.my_app')

@section('main')

    <form action="{{ route('storePrinter') }}" method="POST">
        @csrf

        <p>printing options</p>
        <p>color: <input type="checkbox" name="color" value="1"></p>
        <p>double-sided: <input type="checkbox" name="doubleSided" value="1"></p>

        <p>address</p>
        <p>street: <input type="text" name="street"></p>
        <p>street number: <input type="number" name="streetNumber"></p>
        <p>zipcode: <input type="text" name="zipcode"></p>

        <p><input type="submit"></p>
    </form>

@endsection
