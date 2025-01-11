<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Research Grant') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-600 to-blue-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 space-y-6 text-gray-900 dark:text-gray-100">
                    <!-- Project Title -->
                    <div class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Project Title:</h3>
                        <p class="text-xl text-gray-100">{{ $researchGrant->project_title }}</p>
                    </div>

                    <!-- Project Leader -->
                    <div class="bg-gradient-to-r from-teal-400 to-green-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Project Leader:</h3>
                        <p class="text-xl text-gray-100">{{ $researchGrant->projectLeader->name }}</p>
                    </div>

                    <!-- Grant Amount -->
                    <div class="bg-gradient-to-r from-yellow-400 via-orange-400 to-red-500 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Grant Amount:</h3>
                        <p class="text-xl text-gray-100">${{ number_format($researchGrant->grant_amount, 2) }}</p>
                    </div>

                    <!-- Grant Provider -->
                    <div class="bg-gradient-to-r from-cyan-400 to-blue-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Grant Provider:</h3>
                        <p class="text-xl text-gray-100">{{ $researchGrant->grant_provider }}</p>
                    </div>

                    <!-- Start Date -->
                    <div class="bg-gradient-to-r from-green-400 to-teal-600 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Start Date:</h3>
                        <p class="text-xl text-gray-100">{{ \Carbon\Carbon::parse($researchGrant->start_date)->format('M d, Y') }}</p>
                    </div>

                    <!-- Duration (Months) -->
                    <div class="bg-gradient-to-r from-pink-500 via-purple-600 to-indigo-700 p-6 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold text-white">Duration (Months):</h3>
                        <p class="text-xl text-gray-100">{{ $researchGrant->duration_months }}</p>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6 flex justify-center">
                        <a href="{{ route('researchGrants.index') }}" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl shadow-lg transform transition hover:scale-105 hover:shadow-xl">
                            <span class="text-xl font-semibold">Back to List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
