<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('projectMembers.create') }}" class="btn btn-primary mb-4">Add/Update Project Member</a>

                    @forelse($researchGrants as $grant)
                        <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                            <!-- Link to view the specific research grant -->
                            <h3 class="text-lg font-medium text-white mb-2">
                                <a href="{{ route('researchGrants.show', $grant->id) }}" class="hover:text-indigo-500">
                                    {{ $grant->project_title }}
                                </a>
                            </h3>

                            <!-- Display the Project Leader -->
                            <div class="mb-4">
                                <strong>Project Leader:</strong>
                                <span class="text-gray-900 dark:text-gray-100">{{ $grant->projectLeader->name }}</span>
                            </div>

                            <!-- Check if there are project members excluding the leader -->
                            @if($grant->projectMembers->where('id', '!=', $grant->projectLeader->id)->count() > 0)
                                <table class="min-w-full table-auto bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                    <thead>
                                        <tr class="bg-gray-200 dark:bg-gray-600 text-left text-sm text-gray-700 dark:text-gray-300">
                                            <th class="px-6 py-3">Name</th>
                                            <th class="px-6 py-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grant->projectMembers as $member)
                                            @if ($member->id != $grant->projectLeader->id) <!-- Exclude project leader -->
                                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900">
                                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $member->name }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                                        <div class="flex space-x-4">
                                                            <a href="{{ route('academicians.edit', $member->id) }}" class="btn btn-warning text-yellow-600 hover:text-yellow-800">Edit</a>
                                                            <form action="{{ route('projectMembers.destroy', $member->pivot->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger text-red-600 hover:text-red-800">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">No project members added yet.</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">No research grants available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
