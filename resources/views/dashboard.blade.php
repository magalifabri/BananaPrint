<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--                    You're logged in!--}}

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
