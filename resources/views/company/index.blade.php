<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ __('All Companies') }}</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('company') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                        {{ __('Create Company') }}
                    </a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto mt-4">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('ID') }}</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Email') }}</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Logo') }}</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Website') }}</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $company->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $company->name }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $company->email }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            @if ($company->logo)
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                                    class="h-8 w-8 rounded-full">
                                            @else
                                                No logo
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $company->website }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('companies.show', $company->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('View') }}</a>
                                            ...
                                        </td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company) }}"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                    onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ __('No companies found.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>


                    {{ $companies->links() }}
</x-app-layout>
