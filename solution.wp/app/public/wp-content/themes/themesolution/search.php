<?php
//resultats de la récherche//



get_header() ;


if ( have_posts() ) :
	?>

<h1>Résultats de la recherche pour : "<?php the_search_query(); ?>"</h1>
<div class="content-area">

<?php
while (have_posts()) : the_post(); ?>


<article class="post">
			<?php if ( has_post_thumbnail() ) { ?>
                <div class="small-thumbnail">
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'miniature' ); ?></a>
                </div>
			<?php } ?>
            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

            <p>
				<?php echo get_the_excerpt() ?>
                <a href="<?php the_permalink() ?>">Lire plus</a>
            </p>
        </article>

<?php endwhile; 
else :
	echo '<p>No search results found!</p>';

endif; ?>


</div>


<?php get_footer() ?>