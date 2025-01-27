<?php

function mytheme_customize_register($wp_customize)
{

    // Add a new section for custom logos
    // $wp_customize->add_section('custom_logos', array(
    //     'title' => __('Custom Logos', 'mytheme'),
    //     'priority' => 30,
    // ));

    // Add white header logo settings 
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add white header logo control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
        'label' => __('Header Logo', 'mytheme'),
        'section' => 'title_tagline',
        'settings' => 'header_logo',
    )));

    // Add black header logo settings 
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add black header logo control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => __('Footer Logo', 'mytheme'),
        'section' => 'title_tagline',
        'settings' => 'footer_logo',
    )));
}

add_action('customize_register', 'mytheme_customize_register');
