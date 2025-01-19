document.addEventListener('DOMContentLoaded', function () {

    document.body.addEventListener('courseAdded', function (event) {
        alert('Course added successfully!');
        window.location.reload(); 
    });

    document.body.addEventListener('courseAddFailed', function (event) {
        alert('Failed to add course.');
    });
    $('#coursesTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[2, 'desc']],
        language: {
            search: "",
            searchPlaceholder: "Search courses...",
        },
        columnDefs: [
            { orderable: false, targets: [0, 5] },
            { className: "align-middle", targets: "_all" }
        ],
        initComplete: function () {
            $('.dataTables_filter input').addClass('px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
            $('.dataTables_length select').addClass('px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500');
            $('.dataTables_paginate').addClass('mt-4');
            $('.paginate_button').addClass('px-3 py-1 border rounded-lg mx-1 hover:bg-gray-50');
            $('.paginate_button.current').addClass('bg-blue-50 text-blue-600 border-blue-200');
        }
    });
    $('button:contains("New Course")').on('click', function () {
        $('#courseModal').removeClass('hidden');
    });


    $('#closeModal').on('click', function () {
        $('#courseModal').addClass('hidden');
    });

    $('input[name="contentType"]').on('change', function () {
        if ($(this).val() === 'text') {
            $('#textContent').removeClass('hidden');
            $('#videoContent').addClass('hidden');
        } else {
            $('#videoContent').removeClass('hidden');
            $('#textContent').addClass('hidden');
        }
    });
});


function archiveCourse(courseID) {
    if (confirm('Are you sure you want to archive this course?')) {
        fetch('/instructor/course/archive', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ courseID }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Course archived successfully!');
                    window.location.reload();
                } else {
                    alert('Failed to archive course: ' + data.message);
                }
            });
    }
}


function editCourse(courseID) {
    fetch(`/instructor/course/details/${courseID}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('editCourseTitle').value = data.title;
            document.getElementById('editCourseDescription').value = data.description;
            document.getElementById('editCourseCategory').value = data.categoryID;
            document.getElementById('editCourseTags').value = data.tags.join(',');
            document.getElementById('editCourseModal').classList.remove('hidden');
        });
}


function saveCourseChanges(courseID) {
    const data = {
        courseID,
        title: document.getElementById('editCourseTitle').value,
        description: document.getElementById('editCourseDescription').value,
        categoryID: document.getElementById('editCourseCategory').value,
        tags: document.getElementById('editCourseTags').value.split(','),
    };

    fetch('/instructor/course/edit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Course updated successfully!');
                window.location.reload();
            } else {
                alert('Failed to update course: ' + data.message);
            }
        });
}