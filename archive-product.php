<?php
/**
 * The Template for displaying Archive pages.
 */

get_header();
?>
    <section id="product-grid">
        <div class="container">
            <div class="title-group">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-products.png">
                <h1 class="page-title">
                    محصولات دلیس
                </h1>
            </div>
            <?php
            if (have_posts()) :
                ?>

                <div class="row d-none d-lg-flex">
                    <?php
                    while (have_posts()) : the_post(); ?>
                        <div class="col-4 mb-4">
                            <?php echo get_template_part('template/product', 'loop'); ?>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
                <div id="archive-slider" class="swiper d-lg-none">
                    <div class="swiper-wrapper">
                        <?php while (have_posts()):the_post(); ?>
                            <div class="swiper-slide">
                                <?php get_template_part('template/product', 'loop'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php
            else :
                // 404.
                get_template_part('template/content', 'none');
            endif;

            wp_reset_postdata(); // End of the loop.
            ?>
        </div>
    </section>
    <section id="decorative">

    </section>
    <section id="about">
        <div class="about-us position-relative">
            <div class="container">
                <div class="row justify-content-between align-content-start">
                    <div class="col-lg-5">
                        <div class="title-group ">
                            <h2>دلیس یعنی دسر</h2>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/title-about.png"
                                 class="yellow-heart">
                        </div>
                        <p>
                            اینجاییم تا میان‌وعده‌هاتون رو خوش‌طعم‌تر کنیم. از کرم‌دسرها و میلک‌شیک‌های آماده تا دسرهای
                            لایه‌ای و خنک، یک دنیا انتخاب جذاب پیش روی شماست.
                        </p>
                        <p>
                            دلیس همیشه دنبال ساختن لحظه‌های کوچک اما لذیذه؛ با طعم‌هایی که هم راحت سرو می‌شن و هم یه
                            هیجان نرم و خوشایند به روزتون اضافه می‌کنن.
                        </p>
                        <a href="#" class="delis-btn mt-4"> ماجراجویی بیشتر</a>

                    </div>
                    <div class="col-lg-7 text-start">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group212.svg"
                             class="girl d-none d-lg-block"
                             alt="">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group17.png"
                             class="img-fluid"
                             alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php
get_footer();
