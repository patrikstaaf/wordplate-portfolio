<?php

declare(strict_types=1);

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
});

// add_action('wp_enqueue_scripts', function () {
//     wp_enqueue_style('style', get_stylesheet_uri());
//     wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com?plugins=typography');
// });

require get_template_directory() . '/post-types/project.php';
require get_template_directory() . '/taxonomies/tool.php';
require get_template_directory() . '/fields/project.php';
require get_template_directory() . '/fields/options.php';
require get_template_directory() . '/blocks/latest-posts.php';
