//-------------------------------------------SLICK CAROUSEL---------------------------------------------
/**
 * Déclarer les short codes
 */
// add_action( 'init', 'register_shortcodes' );
// function register_shortcodes() { // lorsque ces codes seront trouvés, les fonctions seront appelées
// 	add_shortcode( 'post_slick_carousel_slider', 'sc_post_slick_carousel_slider' );
// }

/**
 * "post_slick_carousel_slider" est une fonction de rappel de code court responsable de la sortie du balisage HTML des custom posts
 */
function sc_post_slick_carousel_slider ( $atts ) {

  global $wp_query, $post;

  $posts = new WP_Query( array(
    'post_type' => 'carrousel', 
    'post_status' => 'publish',  
    'showposts'=> -1
	) );

  if( ! $posts->have_posts() ) {
		return false;
  }

  $output = '<div class="post-slick-carousel-slider">';

  while( $posts->have_posts() ) {

        $posts->the_post();	
        $post_ID = get_the_ID();	
        $post_image=wp_get_attachment_image( get_post_thumbnail_id( $post_ID ), 'landscape', false, '' );
        //get_attachment image génèrera une img en HTML, elle a besoin de l'id en argument

		$output .= '<div>';        
		$output .= 		$post_image;
		$output .= '</div>';		
		// $posts->the_post();
        // $post_title=get_the_title();
        // $post_image = get_the_post_thumbnail( 'landscape');
 

		// $output .= '<div class ="carrousel-item">'; 
        // $output .=      $post_title;	
		// $output .=      '<img src ="'. $post_image.'"></img>' ;
		// $output .= '</div>';
	}

    $output .= '</div>';

  return $output;
}
