<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white dark:text-gray-200 leading-tight text-center py-6">
            {{ __('View Academician') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <div class="space-y-8">
                        <!-- Name Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Name:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->name }}</p>
                        </div>

                        <!-- Staff Number Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Staff Number:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->staff_number }}</p>
                        </div>

                        <!-- Email Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Email:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->email }}</p>
                        </div>

                        <!-- College Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">College:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->college }}</p>
                        </div>

                        <!-- Department Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Department:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->department }}</p>
                        </div>

                        <!-- Position Section -->
                        <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-2xl transition duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Position:</h3>
                            <p class="text-lg text-gray-700 dark:text-gray-300">{{ $academician->position }}</p>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-8 flex justify-center">
                        <a href="{{ route('academicians.index') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-md transform transition duration-300 hover:scale-105">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
