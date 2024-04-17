
<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-semibold mb-4">Employees</h1>

                @if ($employees->isEmpty())
                    <p>No employees found.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">First Name</th>
                                    <th class="px-4 py-2">Last Name</th>
                                    <th class="px-4 py-2">Company</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Phone</th>
                                    <th class="px-4 py-2">Actions</th>
                                    <th class="px-4 py-2">Edit</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                                        <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                                        <td class="border px-4 py-2">{{ $employee->company->name }}</td>
                                        <td class="border px-4 py-2">{{ $employee->email }}</td>
                                        <td class="border px-4 py-2">{{ $employee->phone }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('employees.show', $employee->id) }}"
                                                class="text-blue-500 hover:text-blue-700">Show</a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('employees.edit', $employee->id) }}"
                                                class="text-green-500 hover:text-green-700">Edit</a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('employees.destroy', $employee->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $employees->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
