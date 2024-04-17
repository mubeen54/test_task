<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ __('Edit Company') }}</h1>
                    <form method="POST" action="{{ route('companies.update', $company) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $company->name }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $company->email }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                            <input type="file" name="logo" id="logo"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="text" name="website" id="website" value="{{ $company->website }}"
                                class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
