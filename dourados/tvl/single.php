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
                <h6><?php the_excerpt() ?></h6>
                <?php endif ?>

                <p class="link">
                    <small>
                        <a href="<?php pdf_file_url(); ?>" class="btn btn-info py-1 px-2" target="_blank">Baixar legislação</a>
                    </small>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-8 content-text"><?php the_content() ?></div>
            <div class="col-4">
                <?php 

                $get_geolocalization = get_post_meta(get_the_ID(), 'meta-geolocation', true);
                // Para google maps
                // $key = 'AIzaSyDewSEmmXb0t89G2Hd9sMoOYG2-DFydZ9s';
                
                if(isset($get_geolocalization) && $get_geolocalization !== '') { ?>

                    <div id="map"></div>

                    <script>
                        var map = L.map('map').setView([<?php echo $get_geolocalization?>], 16);

                        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                        var marker = L.marker([<?php echo $get_geolocalization?>]).addTo(map);
                        // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
                    </script>
                
                
                    <!-- ### Para google maps

                    <iframe
                    width="100%"
                    height="300"
                    frameborder="0" style="border:0"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/view?key=<?php //echo $key; ?>&center=<?php //echo $get_geolocalization; ?>&zoom=16&maptype=roadmap"
                    allowfullscreen>
                    </iframe>
                    
                    -->
                
                    

                    
                <?php }else{
                    echo '<p class="alert">Nenhuma geolocalização cadastrada.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>