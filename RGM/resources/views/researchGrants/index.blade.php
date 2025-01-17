<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Research Grants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card to add a new research grant -->
            <div class="bg-gray-800 dark:bg-gray-900 p-6 rounded-lg shadow-xl mb-6">
                <a href="{{ route('researchGrants.create') }}" class="inline-block bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105">
                    <i class="fas fa-plus-circle mr-2"></i>Add New Research Grant
                </a>
            </div>

            <!-- Research Grants Table -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full table-auto bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-400 to-blue-500 text-left text-sm text-white uppercase">
                                <th class="px-6 py-3">Project Title</th>
                                <th class="px-6 py-3">Project Leader</th>
                                <th class="px-6 py-3">Grant Amount</th>
                                <th class="px-6 py-3">Start Date</th>
                                <th class="px-6 py-3">End Date</th>
                                <th class="px-6 py-3">Duration (Months)</th>
                                <th class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchGrants as $grant)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $grant->project_title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                        {{-- Use optional() to avoid error if projectLeader is null --}}
                                        {{ optional($grant->projectLeader)->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">${{ number_format($grant->grant_amount, 2) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center">{{ \Carbon\Carbon::parse($grant->start_date)->format('M d, Y') }}</td>
                                    
                                    <!-- Align End Date -->
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center">
                                        {{ \Carbon\Carbon::parse($grant->start_date)->addMonths($grant->duration_months)->format('M d, Y') }}
                                    </td>

                                    <!-- Align Duration (Months) -->
                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 text-center">
                                        {{ $grant->duration_months }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 flex space-x-4">
                                        <a href="{{ route('researchGrants.show', $grant->id) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('researchGrants.edit', $grant->id) }}" class="text-yellow-600 hover:text-yellow-800 transition duration-300">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('researchGrants.destroy', $grant->id) }}" method="POST" style="display:inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
