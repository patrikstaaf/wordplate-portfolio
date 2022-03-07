<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title>WP Portfolio</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <?php if (
        wp_get_environment_type() === 'local' &&
        is_array(wp_remote_get('http://localhost:3000'))
    ) : ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/resources/scripts/index.js"></script>
    <?php else : ?>
        <?php $manifest = json_decode(file_get_contents(get_theme_file_path('assets/manifest.json')), true); ?>
        <script type="module" src="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['file']) ?>" defer></script>
        <link rel="stylesheet" href="<?= get_theme_file_uri('assets/' . $manifest['resources/scripts/index.js']['css'][0]) ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const btn = document.querySelector('.mobile-menu-button');
        //     const menu = document.querySelector('.mobile-menu');

        //     btn.addEventListener('click', () => {
        //         menu.classList.toggle('hidden');
        //     });
        // });
    </script>
</head>

<body class="bg-gradient-to-r from-rose-50 to-teal-50 font-inter font-light max-w-4xl mx-auto p-6 " <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php $menuItems = wp_get_nav_menu_items('nav'); ?>

    <nav class="flex justify-between w-full p-4 sm:p-6 bg-white bg-opacity-70 sticky top-5 z-10 rounded-xl items-center">

        <div><a class="text-gray-600 hover:bg-gray-200 hover:rounded-lg p-2 hover:p-2" href="<?= home_url(); ?>"><?= bloginfo('name'); ?></a></div>


        <div class="hidden sm:inline-block sm:space-x-6">
            <?php foreach ($menuItems as $item) : ?>
                <a class="text-gray-600 hover:bg-gray-200 hover:rounded-lg p-2 hover:p-2 <?= (get_queried_object_id() == $item->object_id) ? 'font-semibold text-gray-800' : 'text-gray-600' ?> >" href="<?= $item->url ?>"><?= $item->title; ?></a>
            <?php endforeach; ?>
        </div>

        <div class="text-right sm:hidden">
            <button class="mobile-menu-button sm:hidden p-2" aria-label="Mobile menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <div class="mobile-menu hidden sm:hidden">
                <?php foreach ($menuItems as $item) : ?>
                    <a class="block text-gray-600 hover:bg-gray-200 hover:rounded-lg p-2 hover:p-2 <?= (get_queried_object_id() == $item->object_id) ? 'font-semibold text-gray-800' : 'text-gray-600' ?> >" href="<?= $item->url ?>"><?= $item->title; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

    </nav>

    <div class="container prose mx-auto text-center m-10 relative">
