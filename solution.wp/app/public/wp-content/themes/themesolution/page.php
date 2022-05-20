<h1><?php echo $title; ?></h1>

<?php get_header(); ?>

<?php


$args = array(
	'posts_per_page' =>6,
	'paged' => get_query_var('paged'),

);

query_posts($args);


 while (have_posts()) : the_post(); ?>


	<div class="card-img-top">
		<?php the_post_thumbnail('miniature'); ?>
	</div>


	<div class="card-body ">

		<h5 class="card-title "><?php the_title(); ?> </h5>
		
		<p> <?php echo " " . the_excerpt(); ?></p>


	</div>

	<div class="lien-actu">
		<h6 class="font-weight-bold"> <a href="<?php the_permalink() ?>">LIRE + </a></h6>
	</div>


<?php endwhile; ?>

<?php posts_nav_link(); ?>
<?php the_posts_pagination(array( 'mid_size' => 2 )); 
wp_reset_postdata();?>

<?php get_footer(); ?>