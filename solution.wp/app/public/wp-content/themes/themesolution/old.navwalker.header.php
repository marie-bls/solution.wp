<div class="container">                
    <nav class="navbar navbar-expand-md" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="btn btn-dark dropdown-toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'main' ); ?>">
        MENU
        </button>

            <?php
            wp_nav_menu( array(
                'theme_location'    => 'main', //identifiant du menu défini dans functions.php-->
                'depth'             => 2, // profondeur du menu admise 0= no limit, 1 = no dropdowns, 2 = with dropdowns.
                'container'         => 'div', // élément conteneur, par défaut WP met une div
                'container_class'   => 'collapse navbar-collapse dropdown-menu bg-transparent border-0', // classe de cet élément
                'container_id'      => 'bs-example-navbar-collapse-1', //id de cet élément
                'menu_class'        => 'navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback', //fonction de substitution à utiliser si le menu n'existe pas
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>

    </nav>
</div>

<div class="container">                
    <nav class="navbar navbar-expand-md" role="navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="btn btn-dark dropdown-toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'main' ); ?>">
        MENU
        </button>

            <?php
            wp_nav_menu( array(
                'theme_location'    => 'main', //identifiant du menu défini dans functions.php-->
                'depth'             => 2, // profondeur du menu admise 0= no limit, 1 = no dropdowns, 2 = with dropdowns.
                'container'         => 'div', // élément conteneur, par défaut WP met une div
                'container_class'   => 'collapse navbar-collapse border-0', // classe de cet élément
                'container_id'      => 'bs-example-navbar-collapse-1', //id de cet élément
                'menu_class'        => 'navbar-nav mr-auto',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback', //fonction de substitution à utiliser si le menu n'existe pas
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
            ?>

    </nav>
</div>


<?php

//-------------------------------------------------------------------------
//------------- REGISTER CUSTOM NAVWALKER DANS FUNCTIONS---------------------
// ------------------------------------------------------------------------

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );
function bootstrap5_dropdown_fix( $atts ) {
    if ( array_key_exists( 'data-toggle', $atts ) ) {
        unset( $atts['data-toggle'] );
        $atts['data-bs-toggle'] = 'dropdown';
    }
    return $atts;
}

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // Si le fichier n'existe pas, retourne une erreur
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // S'il existe => require 
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}
?>