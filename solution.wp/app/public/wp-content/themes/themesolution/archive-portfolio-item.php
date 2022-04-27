<?php get_header(); ?>
<h1><?php echo __("realisations","agence la solution");?></h1> <!--pour outil de traduction-->



<main class="site__portfolio">
    <!--modif de la classe CSS pour changer de style sur le portfolio-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!--boucle Wordpress comme pour single -->
            <div class="project col-4">
                <h2 class="project__title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php the_post_thumbnail(); ?>
                <h2>
                    <?php the_terms(get_the_ID(), 'type-projet'); ?>
                </h2>
            </div>
    <?php endwhile;
    endif; ?>
</main>


<?php the_posts_pagination(); ?>


<?php get_footer(); ?>