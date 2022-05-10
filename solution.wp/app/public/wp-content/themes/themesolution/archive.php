<!--cette page listera les 10 premiers articles publiés - blog -->

<!-- get_template_part( 'archive-realisations' ); -->



<?php get_header(); ?>

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    	<h1><?php the_title(); ?></h1>
    
    	<?php the_content(); ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>