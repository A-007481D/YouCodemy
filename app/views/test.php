<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div id="courseModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-11/12 md:w-1/2">
        <div class="flex justify-between items-center border-b p-4">
            <h2 class="text-xl font-bold">Add New Course</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-800">
                <i class="fa fa-times"></i> Close
            </button>
        </div>
        <div class="p-6">
            <form id="addCourseForm" hx-post="/course/add" hx-target="#signupError" hx-swap="none">
                <div class="mb-4">
                    <label for="courseTitle" class="block text-sm font-medium text-gray-700">Course Title</label>
                    <input type="text" id="courseTitle" name="title" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="courseDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="courseDescription" name="description" rows="2" class="w-full px-4 py-2 border rounded-lg" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                    <input type="text" id="tags" name="tags" class="w-full px-4 py-2 border rounded-lg" placeholder="Add tags separated by commas">
                </div>
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700">Content Type</p>
                    <label>
                        <input type="radio" name="contentType" value="text" checked> Text
                    </label>
                    <label>
                        <input type="radio" name="contentType" value="video"> Video
                    </label>
                </div>
                <div id="textContent" class="mb-4">
                    <label for="courseContent" class="block text-sm font-medium text-gray-700">Course Content</label>
                    <textarea id="courseContent" name="content" rows="2" class="w-full px-4 py-2 border rounded-lg"></textarea>
                </div>
                <div id="videoContent" class="mb-4 hidden">
                    <label for="courseVideo" class="block text-sm font-medium text-gray-700">Upload Video</label>
                    <input type="file" id="courseVideo" name="video" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Course</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>