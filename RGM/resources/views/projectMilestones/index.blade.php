<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Milestones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('projectMilestones.create') }}" class="btn btn-primary mb-4">Add Project Milestone</a>

                    @if($projectMilestones->isEmpty())
                        <div class="text-center text-gray-600 dark:text-gray-400">
                            <p>No project milestones found.</p>
                            <p>Start by adding a new project milestone!</p>
                        </div>
                    @else
                        <table class="min-w-full table-auto bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-600 text-left text-sm text-gray-700 dark:text-gray-300">
                                    <th class="px-6 py-3">Milestone Name</th>
                                    <th class="px-6 py-3">Research Grant</th>
                                    <th class="px-6 py-3">Target Completion Date</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectMilestones as $milestone)
                                    <!-- Skip rows where there's no research grant -->
                                    @if($milestone->researchGrant)
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $milestone->milestone_name }}</td>
                                            
                                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                                {{ $milestone->researchGrant->project_title }}
                                            </td>

                                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $milestone->target_completion_date }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $milestone->status }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200 flex space-x-8">
                                                <a href="{{ route('projectMilestones.show', $milestone->id) }}" class="btn btn-info text-blue-600 hover:text-blue-800">View</a>
                                                <a href="{{ route('projectMilestones.edit', $milestone->id) }}" class="btn btn-warning text-yellow-600 hover:text-yellow-800">Edit</a>
                                                <form action="{{ route('projectMilestones.destroy', $milestone->id) }}" method="POST" style="display:inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
