@extends('layouts.my_app')

@section('main')

    @if ($errors->any())
{{--        <div class="alert alert-danger">--}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
{{--        </div>--}}
    @endif

    <form action="{{ route('storeJob', [$printer->id, auth()->id()]) }}" method="POST">
        @csrf

        <p>I would like my print to be </p>

        <div>
            <label for="grayscale">
                <input id="grayscale" type="radio" name="color" value="0" checked>
                grayscale
            </label>
        </div>
        @if ($printer->color)
            <div>
                <label for="color">
                    <input id="color" type="radio" name="color" value="1">
                    color
                </label>
            </div>
        @endif

        <br>

        <div>
            <label for="single-sided">
                <input id="single-sided" type="radio" name="doubleSided" value="0" checked>
                single-sided
            </label>
        </div>
        @if ($printer->double_sided)
            <div>
                <label for="double-sided">
                    <input id="double-sided" type="radio" name="doubleSided" value="1">
                    double-sided
                </label>
            </div>
        @endif

        <hr>

        <p>About my document</p>

        <p>number of pages: <input type="number" name="numPages" value="{{ old('numPages') }}"></p>

        <p>file extension: <input type="text" name="fileExt" placeholder="e.g.: .pdf / .txt" value="{{ old('fileExt') }}"></p>

        <hr>

        <p>
            <label for="exchangeOffer">
                I offer <input id="exchangeOffer" type="text" name="exchangeOffer" value="{{ old('exchangeOffer') ?? 'a delicious banana' }}" placeholder="an even more delicious banana"> in exchange
            </label>
        </p>

        <hr>

        <p>I can come pick up the print during these times:</p>
        <p>
            1. between
            <input type="text" name="pickupTimeframeStart1" value="{{ old('pickupTimeframeStart1') }}" placeholder="time">
            and <input type="text" name="pickupTimeframeEnd1" value="{{ old('pickupTimeframeEnd1') }}" placeholder="time">
            on <input type="text" name="pickupTimeframeDate1" value="{{ old('pickupTimeframeDate1') }}" placeholder="day / date">
        </p>
        <p>
            2. between
            <input type="text" name="pickupTimeframeStart2" value="{{ old('pickupTimeframeStart2') }}" placeholder="time">
            and <input type="text" name="pickupTimeframeEnd2" value="{{ old('pickupTimeframeEnd2') }}" placeholder="time">
            on <input type="text" name="pickupTimeframeDate2" value="{{ old('pickupTimeframeDate2') }}" placeholder="day / date">
        </p>
        <p>
            3. between
            <input type="text" name="pickupTimeframeStart3" value="{{ old('pickupTimeframeStart3') }}" placeholder="time">
            and <input type="text" name="pickupTimeframeEnd3" value="{{ old('pickupTimeframeEnd3') }}" placeholder="time">
            on <input type="text" name="pickupTimeframeDate3" value="{{ old('pickupTimeframeDate3') }}" placeholder="day / date">
        </p>

        <hr>

        <p><label for="message">additional comments</label></p>
        <textarea name="message" id="message" cols="30" rows="10">{{ old('message') ?? '' }}</textarea>

        <hr>

        <p><input type="submit"></p>
    </form>

@endsection
