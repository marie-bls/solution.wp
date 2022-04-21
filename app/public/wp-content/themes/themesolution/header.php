<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--définit la langue du document en fonction du réglage WP-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--définit l'encodage UTF-8-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- utilisation de balise meta pour que le contenu s'adapte à la fenêtre d'affichage-->
    <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    
    <?php wp_head(); ?>
    <!-- par cette fonction, WP, le thème et les extensions vont déclarer le chargement des scripts et des styles -->
</head>

<body <?php body_class(); ?>>
    <!-- permet d’obtenir des noms de classe CSS en fonction de la page visitée -->


    <header class="header">
<!------------------------------------ logo cliquable-------------------------------------------------------->

        <a id="logo" href="<?php echo home_url('/'); ?>">
            <!-- il est cliquable par la fonction home_url()-->
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
            <!-- get_template_directory_uri() permet d’obtenir l’adresse absolue (c’est-à-dire complète) du logo -->
        </a>

<!-------------------------------------- CARROUSEL ---------------------------------------------------------->


        <div id="carouselDark" class="carousel carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/header1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/header2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/header3.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>


<!-------------------------------------- bouton buzzwatch ---------------------------------------------------------->

<button type="button" class="btn btn-dark btn-buzz"><a href="https://www.buzzwatch.fr/">BUZZWATCH</a></button>
<button type="button" class="btn btn-light btn-menu">MENU</button>

<!-------------------------------------- MENUS SOCIAL + PRINCIPAL ---------------------------------------------------------->

        <?php wp_nav_menu(
            array(
                'theme_location' => 'main', //emplacement du menu enregistré dans functions wp_register_nav, le slug main correspond au menu principal-->
                'container' => 'ul', // afin d'éviter d'avoir une div autour car WP ajoute tjs une div , j'enveloppe mon élément d'une ul
                'menu_class' => 'site__header__menu', // classe CSS à utiliser pour l'élément ul 
            )
        );
        ?>

        <?php wp_nav_menu(
            array(
                'theme_location' => 'social-menu',
                'container' => 'ul', // afin d'éviter d'avoir une div autour car WP ajoute tjs une div , j'enveloppe mon élément d'une ul
                'menu_class' => 'socialMenu', // classe CSS à utiliser pour l'élément ul 
            )
        );
        ?>

 

    </header>


    <?php wp_body_open(); ?>
    <!--permettre à des extensions d’écrire du code au début du body (Yoast par exemple pour le Google Tag Manager-->

</body>

</html>