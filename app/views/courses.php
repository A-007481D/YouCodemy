    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Catalog</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50">
    <header class="bg-white drop-shadow-md px-20 ">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="#" class="text-2xl font-bold text-green-500">YouCodemy</a>
        <nav class="flex space-x-6 text-gray-700">
            <a href="home.php" class="hover:text-green-500">Home</a>
            <a href="#" class="hover:text-green-500">About</a>
            <a href="courses.php" class="hover:text-green-500">Courses</a>
            <a href="#" class="hover:text-green-500">Blog</a>
            <a href="#" class="hover:text-green-500">Contact</a>
        </nav>
        <div class="flex space-x-4">
            <div class="flex items-center gap-2 font-medium cursor-pointer hover:underline hover:text-green-500" onclick="toggleModal('login')">
                <svg fill="#000000" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 485.00 485.00">
                    <path d="M345,175v-72.5C345,45.981,299.019,0,242.5,0S140,45.981,140,102.5V175H70v310h345V175H345z M170,102.5 c0-39.977,32.523-72.5,72.5-72.5S315,62.523,315,102.5V175H170V102.5z M385,455H100V205h285V455z"></path>
                    <path d="M227.5,338.047v53.568h30v-53.569c11.814-5.628,20-17.682,20-31.616c0-19.299-15.701-35-35-35c-19.299,0-35,15.701-35,35 C207.5,320.365,215.686,332.42,227.5,338.047z"></path>
                </svg>
                <a href="#" class="text-gray-700 hover:text-green-500">Login</a>
            </div>
            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600" onclick="toggleModal('signup')">Sign up</a>
        </div>
    </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8">
            <div class="relative w-full md:w-96">
                <input type="text" placeholder="Search courses..."
                       class="w-full pl-10 pr-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>

            <div class="flex gap-4">
                <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                    <option>All Categories</option>
                    <option>Business</option>
                    <option>Leadership</option>
                    <option>Management</option>
                </select>
                <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-yellow-500">
                    <option>Price Range</option>
                    <option>Under $100</option>
                    <option>$100 - $500</option>
                    <option>$500+</option>
                </select>
            </div>
        </div>

        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Featured Courses</h2>
                <a href="#" class="text-yellow-600 hover:text-yellow-700">View All</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">6448</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Top Sellers</h2>
                <a href="#" class="text-yellow-600 hover:text-yellow-700">View All</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute -top-0.5 -right-0.5 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Top Seller
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute -top-0.5 -right-0.5 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Top Seller
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute -top-0.5 -right-0.5 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Top Seller
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">New Courses</h2>
                <a href="#" class="text-yellow-600 hover:text-yellow-700">View All</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="../../public/img/tesla-m-s.jpeg" alt="Course" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-2 py-1 rounded text-sm">
                            Featured
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">120 reviews</span>
                        </div>
                        <h3 class="font-bold mb-2">Business Strategy: 8 Best Strategies For Growth</h3>
                        <div class="flex items-center mb-2">
                            <img src="../../public/img/tesla-m-s.jpeg" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">Soledad O'Brien</span>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                <span class="font-bold">64</span> students
                            </div>
                            <div class="text-lg font-bold text-yellow-600">
                                $380
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-12">
            <nav class="flex space-x-2">
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">Previous</button>
                <button class="px-4 py-2 border rounded-lg bg-yellow-500 text-black">1</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">2</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">3</button>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">Next</button>
            </nav>
        </div>
    </div>
    </body>
    </html>