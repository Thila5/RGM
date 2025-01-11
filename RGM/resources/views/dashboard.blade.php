<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight text-center py-6">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg transform transition duration-500 hover:scale-105">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-4xl font-bold mb-8 text-center text-gray-800 dark:text-gray-100">You're Logged In!</h3>

                    <!-- Buttons Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Academicians Section -->
                        <a href="{{ route('academicians.index') }}" class="flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-5 px-8 rounded-2xl shadow-xl hover:bg-gradient-to-l hover:from-indigo-600 hover:to-blue-500 transition duration-300 transform hover:scale-110">
                            <i class="fas fa-users text-3xl mr-4"></i> 
                            <span class="font-semibold text-xl">Manage Academicians</span>
                        </a>
                        <!-- Research Grants Section -->
                        <a href="{{ route('researchGrants.index') }}" class="flex items-center justify-center bg-gradient-to-r from-green-500 to-teal-600 text-white py-5 px-8 rounded-2xl shadow-xl hover:bg-gradient-to-l hover:from-teal-600 hover:to-green-500 transition duration-300 transform hover:scale-110">
                            <i class="fas fa-graduation-cap text-3xl mr-4"></i> 
                            <span class="font-semibold text-xl">Manage Research Grants</span>
                        </a>
                        <!-- Project Milestones Section -->
                        <a href="{{ route('projectMilestones.index') }}" class="flex items-center justify-center bg-gradient-to-r from-purple-500 to-pink-600 text-white py-5 px-8 rounded-2xl shadow-xl hover:bg-gradient-to-l hover:from-pink-600 hover:to-purple-500 transition duration-300 transform hover:scale-110">
                            <i class="fas fa-tasks text-3xl mr-4"></i> 
                            <span class="font-semibold text-xl">Manage Project Milestones</span>
                        </a>
                        <!-- Project Members Section -->
                        <a href="{{ route('projectMembers.index') }}" class="flex items-center justify-center bg-gradient-to-r from-pink-500 to-red-600 text-white py-5 px-8 rounded-2xl shadow-xl hover:bg-gradient-to-l hover:from-red-600 hover:to-pink-500 transition duration-300 transform hover:scale-110">
                            <i class="fas fa-users-cog text-3xl mr-4"></i> 
                            <span class="font-semibold text-xl">Manage Project Members</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
