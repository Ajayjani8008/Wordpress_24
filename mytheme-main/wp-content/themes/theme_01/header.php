<!doctype html>
<html lang="<?php language_attributes() ?>">

<head>
    <meta charset="<?php bloginfo('chatset') ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title><?php //bloginfo('name'); ?></title> -->
    <?php wp_head(); ?>
    <!-- <link rel="icon" type="image/x-icon" href="<?php // echo get_template_directory_uri(); 
                                                    ?>/assets/img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php // echo get_template_directory_uri(); 
                                                            ?>/assets/img/favicon.png"> -->
</head>



<body <?php body_class(); ?>>
    <?php if (is_front_page()) : ?>
        <section class="intro-area">
            <div class="">
                <div class="intro-area-11">
                <?php endif; ?>
                <!-- header area -->
                <section class="header header--8">
                    <!-- start menu area -->
                    <div class="menu_area menu8">
                        <div class="container">
                            <nav class="navbar navbar-expand-lg navbar-light px-0 ">
                                <a class="navbar-brand order-sm-1 order-1" href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php
                                    //if (function_exists('the_custom_logo') && has_custom_logo()) {
                                    //     the_custom_logo();
                                    // } else {
                                    ?>
                                    <!-- <img src="<?php  //echo esc_url(get_template_directory_uri()); 
                                                    ?>/assets/img/logo.png" alt="<?php //bloginfo('name'); 
                                                                                    ?>" /> -->
                                    <?php
                                    // }
                                    ?>

                                    <!-- In  other   method we also do this -->

                                    <?php
                                    $header_logo = get_theme_mod('header_logo');


                                    if ($header_logo) : ?>
                                        <!-- Display the logos if they exist -->
                                        <?php if ($header_logo) : ?>
                                            <img src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>" class="header-logo" />
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <!-- Fallback to the default logo if no custom logo is set -->
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>" />
                                    <?php endif; ?>


                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22" aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="la la-bars"></span>
                                </button>
                                <div class="collapse navbar-collapse order-md-1 justify-content-end" id="navbarSupportedContent22">
                                    <div class="m-right-15">
                                        <ul class="navbar-nav ">
                                            <?php
                                            // Get the menu items from the primary menu location
                                            $primary_menu_items = wp_get_nav_menu_items('primary menu');
                                            if ($primary_menu_items) :
                                                // Check if the menu item is a top-level item (parent)
                                                foreach ($primary_menu_items as $menu_item) :
                                                    if ($menu_item->menu_item_parent == 0) :
                                                        // Start creating the list item for the menu item
                                                        echo '<li class="nav-item';
                                                        $submenu_items = get_submenu_items($menu_item->ID, $primary_menu_items);

                                                        if (!empty($submenu_items)) {
                                                            echo ' dropdown'; // Add dropdown class if submenu exists
                                                        }
                                                        echo '">';
                                                        // Output the link for the menu item
                                                        echo '<a class="nav-link';
                                                        if (!empty($submenu_items)) {
                                                            echo ' dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
                                                        }
                                                        echo '"href="' . $menu_item->url . '">' . $menu_item->title;
                                                        // If submenus exist, start creating the submenu list

                                                        if (!empty($submenu_items)) {
                                                            echo '</a><div class="dropdown-menu">';
                                                            // Iterate through each submenu item
                                                            foreach ($submenu_items as $submenu_item) {
                                                                // Output the link for the submenu item
                                                                echo '<a class="dropdown-item" href="' . $submenu_item->url . '">' . $submenu_item->title . '</a>';
                                                            }
                                                            echo '</div>'; // Close dropdown-menu
                                                        } else {
                                                            echo '</a>'; // Close menu item link
                                                        }
                                                        echo '</li>'; // Close menu item list item

                                                    endif;
                                                endforeach;
                                            endif;

                                            // Recursive function to get submenu items
                                            function get_submenu_items($parent_id, $items)
                                            {
                                                $submenu_items = [];
                                                foreach ($items as $item) {
                                                    if ($item->menu_item_parent == $parent_id) {
                                                        $submenu_items[] = $item; // Add submenu item to the array
                                                    }
                                                }
                                                return $submenu_items;
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                </div>


                                <!-- Search Form  -->
                                <!-- This form access the search.php  automatically-->

                                <div class="nav_right_content m-left-30 d-flex align-items-center order-2 order-sm-2">
                                    <div class="nav_right_module search_module">
                                        <span class="la la-search search_trigger"></span>

                                        <div class="search_area">
                                            <form id="searchForm" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                                <div class="input-group input-group-light">
                                                    <span class="icon-left" id="basic-addon78">
                                                        <i class="la la-search"></i>
                                                    </span>
                                                    <input type="text" name="s" class="form-control search_field" placeholder="Type words and hit enter...">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!--                                 
                                <form id="searchForm1" class="form-inline" action="<?php //echo esc_url(home_url('/')); 
                                                                                    ?>" method="get">
                                    <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form> -->

                            </nav>
                        </div>
                    </div>
                    <!-- end menu area -->

                </section><!-- end: .header -->
                <!-- <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchTrigger = document.querySelector('.search_trigger');
                        const searchArea = document.querySelector('.search_area');
                        const searchForm = document.getElementById('searchForm');

                        searchTrigger.addEventListener('click', function() {
                            searchArea.classList.toggle('active');
                        });

                        searchForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            const query = searchForm.querySelector('.search_field').value;
                            if (query) {
                                window.location.href = searchForm.action + '?s=' + encodeURIComponent(query);
                            }
                        });
                    });
                </script> -->