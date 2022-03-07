<?php

declare(strict_types=1);

$postType = get_field('latest-posts-post-type') ?: 'post';
$numberOfPosts = get_field('latest-posts-number-of-posts') ?: 3;

$args = ['post_type' => $postType, 'numberposts' => $numberOfPosts, 'order' => 'desc'];

$latestPosts = get_posts($args);

?>
<div>
    <div class="flex flex-col text-left">
        <?php foreach ($latestPosts as $post) : setup_postdata($post) ?>
            <div class="border rounded-xl border-gray-200 my-4 p-4 not-prose">
                <a class="no-underline flex justify-between items-center" href="<?php get_the_permalink($post); ?>">
                    <h3 class="font-light"><?= get_the_title($post); ?></h3>
                    <?php if ($image = get_the_post_thumbnail($post, [100, 100])); ?>
                    <?= $image; ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>
</div>

<?php $blogPageUrl = get_field('latest-posts-link-to-blog'); ?>

<a class="no-underline" href="<?= $blogPageUrl; ?>">All posts</a>
