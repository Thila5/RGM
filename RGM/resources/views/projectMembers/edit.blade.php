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
                    <form action="{{ route('projectMembers.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="research_grant_id" class="block font-medium text-sm text-gray-700">Research Grant</label>
                            <select name="research_grant_id" id="research_grant_id" class="form-select rounded-md shadow-sm mt-1 block w-full text-black" required>
                                @foreach($researchGrants as $grant)
                                    <option value="{{ $grant->id }}">{{ $grant->project_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="academician_id" class="block font-medium text-sm text-gray-700">Academician</label>
                            <select name="academician_id" id="academician_id" class="form-select rounded-md shadow-sm mt-1 block w-full text-black" required>
                                @foreach($academicians as $academician)
                                    <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Add Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
