document.addEventListener('DOMContentLoaded', function () {

    document.body.addEventListener('courseAdded', function (event) {
        alert('Course added successfully!');
        window.location.reload(); 
    });

    document.body.addEventListener('courseAddFailed', function (event) {
        alert('Failed to add course.');
    });
});

$(document).ready(function () {
  
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