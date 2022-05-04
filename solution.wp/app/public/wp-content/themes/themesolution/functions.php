<?php
// ---------------------------------------------------------------------
// ---------Ajouter la prise en charge des images mises en avant-------
//----------------------------------------------------------------------

function solutiontheme_supports(){
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'solutiontheme_supports');

//-------------------------------------------------------------------------
// -----------------Définir d'autres tailles d'images----------------------
//--------------------------------------------------------------------------

function solution_new_image(){
    add_image_size('square', 540, 540, false);
    add_image_size('landscape', 2000, 800, true);
    add_image_size('miniature', 350, 350, true);

    // Définir la taille des images mises en avant
    set_post_thumbnail_size(400, 400, true);
}
add_action('init', 'solution_new_image');


// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

//--------------------------------------------------------------------
// ------------------------intégrer Bootstrap-------------------------
//--------------------------------------------------------------------

function charger_bootstrap() {
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js'
    ,array( 'jquery' ), null, true );

    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');    
}
    
add_action('wp_enqueue_scripts', 'charger_bootstrap');


//--------------------------------------------------------------------
// ------------------------emplacements menus-------------------------
//--------------------------------------------------------------------

// Déclarer le menu Bootstrap 
function solution_bootstrap_menu () { 
    register_nav_menu ( 'bootstrap-menu' , __ ( 'Bootstrap 5 Menu' )) ;  
  }
  add_action ( 'init' , 'solution_bootstrap_menu' ) ; 


  // Déclarer un emplacement de menu
register_nav_menus(array(
    'main' => 'Menu Principal', //un menu dans l'en-tête
    'footer' => 'Bas de page', //un en bas de page
    'social-menu' => 'Réseaux sociaux'
));


//-------------------------------------------------------------------
// ---------------Déclarer les scripts et les styles-----------------
//-------------------------------------------------------------------

// à l’aide des fonctions wp_enqueue_style() et wp_enqueue_script(), WP sait qu'il doit charger les styles et scripts 
// il les ajoute à une file d'attente de ressources et créera les balises <link> et <script> correspondantes sur wp_head ou wp_footer

function solution_register_assets()
{
     // Déclarer le JS
     wp_enqueue_script(
        'script', // 1er paramètre, le handle, généralement le nom du fichier (nom du thème)
        get_template_directory_uri() .'/script.js',
        array('jquery', 'bootstrap-js'), //ce tableau de dépendance permet de lister le handle des scripts qui devront être chargés avant
        // le script js sera chargé après jquery et bootstrap-js
        time(),
        true // ce booléen indique que le script sera chargé en bas de page (si true) via le wp_footer )> meilleures perfo
    );

    // Déclarer le CSS 
    wp_enqueue_style(  //la fonction wp_enqueue_style() prend 4 paramètres ; elle inscrit un fichier CSS à afficher dans la page
        'style',// le nom du fichier
        get_stylesheet_uri(), // son url si style.css est à la racine du thème
        array(),
        time() //le versionning. Ici en dév, time() évite les soucis de cache, et le n° de version changera automatiquement
        );

    // Déclarer jQuery 
    wp_enqueue_script('jquery');


}
    add_action('wp_enqueue_scripts', 'solution_register_assets');

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

//---------------------------------------------------------------------
// ----------------------Déclarer les CPT------------------------------
//--------------------------------------------------------------------

// ------------------- ** PORTFOLIO ** -----------------------

function solutionPortfolio_register_post_types()
{ //fonction qui prend plusieurs param
    //ici la déclaration exemple : Portfolio
    $labels = array( // éléments qui apparaîtront dans l'administration de WP
        'name' => 'Portfolio',
        'all_items' => 'Portfolio',  // élément affiché dans le sous menu
        'singular_name' => 'Realisation', //définir le nom au pluriel et singulier
        'add_new_item' => 'Ajouter une réalisation',
        'edit_item' => 'Modifier la réalisation',
        'menu_name' => 'Portfolio'
    );

    $args = array(
        'labels' => $labels,
        'public' => true, //dans le cas d'un thème la visibilité du CPT sera forcément publique pour être affiché
        'show_in_rest' => false,
        // Pour créer un CPT avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration
        'has_archive' => true, // est ce qu'on veut que le portfolio se comporte comme une archive (avec des single)
        'supports' => array('author','title','editor','thumbnail','excerpt'), // champs affichés dans l'interface d'admin
        'menu_icon' => 'dashicons-screenoptions',
        'rewrite' => array( 'slug' => "realisations" ), // Réecriture de l'URL
        'taxonomies' => array('category', 'post_tag'),

    );

    register_post_type('portfolio-item', $args);
    // Déclaration de la taxonomie à réaliser dans celle du CPT

}
add_action('init', 'solutionPortfolio_register_post_types');

// ----------------------- ** ATOUTS AGENCE ** -----------------------

function solutionAtouts_register_post_types()
{ 
    $labels = array( 
        'name' => 'Atouts',
        'all_items' => 'Atouts',  
        'singular_name' => 'Atout', 
        'add_new_item' => 'Ajouter un atout',
        'edit_item' => 'Modifier',
        'menu_name' => 'Atouts'
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-star-filled',
        'public' => true,
        'show_in_rest' => false,
        // Pour créer un CPT avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration
        'has_archive' => true, // est ce qu'on veut que ce CPT se comporte comme une archive (avec des single)
        'supports' => array('author','title','editor','thumbnail'), // champs affichés dans l'interface d'admin
    );

    register_post_type('atout-item', $args);

}
add_action('init', 'solutionAtouts_register_post_types');



// --------------------------- ** CARDS ** ---------------------------
function solutionCards_register_post_types()
{ 
    $labels = array( 
        'name' => 'Cards',
        'all_items' => 'Cards',  
        'singular_name' => 'Card', 
        'add_new_item' => 'Ajouter une card',
        'edit_item' => 'Modifier',
        'menu_name' => 'Cards'
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-category',
        'public' => true, 
        'show_in_rest' => false,
        'has_archive' => true, 
        'supports' => array('title','editor'),
    );
    

    register_post_type('card-item', $args);

}
add_action('init', 'solutionCards_register_post_types');


// ----------------------- ** TEMOIGNAGES ** -----------------------

function solutionTémoignages_register_post_types()
{ //fonction qui prend plusieurs param
    //ici la déclaration 
    $labels = array( // éléments qui apparaîtront dans l'administration de WP
        'name' => 'Témoignages',
        'all_items' => 'Témoignages',  // élément affiché dans le sous menu
        'singular_name' => 'Témoignage', //définir le nom au pluriel et singulier
        'add_new_item' => 'Ajouter un témoignage',
        'edit_item' => 'Modifier',
        'menu_name' => 'Témoignages'
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
        'public' => true, //dans le cas d'un thème la visibilité du CPT sera forcément publique pour être affiché
        'show_in_rest' => false,
        // Pour créer un CPT avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration
        'has_archive' => false, // est ce qu'on veut que le portfolio se comporte comme une archive (avec des single)
        'publicly_queryable' => true, //Cet attribut permet de s’assurer que lors d’une requête (par exemple une recherche) le type de champ peut-être inclus dans la recherche.
    );

    register_post_type('temoignage-item', $args);

}
add_action('init', 'solutionTémoignages_register_post_types');


// ----------------------- ** SLIDER CLIENTS ** -----------------------

function solutionSlider_register_post_types()
{ //fonction qui prend plusieurs param
    //ici la déclaration 
    $labels = array( // éléments qui apparaîtront dans l'administration de WP
        'name' => 'Slider Clients',
        'all_items' => 'Logos',  // élément affiché dans le sous menu
        'singular_name' => 'Logo', //définir le nom au pluriel et singulier
        'add_new_item' => 'Ajouter un logo',
        'edit_item' => 'Modifier',
        'menu_name' => 'Slider Cients'
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-slides',
        'supports' => array('title','thumbnail'),
        'public' => true, //dans le cas d'un thème la visibilité du CPT sera forcément publique pour être affiché
        'show_in_rest' => false,
        // Pour créer un CPT avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration
        'has_archive' => false, // est ce qu'on veut que le portfolio se comporte comme une archive (avec des single)
    );

    register_post_type('slider-item', $args);

}
add_action('init', 'solutionSlider_register_post_types');

// ----------------------- ** CARROUSEL EN-TETE ** -----------------------

function solutionCarrousel_register_post_types()
{ //fonction qui prend plusieurs param
    //ici la déclaration 
    $labels = array( // éléments qui apparaîtront dans l'administration de WP
        'name' => 'Carrousel',
        'all_items' => 'Images',  // élément affiché dans le sous menu
        'singular_name' => 'Image', //définir le nom au pluriel et singulier
        'add_new_item' => 'Ajouter une image',
        'edit_item' => 'Modifier',
        'menu_name' => 'Carrousel'
    );

    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-welcome-view-site',
        'supports' => array('title','thumbnail'),
        'public' => true, //dans le cas d'un thème la visibilité du CPT sera forcément publique pour être affiché
        'show_in_rest' => false,
        // Pour créer un CPT avec l’éditeur visuel Gutenberg, il faut ajouter le paramètre show_in_rest à true dans sa déclaration
        'has_archive' => false, // est ce qu'on veut que le portfolio se comporte comme une archive (avec des single)
    );

    register_post_type('carrousel', $args);

     // enregistrement des google fonts
     wp_enqueue_style('$fontstyle', 'https://fonts.googleapis.com/css2?family=Ultra&display=swap&family=Montserrat&display=swap', array(), null, 'all');
}
add_action('init', 'solutionCarrousel_register_post_types');



//----------------------------------------------------------------------
// --------------- Bibliothèques d'icînes Font Awesome -----------------
//----------------------------------------------------------------------

function solution_enqueue_icon_stylesheet() {
	wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'solution_enqueue_icon_stylesheet' );

