<?php 
/* Template Name: Page */
get_header();
?>
<main class="page-content">
    <div class="container rounded-2">
        <div class="row">
            <div class="col-9 mx-auto">
                <h2><?php the_title( ) ?></h2>
                <?php the_content( ) ?>

                <?php
                if(is_page('legislacao')) : ?>
                    
                    <?php get_template_part( 'template_parts/content', 'page-legislacao' ); ?>

                <?php endif ?>

            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>