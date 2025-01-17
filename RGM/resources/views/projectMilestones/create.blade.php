<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Project Milestone') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: url('https://thumbs.dreamstime.com/b/abstract-black-gold-white-hd-wallpapers-high-detailed-plain-background-image-features-composition-colors-creating-331056354.jpg?w=992') no-repeat center center fixed; background-size: cover;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Background Container with opacity to improve readability -->
            <div class="bg-black bg-opacity-50 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('projectMilestones.store') }}" method="POST">
                        @csrf
                        <!-- Research Grant Selection -->
                        <div class="mb-6">
                            <label for="research_grant_id" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Research Grant</label>
                            <select name="research_grant_id" id="research_grant_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out" required>
                                <option value="" disabled selected>Select a Research Grant</option>
                                @forelse ($researchGrants as $grant)
                                    <option value="{{ $grant->id }}">{{ $grant->project_title }}</option>
                                @empty
                                    <option value="" disabled>No Research Grants available</option>
                                @endforelse
                            </select>
                            @error('research_grant_id')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Milestone Name -->
                        <div class="mb-6">
                            <label for="milestone_name" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Milestone Name</label>
                            <input type="text" name="milestone_name" id="milestone_name" placeholder="Enter milestone name" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out" required>
                            @error('milestone_name')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Target Completion Date -->
                        <div class="mb-6">
                            <label for="target_completion_date" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Target Completion Date</label>
                            <input type="date" name="target_completion_date" id="target_completion_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out" required>
                            @error('target_completion_date')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deliverable -->
                        <div class="mb-6">
                            <label for="deliverable" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Deliverable</label>
                            <textarea name="deliverable" id="deliverable" placeholder="Enter deliverable details" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out" required></textarea>
                            @error('deliverable')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out" required>
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                            @error('status')
                                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remarks (Optional) -->
                        <div class="mb-6">
                            <label for="remark" class="block text-sm font-medium text-gray-100 dark:text-gray-300">Remarks (Optional)</label>
                            <textarea name="remark" id="remark" placeholder="Enter remarks (optional)" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-md focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 hover:bg-purple-700 transition duration-300 ease-in-out"></textarea>
                        </div>

                        <!-- Submit Button with hover and transition effects -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:from-purple-500 hover:via-pink-600 hover:to-red-600 focus:outline-none transition duration-300 ease-in-out transform hover:scale-105">
                                Save Milestone
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
