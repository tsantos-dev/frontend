<?php 
/* Template Name: Single */
get_header();
?>
<main class="single-content">
    <div class="container">
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
            <div class="col-8"><?php the_content() ?></div>
            <div class="col4"></div>
        </div>
    </div>
</main>

<?php
get_footer();
?>