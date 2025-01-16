<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YouCodemy - Education Platform</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-green-50 font-sans">
    <header class="bg-white drop-shadow-md px-20">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#" class="text-2xl font-bold text-green-500">YouCodemy</a>
            <nav class="flex space-x-6 text-gray-700">
                <a href="#" class="hover:text-green-500">Home</a>
                <a href="#" class="hover:text-green-500">About</a>
                <a href="courses.php" class="hover:text-green-500">Courses</a>
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


    <section class="bg-green-50 py-16 px-20">
        <div class="container mx-auto px-6 text-center md:text-left">
            <div class="flex flex-col-reverse md:flex-row items-center">

                <div class="md:w-1/2">
                    <h1 class="text-4xl md:text-5xl font-bold text-[#23c55e]">Start to Success</h1>
                    <p class="mt-4 text-5xl font-bold text-gray-850">Access To <span class="text-green-500 font-bold">5000+</span> Courses <br> from <span class="text-green-500 font-bold">300</span> Instructors & Institutions</p>
                    <p class="mt-2 text-gray-500">Various versions have evolved over the years, sometimes by accident.</p>
                    <div class="mt-6">
                        <input type="text" placeholder="What do you want to learn?" class="w-full md:w-2/3 px-4 py-3 border rounded-md focus:ring focus:ring-green-200 focus:outline-none">
                    </div>
                </div>

                <div class="md:w-1/2 flex justify-center md:justify-end">
                    <div class="relative flex space-x-4">
                        <div class="transparent p-4 rounded-xl ">
                            <img src="../../public/img/leslie.svg" alt="Course 1" class="rounded-lg">
                            <!-- <p class="mt-2 font-bold">UI-UX Design Course</p>
                            <span class="text-gray-600 text-sm">Leslie Alexander</span> -->
                        </div>
                        <div class="transparent p-4 rounded-xl ">
                            <img src="../../public/img/khona.svg" alt="Course 2" class="rounded-lg">
                            <!-- <p class="mt-2 font-bold">Social Media Marketing</p>
                            <span class="text-gray-600 text-sm">Wade Warren</span> -->
                        </div>
                        <span class="relative md:absolute md:right-[-10px] md:bottom-[47px] z-[100] flex items-center gap-3 shadow-input shadow-md md:bg-[#f0fdf4] p-2 lg:p-4 md:p-5 rounded-md cursor-pointer"> 5.0 Rating</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 px-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Most <span class="text-green-500">Popular Course</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
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
                        <h3 class="font-bold mb-2 cursor-pointer hover:underline hover:text-blue-800">Business Strategy: 8 Best Strategies For Growth</h3>
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
                        <h3 class="font-bold mb-2 cursor-pointer hover:underline hover:text-blue-800">Business Strategy: 8 Best Strategies For Growth</h3>
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
                        <h3 class="font-bold mb-2 cursor-pointer hover:underline hover:text-blue-800">Business Strategy: 8 Best Strategies For Growth</h3>
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

                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow opacity-50">
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
                        <h3 class="font-bold mb-2 cursor-pointer hover:underline hover:text-blue-800">Business Strategy: 8 Best Strategies For Growth</h3>
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
    </section>


    <section class="bg-green-50 py-16 px-20">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">

        <div class="md:w-1/2">
                <img src="../../public/img/bottom_hero_img.png" alt="Join Image" class="rounded-lg">
            </div>


            <div class="md:w-1/2 mt-8 md:mt-0 md:ml-8 text-center md:text-left">
                <h2 class="text-4xl font-bold text-gray-800">Join <span class="text-green-500">World's largest</span> learning platform today</h2>
                <p class="mt-4 text-gray-600">Start learning by registering for free</p>
                <a href="#" class="mt-6 inline-block bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-green-600" onclick="toggleModal('signup')">Sign up for Free</a>
            </div>
        </div>
    </section>

    <!-- modal -->
    <div id="modal" class="hidden flex fixed inset-0 bg-black bg-opacity-80 items-center justify-center z-[100]">
        <div class="max-w-md mx-auto">
            <div class="bg-[#f0fdf4] w-[29em] rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="flex">
                    <button id="loginTab" class="w-1/2 py-4 text-center font-semibold transition-all duration-300 border-b-2 border-blue-600 text-blue-600" onclick="showLogin()">
                        Login
                    </button>
                    <button id="signupTab" class="w-1/2 py-4 text-center font-semibold text-gray-500 transition-all duration-300 border-b-2 border-transparent hover:text-blue-600" onclick="showSignup()">
                        Sign Up
                    </button>
                </div>

                <!-- Login Form -->
                <div id="loginForm" class="p-8">
                    <h2 class="text-2xl font-bold text-center mb-8 bg-gradient-to-r from-blue-600 to-[#16a34a] bg-clip-text text-transparent">
                        Welcome Back
                    </h2>

                    <form method="POST" action="/signin" class="space-y-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                            <input type="email" name="email_login" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Enter your email">
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                            <input type="password" name="password_login" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Enter your password">
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <span class="text-sm text-gray-600">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                        </div>
                        <?php if (!empty($_SESSION['login_error'])):?>
                            <div class="text-red-500 text-sm mt-2 text-center">
                                <?= htmlspecialchars($_SESSION['login_error']);?>
                            </div>
                            <?php unset($_SESSION['login_error']);?>
                        <?php endif; ?>
                        <button type="submit" class="w-full bg-[#16a34a] text-white py-3 rounded-lg font-semibold hover:bg-[#16a34a] transition-colors duration-300 shadow-lg hover:shadow-green-500/50">
                            Sign in
                        </button>
                    </form>

                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-[#F0FDF4] text-gray-500">Or continue with</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-5 w-5 mr-2">
                                <span class="text-sm font-medium text-gray-700">Google</span>
                            </button>
                            <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                                <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook" class="h-5 w-5 mr-2">
                                <span class="text-sm font-medium text-gray-700">Facebook</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sign Up Form -->
                <div id="signupForm" class="p-8 hidden">
                    <h2 class="text-2xl font-bold text-center mb-8 bg-gradient-to-r from-blue-600 to-[#16a34a] bg-clip-text text-transparent">
                        Create Account
                    </h2>

                    <form method="POST" action="/signup" class="space-y-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">First Name</label>
                                <input name="F_name" type="text" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="First name">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Last Name</label>
                                <input name="L_name" type="text" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Last name">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                            <input name="email_reg" type="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Enter your email">
                        </div>

                        <!-- <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">number</label>
                            <input name="number" type="number" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Enter your number">
                        </div> -->

                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                            <input type="password" name="password_reg" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Create password">
                        </div>

                        <!-- <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                            <input name="password_reg" type="password" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200" placeholder="Confirm password">
                        </div> -->

<!--                        <label class="flex items-center space-x-2">-->
<!--                            <input type="checkbox" id="check" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">-->
<!--                            <span class="text-sm text-gray-600">I agree to the Terms and Conditions</span>-->
<!--                        </label>-->
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Role</label>
                            <select name="role" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:bg-white focus:outline-none transition duration-200">
                                <option value="" disabled selected>Select role</option>
                                <option name="student" value="student">Student</option>
                                <option name="instructor" value="instructor">Instructor</option>
                            </select>
                        </div>
                        <?php if(!empty($_SESSION['signup_error'])): ?>
                        <div class="text-red-500 text-sm mt-2">
                            <?= $_SESSION['signup_error'] ?>
                        </div>
                        <?php unset($_SESSION['signup_error']); ?>
                        <?php endif; ?>
                        <button type="submit" class="w-full bg-[#16a34a] text-white py-3 rounded-lg font-semibold hover:bg-[#16a34a] transition-colors duration-300 shadow-lg hover:shadow-green-500/50">
                            Sign Up
                        </button>
                    </form>

                    <div class="mt-8">
                        <!-- <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-[#F0FDF4] text-gray-500">Or sign up with</span>
                            </div>
                        </div> -->

<!--                        <div class="mt-6 grid grid-cols-2 gap-4">-->
<!--                            <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-300">-->
<!--                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-5 w-5 mr-2">-->
<!--                                <span class="text-sm font-medium text-gray-700">Google</span>-->
<!--                            </button>-->
<!--                            <button class="flex items-center justify-center px-4 py-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-300">-->
<!--                                <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" alt="Facebook" class="h-5 w-5 mr-2">-->
<!--                                <span class="text-sm font-medium text-gray-700">Facebook</span>-->
<!--                            </button>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-white py-12 px-20">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

        <div>
                <h3 class="text-2xl font-bold text-green-500">YouCodemy</h3>
                <p class="mt-4 text-gray-600">Call: +123 400 123</p>
                <p class="text-gray-600">Email: example@mail.com</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-green-500 hover:text-green-600">FB</a>
                    <a href="#" class="text-green-500 hover:text-green-600">TW</a>
                    <a href="#" class="text-green-500 hover:text-green-600">LN</a>
                    <a href="#" class="text-green-500 hover:text-green-600">BE</a>
                </div>
            </div>


            <div>
                <h3 class="text-xl font-bold text-gray-800">Explore</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Home</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">About</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Course</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Blog</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Contact</a></li>
                </ul>
            </div>


            <div>
                <h3 class="text-xl font-bold text-gray-800">Category</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Design</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Development</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Marketing</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Business</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Lifestyle</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-green-500">Music</a></li>
                </ul>
            </div>


            <div>
                <h3 class="text-xl font-bold text-gray-800">Subscribe</h3>
                <p class="mt-4 text-gray-600">Get the latest updates and offers.</p>
                <div class="mt-4">
                    <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-green-200 focus:outline-none">
                    <button class="w-full mt-2 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Sign up for Free</button>
                </div>
            </div>
        </div>
    </footer>

<script src="../../public/js/auth.js">
    
</script>
</body>

</html>