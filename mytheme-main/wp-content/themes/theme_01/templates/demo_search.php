<?php

/*
Template Name: demo search template
*/

get_header();
?>

<body>
    <div>

        <form role="search" method="get" id="advancedsearchform" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..." />

            <select name="category">
                <option value=""> Select Category</option>
                <?php
                $categories = get_categories();
                foreach ($categories as $$category) {
                    echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
                }

                ?>
            </select>
            <input type="text" name="date" placeholder="YYYY-MM-DD" />
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search'); ?>" />
        </form>


    </div>
</body>

<?php get_footer(); ?>