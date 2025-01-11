<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Research Grant') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: url('https://img.lovepik.com/background/20211022/small/lovepik-simple-black-gold-background-image_401950687.jpg') no-repeat center center fixed; background-size: cover;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 bg-opacity-80 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('researchGrants.store') }}" method="POST">
                        @csrf

                        <!-- Project Title -->
                        <div class="mb-6">
                            <label for="project_title" class="block text-sm font-medium text-gray-700">Project Title</label>
                            <input type="text" name="project_title" id="project_title" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Project Leader -->
                        <div class="mb-6">
                            <label for="project_leader_id" class="block text-sm font-medium text-gray-700">Project Leader</label>
                            <select name="project_leader_id" id="project_leader_id" class="form-select rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                                @foreach ($academicians as $academician)
                                    <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Grant Amount -->
                        <div class="mb-6">
                            <label for="grant_amount" class="block text-sm font-medium text-gray-700">Grant Amount</label>
                            <input type="number" name="grant_amount" id="grant_amount" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Grant Provider -->
                        <div class="mb-6">
                            <label for="grant_provider" class="block text-sm font-medium text-gray-700">Grant Provider</label>
                            <input type="text" name="grant_provider" id="grant_provider" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Start Date -->
                        <div class="mb-6">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Duration in Months -->
                        <div class="mb-6">
                            <label for="duration_months" class="block text-sm font-medium text-gray-700">Duration (Months)</label>
                            <input type="number" name="duration_months" id="duration_months" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                            Create Research Grant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
