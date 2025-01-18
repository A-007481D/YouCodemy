<?php

use App\models\CourseModel;

if (!isset($_SESSION['user']) || $_SESSION['user']->getRole() !== 'instructor') {
    header('Location: /home');
    exit();
}

require_once __DIR__ . '/../models/CourseModel.php';

$courseModel = new CourseModel();
$userID = $_SESSION['user']->getId();
$courses = $courseModel->getCoursesByInstructor($userID);
?>
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
    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.0"></script></head>

<body class="bg-gray-100">

<aside class="fixed inset-y-0 left-0 w-64 bg-white border-r shadow-sm">
    <div class="p-6">
        <a href="/home" class="text-2xl font-bold text-gray-800">TeachBoard</a>
    </div>
    <nav class="mt-6">
        <a href="/" class="flex items-center px-6 py-3 text-gray-700 bg-blue-50 border-r-4 border-blue-500">
            <i-lucide-layout-dashboard class="mr-3" size="20"></i-lucide-layout-dashboard>
            Dashboard
        </a>
        <a href="/courses" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
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
            <p class="text-gray-600">Welcome back, Professor <span class="font-bold text-gray-700"><?= $_SESSION['user']->getFName()?></span> </p>
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
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td>
                            <div class="flex items-center">
                                <img src="../../public/img/bottom_hero_img.png" alt="Course" class="w-10 h-10 rounded-lg object-cover">
                                <div class="ml-4">
                                    <div class="font-medium"><?= htmlspecialchars($course->getTitle())?></div>
                                    <div class="text-sm text-gray-500">Updated 2 days ago</div>
                                </div>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($course->getCategory())?></td>
                        <td>89</td>
                        <td>4.8</td>
                        <td>
            <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-700 rounded-full">
                Published
            </span>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg" onclick="editCourse(<?= $course->getId() ?>)">
                                    <i-lucide-edit size="18">edit</i-lucide-edit>
                                </button>
                                <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg" onclick="deleteCourse(<?= $course->getId() ?>)">
                                    <i-lucide-trash-2 size="18">delete</i-lucide-trash-2>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="courseModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-11/12 md:w-1/2">
        <div class="flex justify-between items-center border-b p-4">
            <h2 class="text-xl font-bold">Add New Course</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-800">
                <i-lucide-x size="24"></i-lucide-x>
            </button>
        </div>
        <div class="p-6">
            <form id="addCourseForm" hx-post="/course/add" hx-target="#courseErrors" hx-swap="innerHTML" class="space-y-6">
                <div class="mb-4">
                    <label for="courseTitle" class="block text-sm font-medium text-gray-700">Course Title</label>
                    <input type="text" id="courseTitle" name="title" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="courseDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="courseDescription" name="description" rows="2" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="courseCategory" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="courseCategory" name="categoryID" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="1">Development</option>
                        <option value="2">Design</option>
                        <option value="3">Marketing</option>
                        <option value="4">Business</option>
                        <option value="5">Photography</option>
                        <option value="6">Music</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                    <input type="text" id="tags" name="tags" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Add tags separated by commas">
                </div>
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700">Content Type</p>
                    <div class="flex items-center space-x-4">
                        <label>
                            <input type="radio" name="contentType" value="text" checked>
                            <span class="ml-2">Text</span>
                        </label>
                        <label>
                            <input type="radio" name="contentType" value="video">
                            <span class="ml-2">Video</span>
                        </label>
                    </div>
                </div>
                <div id="textContent" class="mb-4">
                    <label for="courseContent" class="block text-sm font-medium text-gray-700">Course Content</label>
                    <textarea id="courseContent" name="content" rows="2" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                <div id="videoContent" class="mb-4 hidden">
                    <label for="courseVideo" class="block text-sm font-medium text-gray-700">Upload Video</label>
                    <input type="file" id="courseVideo" name="content" accept="video/*" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div id="courseErrors" class="text-red-500 text-sm mt-2"></div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
         document.body.addEventListener('courseAdded', function (event) {
            alert('Course added successfully!');
            window.location.reload();  
        });

        document.body.addEventListener('courseAddFailed', function (event) {
            alert('Failed to add course.');
        });
    });
</script>
<script src="../../public/js/instructor.js"></script>

</body>
</html>