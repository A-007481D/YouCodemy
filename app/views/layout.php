

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?= $title ?></title>
</head>
<body>
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
</body>
</html>
