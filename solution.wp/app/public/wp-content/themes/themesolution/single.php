<?php get_header(); ?>

<h1>Single</h1>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail('square');
        the_content();


 endwhile;
endif; ?>

<?php get_footer(); ?>