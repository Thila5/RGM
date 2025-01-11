<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Project Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to Add Project Member -->
                    <form action="{{ route('projectMembers.store') }}" method="POST">
                        @csrf
                        <!-- Dropdown for selecting Research Grant -->
                        <div class="mb-4">
                            <label for="research_grant_id" class="block text-gray-700 dark:text-gray-200">Research Grant</label>
                            <select name="research_grant_id" id="research_grant_id" class="block w-full p-2 mt-2 rounded border border-gray-300 dark:border-gray-600 text-black">
                                <option value="">Select Research Grant</option>
                                @foreach ($researchGrants as $grant)
                                    <option value="{{ $grant->id }}" data-project-leader="{{ $grant->projectLeader->name }}">
                                        {{ $grant->project_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Display selected project title if available -->
                        @if ($selectedGrant)
                            <div class="mb-4">
                                <strong>Selected Project: </strong> {{ $selectedGrant->project_title }}
                            </div>
                        @endif

                        <!-- Project Leader (always visible) -->
                        <div class="mb-4">
                            <label for="project_leader" class="block text-gray-700 dark:text-gray-200">Project Leader</label>
                            <input type="text" name="project_leader" id="project_leader" value="{{ $selectedGrant ? $selectedGrant->projectLeader->name : '' }}" readonly class="block w-full p-2 mt-2 rounded border border-gray-300 dark:border-gray-600 bg-gray-100 text-black">
                        </div>

                        <!-- Project Members Dropdown -->
                        <div class="mb-4" id="members-section" style="display: none;">
                            <label for="academicians" class="block text-gray-700 dark:text-gray-200">Project Members</label>
                            <select name="academicians[]" id="academicians" multiple class="block w-full p-2 mt-2 rounded border border-gray-300 dark:border-gray-600 text-black">
                                @foreach ($academicians as $academician)
                                    <option value="{{ $academician->id }}" class="member-option">{{ $academician->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4">Add Project Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to update project leader and toggle members section -->
    <script>
        document.getElementById('research_grant_id').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var projectLeaderName = selectedOption.getAttribute('data-project-leader');
            var projectLeaderInput = document.getElementById('project_leader');
            var membersSection = document.getElementById('members-section');
            var membersSelect = document.getElementById('academicians');

            // Update project leader input
            projectLeaderInput.value = projectLeaderName ? projectLeaderName : '';

            // Toggle members section visibility
            if (this.value) {
                membersSection.style.display = 'block';
            } else {
                membersSection.style.display = 'none';
            }

            // Remove the project leader from the Project Members dropdown
            var options = membersSelect.querySelectorAll('option');
            options.forEach(function (option) {
                if (option.text === projectLeaderName) {
                    option.style.display = 'none';  // Hide project leader
                } else {
                    option.style.display = 'block'; // Ensure other options are visible
                }
            });

            // Clear previously selected members
            membersSelect.selectedIndex = -1;
        });
    </script>
</x-app-layout>
