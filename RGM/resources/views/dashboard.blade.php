<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-5xl text-white leading-tight text-center py-6 transform hover:scale-110 transition duration-500">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <!-- Dashboard Main Content -->
    <div class="py-12 bg-gradient-to-br from-blue-400 via-purple-700 to-pink-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-600 rounded-2xl overflow-hidden shadow-xl transform transition duration-700 hover:scale-110">
                <div class="p-8 text-gray-200 dark:text-gray-100">
                    <h3 class="text-5xl font-extrabold mb-12 text-center text-white">
                        You're Logged In!
                    </h3>

                    <!-- Buttons Section -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                        <!-- Academicians Section -->
                        <a href="{{ route('academicians.index') }}" class="flex items-center justify-center bg-gradient-to-r from-indigo-500 to-indigo-800 text-white py-6 px-10 rounded-3xl shadow-2xl transform hover:scale-110 hover:rotate-3 transition-all duration-500">
                            <i class="fas fa-users text-4xl mr-4"></i>
                            <span class="font-semibold text-2xl">Manage Academicians</span>
                        </a>

                        <!-- Research Grants Section -->
                        <a href="{{ route('researchGrants.index') }}" class="flex items-center justify-center bg-gradient-to-r from-teal-400 to-teal-600 text-white py-6 px-10 rounded-3xl shadow-2xl transform hover:scale-110 hover:rotate-3 transition-all duration-500">
                            <i class="fas fa-graduation-cap text-4xl mr-4"></i>
                            <span class="font-semibold text-2xl">Manage Research Grants</span>
                        </a>

                        <!-- Project Milestones Section -->
                        <a href="{{ route('projectMilestones.index') }}" class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-purple-800 text-white py-6 px-10 rounded-3xl shadow-2xl transform hover:scale-110 hover:rotate-3 transition-all duration-500">
                            <i class="fas fa-tasks text-4xl mr-4"></i>
                            <span class="font-semibold text-2xl">Manage Project Milestones</span>
                        </a>

                        <!-- Project Members Section -->
                        <a href="{{ route('projectMembers.index') }}" class="flex items-center justify-center bg-gradient-to-r from-red-500 to-red-700 text-white py-6 px-10 rounded-3xl shadow-2xl transform hover:scale-110 hover:rotate-3 transition-all duration-500">
                            <i class="fas fa-users-cog text-4xl mr-4"></i>
                            <span class="font-semibold text-2xl">Manage Project Members</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
