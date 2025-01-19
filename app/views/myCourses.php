<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<div class="max-w-7xl mx-auto px-4 py-6">

<div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">My Courses</h1>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <i-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size="20"></i-lucide-search>
                    <input type="text" placeholder="Search your courses..." class="pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <select class="px-4 py-2 border rounded-lg bg-white">
                    <option>All Courses</option>
                    <option>In Progress</option>
                    <option>Completed</option>
                    <option>Not Started</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600">Sort by:</span>
                <select class="px-4 py-2 border rounded-lg bg-white">
                    <option>Recently Accessed</option>
                    <option>Progress</option>
                    <option>Title A-Z</option>
                </select>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg p-6 shadow-sm border">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i-lucide-book-open class="text-blue-600" size="24"></i-lucide-book-open>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">12</h3>
                    <p class="text-gray-600">Enrolled Courses</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-sm border">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-100 rounded-full">
                    <i-lucide-check-circle class="text-green-600" size="24"></i-lucide-check-circle>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">5</h3>
                    <p class="text-gray-600">Completed Courses</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-sm border">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i-lucide-clock class="text-yellow-600" size="24"></i-lucide-clock>
                </div>
                <div>
                    <h3 class="text-lg font-semibold">7</h3>
                    <p class="text-gray-600">In Progress</p>
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="bg-white rounded-lg shadow-sm overflow-hidden border">
            <div class="relative">
                <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                <span class="absolute top-4 left-4 bg-green-500 text-white px-2 py-1 rounded text-sm">In Progress</span>
            </div>
            <div class="p-4">
                <h3 class="font-semibold mb-2">Complete Web Development Course</h3>
                <div class="flex items-center mb-4">
                    <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full">
                    <span class="text-sm text-gray-600 ml-2">John Doe</span>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Progress</span>
                        <span>65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i-lucide-clock class="text-gray-400" size="16"></i-lucide-clock>
                        <span class="text-sm text-gray-600">Last accessed 2 days ago</span>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700">Continue</button>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow-sm overflow-hidden border">
            <div class="relative">
                <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                <span class="absolute top-4 left-4 bg-blue-500 text-white px-2 py-1 rounded text-sm">Completed</span>
            </div>
            <div class="p-4">
                <h3 class="font-semibold mb-2">UI/UX Design Fundamentals</h3>
                <div class="flex items-center mb-4">
                    <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full">
                    <span class="text-sm text-gray-600 ml-2">Jane Smith</span>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Progress</span>
                        <span>100%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full w-full"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i-lucide-award class="text-yellow-500" size="16"></i-lucide-award>
                        <span class="text-sm text-gray-600">Certificate Earned</span>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700">Review</button>
                </div>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow-sm overflow-hidden border">
            <div class="relative">
                <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                <span class="absolute top-4 left-4 bg-gray-500 text-white px-2 py-1 rounded text-sm">Not Started</span>
            </div>
            <div class="p-4">
                <h3 class="font-semibold mb-2">Data Science Basics</h3>
                <div class="flex items-center mb-4">
                    <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full">
                    <span class="text-sm text-gray-600 ml-2">Mike Johnson</span>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Progress</span>
                        <span>0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-gray-500 h-2 rounded-full w-0"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i-lucide-clock class="text-gray-400" size="16"></i-lucide-clock>
                        <span class="text-sm text-gray-600">Enrolled 1 week ago</span>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700">Start</button>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-center mt-8">
        <nav class="flex items-center gap-2">
            <button class="p-2 text-gray-500 hover:text-gray-700 disabled:opacity-50">
                <i-lucide-chevron-left size="20"></i-lucide-chevron-left>
            </button>
            <button class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg">1</button>
            <button class="px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">2</button>
            <button class="px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg">3</button>
            <button class="p-2 text-gray-500 hover:text-gray-700">
                <i-lucide-chevron-right size="20"></i-lucide-chevron-right>
            </button>
        </nav>
    </div>
</div>
</body>
</html>