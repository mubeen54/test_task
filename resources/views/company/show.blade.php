<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ $company->name }}</h1>

                    <div class="mb-4">
                        <strong>Email:</strong> {{ $company->email }}
                    </div>

                    <div class="mb-4">
                        <strong>Website:</strong> <a href="{{ $company->website }}">{{ $company->website }}</a>
                    </div>

                    <div class="mb-4">
                        <strong>Logo:</strong>
                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                class="h-8 w-8 rounded-full">
                        @else
                            No logo
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
