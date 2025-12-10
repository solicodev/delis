<?php
get_header();

$products = get_posts(
    array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    )
);
?>
<section id="hero">
    <div class="container">
        <div class="row justify-content-between align-items-center h-100">
            <div class="col-12 col-lg-4 order-last order-lg-first">
                <div class="hero-text  text-end  align-items-center position-relative">
                    <h1 class="logo-text  d-none d-sm-block ">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Logo.png" alt="">
                    </h1>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector15.svg"
                         class="heart d-none d-lg-block"
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector24.svg"
                         class="dotted-line d-none d-lg-block"
                         alt="">
                    <p class="subtitle">... دِلم می‌خواد</p>
                    <div class="mt-4 d-flex gap-3">
                        <a href="#" class="delis-btn secondary">دسرهای دلیس</a>
                        <a href="#" class="delis-btn">قصه‌ی دلیس</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector26.svg" class="dotted-line "
                     alt="">

                <div class="tv-container position-relative">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group183.png"
                         class="img-fluid tv-frame" alt="TV">

                    <div class="tv-screen position-absolute">
                        <video id="resVideo" autoplay loop muted playsinline>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/IMG_7042.mp4"
                                    type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-group">
                    <h2>دسرهای دلیس</h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-products.png"
                         class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-lg-6">
                <div class="row horizontal-scroll">
                    <?php
                    $i = 1;
                    foreach ($products as $category) :
                        $cat = get_the_post_thumbnail_url($category->ID, 'large');
                        ?>
                        <div class="col col-lg-4 mb-4">
                            <div class="select-category <?php echo $i == 1 ? 'selected' : '' ?>"
                                 data-id="<?php echo $category->ID; ?>">
                                <span><?php echo $category->post_title; ?></span>
                                <img class="mx-auto d-block img-fluid" src="<?php echo $cat; ?>"
                                     alt="<?php echo $category->post_title; ?>">
                            </div>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>
                <div class="d-none d-lg-flex justify-content-center">
                    <a href="#" class="delis-btn mt-4">همه‌ی دسرها</a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div id="product-slider">
                    <div id="product-loader" class="d-none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="swiper product-swiper h-100">
                        <div id="product-wrap" class="swiper-wrapper">
                            <?php $i = 1;
                            foreach ($products as $product) :
                                $terms = get_the_terms($product->ID, 'product-flavor');
                                $terms = join(', ', wp_list_pluck($terms, 'slug'));
                                ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>"
                                         class="img-fluid mx-auto d-block"
                                         alt="<?php echo get_the_title($product->post_title); ?>">
                                    <div class="taste-shapes <?php echo $i == 1 ? 'move-in' : ''; ?> <?php echo $terms; ?>">
                                        <img class="float-shape"
                                             src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banana/banana-double.png"/>
                                        <img class="float-shape"
                                             src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banana/banana.png"/>
                                        <img class="float-shape"
                                             src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/shape.png"/>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                        </div>
                        <span class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                 fill="none">
                              <path d="M14.6853 8.5106L3.15337 0.370437C1.82854 -0.564735 0 0.382733 0 2.00437V18.2847C0 19.9063 1.82854 20.8538 3.15337 19.9186L14.6853 11.7785C15.8141 10.9816 15.8141 9.30743 14.6853 8.5106Z"
                                    fill="#10069F"/>
                            </svg>
                        </span>
                        <span class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                 fill="none">
                              <path d="M0.84648 8.5106L12.3784 0.370437C13.7032 -0.564735 15.5317 0.382733 15.5317 2.00437V18.2847C15.5317 19.9063 13.7032 20.8538 12.3784 19.9186L0.84648 11.7785C-0.282365 10.9816 -0.282365 9.30743 0.84648 8.5106Z"
                                    fill="#10069F"/>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="d-lg-none">
                    <a href="#" class="delis-btn mt-4">همه‌ی دسرها</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="campaign">
    <div class="container h-100">
        <div class="row h-100 justify-content-between align-items-end">
            <div class="col-12 col-lg-6">
                <div class="title-group">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-pouding.png">
                    <h2>دنیای دلیس</h2>
                </div>
                <strong class="my-5 d-block">
                    دلت میخواد دنیای دلیس چه شکلی باشه؟!
                </strong>
                <p class="mb-0">
                    رنگی، بامزه، خیالی یا پر از دسرهای خوش‌مزه؟
                </p>
                <p>
                    نقاشیش کن و با ما به اشتراک بذار! هر ماه بین همه‌ی نقاشی‌ها قرعه‌کشی داریم و شاید همین بار، نوبت تو
                    باشه. نقاشیت رو آپلود کن و وارد دنیای دلیس شو!
                </p>
                <a href="#" class="delis-btn secondary">آپلود نقاشی</a>
            </div>
            <div class="col-12 col-lg-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/painting-campaign.png"
                     class="img-fluid d-block mx-auto" alt="">
            </div>
        </div>
    </div>
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
                        <span>ما اینجاییم تا لحظه‌های خوشمزه‌تون رو رنگی‌تر کنیم.</span>
                        از پودینگ و میلک‌شیک‌های آماده گرفته تا
                        <br>موس و پاناکوتا، یه دنیای خیال‌انگیز از دسرهای خوش‌طعم منتظر شماست.
                        دلیس همیشه دنبال ساختن تجربه‌های تازه‌ست، با طعم‌هایی که هم آشنا هستن هم هیجان‌انگیز.
                    </p>
                    <a href="#" class="delis-btn mt-4"> ماجراجویی بیشتر</a>

                </div>
                <div class="col-lg-7 text-start">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group212.svg"
                         class="girl d-none d-lg-block"
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group17.png" class="img-fluid"
                         alt="">
                </div>

            </div>
        </div>
    </div>
</section>
<section class="instagram" id="instagram">
    <div class="position-relative">
        <div class="container">
            <div class="fruit w-100 h-100 position-relative">

                <div class="title-group">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/title-instagram.png">
                    <h2>اینستاگرام دلیس</h2>
                </div>
                <p class="text-center">برای کشف تازه‌ترین طعم‌ها، ایده‌های خوشمزه و جشن‌های کوچک، ما رو تو شبکه‌های اجتماعی دنبال کن.</p>
                <div class="swiper py-5" id="instagram-cards">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('instagram_repeater', 'option')):the_row();  ?>
                            <div class="swiper-slide">
                                <div class="card instagram-box p-0">
                                    <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                        <a class="stretched-link" href="<?php echo get_sub_field('post_link'); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg" alt=""></a>
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="card-title"></h5>
                                        <img src="<?php echo get_sub_field('image') ?>"
                                             class="img-fluid w-100">
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between">
                                        <div class="mark">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector42.svg">
                                        </div>
                                        <div class="instagram-icons d-flex align-items-center gap-2 gap-lg-3 justify-content-end">
                                            <div class="info-count">
                                                <span> <?php echo number_format(get_sub_field('share')) ?> </span>
                                                <img
                                                        src="<?php echo get_template_directory_uri() ?>/assets/images/Vector33.svg"
                                                        alt="">
                                            </div>
                                            <div class="info-count">
                                                <span> <?php echo number_format(get_sub_field('comment')) ?> </span>
                                                <img
                                                        src="<?php echo get_template_directory_uri() ?>/assets/images/Vector30.svg"
                                                        alt="">
                                            </div>
                                            <div class="info-count">
                                                <span> <?php echo number_format(get_sub_field('like')) ?> </span>
                                                <img
                                                        src="<?php echo get_template_directory_uri() ?>/assets/images/Vector32.svg"
                                                        alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <div class="d-flex justify-content-center">
                <a href="#" class="delis-btn secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M1 12C1 6.81495 1 4.22126 2.61063 2.61063C4.22126 1 6.81379 1 12 1C17.1851 1 19.7787 1 21.3894 2.61063C23 4.22126 23 6.81379 23 12C23 17.1851 23 19.7787 21.3894 21.3894C19.7787 23 17.1862 23 12 23C6.81495 23 4.22126 23 2.61063 21.3894C1 19.7787 1 17.1862 1 12Z"
                              stroke="#10069F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 5L18.3662 5.0338M17.2106 12.0005C17.2106 13.3824 16.6616 14.7077 15.6845 15.6849C14.7073 16.662 13.382 17.211 12.0001 17.211C10.6182 17.211 9.29284 16.662 8.31568 15.6849C7.33852 14.7077 6.78955 13.3824 6.78955 12.0005C6.78955 10.6186 7.33852 9.29323 8.31568 8.31607C9.29284 7.33891 10.6182 6.78994 12.0001 6.78994C13.382 6.78994 14.7073 7.33891 15.6845 8.31607C16.6616 9.29323 17.2106 10.6186 17.2106 12.0005Z"
                              stroke="#10069F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    اینستاگرام دلیس </a>
            </div>
        </div>
    </div>
</section>
<section id="poo-delis">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-6">
                <div class="title-group">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-pouding.png">
                    <h2> پودینگ دلیس</h2>
                </div>
                <p class="mt-3">پودینگ‌های دلیس با دو بسته‌بندی به بازار اومدن تا هر سبک زندگی و سلیقه‌ای رو پوشش بدن.
                    می‌خوای یه لحظه ناب برای خودت بسازی؟ بسته‌بندی تکی دلیس با توئه. اما اگه دنبال یه انتخاب به‌صرفه و
                    همیشه در دسترس برای مهمونی‌ها، دورهمی‌های خانوادگی یا حتی ذخیره خوشمزه برای روزهای شلوغی، مولتی‌پک
                    دلیس گزینه‌ ایده‌آله.
                </p>
            </div>
            <div class="col-12 col-lg-6">
                <div id="swiper-pooding" class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="pod-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pooding.png"
                                     alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="pod-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pooding.png"
                                     alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="pod-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pooding.png"
                                     alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Navigation -->
                    <span class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                 fill="none">
                              <path d="M14.6853 8.5106L3.15337 0.370437C1.82854 -0.564735 0 0.382733 0 2.00437V18.2847C0 19.9063 1.82854 20.8538 3.15337 19.9186L14.6853 11.7785C15.8141 10.9816 15.8141 9.30743 14.6853 8.5106Z"
                                    fill="#10069F"/>
                            </svg>
                        </span>
                    <span class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="21" viewBox="0 0 16 21"
                                 fill="none">
                              <path d="M0.84648 8.5106L12.3784 0.370437C13.7032 -0.564735 15.5317 0.382733 15.5317 2.00437V18.2847C15.5317 19.9063 13.7032 20.8538 12.3784 19.9186L0.84648 11.7785C-0.282365 10.9816 -0.282365 9.30743 0.84648 8.5106Z"
                                    fill="#10069F"/>
                            </svg>
                        </span>
                </div>

            </div>
        </div>
    </div>

</section>

<?php get_footer(); ?>

