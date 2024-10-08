<?php
// Add this code to your theme's functions.php file
function create_event_post_type() {
    register_post_type('event',
        array(
            'labels' => array(
                'name' => __('Events'),
                'singular_name' => __('Event'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'rewrite' => array('slug' => 'events'),
        )
    );
}
add_action('init', 'create_event_post_type');


function create_sample_events() {
    for ($i = 1; $i <= 15; $i++) {
        wp_insert_post(array(
            'post_title'   => 'Sample Event ' . $i,
            'post_content' => 'This is the content of sample event ' . $i,
            'post_status'  => 'publish',
            'post_type'    => 'event',
        ));
    }
}

// Uncomment the line below to run this function once
// create_sample_events();
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}
// Register category taxonomy for Event custom post type
function create_event_taxonomies() {
    register_taxonomy_for_object_type('category', 'event');
}
add_action('init', 'create_event_taxonomies');

function enqueue_event_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('ajax-events', get_stylesheet_directory_uri() . '/js/ajax-events.js', array('jquery'), null, true);
    wp_localize_script('ajax-events', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_event_scripts');


function load_events_ajax() {
    $paged = (isset($_POST['paged'])) ? intval($_POST['paged']) : 1;
    $cat_id = (isset($_POST['category'])) ? intval($_POST['category']) : 0;

    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 5,
        'paged' => $paged,
    );

    if ($cat_id != 0) {
        $args['cat'] = $cat_id; // Filter by category if selected
    }
    $events = new WP_Query($args);
    
    ob_start();

    if ($events->have_posts()) {
        ?>
        <div class="event-item-container">
            <?php
            while ($events->have_posts()) {
                $events->the_post();
                ?>
                <div class="event-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="event-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_excerpt(); ?></div>
                </div>
                <?php
            }
            
        ?>
        </div>
        <?php
        // Pagination with custom data-page attribute
        $total_pages = $events->max_num_pages;
        if ($total_pages > 1) {
            echo '<div id="event-pagination">';
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $paged) {
                    echo '<span class="current-page">' . $i . '</span> ';
                } else {
                    echo '<a href="#" class="pagination-link" data-page="' . $i . '">' . $i . '</a> ';
                }
            }
            echo '</div>';
        }
    } else {
        echo 'No events found.';
    }

    wp_reset_postdata();
    $response = ob_get_clean();

    echo $response;
    wp_die(); // This is required to terminate immediately and return a proper response
}
add_action('wp_ajax_nopriv_load_events', 'load_events_ajax');
add_action('wp_ajax_load_events', 'load_events_ajax');
