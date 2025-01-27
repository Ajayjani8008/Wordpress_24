<?php
function mytheme_setup()
{
    // Add support for a custom logo
    // add_theme_support('');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    load_theme_textdomain('monsoon-theme', get_template_directory() . '/languages');

    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ]
    );

    // Enable support for custom backgrounds
    add_theme_support('custom-background');


    // Enable support for custom headers
    add_theme_support('custom-header');

    add_theme_support('custom-logo', array(
        'height' => 500,
        'width' => 600,
        'flex-height' => true,
        'flex-width' => true,
    ));
    //embeds content like videos and iframes etc...
    add_theme_support('responsive-embeds');

    // Enable support for editor styles
    add_theme_support('editor-styles');

    // Enable support for title tag management
    add_theme_support('title-tag');

    // Enable support for selective refresh for widgets in the Customizer
    add_theme_support('customize-selective-refresh-widgets');

    // Enable support for wide alignment in block editor
    add_theme_support('align-wide');

    // Enable support for block editor styles
    add_theme_support('wp-block-styles');

    // Enable support for adding editor font sizes
    add_theme_support('editor-font-sizes', array( // not need add this  becouse wordpress add this functionality as default
        array(
            'name' => __('Small', 'theme-text-domain'),
            'size' => 12,
            'slug' => 'small'
        ),
        array(
            'name' => __('Regular', 'theme-text-domain'),
            'size' => 16,
            'slug' => 'regular'
        ),
        array(
            'name' => __('Large', 'theme-text-domain'),
            'size' => 36,
            'slug' => 'large'
        )
    ));


// Enable support for adding custom color palettes
add_theme_support( 'editor-color-palette', array(
    array( // wordpress add automatically color palette 
        'name' => __( 'Strong Blue', 'theme-text-domain' ),
        'slug' => 'strong-blue',
        'color' => '#0073AA',
    ),
    array(
        'name' => __( 'Lighter Blue', 'theme-text-domain' ),
        'slug' => 'lighter-blue',
        'color' => '#229FD8',
    ),
    array(
        'name' => __( 'Very Light Gray', 'theme-text-domain' ),
        'slug' => 'very-light-gray',
        'color' => '#eeeeee',
    ),
    array(
        'name' => __( 'Very Dark Gray', 'theme-text-domain' ),
        'slug' => 'very-dark-gray',
        'color' => '#444444',
    )
) );
}
add_action('after_setup_theme', 'mytheme_setup');


// Add menu support
function register_custom_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu'),
        )
    );
}
add_action('init', 'register_custom_menus');

function prefix_theme_enqueue_additional_styles()
{
    wp_enqueue_style('prefix-theme-plugin-min-css', get_template_directory_uri() . "/assets/css/plugin.min.css", array(), '1.0');
    // Enqueue plugin.rtl.min.css with dependency on plugin.min.css
    wp_enqueue_style('prefix-theme-plugin-rtl-min-css', get_template_directory_uri() . '/assets/css/plugin-rtl.min.css', array('prefix-theme-plugin-min-css'), '1.0', true);
    // Enqueue additional-styles.css
    wp_enqueue_style('prefix-theme-main-styles', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'prefix_theme_enqueue_additional_styles');


// Enqueue main stylesheet (style.css)
function prefix_theme_enqueue_styles()
{
    wp_enqueue_style('prefix-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'prefix_theme_enqueue_styles'); // Priority 10



function prefix_enqueue_google_maps_script()
{
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY', array(), null, true);
}
add_action('wp_enqueue_scripts', 'prefix_enqueue_google_maps_script');



// Enqueue additional scripts
function prefix_theme_enqueue_additional_scripts()
{
    // Enqueue plugin.min.js
    wp_enqueue_script('prefix-theme-plugin-script', get_template_directory_uri() . '/assets/js/plugins.min.js', array('jquery'), '1.0', true); // Dependency on jQuery

    // Enqueue other scripts as needed
}
add_action('wp_enqueue_scripts', 'prefix_theme_enqueue_additional_scripts');


// Enqueue main script (script.min.js)
function prefix_theme_enqueue_scripts()
{
    wp_enqueue_script('prefix-theme-script', get_template_directory_uri() . '/assets/js/script.min.js', array(), '1.0', true); // The 'true' parameter indicates that the script should be loaded in the footer
}
add_action('wp_enqueue_scripts', 'prefix_theme_enqueue_scripts');



// Enqueue Google Fonts
function enqueue_google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');


// Enqueue Custom Fonts
function enqueue_custom_fonts()
{
    wp_enqueue_style('custom-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css', array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

// Enqueue JavaScript file for AJAX functionality
function enqueue_ajax_comments_script()
{
    wp_enqueue_script('ajax-comments', get_template_directory_uri() . '/assets/js/ajax-comments.js', array('jquery'), null, true);
    wp_localize_script('ajax-comments', 'ajax_comments_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'post_id' => get_the_ID(),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_comments_script');


if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


// for more control and lable to option we add this code

// if (function_exists('acf_add_options_page')) {
//     acf_add_options_page(array(
//         'page_title'    => 'Theme General Settings',
//         'menu_title'    => 'Theme Settings',
//         'menu_slug'     => 'theme-general-settings',
//         'capability'    => 'edit_posts',
//         'redirect'      => false
//     ));
// }

// function themename_custom_header_setup() {
// 	$args = array(
// 		'default-image'      => get_template_directory_uri() . '/assets/img/c1bg.jpg',
// 		'default-text-color' => '000',
// 		'width'              => 1000,
// 		'height'             => 250,
// 		'flex-width'         => true,
// 		'flex-height'        => true,
// 	);
// 	add_theme_support( 'custom-header', $args );
// }
// add_action( 'after_setup_theme', 'themename_custom_header_setup' );


// function prefix_theme_enqueue_extra_fonts()
// {
//     // Enqueue custom fonts from the 'font' folder

//     wp_enqueue_style('prefix-theme-font1', get_template_directory_uri() . '/fonts/revicons/revicons90c6.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font2', get_template_directory_uri() . '/fonts/revicons/revicons90c6.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font3', get_template_directory_uri() . '/fonts/revicons/revicons90c6.ttf', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font4', get_template_directory_uri() . '/fonts/revicons/revicons90c6.woff', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font11', get_template_directory_uri() . '/fonts/fa-brands-400.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font21', get_template_directory_uri() . '/fonts/fa-brands-400.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font31', get_template_directory_uri() . '/fonts/fa-brands-400.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font41', get_template_directory_uri() . '/fonts/fa-brands-400d41d.eot', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font12', get_template_directory_uri() . '/fonts/fa-regular-400.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font22', get_template_directory_uri() . '/fonts/fa-regular-400.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font32', get_template_directory_uri() . '/fonts/fa-regular-400.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font42', get_template_directory_uri() . '/fonts/fa-regular-400d41d.eot', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font13', get_template_directory_uri() . '/fonts/fa-solid-900.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font23', get_template_directory_uri() . '/fonts/fa-solid-900.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font33', get_template_directory_uri() . '/fonts/fa-solid-900.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font43', get_template_directory_uri() . '/fonts/fa-solid-900d41d.eot', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font14', get_template_directory_uri() . '/fonts/fontelloc5e6.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font24', get_template_directory_uri() . '/fonts/fontelloc5e6.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font34', get_template_directory_uri() . '/fonts/fontelloc5e6.ttf', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font44', get_template_directory_uri() . '/fonts/fontelloc5e6.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font54', get_template_directory_uri() . '/fonts/fontelloc5e6.woff2', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font15', get_template_directory_uri() . '/fonts/line-awesomeeb4f.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font25', get_template_directory_uri() . '/fonts/line-awesomeeb4f.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font35', get_template_directory_uri() . '/fonts/line-awesomeeb4f.ttf', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font45', get_template_directory_uri() . '/fonts/line-awesomeeb4f.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font55', get_template_directory_uri() . '/fonts/line-awesomeeb4f.woff2', array(), '1.0');

//     wp_enqueue_style('prefix-theme-font16', get_template_directory_uri() . '/fonts/Linearicons-Free54e9.eot', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font26', get_template_directory_uri() . '/fonts/Linearicons-Free54e9.svg', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font36', get_template_directory_uri() . '/fonts/Linearicons-Free54e9.ttf', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font46', get_template_directory_uri() . '/fonts/Linearicons-Free54e9.woff', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font56', get_template_directory_uri() . '/fonts/Linearicons-Free54e9.woff2', array(), '1.0');
//     wp_enqueue_style('prefix-theme-font66', get_template_directory_uri() . '/fonts/Linearicons-Freed41d.eot', array(), '1.0');
// }
// add_action('wp_enqueue_scripts', 'prefix_theme_enqueue_extra_fonts');

require_once get_template_directory() . '/helpers/function_post_type.php';
require_once get_template_directory() . '/helpers/general_functions.php';
require_once get_template_directory() . '/helpers/customizer_functions.php';
