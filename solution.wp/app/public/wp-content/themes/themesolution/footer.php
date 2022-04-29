<?php wp_footer(); ?>
<!-- permet d'afficher des scripts (et styles) en bas de page-->
      

            <!-- Footer -->
            <footer class="footer text-center">
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
                                    CONTACT
                                </h6>
                                <p><i class="me-3"></i> 1, rond-point de Flotis</p>
                                <p><i class="me-3"></i> Bâtiment 1, 1er étage</p>
                                <p><i class="me-3"></i> 31240 SAINT JEAN</p>

                                <p><i class="me-3"></i> 05 67 20 20 00</p>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </div>
                

                <!-- Mentions légales -->
                <div class="legales text-center p-4" >
                    
                    <a href=" <?php echo get_permalink(3); ?>"><?php echo get_the_title(3); ?></a>

                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
           
           
    </body>

</html>