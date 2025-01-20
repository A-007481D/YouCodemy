<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($course->getTitle())?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<header class="bg-white drop-shadow-md px-20">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="#" class="text-2xl font-bold text-green-500">YouCodemy</a>
        <nav class="flex space-x-6 text-gray-700">
            <a href="/" class="hover:text-green-500">Home</a>
            <a href="#" class="hover:text-green-500">About</a>
            <a href="/courses" class="hover:text-green-500">Courses</a>
            <a href="#" class="hover:text-green-500">Blog</a>
            <a href="#" class="hover:text-green-500">Contact</a>
        </nav>
        <div class="flex space-x-4">
            <?php if (isset($_SESSION['user'])): ?>
                <div class="flex items-center gap-2 font-medium">
                    <span class="text-gray-700">Welcome, <?= htmlspecialchars($_SESSION['user']->getFName());?>!</span>
                    <a href="/logout" class="text-red-500 hover:underline">Logout</a>
                </div>
            <?php else: ?>
                <div class="flex items-center gap-2 font-medium cursor-pointer hover:underline hover:text-green-500" onclick="toggleModal('login')">
                    <svg fill="#000000" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.00 485.00">
                        <path d="M345,175v-72.5C345,45.981,299.019,0,242.5,0S140,45.981,140,102.5V175H70v310h345V175H345z M170,102.5 c0-39.977,32.523-72.5,72.5-72.5S315,62.523,315,102.5V175H170V102.5z M385,455H100V205h285V455z"></path>
                        <path d="M227.5,338.047v53.568h30v-53.569c11.814-5.628,20-17.682,20-31.616c0-19.299-15.701-35-35-35c-19.299,0-35,15.701-35,35 C207.5,320.365,215.686,332.42,227.5,338.047z"></path>
                    </svg>
                    <a href="#" class="text-gray-700 hover:text-green-500">Login</a>
                </div>
                <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600" onclick="toggleModal('signup')">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<div class="max-w-6xl mx-auto p-6 space-y-8">
    <div class="grid md:grid-cols-2 gap-8">
        <div class="space-y-4">
            <span class="inline-flex items-center rounded-full px-3 py-1 text-sm bg-blue-100 text-blue-800">
                <?= htmlspecialchars($course->getCategory())?>
            </span>
            <h1 class="text-4xl font-bold"><?= htmlspecialchars($course->getTitle())?></h1>
            <p class="text-lg text-gray-600"><?= htmlspecialchars($course->getDescription())?></p>

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
                <img src="../../public/img/moi.png" alt="Instructor" class="rounded-full w-12 h-12">
                <div>
                    <p class="font-medium"><?= htmlspecialchars($course->getPublisher()->getLName())?></p>
                    <p class="text-sm text-gray-600">Senior AWS Solutions Architect</p>
                </div>
            </div>
        </div>

        <div>
            <?php if ($course->getContentType() === 'video'): ?>
                <video controls class="rounded-lg w-full">
                    <source src="<?= htmlspecialchars($course->getContent()) ?>" type="video/mp4">
                </video>
            <?php else: ?>
                <img src="<?= htmlspecialchars($course->getContent()) ?>" alt="Course Preview" class="rounded-lg w-full object-cover">
            <?php endif; ?>
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
                <?php if ($isEnrolled): ?>
                    <a href="/my-courses" >
                        <button class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">Open Course</button>
                    </a>
                <?php else: ?>
                    <form action="/enroll/<?= $course->getId() ?>" method="POST">
                        <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                            Enroll Now - $99.99
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6">What You'll Learn</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <?php foreach ($course->getTags() as $tag): ?>
                    <div class="flex items-start space-x-2">
                        <i data-feather="check" class="w-5 h-5 text-green-500 mt-1"></i>
                        <span><?= htmlspecialchars($tag) ?></span>
                    </div>
                <?php endforeach; ?>
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
                        <h3 class="font-medium">Into the Cloud</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">10 hours</span>
                            <i data-feather="chevron-down" class="w-4 h-4 transform transition-transform" id="icon-2"></i>
                        </div>
                    </div>
                    <div class="space-y-2 hidden" id="section-2">
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>AWS Fundamentals</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <i data-feather="play" class="w-4 h-4"></i>
                            <span>Core AWS services</span>
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