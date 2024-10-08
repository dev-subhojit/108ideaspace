jQuery(document).ready(function($) {
    function load_events(paged = 1, category = '') {
        var data = {
            'action': 'load_events',
            'paged': paged,
            'category': category,
        };

        $.post(ajax_object.ajax_url, data, function(response) {
            $('#events-list').html(response);
        });
    }

    // Load initial events
    load_events();

    // Handle category filter change
    $('#event-category-filter').on('change', function() {
        var category = $(this).val();
        load_events(1, category); // Reset to the first page
    });

    // Handle pagination click
    $(document).on('click', '#event-pagination a', function(e) {
        e.preventDefault();
        var paged = $(this).data('page');
        var category = $('#event-category-filter').val();
        load_events(paged, category);
    });
});
