<x-layout>
    <x-slot name="main">
        <main class="create-printer main-style-center">

            <form action="{{ route('storePrinter') }}" method="POST" class="box-style-1">
                @csrf

                <p class="header">Printer's Capabilities</p>

                <label for="color">
                    <input type="checkbox" name="color" value="1" id="color">
                    <span class="checkbox-label">Color</span>
                </label>

                <label for="doubleSided">
                    <input type="checkbox" name="doubleSided" value="1" id="doubleSided">
                    <span class="checkbox-label">Double-sided</span>
                </label>

                <br>

                <p class="header">Address</p>

                <label for="street">Street</label>
                <input type="text" name="street" id="street">

                <label for="street-number">Street number</label>
                <input type="number" name="streetNumber" id="street-number">

                <label for="zipcode">Zipcode</label>
                <input type="text" name="zipcode" id="zipcode">

                <input type="submit" value="save">
            </form>

        </main>
    </x-slot>
</x-layout>
