
<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-semibold mb-4">Employee Details</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="table-auto w-full">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2"><strong>First Name:</strong></td>
                        <td class="border px-4 py-2">{{ $employee->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2"><strong>Last Name:</strong></td>
                        <td class="border px-4 py-2">{{ $employee->last_name }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2"><strong>Company:</strong></td>
                        <td class="border px-4 py-2">{{ $employee->company->name }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2"><strong>Email:</strong></td>
                        <td class="border px-4 py-2">{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2"><strong>Phone:</strong></td>
                        <td class="border px-4 py-2">{{ $employee->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
