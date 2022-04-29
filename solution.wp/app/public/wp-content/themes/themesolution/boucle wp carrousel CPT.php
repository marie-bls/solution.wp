<?php
        $args = array(
            'post_type' => 'carrousel',
            'showposts' => -1,
        );

        $my_query = new WP_Query($args); 
        ?>


        <div class="posts-carousel px-5">
            <?php
            if ($my_query->have_posts()) :
                while ($my_query->have_posts()) :
                    $my_query->the_post();
            ?>
                    <div class="img-carrousel">
                        <?php the_post_thumbnail('landscape'); ?>
                    </div>
        </div>
<?php
                endwhile;
            endif;
            wp_reset_postdata();
?>