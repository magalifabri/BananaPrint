<x-layout>
    <x-slot name="main">
        <main class="dashboard main-style-center">

            <section class="box-style-1">
                @unless ($user['has_printer'])
                    <div class="button-container">
                        <a href="{{ route('createPrinter') }}" class="button-style-1 add-printer">add printer</a>
                    </div>
                @else
                    <p class="header">Your Printer</p>
                    <p class="label">Color</p>
                    <p class="info">{{ $user->printer['color'] ? 'Yes' : 'No' }}</p>
                    <p class="label">Double-sided</p>
                    <p class="info">{{ $user->printer['double_sided'] ? 'Yes' : 'No' }}</p>
                    <p class="label">Address</p>
                    <p class="info">
                        {{ ucwords($user->printer['street']) }}
                        {{ $user->printer['street_number'] }},
                        {{ $user->printer['zipcode'] }}
                    </p>

                @endif
            </section>

        </main>
    </x-slot>
</x-layout>
