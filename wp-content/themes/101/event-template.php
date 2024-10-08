<?php
/* Template Name: Events */

get_header(); ?>



<main id="content" class="site-main">
    <div class="page-header"><h1 class="entry-title">Events</h1></div>

    <div class="page-content">
        <article class="post">
            <div id="events-container">
                <label for="event-category-filter">Filter by Category:</label>
                <select id="event-category-filter">
                    <option value="">All Categories</option>
                    <?php
                    // Get categories for filtering
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        if($category->name != 'Uncategorized')
                        echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
                    }
                    ?>
                </select>

                <div id="events-list"></div>
            </div>
        </article>
    </div>	
</main>
<?php get_footer(); ?>
