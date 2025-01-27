<?php
// HEADER
get_header();

// start output buffering
ob_start();


/**
 * if (is_page_template('template-property-listing.php')) :
 * ?>
 *<div class="property-listing">
 *    <h1>Property Listings</h1>
 *    <?php
 *    // Custom content for property listing page
 *    // For example, a custom query to display properties
 *    $args = array(
 *        'post_type' => 'property',
 *        'posts_per_page' => 10,
 *    );
 *    $property_query = new WP_Query($args);
 *    if ($property_query->have_posts()) :
 *        while ($property_query->have_posts()) : $property_query->the_post();
 *            ?>
 *            <div class="property-item">
 *                <h2><?php the_title(); ?></h2>
 *                <p><?php the_excerpt(); ?></p>
 *            </div>
 *            <?php
 *        endwhile;
 *        wp_reset_postdata();
 *    else :
 *        echo '<p>No properties found.</p>';
 *    endif;
 *    ?>
 *</div>
 *<?php
 *elseif (is_page_template('template-agent-profile.php')) :
 *?>
 *<div class="agent-profile">
 *    <h1>Agent Profile</h1>
 *    <?php
 *    // Custom content for agent profile page
 *    // For example, custom fields from ACF plugin
 *    if (have_posts()) :
 *        while (have_posts()) : the_post();
 *            ?>
 *            <div class="agent-details">
 *                <h2><?php the_title(); ?></h2>
 *                <p><?php the_content(); ?></p>
 *                <p><strong>Phone:</strong> <?php the_field('phone'); ?></p>
 *                <p><strong>Email:</strong> <?php the_field('email'); ?></p>
 *            </div>
 *            <?php
 *        endwhile;
 *    else :
 *        echo '<p>No agent profile found.</p>';
 *    endif;
 *    ?>
 *</div>
 *<?php
 *else :
 *?>
 *<div class="default-page">
 *    <h1>Default Page Template</h1>
 *    <?php
 *    // Default content for other pages
 *    if (have_posts()) :
 *        while (have_posts()) : the_post();
 *            ?>
 *            <div class="page-content">
 *                <h2><?php the_title(); ?></h2>
 *                <p><?php the_content(); ?></p>
 *            </div>
 *            <?php
 *        endwhile;
 *    else :
 *        echo '<p>No content found.</p>';
 *    endif;
 *    ?>
 *</div>
 *<?php
 *endif;
 *?>

 */
ob_get_clean();
// FOOTER
get_footer();
