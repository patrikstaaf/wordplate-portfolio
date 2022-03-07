<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <h1><a class="no-underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <?php
    $args = ['numberposts' => 3, 'order' => 'desc'];
    $latestPosts = get_posts($args);
    ?>

<?php endif; ?>

<?php get_footer(); ?>
