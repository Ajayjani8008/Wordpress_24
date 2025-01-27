<?php
/*
 * Plugin Name:       Portfolio Metabox
 * Plugin URI:        https://example.com/plugins/portfolio-metabox/
 * Description:       Adds a meta box to the 'Portfolio' post type to capture the project date.
 *                    Displays the project date on the front end when viewing a single portfolio item.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jani Ajay
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       portfolio-metabox
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit;
}

function my_metabox_custom() {
    add_meta_box('portfolio_date', 'Project Date', 'display_date', 'portfolio', 'side', 'default');
}
add_action('add_meta_boxes', 'my_metabox_custom');


function display_date($post) {
    $project_date = esc_html(get_post_meta($post->ID, 'portfolio_date', true));

    wp_nonce_field('save_portfolio_date', 'portfolio_date_nonce');

    echo '<label for="portfolio_date">Project Date:</label>';
    echo '<input type="date" id="portfolio_date" name="portfolio_date" value="' . $project_date . '" />';
}

function save_project_date($post_id) {
   
    if (!isset($_POST['portfolio_date_nonce']) || !wp_verify_nonce($_POST['portfolio_date_nonce'], 'save_portfolio_date')) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if ('portfolio' == get_post_type($post_id)) {
        if (isset($_POST['portfolio_date']) && !empty($_POST['portfolio_date'])) {
            update_post_meta($post_id, 'portfolio_date', sanitize_text_field($_POST['portfolio_date']));
        } else {
            delete_post_meta($post_id, 'portfolio_date');
        }
    }
}
add_action('save_post', 'save_project_date');


function display_project_date($content) {
    if (is_singular('portfolio')) {
        $project_date = get_post_meta(get_the_ID(), 'portfolio_date', true);
        if ($project_date) {
            $content .= '<p><strong>Project Date:</strong> ' . esc_html($project_date) . '</p>';
        }
    }
    return $content;
}
add_filter('the_content', 'display_project_date');
