<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>
</head>

<body>
<div id="signupForm" class="p-8 hidden">
    <h2 class="text-2xl font-bold text-center mb-8 bg-gradient-to-r from-blue-600 to-[#16a34a] bg-clip-text text-transparent">
        Create Account
    </h2>
    <form method="POST" action="/" class="space-y-6">
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Select Role</label>
            <div class="relative">
                <input type="hidden" name="role" id="selectedRole">
                <button
                        type="button"
                        id="roleButton"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200 text-left text-gray-600 flex justify-between items-center"
                        onclick="toggleRoleDropdown()">
                    <span id="selectedRoleText">Choose your role</span>
                    <svg class="fill-current h-4 w-4 transition-transform" id="dropdownArrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                    </svg>
                </button>
                <div id="roleDropdown" class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                    <div class="py-1">
                        <button type="button" class="w-full px-4 py-2 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100" onclick="selectRole('student', 'Student')">Student</button>
                        <button type="button" class="w-full px-4 py-2 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100" onclick="selectRole('teacher', 'Teacher')">Teacher</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rest of your form remains the same -->
        ...
    </form>
</div>

<script>
    function toggleRoleDropdown() {
        const dropdown = document.getElementById('roleDropdown');
        const arrow = document.getElementById('dropdownArrow');
        dropdown.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }

    function selectRole(value, text) {
        document.getElementById('selectedRole').value = value;
        document.getElementById('selectedRoleText').textContent = text;
        toggleRoleDropdown();
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('roleDropdown');
        const button = document.getElementById('roleButton');
        if (!button.contains(event.target)) {
            dropdown.classList.add('hidden');
            document.getElementById('dropdownArrow').classList.remove('rotate-180');
        }
    });
</script>
</body>
</html>