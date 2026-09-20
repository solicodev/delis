<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

$search_enabled = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>
    <section id="section-eror">
        <div class="container">
            <div class="row justify-content-between align-items-center h-100">
                <img class=" bg-mobile d-block d-md-none img-fluid " src="<?php echo get_template_directory_uri() ?>/assets/images/ERROR12.svg"
                     alt="">
                <div class="col-12 col-lg-3 order-last order-lg-first">
                    <div class="hero-text  text-end  align-items-center mt-4">
                        <div class="logo-text position-relative ">
                            <img class="bg-logo d-none d-md-block " src="<?php echo get_template_directory_uri() ?>/assets/images/ERROR12.svg"
                                 alt="">

                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/oops.png" alt="" class="img-fluid oops-bg">
                        </div>
                        <p class="subtitle">این صفحه<br> گم شده ....</p>
                        <p>برگرد تا دسرهای خوشمزه رو از دست ندی.</p>
                        <div class="mt-4 ">
                            <a href="<?php echo home_url('products'); ?>" class="delis-btn ">دسرهای دلیس</a>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 position-relative">
                    <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/Group503.png" alt="" class="desert-bg img-fluid d-none d-md-block">
                    <div class="tv-container position-relative">

                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group187.png"
                             class="img-fluid tv-frame" alt="TV">
                        <div class="tv-screen position-absolute">
                            <video id="resVideo" autoplay loop muted playsinline>
                                <source src="<?php echo get_template_directory_uri(); ?>/assets/video/eror.mp4"
                                        type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
<div class="col-lg-2"></div>
            </div>
        </div>
    </section>
<?php
get_footer();
