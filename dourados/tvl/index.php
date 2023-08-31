<?php 
/* Template Name: Homepage */
get_header();
?>
    <main class="home">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0">
                        <h2 class=""><span>Sobre o projeto</span></h2>
                        <p><?php bloginfo( 'description' ) ?></p>
                        <div class="card-footer">saiba mais</div>
                    </div>
                </div>
                <?php get_template_part( 'template_parts/content', 'card' ); ?>
                <!-- <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image: url(https://cdn6.campograndenews.com.br/uploads/noticias/2020/03/10/22ob14jhq468o.jpg)";>
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit amet consecquour</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image:url();">
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image:url();">
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image:url();">
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image:url();">
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
                    <div class="card rounded-0 border-0" style="background-image:url();">
                        <h2 class="card-title fs-5 text"><span>Lipsum dolor sit</span></h2>
                    </div>
                </div> -->
                
            </div>
        </div>
    </main>
<?php
get_footer();
?>