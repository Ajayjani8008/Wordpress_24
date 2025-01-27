<?php
function set_news_post_date($post_id) {
    // Check if this is a post of type 'news'
    if ('news' !== get_post_type($post_id)) {
        return;
    }

    // Get the 'news' field group
    $news_group = get_field('news', $post_id);

    // Check if the 'publish_date' subfield is empty
    if (empty($news_group['publish_date'])) {
        // Set the 'publish_date' subfield to the current date
        $news_group['publish_date'] = date('Ymd'); // ACF expects the date in 'Ymd' format

        // Update the field
        update_field('news', $news_group, $post_id);
    }
}

add_action('acf/save_post', 'set_news_post_date', 20);


// function enqueue_custom_styles() {
//     if (is_page_template('template-property-listing.php')) {
//         wp_enqueue_style('property-listing-style', get_template_directory_uri() . '/css/property-listing.css');
//     } elseif (is_page_template('template-agent-profile.php')) {
//         wp_enqueue_style('agent-profile-style', get_template_directory_uri() . '/css/agent-profile.css');
//     }
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
