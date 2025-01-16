<?php
//session_start();
//if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'instructor') {
//    header('Location: /home');
//    exit();
//}
//?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap5.min.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
</head>

<body class="bg-gray-100">

<aside class="fixed inset-y-0 left-0 w-64 bg-white border-r shadow-sm">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800">TeachBoard</h2>
        </div>
        <nav class="mt-6">
            <a href="#" class="flex items-center px-6 py-3 text-gray-700 bg-blue-50 border-r-4 border-blue-500">
                <i-lucide-layout-dashboard class="mr-3" size="20"></i-lucide-layout-dashboard>
                Dashboard
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i-lucide-book-open class="mr-3 " size="20"></i-lucide-book-open>
                Courses
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i-lucide-users class="mr-3" size="20"></i-lucide-users>
                Students
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i-lucide-bar-chart class="mr-3" size="20"></i-lucide-bar-chart>
                Analytics
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                <i-lucide-settings class="mr-3" size="20"></i-lucide-settings>
                Settings
            </a>
        </nav>
        <div class="absolute bottom-0 w-64 p-4 border-t border-gray-200">
            <form method="POST" action="/logout">
                <button class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-600">Welcome back, Professor Malik</p>
            </div>
            <button class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                <i-lucide-plus class="mr-2" size="20"></i-lucide-plus>
                New Course
            </button>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <i-lucide-book-open class="text-blue-600" size="24"></i-lucide-book-open>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">15</h3>
                        <p class="text-gray-600">Active Courses</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg">
                        <i-lucide-users class="text-green-600" size="24"></i-lucide-users>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">456</h3>
                        <p class="text-gray-600">Total Students</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i-lucide-star class="text-purple-600" size="24"></i-lucide-star>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">4.8</h3>
                        <p class="text-gray-600">Average Rating</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <i-lucide-play-circle class="text-yellow-600" size="24"></i-lucide-play-circle>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-800">125</h3>
                        <p class="text-gray-600">Hours Content</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-800">Course Management</h2>
            </div>
            <div class="p-6">
                <table id="coursesTable" class="w-full">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Category</th>
                            <th>Students</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img src="../../public//img/bottom_hero_img.png" alt="Course" class="w-10 h-10 rounded-lg object-cover">
                                    <div class="ml-4">
                                        <div class="font-medium">JavaScript Fundamentals</div>
                                        <div class="text-sm text-gray-500">Updated 2 days ago</div>
                                    </div>
                                </div>
                            </td>
                            <td>Development</td>
                            <td>89</td>
                            <td>4.8</td>
                            <td>
                                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">
                                    Published
                                </span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                        <i-lucide-edit size="18"></i-lucide-edit>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                        <i-lucide-trash-2 size="18"></i-lucide-trash-2>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img src="../../public//img/bottom_hero_img.png" alt="Course" class="w-10 h-10 rounded-lg object-cover">
                                    <div class="ml-4">
                                        <div class="font-medium">Java Fundamentals</div>
                                        <div class="text-sm text-gray-500">Updated 2 days ago</div>
                                    </div>
                                </div>
                            </td>
                            <td>Development</td>
                            <td>89</td>
                            <td>4.8</td>
                            <td>
                                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">
                                    Published
                                </span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                        <i-lucide-edit size="18"></i-lucide-edit>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                        <i-lucide-trash-2 size="18"></i-lucide-trash-2>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center">
                                    <img src="../../public//img/bottom_hero_img.png" alt="Course" class="w-10 h-10 rounded-lg object-cover">
                                    <div class="ml-4">
                                        <div class="font-medium">C++ Fundamentals</div>
                                        <div class="text-sm text-gray-500">Updated 2 days ago</div>
                                    </div>
                                </div>
                            </td>
                            <td>Development</td>
                            <td>89</td>
                            <td>4.8</td>
                            <td>
                                <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">
                                    Published
                                </span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg">
                                        <i-lucide-edit size="18"></i-lucide-edit>
                                    </button>
                                    <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                        <i-lucide-trash-2 size="18"></i-lucide-trash-2>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#coursesTable').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [2, 'desc']
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Search courses...",
                },
                columnDefs: [{
                        orderable: false,
                        targets: [0, 5]
                    },
                    {
                        className: "align-middle",
                        targets: "_all"
                    }
                ],
                initComplete: function() {
                    // Custom styling for DataTables elements
                    $('.dataTables_filter input').addClass('px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
                    $('.dataTables_length select').addClass('px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
                    $('.dataTables_paginate').addClass('mt-4');
                    $('.paginate_button').addClass('px-3 py-1 border rounded-lg mx-1 hover:bg-gray-50');
                    $('.paginate_button.current').addClass('bg-blue-50 text-blue-600 border-blue-200');
                }
            });
        });
    </script>
</body>

</html>