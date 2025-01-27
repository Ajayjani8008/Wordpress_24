<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php printf( esc_html__( 'Search Results for: %s', 'monsoon-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h1>
                </header><!-- .page-header -->

                <?php
                // Start the loop.
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <div class="search-result-item">
                        <h4 class="search-result-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <div class="search-result-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                // End the loop.
                endwhile;

                // Pagination.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous', 'monsoon-theme' ),
                    'next_text'          => __( 'Next', 'monsoon-theme' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'monsoon-theme' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                ?>
                <header class="page-header">
                    <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'monsoon-theme' ); ?></h2>
                </header><!-- .page-header -->

                <div class="no-results">
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'monsoon-theme' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .no-results -->

            <?php endif; ?>
        </div><!-- .col-md-8 -->

        <div class="col-md-4">
            <?php //get_sidebar(); ?>
        </div><!-- .col-md-4 -->
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
