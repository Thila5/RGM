<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight text-center py-6">
            {{ __('Add Academician') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-black">
                    <form action="{{ route('academicians.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- User Dropdown -->
                        <div>
                            <label for="name" class="block font-medium text-sm">Name</label>
                            <select name="users_id" id="name" class="form-select rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                                <option value="" disabled selected>Select a name</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-name="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Name Field (Dynamically updated) -->
                        <div>
                            <label for="selected_name" class="block font-medium text-sm">Selected Name</label>
                            <input type="text" name="name" id="selected_name" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required readonly>
                        </div>

                        <!-- Email Field (Dynamically updated) -->
                        <div>
                            <label for="email" class="block font-medium text-sm">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required readonly>
                        </div>

                        <!-- Staff Number Field -->
                        <div>
                            <label for="staff_number" class="block font-medium text-sm">Staff Number</label>
                            <input type="text" name="staff_number" id="staff_number" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>

                        <!-- College Field -->
                        <div>
                            <label for="college" class="block font-medium text-sm">College</label>
                            <input type="text" name="college" id="college" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>

                        <!-- Department Field -->
                        <div>
                            <label for="department" class="block font-medium text-sm">Department</label>
                            <input type="text" name="department" id="department" class="form-input rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        </div>

                        <!-- Position Dropdown -->
                        <div>
                            <label for="position" class="block font-medium text-sm">Position</label>
                            <select name="position" id="position" class="form-select rounded-md shadow-sm mt-1 block w-full text-black border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Senior Lecturer">Senior Lecturer</option>
                                <option value="Lecturer">Lecturer</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to dynamically update name and email fields based on selected user -->
    <script>
        document.getElementById('name').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const name = selectedOption.getAttribute('data-name');
            const email = selectedOption.getAttribute('data-email');

            document.getElementById('selected_name').value = name;
            document.getElementById('email').value = email;
        });

        // Check staff number duplication
        document.getElementById('staff_number').addEventListener('blur', function () {
            const staffNumber = this.value;

            fetch('/check-staff-number?staff_number=' + staffNumber)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        alert("This staff number is already in use. Please enter a different staff number.");
                        document.getElementById('staff_number').value = ''; // Clear the input
                        document.getElementById('staff_number').focus(); // Focus the input field
                    }
                })
                .catch(error => {
                    console.error('Error checking staff number:', error);
                });
        });
    </script>

    <style>
        body {
            background-image: url('https://c4.wallpaperflare.com/wallpaper/686/492/997/simple-simple-background-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .btn {
            background-color: #38a169; /* Green color for visibility */
            color: white; /* White text for contrast */
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2f855a; /* Darker green for hover effect */
        }
    </style>
</x-app-layout>
