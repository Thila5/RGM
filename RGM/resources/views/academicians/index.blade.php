<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Academicians') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('academicians.create') }}" class="inline-block bg-indigo-600 text-white py-3 px-6 rounded-lg shadow-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                            <i class="fas fa-user-plus text-lg mr-2"></i>Add Academician
                        </a>
                    </div>
                    <table class="min-w-full table-auto bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-600 text-left text-sm font-semibold text-gray-700 dark:text-gray-300 uppercase">
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Staff Number</th>
                                <th class="px-6 py-3">Email</th>
                                <th class="px-6 py-3">College</th>
                                <th class="px-6 py-3">Department</th>
                                <th class="px-6 py-3">Position</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($academicians as $academician)
                                @if ($academician) <!-- Check if academician is not null -->
                                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->staff_number }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->college }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->department }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ optional($academician)->position }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 flex space-x-4">
                                            <a href="{{ route('academicians.show', $academician->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('academicians.edit', $academician->id) }}" class="text-yellow-600 hover:text-yellow-800 transition duration-300">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
