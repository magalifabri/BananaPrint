<x-layout>
    <x-slot name="main">
        <main class="create-job main-style-center">

            <form action="{{ route('storeJob', [$printer->id, auth()->id()]) }}" method="POST" class="box-style-1">
                @csrf

                {{-- ERROR MESSAGES --}}
                @if ($errors->any())
                    <div class="errors">
                        <p>Whoops! Something went wrong.</p>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- REQUEST WISHES --}}
                <p class="header">I would like my print to be </p>

                <label for="grayscale">
                    <input id="grayscale" type="radio" name="color" value="0" checked>
                    <span class="checkbox-label">grayscale</span>
                </label>
                @if ($printer->color)
                    <label for="color">
                        <input id="color" type="radio" name="color" value="1">
                        <span class="checkbox-label">color</span>
                    </label>
                @endif

                <label for="single-sided">
                    <input id="single-sided" type="radio" name="doubleSided" value="0" checked>
                    <span class="checkbox-label">single-sided</span>
                </label>
                @if ($printer->double_sided)
                    <label for="double-sided">
                        <input id="double-sided" type="radio" name="doubleSided" value="1">
                        <span class="checkbox-label">double-sided</span>
                    </label>
                @endif

                {{-- DOCUMENT DETAILS --}}
                <p class="header">About my document</p>

                <label for="numberOfPages">Number of pages</label>
                <input class="input-field-style-1" type="number" id="numberOfPages" name="numberOfPages" value="{{ old('numberOfPages') }}">

                <label for="fileExtension">File extension</label>
                <input class="input-field-style-1" type="text" id="fileExtension" name="fileExtension" placeholder="e.g.: .pdf / .txt"
                       value="{{ old('fileExtension') }}">

                {{-- EXCHANGE OFFER --}}
                <p class="header">In exchange, I offer</p>
                <input class="input-field-style-1" id="exchangeOffer" type="text" name="exchangeOffer"
                       value="{{ old('exchangeOffer') ?? 'a delicious banana' }}"
                       placeholder="an even more delicious banana">

                {{-- PICKUP TIMES --}}
                <p class="header">I can pick up the print</p>

                <p>
                    1. from
                    <input class="input-field-style-short" type="text" name="pickupTimeframeStart1" value="{{ old('pickupTimeframeStart1') }}"
                           placeholder="time">
                    to <input class="input-field-style-short" type="text" name="pickupTimeframeEnd1" value="{{ old('pickupTimeframeEnd1') }}"
                               placeholder="time">
                    on <input class="input-field-style-short" type="text" name="pickupTimeframeDate1" value="{{ old('pickupTimeframeDate1') }}"
                              placeholder="day">
                </p>
                <p>
                    2. from
                    <input class="input-field-style-short" type="text" name="pickupTimeframeStart2" value="{{ old('pickupTimeframeStart2') }}"
                           placeholder="time">
                    to <input class="input-field-style-short" type="text" name="pickupTimeframeEnd2" value="{{ old('pickupTimeframeEnd2') }}"
                               placeholder="time">
                    on <input class="input-field-style-short" type="text" name="pickupTimeframeDate2" value="{{ old('pickupTimeframeDate2') }}"
                              placeholder="day">
                </p>
                <p>
                    3. from
                    <input class="input-field-style-short" type="text" name="pickupTimeframeStart3" value="{{ old('pickupTimeframeStart3') }}"
                           placeholder="time">
                    to <input class="input-field-style-short" type="text" name="pickupTimeframeEnd3" value="{{ old('pickupTimeframeEnd3') }}"
                               placeholder="time">
                    on <input class="input-field-style-short" type="text" name="pickupTimeframeDate3" value="{{ old('pickupTimeframeDate3') }}"
                              placeholder="day">
                </p>

                {{-- COMMENTS --}}
                <p class="header">Additional Comments</p>
                <textarea class="input-field-style-1" name="message" rows="5">{{ old('message') ?? '' }}</textarea>

                {{-- SUBMIT --}}
                <input class="button-style-2" type="submit">
            </form>

        </main>
    </x-slot>
</x-layout>
