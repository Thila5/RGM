<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Split-screen Design with Image and Content -->
            <div class="flex flex-col sm:flex-row items-center justify-center space-x-8">
                <div class="w-full sm:w-1/2">
                    <div class="bg-gradient-to-br from-pink-400 via-red-500 to-yellow-500 rounded-xl p-8 shadow-xl transform hover:scale-105 transition duration-500 ease-in-out">
                        <h3 class="text-2xl font-semibold text-white mb-4">Profile Information</h3>
                        <div class="max-w-md">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Right-side Content (Image or Decorative Section) -->
                <div class="w-full sm:w-1/2 mt-8 sm:mt-0">
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-xl p-8 shadow-xl transform hover:scale-105 transition duration-500 ease-in-out">
                        <h3 class="text-2xl font-semibold text-white mb-4">Password Update</h3>
                        <div class="max-w-md">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Account Section with Bold Design -->
            <div class="p-8 sm:p-10 bg-gradient-to-br from-red-600 to-orange-600 text-white shadow-2xl rounded-xl transform hover:scale-105 transition duration-500 ease-in-out">
                <div class="max-w-lg mx-auto">
                    <h3 class="text-2xl font-semibold mb-6">Delete Account</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
