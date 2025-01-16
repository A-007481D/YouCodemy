<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use App\models\UserModel;
    $userModel = new UserModel();
    $users = $userModel->getAllUsers();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YouCodemy | Admin Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <a href="/home" class="text-2xl font-bold text-blue-600">YouCodemy</a>
            </div>
            <nav class="mt-6 px-6">
                <div class="space-y-4">
                    <a href="../index.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">🏠</span> Home
                    </a>
                    <a href="../pages/reservationsDash.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">📋</span> Reservations
                    </a>
                    <a href="../pages/vehiclesDash.php" class="flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">🚗</span> Users
                    </a>
                    <a href="../pages/categoryDash.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">📁</span> Categories
                    </a>
                    <a href="../pages/adminDash.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">👥</span> Manage Users
                    </a>
                    <a href="../pages/reviewsDash.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">💬</span> Reviews
                    </a>
                    <a href="../pages/blogDash.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-colors">
                        <span class="mr-3">📝</span> Blogs
                    </a>
                </div>
            </nav>
            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-200">
                <form method="POST" action="/logout">
                    <button class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">YouCodemy Admin Dashboard</h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-lg font-medium text-gray-700">Manage</h2>
                        <button onclick="document.getElementById('addUserModal').classList.remove('hidden')"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                            <span class="mr-2">+</span> Add User
                        </button>

                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6 border-b">
                        <h2 class="text-lg font-medium text-gray-700">Users List</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">User ID</th>
                                <th class="py-2 px-4 border-b">Full Name</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Role</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($user->getId()) ?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($user->getFName() . ' ' . $user->getLName()) ?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($user->getEmail()) ?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($user->getRole()) ?></td>
                                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($user->getAccountStatus()) ?></td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="/admin/manage-user" method="POST" class="inline">
                                            <input type="hidden" name="userID" value="<?= htmlspecialchars($user->getId()) ?>">
                                            <?php if ($user->getAccountStatus() === 'active'): ?>
                                                <button type="submit" name="action" value="suspend" class="bg-yellow-500 text-white px-4 py-1 rounded">Suspend</button>
                                            <?php else: ?>
                                                <button type="submit" name="action" value="activate" class="bg-green-500 text-white px-4 py-1 rounded">Activate</button>
                                            <?php endif; ?>
                                            <button type="submit" name="action" value="delete" class="bg-red-500 text-white px-4 py-1 rounded" onclick="return confirmDelete()">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

<div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">Add New User</h3>
            <button onclick="document.getElementById('addUserModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">✕</button>
        </div>
        <form method="POST" action="" class="space-y-6" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Brand</label>
                    <input type="text" name="brand" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Enter User brand" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Model</label>
                    <input type="text" name="model" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Enter User model" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">$</span>
                        </div>
                        <input type="number" name="price" class="w-full pl-8 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select name="categoryID" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" required>
                        <option value="" disabled selected>Select a category</option>

                            ?>
                            <option value=""></option>

                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Image</label>
                    <input type="file" name="image" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Describe the User..." required></textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fuel Type</label>
                    <input type="text" name="fuel" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="e.g., Gasoline, Diesel" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Seats</label>
                    <input type="number" name="seats" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" min="1" placeholder="Number of seats" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Doors</label>
                    <input type="number" name="doors" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" min="1" placeholder="Number of doors" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Features</label>
                <input type="text" name="features" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Comma-separated features (e.g., Bluetooth, GPS, AC)">
            </div>
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <button type="button" onclick="document.getElementById('addUserModal').classList.add('hidden')" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">Cancel</button>
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-[#2b62e3] hover:bg-blue-600 rounded-lg transition-colors duration-200">Save User</button>
            </div>
        </form>
    </div>
</div>

<div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-2xl p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-medium">Edit User</h3>
            <button onclick="document.getElementById('editUserModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-500">✕</button>
        </div>
        <form method="POST" action="../processes/edit_vehicle.php" class="space-y-6" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="hidden" name="vehicleID" id="vehicleID">
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Brand</label>
                    <input id="brand" type="text" name="brand" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Enter User brand" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Model</label>
                    <input id="model" type="text" name="model" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Enter User model" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500">$</span>
                        </div>
                        <input id="price" type="number" name="price" class="w-full pl-8 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select id="categoryID" name="categoryID" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" required>
                        <option value="" disabled selected>Select a category</option>
                        <?php foreach($allCategories as $category) {
                            ?>
                            <option value="<?= $category['categoryID'] ?>"><?= $category['catName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">User Image</label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Describe the User..." required></textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fuel Type</label>
                    <input id="fuel" type="text" name="fuel" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="e.g., Gasoline, Diesel" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Seats</label>
                    <input id="seats" type="number" name="seats" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" min="1" placeholder="Number of seats" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Doors</label>
                    <input id="doors" type="number" name="doors" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" min="1" placeholder="Number of doors" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Features</label>
                <input id="features" type="text" name="features" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-[#2b62e3] focus:border-[#2b62e3] transition-colors duration-200" placeholder="Comma-separated features (e.g., Bluetooth, GPS, AC)">
            </div>
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <button type="button" onclick="document.getElementById('editUserModal').classList.add('hidden')" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">Cancel</button>
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-[#2b62e3] hover:bg-blue-600 rounded-lg transition-colors duration-200">Save User</button>
            </div>
        </form>
    </div>
</div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</body>

</html>