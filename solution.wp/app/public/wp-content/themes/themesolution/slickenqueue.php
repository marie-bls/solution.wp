<?php
// ================à mettre dans functions.php====================

// Les fichiers CSS et JS nécessaires au fonctionnement de Slick
    wp_register_style('slick-css', get_template_directory_uri() .'/css/slick.css');
    wp_register_style('slick-theme-css', get_template_directory_uri() .'/css/slick-theme.css');
    wp_enqueue_script('jquery-min-js', get_template_directory_uri().'/js/jquery-1.11.0.min.js', array(), '1.11.0');		
    wp_enqueue_script('slick-min-js', get_template_directory_uri().'/js/slick.min.js');		

    // Le Custom JS où le slick est initialisé)
    wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom-js.js', array(), '1.0.0');

    // Mise en queue des fichiers CSS & JS 
    wp_enqueue_style('slick-css');
    wp_enqueue_style('slick-theme-css');
    wp_enqueue_script('jquery-min-js');
    wp_enqueue_script('slick-min-js');