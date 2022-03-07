<?php

declare(strict_types=1);

add_action('acf/init', function () {
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'latest-posts',
            'title'             => __('Custom Latest posts'),
            'description'       => __('A block that displays the latest posts.'),
            'render_template'   => 'block-templates/latest-posts.php',
            'category'          => 'formatting',
            'icon'              => 'megaphone',
            'keywords'          => array('posts'),
        ));
    }
});


if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'latest-posts-fields',
        'title' => 'Block settings',
        'fields' => array(
            array(
                'key' => 'field_latest-posts-post-type',
                'label' => 'Post type',
                'name' => 'latest-posts-post-type',
                'type' => 'select',
                'choices' => [
                    'post' => 'post',
                    'project' => 'project',
                ],
            ),
            array(
                'key' => 'field_latest-posts-number-of-posts',
                'label' => 'Number of posts',
                'name' => 'latest-posts-number-of-posts',
                'type' => 'number',
                'default_value' => 3,
            ),
            array(
                'key' => 'field_latest-posts-link-to-blog',
                'label' => 'Link to post type archive',
                'name' => 'latest-posts-link-to-blog',
                'type' => 'page_link',
                'post_type' => 'page',
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/latest-posts',
                ),
            ),
        ),
    ));

endif;
