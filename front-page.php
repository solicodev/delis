<?php
get_header();

$categories = get_terms(
    array(
        'taxonomy' => 'product-category',
        'hide_empty' => false,
    )
);
$products = get_posts(
    array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            'taxonomy' => 'product-category',
            'field' => 'term_id',
            'terms' => $categories[0]->term_id,
        )
    )
)
?>
<section id="hero">
    <div class="container">
        <div class="row justify-content-between align-items-center h-100">
            <div class="col-12 col-lg-4">
                <div class="hero-text  text-end  align-items-center position-relative">
                    <h1 class="logo-text  d-none d-sm-block ">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Logo.png" class="img-1"
                             alt="">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/circle.png" class="img-2"
                             alt=""></h1>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector15.svg" class="heart "
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector24.svg" class="dotted-line"
                         alt="">
                    <p class="subtitle">... دِلم می‌خواد</p>
                    <div class="mt-4 d-none d-sm-block ">
                        <a href="#" class="delis-btn">دسرهای دلیس</a>
                        <a href="#" class="delis-btn">قصه‌sی دلیس</a>
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
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/IMG_6956.mp4"
                                    type="video/mp4">
                        </video>
                    </div>
                    <div class="mt-5 d-flex justify-content-between d-lg-none">
                        <a href="#" class="delis-btn">دسرهای دلیس</a>
                        <a href="#" class="delis-btn">قصه ی دلیس</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="products">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="row">
                    <?php
                    $i = 1;
                    foreach ($categories as $category) :
                        $cat = get_field('image', 'term_' . $category->term_id);
                        ?>
                        <div class="col-4 mb-4">
                            <div class="select-category <?php echo $i == 1 ? 'selected' : '' ?>"
                                 data-id="<?php echo $category->term_id; ?>">
                                <img class="mx-auto d-block img-fluid" src="<?php echo $cat['url']; ?>"
                                     alt="<?php echo $cat['title']; ?>">
                            </div>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#" class="delis-btn mt-4">همه‌ی دسرها</a>
                </div>
            </div>
            <div class="col-5">
                <div id="product-slider">
                    <div id="product-loader" class="d-none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="swiper product-swiper">
                        <div id="product-wrap" class="swiper-wrapper">
                            <?php foreach ($products as $product) : ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>"
                                         class="img-fluid mx-auto d-block"
                                         alt="<?php echo get_the_title($product->post_title); ?>">
                                    <div class="taste-shapes">
                                        <img class="float-shape" src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banana/banana-double.png" />
                                        <img class="float-shape" src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/banana/banana.png" />
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="about-us position-relative">
        <div class="container">
            <div class="row justify-content-between align-content-start  mb-5">
                <div class="col-lg-5">
                    <div class="title-group ">
                        <span class="sub-title">خوشمزه</span>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/yellow-heart.svg"
                             class="yellow-heart">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg"
                             class="dotted-line">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png"
                             class="circle-img">

                        <h2>دلیس یعنی دسر</h2>
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
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group212.svg" class="girl"
                         alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group17.png" class="left-img "
                         alt="">
                </div>

            </div>
        </div>
    </div>
</section>


<section class="instagram  position-relative text-center" id="instagram">

    <div class="container">
        <div class="fruit w-100 h-100 position-relative">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/tout.svg" class="tout" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/anar.svg" class="anar" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/box.svg" alt="" class="box">
            <div class="title-group">
                <span class="sub-title">همراه شو</span>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/purple-heart.svg"
                     class="purple-heart">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg" class="dotted-line">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png" class="circle-img">
                <h2> پودینگ دلیس</h2>
            </div>
            <div class="swiper py-5" id="instagram-cards">
                <div class="swiper-wrapper">

                    <!-- Slide -->


                    <div class="swiper-slide">
                        <div class="card  instagram-box p-0">
                            <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Insta-2.png"
                                     class="img-fluid">
                            </div>
                            <div class="card-footer text-muted">
                                <div class="insta-icons">
                                    <span>❤️ 71</span>
                                    <span>💬 21</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card  instagram-box p-0">
                            <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Insta-2.png"
                                     class="img-fluid">
                            </div>
                            <div class="card-footer text-muted">
                                <div class="insta-icons">
                                    <span>❤️ 71</span>
                                    <span>💬 21</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card  instagram-box p-0">
                            <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Insta-2.png"
                                     class="img-fluid">
                            </div>
                            <div class="card-footer text-muted">
                                <div class="insta-icons">
                                    <span>❤️ 71</span>
                                    <span>💬 21</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card  instagram-box p-0">
                            <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Insta-2.png"
                                     class="img-fluid">
                            </div>
                            <div class="card-footer text-muted">
                                <div class="insta-icons">
                                    <span>❤️ 71</span>
                                    <span>💬 21</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>
        </div>

        <!-- Swiper -->

    </div>
    <a href="#" class="delis-btn"> اینستاگرام دلیس </a>

</section>

<!-- Swiper JS -->

<section id="poo-delis">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title-group">
                    <span class="sub-title">برای همه</span>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/yellow-heart.svg"
                         class="yellow-heart">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg"
                         class="dotted-line">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png"
                         class="circle-img">
                    <h2> پودینگ دلیس</h2>
                </div>
                <span>
    تکی برای خودت، مولتی‌پک برای همه
</span>

                <div class="border-title

">
                </div>
                <p class="mt-3">پودینگ‌های دلیس با دو بسته‌بندی به بازار اومدن تا هر سبک زندگی و سلیقه‌ای رو پوشش بدن.
                    می‌خوای یه لحظه ناب برای خودت بسازی؟ بسته‌بندی تکی دلیس با توئه. اما اگه دنبال یه انتخاب به‌صرفه و
                    همیشه در دسترس برای مهمونی‌ها، دورهمی‌های خانوادگی یا حتی ذخیره خوشمزه برای روزهای شلوغی، مولتی‌پک
                    دلیس گزینه‌ ایده‌آله.
                </p>
                <a href="#" class="delis-btn">پودینگ‌ها رو بشناس</a>
            </div>
            <div class="col-12 col-lg-6">
                <div class="pod-img">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group184.png" alt="">

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

