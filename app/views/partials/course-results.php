<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php if (empty($courses)): ?>
        <div class="text-center text-gray-500">No courses found.</div>
    <?php else: ?>
        <?php foreach ($courses as $course): ?>
            <a href="/course/<?= $course->getId(); ?>" class="block">
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow cursor-pointer">
                    <div class="relative">
                        <?php if ($course->getContentType() === 'video'): ?>
                            <video controls class="w-full">
                                <source src="<?= htmlspecialchars($course->getContent()); ?>" type="video/mp4">
                            </video>
                        <?php elseif ($course->getContentType() === 'text'): ?>
                            <img src="../../../public/img/placeholder-course.webp" alt="Course" class="w-full h-48 object-cover">
                        <?php endif; ?>
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
                        <h3 class="font-bold mb-2 hover:underline hover:text-blue-800 cursor-pointer">
                            <?= htmlspecialchars($course->getTitle()); ?>
                        </h3>
                        <div class="flex items-center mb-2">
                            <img src="../../../public/img/placeholder-course.webp" alt="Instructor" class="w-6 h-6 rounded-full mr-2">
                            <span class="text-sm text-gray-600">
                                <?= htmlspecialchars($course->getPublisher()->getLName()); ?>
                            </span>
                        </div>
                        <div class="mt-4"></div>
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
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>