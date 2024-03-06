<?php 
/* Template Name: Single */
get_header();
?>
<main class="single-content">
    <div class="container rounded-2">
        <div class="row">
            <div class="col-8">
                <h2 class="post-title"><?php the_title() ?></h2>
                <?php if(has_excerpt()) : ?>
                    <h6><?php the_excerpt(); ?></h6>
                <?php endif ?>
                <p class="link">arquivo:</p>
                <p class="link">
                    <small>
                        <a href="<?php pdf_file_url(); ?>" class="btn btn-info py-1 px-2">My PDF File</a>
                    </small>
                </p>
            </div>
            <div class="col-4">
                <figure>
                    <?php the_post_thumbnail('thumb_695x475', array('class' => 'img-featured'))?>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-8 content-text"><?php the_content() ?></div>
            <div class="col-4">
                <p>Outras leis</p>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>