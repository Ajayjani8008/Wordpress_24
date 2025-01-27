<?php
// Get the header
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php
            echo "<h2>single.php<h2>";
            // Start the loop

            while (have_posts()) :
                the_post();

                // Display the title
                the_title('<h1>', '</h1>');

                // Display the content
                the_content();
            endwhile;
            ?>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// Get the footer
get_footer();
?>