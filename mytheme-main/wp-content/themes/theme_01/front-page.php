<?php
/**
 * The front page template file
 *
 * If the front page setting is set to display the latest posts, this template
 * will use the home template. If the front page is set to display a static page,
 * it will use the page template.
 *
 * @package monsoon theme
 */

if ( 'posts' == get_option( 'show_on_front' ) ) {
    // If the setting is "Your latest posts", include the home template
    include( get_home_template() );
} else {
    // If the setting is "A static page", include the page template
    include( get_page_template() );

    // Optionally, add custom content for the static front page here
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <div class="custom-front-page-content">
                <h1><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
            </div>
        <?php endwhile;
    endif;
}

// Filter function to handle the front page template
function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );

?>
