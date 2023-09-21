<?php 
/* Template Name: Single */
get_header();
?>
<main class="single-content">
    <div class="container rounded-2">
        <div class="row">
            <div class="col-8">
                <figure>
                    <?php the_post_thumbnail('thumb_695x475', array('class' => 'img-featured'))?>
                </figure>
            </div>
            <div class="col-4">
                <h2 class="post-title"><?php the_title() ?></h2>
                <?php if(has_excerpt()) :?>
                <h6<?php the_excerpt()?></h6>
                <?php endif ?>
                <p class="link"><a href="http://"></a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-8 content-text"><?php the_content() ?></div>
            <div class="col4">
                <?php 

                $get_geolocalization = get_post_meta(get_the_ID(), 'meta-geolocation', true);
               
                
                if(isset($get_geolocalization) && $get_geolocalization !== '') { ?>
                

                    <iframe
                    width="100%"
                    height="300"
                    frameborder="0" style="border:0"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/view?key=<?php echo $key; ?>&center=<?php echo $get_geolocalization; ?>&zoom=16&maptype=roadmap"
                    allowfullscreen>
                    </iframe>

                    
                <?php }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>