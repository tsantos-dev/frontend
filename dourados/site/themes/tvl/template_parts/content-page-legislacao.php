<div class="timeline">
    <ul>
        <?php

        $custom_terms = get_terms('ano',array(
            'orderby' => 'name',
            'order' => 'DESC'));

        foreach($custom_terms as $custom_term) {
            wp_reset_query();
            $args = array(
                'post_type' => 'leis',
                'orderby'   => 'name',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'ano',
                        'field' => 'slug',
                        'terms' => $custom_term->slug,
                    ),
                ),
             );
        
             $loop = new WP_Query($args);
             if($loop->have_posts()) {
                echo '<li><div class="time">';
                echo '<span>'.$custom_term->name.'</span>';
                echo '</div><ol>';
        
                while($loop->have_posts()) : $loop->the_post();
                    echo '<li>';
                    echo '<figure>';
                    if(has_post_thumbnail(  )){
                        the_post_thumbnail( );
                    }else{
                        echo '<img src="'. TVL_IMAGES_URL .'icon_ph.jpg" />';
                    };
                    // echo '<figcaption>Teste de legenda</figcaption>';
                    echo '</figure>';                    
                    echo '<div class="content">';
                    echo '<h3>'.get_the_title().'</h3>';
                    echo '<p>'.get_the_excerpt().'</p>';
                    ?>
                    <?php 
                    $metas = get_post_meta( get_the_ID(), 'link' ); 
                    foreach($metas as $meta){
                        echo ' <small><a href="'.$meta.'" class="btn btn-info py-1 px-2" target="_blank">saiba mais</a></small>';
                    }
                    ?>
                    <!-- <small><a href="<?php //pdf_file_url(); ?>" class="btn btn-info py-1 px-2">saiba mais</a></small> -->
                <?php
                    // echo '<small><a href="" class="btn btn-info py-1 px-2"> saiba mais </a></small>';
                endwhile;
                echo '</li></ol></li>';
             }
        }
        ?>

        <!-- <li>      
            <div class="time">
                <span>1984</span>
            </div>
            <ol>
                <li>
                    <div class="content">
                        <h3>Lei nº 1.293/1984</h3>
                        <p>
                        "Tomba para o patrimônio histórico de Dourados as figueiras da Rua Aniz Rasslen e Albino Torraca". A figueira da Albino Torraca não existe mais.
                        </p>
                    </div>
                </li>
            </ol>     
        </li>
        <li>      
            <div class="time">
                <span>1985</span>
            </div>
            <ol>
                <li>
                    <div class="content">
                        <h3>Lei nº 75/1985</h3>
                        <p>
                        (decreto municipal) Ficam tombados para o patrimônio histórico de Dourados doze figueiras localizadas na Rua João Cândido Câmara, dezessete figueiras na Av. Presidente Vargas e nove figueiras na Rua João Rosa Góes (entre Joaquim Teixeira Alves e Cuiabá).
                        </p>
                    </div>
                </li>
            </ol>     
        </li>
        <li>      
            <div class="time">
                <span>1987</span>
            </div>
            <ol>
                <li>
                    <div class="content">
                        <h3>Lei nº 1.443/1987</h3>
                        <p>
                        "Fica tombado para o patrimônio histórico municipal o 'Cruzeiro', marco do início do N. C. D (Núcleo Colonial de Dourados)"".
                        </p>
                    </div>
                </li>
            </ol>     
        </li> -->
    </ul>
</div>