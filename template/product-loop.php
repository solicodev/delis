<div class="archive-card d-flex flex-column justify-content-end align-items-center <?php echo $post->post_name; ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" class="card-logo">
    <svg class="bilbilak" xmlns="http://www.w3.org/2000/svg" width="68" height="44" viewBox="0 0 68 44" fill="none">
        <path d="M23.9561 31.3333C38.4728 30.1721 37.9539 35.2662 41.3784 40.4046C41.9477 41.2587 43.9043 40.524 43.9943 39.5015C44.7796 30.5765 46.3215 9.28275 23.9562 6.16845C-0.995814 2.69396 -5.34698 33.6773 23.9561 31.3333Z"
              fill="#FFCD00"/>
        <path d="M61.1978 28.4621C56.6675 31.2885 55.1988 34.4852 54.4641 37.7191C54.2367 38.72 52.0434 39.3409 51.407 38.5355C48.5099 34.869 44.7637 28.1891 50.8756 19.9592C58.5307 9.65128 73.9089 20.5315 61.1978 28.4621Z"
              fill="#FFCD00"/>
        <path d="M47.0747 2.60357C40.0298 3.29275 40.1776 10.475 45.5433 19.8099C45.8821 20.3993 46.6994 20.4673 47.1096 19.9251C52.3238 13.0317 55.036 1.82475 47.0747 2.60357Z"
              fill="#FFCD00"/>
    </svg>
    <div class="card-cat-name">
        <?php echo get_field('english_name',get_the_ID()); ?>
    </div>
    <div class="card-image">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>"
             class="d-block mx-auto img-fluid">
    </div>
    <div class="card-product-name">
        <?php echo get_the_title(); ?>
    </div>
    <a href="<?php echo get_the_permalink(); ?>" class="stretched-link z-3"></a>
</div>
