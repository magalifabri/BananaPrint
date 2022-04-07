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

    <form action="{{ route('handleForm') }}" method="POST">
        @csrf

        <p>I would like my print to be </p>

        <div>
            <label for="grayscale">
                <input id="grayscale" type="radio" name="color" value="grayscale" checked>
                grayscale
            </label>
        </div>
        @if ($owner->printer->color)
            <div>
                <label for="color">
                    <input id="color" type="radio" name="color" value="color">
                    color
                </label>
            </div>
        @endif

        <br>

        <div>
            <label for="single-sided">
                <input id="single-sided" type="radio" name="sided" value="single-sided" checked>
                single-sided
            </label>
        </div>
        @if ($owner->printer->double_sided)
            <div>
                <label for="double-sided">
                    <input id="double-sided" type="radio" name="sided" value="double-sided">
                    double-sided
                </label>
            </div>
        @endif

        <hr>

        <p>About my document</p>

        <p>number of pages: <input type="number" name="numPages" value="{{ old('numPages') }}"></p>

        <p>approximate file size: <input type="text" name="fileSize" placeholder="e.g.: 10KB / 1MB" value="{{ old('fileSize') }}"></p>

        <p>file extension: <input type="text" name="fileExt" placeholder="e.g.: .pdf / .txt" value="{{ old('fileExt') }}"></p>

        <hr>

        <p>
            <label for="exchangeOffer">
                I offer <input id="exchangeOffer" type="text" name="exchangeOffer" value="{{ old('exchangeOffer') ?? 'a delicious banana' }}"> in exchange
            </label>
        </p>

        <hr>

        <p>I can come pick up the print during these times:</p>
        <p>
            1. between
            <input type="time" name="pickupTimeframeStart1" value="{{ old('pickupTimeframeStart1') }}">
            and <input type="time" name="pickupTimeframeEnd1" value="{{ old('pickupTimeframeEnd1') }}">
            on <input type="date" name="pickupTimeframeDate1" value="{{ old('pickupTimeframeDate1') }}">
        </p>
        <p>
            2. between
            <input type="time" name="pickupTimeframeStart2" value="{{ old('pickupTimeframeStart2') }}">
            and <input type="time" name="pickupTimeframeEnd2" value="{{ old('pickupTimeframeEnd2') }}">
            on <input type="date" name="pickupTimeframeDate2" value="{{ old('pickupTimeframeDate2') }}">
        </p>
        <p>
            3. between
            <input type="time" name="pickupTimeframeStart3" value="{{ old('pickupTimeframeStart3') }}">
            and <input type="time" name="pickupTimeframeEnd3" value="{{ old('pickupTimeframeEnd3') }}">
            on <input type="date" name="pickupTimeframeDate3" value="{{ old('pickupTimeframeDate3') }}">
        </p>

        <hr>

        <p><label for="message">additional comments</label></p>
        <textarea name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>

        <hr>

        <p><input type="submit"></p>
    </form>

@endsection
