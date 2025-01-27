<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}


// custom post type 
function portfolio_post_type()
{

    $labels = array(
        'name'                  => _x('Portfolio', 'Portfolio', 'elementor-child'),
        'singular_name'         => _x('Portfolio', 'Portfolio', 'elementor-child'),
        'menu_name'             => __('Portfolio', 'elementor-child'),
        'name_admin_bar'        => __('Portfolio', 'elementor-child'),
        'archives'              => __('portfolio Archives', 'elementor-child'),
        'attributes'            => __('portfolio Attributes', 'elementor-child'),
        'parent_item_colon'     => __('Parent portfolio:', 'elementor-child'),
        'all_items'             => __('All portfolio', 'elementor-child'),
        'add_new_item'          => __('Add New portfolio', 'elementor-child'),
        'add_new'               => __('Add New', 'elementor-child'),
        'new_item'              => __('New portfolio', 'elementor-child'),
        'edit_item'             => __('Edit portfolio', 'elementor-child'),
        'update_item'           => __('Update portfolio', 'elementor-child'),
        'view_item'             => __('View portfolio', 'elementor-child'),
        'view_items'            => __('View portfolio', 'elementor-child'),
    );
    $args = array(
        'label'                 => __('Portfolio', 'elementor-child'),
        'description'           => __('Portfolio Description', 'elementor-child'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'menu_icon'             =>'dashicons-portfolio'
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'portfolio_post_type', 0);


//custom texonomy for Portfolio
function register_project_categories_taxonomy()
{

    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name'              => 'Project Categories',
            'singular_name'     => 'Project Category',
            'search_items'      => 'Search Project Categories',
            'all_items'         => 'All Project Categories',
            'parent_item'       => 'Parent Project Category',
            'parent_item_colon' => 'Parent Project Category:',
            'edit_item'         => 'Edit Project Category',
            'update_item'       => 'Update Project Category',
            'add_new_item'      => 'Add New Project Category',
            'new_item_name'     => 'New Project Category Name',
            'menu_name'         => 'Project Categories',
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
    );

    register_taxonomy('project_category', array('portfolio'), $args);
}
add_action('init', 'register_project_categories_taxonomy');


function create_project_categories()
{
    $categories = array('Web Development', 'Graphic Design', 'Photography');

    foreach ($categories as $category) {
        if (!term_exists($category, 'project_category')) {
            wp_insert_term($category, 'project_category');
        }
    }
}
add_action('init', 'create_project_categories');


function display_latest_portfolio( $atts ) {
  
    $args = array(
        'post_type'      => 'portfolio', 
        'posts_per_page' => 3,           
        'orderby'        => 'date',      
        'order'          => 'DESC',   
    );

    $query = new WP_Query( $args );
    ob_start();

    if ( $query->have_posts() ) {
        echo '<div class="latest-portfolio">';

        while ( $query->have_posts() ) {
            $query->the_post();
            echo '<div class="portfolio-item">';
            if ( has_post_thumbnail() ) {
                echo '<div class="portfolio-thumbnail">' . get_the_post_thumbnail( get_the_ID(), 'medium' ) . '</div>';
            }
            echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            echo '<div class="portfolio-excerpt">' . wp_trim_words( get_the_excerpt(), 20 ) . '</div>';
            echo '</div>';
        }
        echo '</div>'; 
    } else {
        echo '<p>No Portfolio items found.</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode( 'latest_portfolio', 'display_latest_portfolio' );




function custom_checkout_toggle_scripts() {
    if (is_checkout()) {
        
        wp_enqueue_script('custom-checkout-toggle', get_template_directory_uri() . '/js/checkout-toggle.js', array('jquery'), null, true);
        
        wp_enqueue_style('custom-checkout-toggle-style', get_template_directory_uri() . '/css/checkout-toggle.css');
    }
}
add_action('wp_enqueue_scripts', 'custom_checkout_toggle_scripts');
