<?php wp_footer(); ?>
<!-- permet d'afficher des scripts (et styles) en bas de page-->
<div class="footer">
    <div class="nav_footer">
        <?php wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => 'ul',
                'menu_class' => 'site__footer__menu'
            )
        ); ?>
    </div>

    <div class="logo_footer">

        <a id="logo" href="<?php echo home_url('/'); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo">
        </a>

    </div>

    <div class="contact_footer">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <a href=" <?php echo get_permalink(7570); ?>"><?php echo get_the_title(7570); ?></a>

        <?php endwhile;
        endif; ?>
    </div>

    <div class="leg">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <a href=" <?php echo get_permalink(3); ?>"><?php echo get_the_title(3); ?></a>

        <?php endwhile;
        endif; ?>
    </div>
</div>

</body>

</html>

<!-- le CSS qui va avec 
/* 
.footer{
    background-color: rgb(59, 59, 59) !important;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 180px 80px;
    width: 100%;
    margin: auto;
    justify-items: center !important;
    align-items: center !important;
    margin-bottom: 0 ;
}

.site__footer__menu li a{
    color: #fff;
    text-decoration: none;
}

.nav_footer{
    display: grid;
    grid-column: 1 ;
    grid-row:1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.logo_footer{
    grid-row :1;
    grid-column: 2;
    display: flex;
    flex-direction: column;
    justify-content: center;
} */ -->