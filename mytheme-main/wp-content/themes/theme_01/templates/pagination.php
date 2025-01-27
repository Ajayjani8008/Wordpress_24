<?php if ( have_posts() ) : ?>

<!-- Start the pagination functions before the loop. -->
<div class="pagination">
    <div class="nav-previous"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>
<!-- End the pagination functions before the loop. -->

<!-- Start of the main loop. -->
<?php while ( have_posts() ) : the_post();  ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-## -->

<?php endwhile; ?>
<!-- End of the main loop -->

<!-- Start the pagination functions after the loop. -->
<div class="pagination">
    <div class="nav-previous"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="nav-next"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>
<!-- End the pagination functions after the loop. -->

<?php else : ?>

<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>
