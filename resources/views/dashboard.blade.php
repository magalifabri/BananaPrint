<x-layout>

    @unless ($user['has_printer'])
        <p><a href="{{ route('createPrinter') }}">Add Printer</a></p>
    @else
        <h2>your printer</h2>
        <p>color: {{ $user->printer['color'] ? 'yes' : 'no' }}</p>
        <p>double-sided: {{ $user->printer['double_sided'] ? 'yes' : 'no' }}</p>
        <p>
            {{ $user->printer['street'] }}
            {{ $user->printer['street_number'] }},
            {{ $user->printer['zipcode'] }}
        </p>

    @endif

</x-layout>
