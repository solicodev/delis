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
                        <img class="bg-logo" src="<?php echo get_template_directory_uri() ?>/assets/images/bglogo.svg"
                             alt="">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Logo.png" alt="">
                    </h1>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector15.svg"
                         class="heart d-none d-lg-block"
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector26.svg"
                         class="dotted-line d-none d-lg-block"
                         alt="">
                    <p class="subtitle">... دِلم می‌خواد</p>
                    <div class="mt-4 d-flex gap-3">
                        <a href="<?php echo home_url('products'); ?>" class="delis-btn secondary">دسرهای دلیس</a>
                        <a href="" data-bs-target="#painting-modal" data-bs-toggle="modal" class="delis-btn">مسابقه
                            نقاشی</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
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
        <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" width="37" height="71" viewBox="0 0 37 71" fill="none">
            <path d="M4.29577 3.03436C4.82129 3.20419 5.3857 2.91534 5.55554 2.38982C5.72503 1.86444 5.43636 1.30081 4.91101 1.13103L4.02038 0.848808C3.12351 0.56926 2.20629 0.298569 1.26843 0.0372849L1.16882 0.0148239C0.669273 -0.071434 0.176124 0.23291 0.0369815 0.731621C-0.111233 1.26363 0.199324 1.8158 0.731317 1.96404L1.64343 2.22283C2.54829 2.48472 3.43234 2.75532 4.29577 3.03436ZM17.8495 8.96502C18.326 9.24355 18.9378 9.08304 19.2167 8.60662C19.4956 8.12996 19.3359 7.5174 18.8592 7.23845C16.7825 6.02316 14.5085 4.87274 12.0311 3.80096C11.5244 3.58192 10.936 3.8148 10.7167 4.32146C10.4974 4.82834 10.7303 5.41759 11.2372 5.63689C13.6452 6.67868 15.8468 7.79308 17.8495 8.96502ZM29.0546 18.2931C29.4004 18.7236 30.0303 18.7922 30.4608 18.4465C30.8913 18.1006 30.96 17.4707 30.6141 17.0402C29.1047 15.1616 27.292 13.3342 25.162 11.59C24.7347 11.2402 24.1047 11.3035 23.7548 11.7306C23.4049 12.1579 23.4672 12.788 23.8944 13.1379C25.9252 14.8008 27.6383 16.5305 29.0546 18.2931ZM35.4901 32.341C36.0416 32.3121 36.4653 31.8417 36.4364 31.2902L36.4061 30.8195C36.2294 28.4627 35.6491 26.0618 34.6385 23.6789L34.5936 23.5871C34.3497 23.1429 33.8046 22.9466 33.328 23.1486C32.8195 23.3642 32.5821 23.9517 32.7977 24.4601L32.9784 24.8976C33.8537 27.0875 34.3282 29.2716 34.4393 31.3947L34.4501 31.4963C34.5274 31.9973 34.973 32.368 35.4901 32.341ZM31.3319 45.8263C32.9924 43.9346 34.2806 41.8092 35.1512 39.5265L35.3202 39.0685L35.3495 38.9699C35.4691 38.4776 35.1988 37.9648 34.7108 37.7922C34.1901 37.608 33.6186 37.8809 33.4344 38.4015C32.6528 40.611 31.4375 42.6744 29.829 44.507L30.5809 45.1662L31.3319 45.8263ZM19.4618 45.7033C19.8278 46.1167 20.4603 46.1552 20.8739 45.7892C21.2874 45.4232 21.3258 44.7907 20.9598 44.3771C20.0284 43.3245 18.9228 42.3262 17.6483 41.3908C16.2364 40.3546 14.817 39.8462 13.454 39.8029L13.3514 39.8049C12.8458 39.84 12.4392 40.2532 12.4227 40.7707C12.4053 41.3226 12.8386 41.7844 13.3905 41.8019L13.7313 41.8273C14.5435 41.9215 15.463 42.268 16.4647 43.0031C17.6373 43.8637 18.6346 44.7684 19.4618 45.7033ZM9.49304 53.301C9.95768 53.5035 10.5097 53.3255 10.7635 52.8742C11.0342 52.3928 10.8631 51.7826 10.3817 51.5119L10.202 51.4054C8.50557 50.3362 8.0003 48.2804 8.53405 46.1965L8.66003 45.7648L8.6864 45.6662C8.79341 45.1708 8.50981 44.665 8.01745 44.5051C7.52492 44.3451 6.99819 44.588 6.79382 45.0519L6.75768 45.1476L6.67565 45.4142C5.87118 48.1941 6.40207 51.5684 9.40124 53.2551L9.49304 53.301ZM29.9208 45.9181C30.3357 46.2824 30.9675 46.2411 31.3319 45.8263L29.829 44.507C29.4649 44.922 29.5059 45.5539 29.9208 45.9181ZM20.8495 61.6037C21.2924 61.8718 21.8609 61.7556 22.1659 61.3508L22.2225 61.2658L22.536 60.7306C24.0452 58.0516 24.7492 55.3047 24.579 52.6115L24.5673 52.5099C24.4845 52.0098 24.0343 51.6433 23.5175 51.676C23.4904 51.6777 23.4637 51.6819 23.4374 51.6857C24.064 51.3897 24.6714 51.0738 25.2587 50.7385C25.7382 50.4646 25.9054 49.8537 25.6317 49.3742C25.3749 48.9245 24.8216 48.7494 24.3583 48.9552L24.2675 49.0011L23.8817 49.217C22.9752 49.7128 22.0157 50.1616 21.0057 50.5588C19.8419 51.0164 18.7714 51.3701 17.7899 51.632L17.3749 51.7385L17.2762 51.7677C16.7992 51.9383 16.5196 52.4459 16.6434 52.9484C16.7758 53.4845 17.3173 53.812 17.8534 53.6799C19.0436 53.386 20.3366 52.9708 21.7372 52.4201C22.1401 52.2617 22.5359 52.095 22.9247 51.9211C22.6982 52.1185 22.5625 52.4144 22.5829 52.7375L22.6014 53.1886C22.6439 55.2993 22.0546 57.5099 20.7928 59.7492L20.5126 60.2297L20.4637 60.3205C20.2465 60.7783 20.4067 61.3356 20.8495 61.6037ZM11.537 70.2121C11.847 70.669 12.4686 70.7877 12.9257 70.4777C14.1838 69.6243 15.3433 68.7491 16.4022 67.8556C16.8243 67.4995 16.8775 66.8686 16.5214 66.4465C16.1652 66.0244 15.5343 65.9712 15.1122 66.3273C14.361 66.9611 13.5527 67.5884 12.6874 68.2072L11.8036 68.8234L11.7216 68.8849C11.3331 69.2104 11.2463 69.7836 11.537 70.2121Z"
                  fill="#10069F"/>
        </svg>
        <div class="row">
            <div class="col-12">
                <div class="title-group">
                    <h2>دسرهای دلیس</h2>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/title-products.png"  class="img-fluid">
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
                    <a href="<?php echo home_url('products'); ?>" class="delis-btn mt-4">همه‌ی دسرها</a>
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
                    <a href="<?php echo home_url('products'); ?>" class="delis-btn mt-4">همه‌ی دسرها</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="campaign">
    <div class="container h-100">
        <div class="row h-100 justify-content-between align-items-end">
            <div class="col-12 col-lg-5 ">
                <div class="title-group right-align">
                    <picture>
                        <source media="(max-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/Group45.png" class="">
                        <source media="(min-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="img-fluid">
                    </picture>
                    <h2>نقاشی‌های شما</h2>
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
                <a href="#" data-bs-target="#painting-modal" data-bs-toggle="modal" class="delis-btn secondary mt-5">آپلود نقاشی</a>
            </div>
            <div class="col-12 col-lg-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/painting-campaign.png"
                     class="img-fluid d-block mx-auto paint-img" alt="">
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="about-us position-relative">
        <div class="container">
            <div class="row justify-content-between align-content-start">
                <div class="col-lg-5">
                    <div class="title-group right-align">
                        <h2>دلیس یعنی دسر</h2>
                        <picture>
                            <source media="(max-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/Group45.png" class="">
                            <source media="(min-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="img-fluid yellow-heart">
                        </picture>
                    </div>
                    <p>
                        <span>ما اینجاییم تا لحظه‌های خوشمزه‌تون رو رنگی‌تر کنیم.</span>
                        از پودینگ و میلک‌شیک‌های آماده گرفته تا
                        <br>موس و پاناکوتا، یه دنیای خیال‌انگیز از دسرهای خوش‌طعم منتظر شماست.
                        دلیس همیشه دنبال ساختن تجربه‌های تازه‌ست، با طعم‌هایی که هم آشنا هستن هم هیجان‌انگیز.
                    </p>
                    <a href="<?php echo home_url('about-us'); ?>" class="delis-btn mt-5"> ماجراجویی بیشتر</a>

                </div>
                <div class="col-lg-7 text-start mt-5">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group212.svg"
                         class="girl d-none d-lg-block"
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group17.png" class="img-fluid yellow-img"
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
                <p class="text-center">برای کشف تازه‌ترین طعم‌ها، ایده‌های خوشمزه و جشن‌های کوچک، ما رو تو شبکه‌های
                    اجتماعی دنبال کن.</p>
                <div class="swiper py-5" id="instagram-cards">
                    <div class="swiper-wrapper">
                        <?php while (have_rows('instagram_repeater', 'option')):the_row(); ?>
                            <div class="swiper-slide">
                                <div class="card instagram-box p-0">
                                    <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                        <a class="stretched-link" href="<?php echo get_sub_field('post_link'); ?>"><img
                                                    src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg"
                                                    alt=""></a>
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="card-title"></h5>
                                        <img src="<?php echo get_sub_field('image') ?>" class="img-fluid w-100">
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
                <a href="<?php echo get_field('instagram_link', 'option'); ?>" class="delis-btn secondary">
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
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-5">
                <div class="title-group right-align">
                    <picture>
                        <source media="(max-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/Group45.png" class="">
                        <source media="(min-width:650px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-title-bg.png" class="img-fluid">
                    </picture>
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
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pooding-strewberry.png"
                                     alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="pod-img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pooding-banana.png"
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
<?php echo get_template_part('template/template', 'campaign-modal'); ?>
<?php get_footer(); ?>

