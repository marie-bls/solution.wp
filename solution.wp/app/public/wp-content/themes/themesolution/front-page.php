<!-- c'est ce fichier qui s'affichera lorsque la page d'accueil sera appelée -->

<?php get_header(); ?>
<section>

<!---------------------------------------- TITRE ------------------------------------------------>

    <div class="case-study">
        <h1>Case study</h1>
    </div>

<!--------------------------- WP QUERY BLOC PORTFOLIO----------------------------------------------->
<!--------------------------- CUSTOM POST TYPE "PORTFOLIO"------------------------------------------->


    <?php
    $args = array(
        'post_type' => 'portfolio-item',
        'showposts' => 5,
        'order' => 'DESC',
    );

    $my_query = new WP_Query($args);
    $count = 0; ?>


    <div class="portfolio">
        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                $count++; ?>
                <div>
                    <div class="image-portfolio">
                        <?php
                        if ($count == 3) {
                            the_post_thumbnail('landscape');
                        } else {
                            the_post_thumbnail('square');
                        }
                        ?>
                    </div>

                    <div class="titre-portfolio">
                        <h5 class="text-uppercase" ><?php the_title(); ?> /  </h5>
                        <p> <?php the_excerpt();?></p>
                    </div>
                </div>

        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>
<!----------------------------- CTA + Séparateur -------------------------------------------->


    <div class="btn-rea-white">
        <a href="<?php echo get_permalink(7517); ?>">NOS REALISATIONS</a>
    </div>

    <div class="separateur"></div>

<!------------- WP QUERY BLOC "vous avez trouvé la bonne agence---------------------------------->
<!--------------------------- CUSTOM POST TYPE "ATOUTS"------------------------------------------->

    <?php
    $args = array(
        'post_type' => 'atout-item',
        'showposts' => 3,
        'order' => 'ASC',
    );

    $my_query = new WP_Query($args);
    $count = 0; ?>

    <div class="atouts">

        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                $count++; ?>

                <?php
                if ($count == 1) { ?>

                    <div class="content-atout1">
                        <h1>Vous avez trouvé la bonne agence de communication si...</h1>
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                        <div class="btn-atout">
                            <a href="<?php echo get_permalink(7517); ?>" >NOUS CONTACTER</a>
                        </div>
                    </div>


                    <div class="image-atout1">
                        <?php the_post_thumbnail('full'); ?>
                    </div>

                <?php
                } ?>


                <?php
                if ($count == 2) { ?>
                    <div class="image-atout2">
                        <?php the_post_thumbnail('large'); ?>
                    </div>

                    <div class="content-atout2">
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                        
                        <div class="btn-atout">
                        <a href="<?php echo get_permalink(7517); ?>" >NOS REALISATIONS</a>
                        </div>

                    </div>

                <?php
                } ?>


                <?php
                if ($count == 3) { ?>

                    <div class="content-atout3">
                        <h4><?php {
                                the_title(); ?></h4>
                        <?php the_content(); ?>
                        <div class="btn-atout">
                        <a href="<?php echo get_permalink(7517); ?>" >NOTRE EQUIPE</a>
                        </div>
                    </div>

                    <div class="image-atout3">
                        <?php the_post_thumbnail('full'); ?>
                    </div>

                <?php
                            } ?>


    <?php }
            endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>

    <div class="separateur"></div>

<!----------------------------- WP QUERY BLOC TEMOIGNAGES--------------------------------------------->
<!--------------------------- CUSTOM POST TYPE "TEMOIGNAGES"------------------------------------------->
<!----------------------------- + utilisation de Custom fields---------------------------------------->


    <?php
    $args = array(
        'post_type' => 'temoignage-item',
        'showposts' => 2,
        'order' => 'DESC',
    );

    $my_query = new WP_Query($args);
    $count = 0; ?>


    <div class="temoignages">

        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

                $count++; ?>

                <?php
                if ($count == 1) { ?>

                    <div class="tem1">

                        <h1>Témoignages</h1>
                        <h4><?php the_field('auteur_temoignage'); ?></h4> <!--utilisation de custom fields-->
                        <h4><?php the_field('poste'); ?></h4>

                        <?php the_field('texte_temoignage'); ?>
                    </div>

                <?php
                } else { ?>

                    <div class="tem2">
                        <h4> <?php the_field('auteur_temoignage'); ?><h4>
                                <h4><?php the_field('poste'); ?></h4>
                                <?php the_field('texte_temoignage'); ?>
                    </div>

                <?php
                }
                ?>

        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>

    <div class="btn-tem">
        <a href="<?php echo get_permalink(7605); ?>">NOS TEMOIGNAGES</a> <!--redirection avec fonction native de WP qui récupère l'id de la page visée-->
    </div>

    
    <div class="separateur"></div>

<!----------------------- WP QUERY BLOC "Ce qui nous rend différents---------------------------------->
<!--------------------------- CUSTOM POST TYPE "CARDS"------------------------------------------->


    <div class="diff">
        <h1>Ce qui nous rend (vraiment) différents</h1>
        <h4>Il existe plus de 18 000 agences de communication en France. Sans compter les dizaines de milliers de freelances.</h4>
        <h4>ALORS POURQUOI TRAVAILLER AVEC NOTRE AGENCE?</h4>
    </div>

    <?php
    $args = array(
        'post_type' => 'card-item',
        'showposts' => 4,
        'order' => 'ASC',
    );

    $my_query = new WP_Query($args); ?>


    <div class="cards card-group">
        
        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();?>
                
                <div class="card text-white bg-black mb-3" style="max-width: 18rem;">
                
                    <div class="card-body">

                        <h4 class="card-title text-uppercase">
                            <?php the_title();?>                            
                        </h4>
                        
                        <p class="card-text"><?php the_content(); ?> </p>
                                            
                    </div>     
                    
                    <div class="foot-card">
                        <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">NOS TEMOIGNAGES</a>
                    </div>
                                                    
                </div>                                
        
        <?php endwhile;
        endif;?>
       
        <php wp_reset_postdata(); ?>

    </div>

    <div class="separateur"></div>

    <div class="actus">
        <h1>Actus</h1>
    </div>
<!---------------------------------------------------------------------------------------->
<!------------------------------ WP QUERY BLOC "ACTUS""---------------------------------->
<!---------------------------------------------------------------------------------------->

<div class="bloc-actus card-group">
    <?php
        $actus = new WP_Query();
        $actus->query('showposts=3');
    ?>
    <?php while ($actus->have_posts()) : $actus->the_post(); ?>

        <div class="card text-white bg-black" >

            <div class="card-img-top">
                <?php the_post_thumbnail('miniature'); ?> 
            </div>
            

            <div class="card-body content-actu">
                <p class="text-danger"><?php the_time(get_option('date_format'));?></p>
                <h5 class ="card-title titre-actu"><?php the_title();?> </h5>
                <p class="card-text">
                <?php the_content();?>
            </p> 
            </div>
        
            <div class ="lien-actu">
                <h6 class="font-weight-bold"> <a href="<?php the_permalink() ?>">LIRE + </a></h6>
            </div>

        </div>
        
            
    <?php endwhile; ?>

</div>

</section>

<!---------------------------------------------------------------------------------------->
<!------------------------------ LE SLIDER LOGO CLIENTS---------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
    $args = array(
        'post_type' => 'slider-item',
        'showposts' => -1, //permet d'avoir tous les logos
        'order' => 'DESC',
    );

    $my_query = new WP_Query($args);
    $count = 0; ?>


    
    <div id="carouselDark" class="carousel carousel slide slider-logos" data-bs-ride="carousel">

        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                $count++; ?>
        
            <div class="carousel-inner">

            <?php
            if ($count >=1 && $count <=5) { ?>

                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="<?php the_field('logo_client');?>" alt="" class="d-block w-100">
                </div>

            <?php 
            } 
            else if 
            ($count >5 && $count <= 10)
            {?>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="<?php the_field('logo_client');?>" alt="" class="d-block w-100">
                </div>

            <?php } ?>
                
            </div>


        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>


<!------------------------------------------------------------------------------------------>
    



    <?php
    get_footer(); ?>
