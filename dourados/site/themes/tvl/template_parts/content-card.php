<div class="col-xl-3 col-md-6 col-sm-12 mx-0 px-0">
    <a href="<?php the_permalink()?>">
    <?php if(has_post_thumbnail( )) : ?>
        <div class="card rounded-0 border-0" style='background-image: url("<?php the_post_thumbnail_url()?>"); background-size:cover;'>
    <?php else : ?>
        <div class="card rounded-0 border-0" style='background-image: url("<?php echo TVL_IMAGES_URL .'icon_ph.jpg' ?>"); background-size:contain; background-repeat:no-repeat; background-position:center; filter: opacity(0.5);'>
    <?php endif ?>
        <h2 class="card-title fs-5 text"><span><?php the_title(); ?></span></h2>
    </div>
    </a>
</div>