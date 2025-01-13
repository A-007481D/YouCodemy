<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<div class="max-w-6xl mx-auto p-6 space-y-8">

    <div class="grid md:grid-cols-2 gap-8">
        <div class="space-y-4">
                <span class="inline-flex items-center rounded-full px-3 py-1 text-sm bg-blue-100 text-blue-800">
                    Intermediate
                </span>
            <h1 class="text-4xl font-bold">Migrating a server from on-premise to the AWS cloud</h1>
            <p class="text-lg text-gray-600">Master the clou web development with this comprehensive course covering frontend, backend, and deployment.</p>

            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <div class="flex text-yellow-400">
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4 fill-current"></i>
                        <i data-feather="star" class="w-4 h-4"></i>
                    </div>
                    <span class="ml-2">4.8</span>
                </div>
                <span>(847 reviews)</span>
            </div>

            <div class="flex items-center space-x-4">
                <img src="../../public/img/moi.png" alt="Sarah Johnson" class="rounded-full w-12 h-12">
                <div>
                    <p class="font-medium">Abdelmalek Labid</p>
                    <p class="text-sm text-gray-600">Senior AWS Solutions Architect</p>
                </div>
            </div>
        </div>

        <div>
            <img src="/../../public/img/aws-course.jpg" alt="Course Preview" class="rounded-lg w-full object-cover">
        </div>
    </div>


    <div class="bg-white rounded-lg shadow">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6">
            <div class="flex items-center space-x-2">
                <i data-feather="clock" class="w-5 h-5 text-blue-500"></i>
                <div>
                    <p class="text-sm text-gray-600">Duration</p>
                    <p class="font-medium">32 hours</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-feather="book-open" class="w-5 h-5 text-blue-500"></i>
                <div>
                    <p class="text-sm text-gray-600">Lectures</p>
                    <p class="font-medium">128</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i data-feather="users" class="w-5 h-5 text-blue-500"></i>
                <div>
                    <p class="text-sm text-gray-600">Students</p>
                    <p class="font-medium">3,240</p>
                </div>
            </div>
            <div>
                <button class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    Enroll Now - $99.99
                </button>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6">What You'll Learn</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="flex items-start space-x-2">
                    <i data-feather="check" class="w-5 h-5 text-green-500 mt-1"></i>
                    <span>Gain Hands on Experience on Server Migration from ON-Prem to Cloud.</span>
                </div>
                <div class="flex items-start space-x-2">
                    <i data-feather="check" class="w-5 h-5 text-green-500 mt-1"></i>
                    <span>Master all the differences of Databases on AWS</span>
                </div>
                <div class="flex items-start space-x-2">
                    <i data-feather="check" class="w-5 h-5 text-green-500 mt-1"></i>
                    <span>Understand Different Migration Strategies.(6R's of Migration)</span>
                </div>
                <div class="flex items-start space-x-2">
                    <i data-feather="check" class="w-5 h-5 text-green-500 mt-1"></i>
                    <span>Understand the Well Architected Framework, Disaster Recovery</span>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6">Course Content</h2>
            <div class="space-y-4">
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2 cursor-pointer" onclick="toggleSection(1)">
                        <h3 class="font-medium">Getting Started</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">1.5 hours</span>
                            <i data-feather="chevron-down" class="w-4 h-4 transform transition-transform" id="icon-1"></i>
                        </div>
                    </div>
                    <div class="space-y-2 hidden" id="section-1">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>Course Introduction</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>Setting Up Your Development Environment</span>
                        </div>
                    </div>
                </div>
                <div class="border rounded-lg p-4">
                    <div class="flex justify-between items-center mb-2 cursor-pointer" onclick="toggleSection(2)">
                        <h3 class="font-medium">Frontend Development</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">10 hours</span>
                            <i data-feather="chevron-down" class="w-4 h-4 transform transition-transform" id="icon-2"></i>
                        </div>
                    </div>
                    <div class="space-y-2 hidden" id="section-2">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>HTML5 & CSS3</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>JavaScript Fundamentals</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6">Reviews from Graduates</h2>
            <div class="space-y-6">
                <div class="border-b last:border-b-0 pb-6">
                    <div class="flex items-start space-x-4">
                        <img src="../../public/img/moi.png" alt="Michael Chen" class="rounded-full w-12 h-12">
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="font-medium">Abdelmalek Labid</h4>
                                <span class="text-sm text-gray-600">2024-01-10</span>
                            </div>
                            <div class="flex items-center mt-1 text-yellow-400">
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                                <i data-feather="star" class="w-4 h-4 fill-current"></i>
                            </div>
                            <p class="mt-2 text-gray-600">Excellent course! The practical projects really helped cement my understanding.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    feather.replace();

    function toggleSection(id) {
        const section = document.getElementById(`section-${id}`);
        const icon = document.getElementById(`icon-${id}`);

        section.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
</body>
</html>