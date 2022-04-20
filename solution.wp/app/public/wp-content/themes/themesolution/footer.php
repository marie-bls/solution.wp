<?php wp_footer(); ?>
<!-- permet d'afficher des scripts (et styles) en bas de page-->
      

            <!-- Footer -->
            <footer class="footer text-center bg-dark">
                <!-- Section: Social media -->
               
                <!-- Section: Links  -->
                <div class="">
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row">
                            <!-- Grid column -->
                            
                            <!-- Grid column -->
                            <div class="nav_footer col-md-4 ">
                                <!-- Links -->
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer',
                                        'container' => 'ul',
                                        'menu_class' => 'site__footer__menu'
                                    )
                                ); ?>
                               
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 text-center">
                                <a id="logo-footer" href="<?php echo home_url('/'); ?>">
                                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo"> -->
                                    <img src="http://solution.wp/wp-content/uploads/2019/09/icon-LaSolution-black.png" alt="logo" id="logoblack">
                                </a>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 contact">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Contact
                                </h6>
                                <p><i class="me-3"></i> Adresse</p>
                                <p>
                                    <i class="me-3"></i>
                                    info@example.com
                                </p>
                                <p><i class="me-3"></i> + 01 234 567 88</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </div>
                

                <!-- Mentions légales -->
                <div class="legales text-center p-4" >
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <a href=" <?php echo get_permalink(3); ?>"><?php echo get_the_title(3); ?></a>

                    <?php endwhile;endif?>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
     
    </body>

</html>