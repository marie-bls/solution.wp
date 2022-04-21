
<?php

get_header(); ?>


<?php
// Contrôler si ACF est actif
if ( !function_exists('get_field') ) return;
?>

<?php
$args = array(
    'post_type' => 'temoignage-item', //filtre par type de publication (post ici mais ça peut être page ou CPT ) 
    'posts_per_page' => -1, // si je veux tous les articles
    'order' => 'ASC', // par ordre ascendant ou descendant (ici ordre chronologique du + récent au + ancien)
    'orderby' => 'date', // sur quelle donnée faire le tri : title, date, comment_count…
    // basé sur ACF :
    'meta_key' => 'titre_temoignage', // C'est ici qu'on indique quel champ
);

// 2. On exécute la WP Query
$my_query = new WP_Query( $args ); //le new lance la requête avec les arguments en paramètres

// 3. On lance la boucle !
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
the_field('titre_temoignage') ;   
the_field('auteur_temoignage');
the_field('poste'); 
the_field('texte_temoignage');

endwhile;
endif;

// 4. On réinitialise à la requête principale (important) pour revenir à la boucle principale de WP 
//pour revenir aux données originales de la page
wp_reset_postdata();

echo $my_query->found_posts . " articles trouvés"; //pour afficher le nombre de résultats trouvés 
?>



<?php get_footer(); ?>