<?php
get_header();
?>
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between align-items-center h-100">
                <div class="col-12 col-lg-4">
                    <div class="hero-text  text-end  align-items-center position-relative">
                        <h1 class="logo-text  d-none d-sm-block ">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Logo.png" class="img-1" alt="">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/circle.png" class="img-2" alt="" ></h1>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector15.svg" class="heart "  alt="">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/Vector24.svg" class="dotted-line" alt="">
                        <p class="subtitle">... دِلم می‌خواد</p>
                        <div class="mt-4 delis-btn d-none d-sm-block ">
                            <a href="#" class="btn btn-warning ">دسرهای دلیس</a>
                            <a href="#" class="btn story-btn">قصه‌sی دلیس</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector26.svg" class="dotted-line "  alt="">

                    <div class="tv-container position-relative">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Group183.png"
                             class="img-fluid tv-frame" alt="TV">

                        <div class="tv-screen position-absolute">
                            <video id="resVideo" autoplay loop muted playsinline>
                                <source src="<?php echo get_template_directory_uri(); ?>/assets/video/IMG_6956.mp4"
                                        type="video/mp4">
                            </video>
                        </div>
                        <div class="mt-5 delis-btn d-flex justify-content-between d-lg-none">
                            <a href="#" class="btn btn-warning ">دسرهای دلیس</a>
                            <a href="#" class="btn btn-outline-dark">قصه ی دلیس</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product-cat">
        <section class="product-categories">
            <div class="categories-grid">
                <?php if (have_rows('product_categories')): $index = 0; ?>
                    <?php while (have_rows('product_categories')): the_row();
                        $image = get_sub_field('category_image');
                        ?>
                        <div class="category-item" data-index="<?php echo esc_attr($index); ?>" data-postid="<?php echo get_the_ID(); ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">

                        </div>
                        <?php $index++; endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="swiper-container">
                <div class="swiper-wrapper" id="ajax-swiper-wrapper">
                    <div class="swiper-slide"><p>یک کتگوری انتخاب کنید...</p>



                    </div>
                </div>
            </div>

            <div class="swiper-nav">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const swiper = new Swiper('.swiper-container', {
                    slidesPerView: 1,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    autoHeight: true,
                });

                const categoryItems = document.querySelectorAll('.category-item');
                const wrapper = document.getElementById('ajax-swiper-wrapper');

                categoryItems.forEach(item => {
                    item.addEventListener('click', function () {
                        const index = this.dataset.index;
                        const postID = this.dataset.postid;
                        categoryItems.forEach(el => el.classList.remove('active'));
                        this.classList.add('active');

                        wrapper.innerHTML = '<div class="swiper-slide"><p>در حال بارگذاری...</p></div>';

                        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            body: new URLSearchParams({
                                'action': 'load_category_products_page',
                                'index': index,
                                'post_id': postID
                            })
                        })
                            .then(res => res.text())
                            .then(data => {
                                wrapper.innerHTML = data;
                                swiper.update();
                            });
                    });
                });
            });
        </script>
    </section>
    <section id="about">
        <div class="about-us position-relative">
            <div class="container">
                <div class="row justify-content-between align-content-start  mb-5">
                    <div class="col-lg-5">
                        <div class="title-group ">
                            <span class="sub-title">خوشمزه</span>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/yellow-heart.svg" class="yellow-heart">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg" class="dotted-line">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png" class="circle-img">

                            <h2>دلیس یعنی دسر</h2>
                        </div>
                        <p>
                            <span>ما اینجاییم تا لحظه‌های خوشمزه‌تون رو رنگی‌تر کنیم.</span>
                            از پودینگ و میلک‌شیک‌های آماده گرفته تا
                            <br>موس و پاناکوتا، یه دنیای خیال‌انگیز از دسرهای خوش‌طعم منتظر شماست.
                            دلیس همیشه دنبال ساختن تجربه‌های تازه‌ست، با طعم‌هایی که هم آشنا هستن هم هیجان‌انگیز.
                        </p>
                        <div class="delis-btn mt-4 ">
                            <a href="#" class="btn btn-warning ">        ماجراجویی بیشتر</a>
                        </div>
                    </div>
                    <div class="col-lg-7 text-start">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/Group212.svg" class="girl" alt="">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group17.png" class="left-img " alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>


<section class="instagram  position-relative text-center" id="instagram">

    <div class="container">
        <div class="fruit w-100 h-100 position-relative" >
        <img src="<?php echo get_template_directory_uri()?>/assets/images/tout.svg"  class="tout"  alt="">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/anar.svg" class="anar" alt="">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/box.svg" alt="" class="box">
            <div class="title-group">
                <span class="sub-title">همراه شو</span>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/purple-heart.svg" class="purple-heart">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg" class="dotted-line">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png" class="circle-img">
                <h2>  پودینگ دلیس</h2>
            </div>
            <div class="swiper py-5" id="instagram-cards">
                <div class="swiper-wrapper">

                    <!-- Slide -->


                    <div class="swiper-slide">
                        <div class="card  instagram-box p-0"  >
                            <div class="card-header border-0 ">
                        <span>
                            delis_dessert_
                        </span>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Insta-2.png" class="img-fluid" >
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
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Insta-2.png" class="img-fluid" >
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
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Insta-2.png" class="img-fluid" >
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
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Group146.svg" alt="">
                            </div>
                            <div class="card-body p-0">
                                <h5 class="card-title"></h5>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/Insta-2.png" class="img-fluid" >
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
    <div class="delis-btn ">
        <a href="#" class="btn btn-warning ">         اینستاگرام دلیس </a>
    </div>
</section>

<!-- Swiper JS -->

<section id="poo-delis">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="title-group">
                    <span class="sub-title">برای همه</span>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/yellow-heart.svg" class="yellow-heart">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Vector12.svg" class="dotted-line">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/Rectangle155.png" class="circle-img">
                    <h2>  پودینگ دلیس</h2>
                </div>
<span>
    تکی برای خودت، مولتی‌پک برای همه
</span>

                <div class="border-title

">
                </div>
                <p class="mt-3">پودینگ‌های دلیس با دو بسته‌بندی به بازار اومدن تا هر سبک زندگی و سلیقه‌ای رو پوشش بدن.
                    می‌خوای یه لحظه ناب برای خودت بسازی؟ بسته‌بندی تکی دلیس با توئه. اما اگه دنبال یه انتخاب به‌صرفه و همیشه در دسترس برای مهمونی‌ها، دورهمی‌های خانوادگی یا حتی ذخیره خوشمزه برای روزهای شلوغی، مولتی‌پک دلیس گزینه‌ ایده‌آله.
                </p>
                <div class="mt-4 delis-btn ">
                    <a href="#" class="btn btn-warning ">پودینگ‌ها رو بشناس</a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="pod-img">
                    <img  src="<?php echo get_template_directory_uri()?>/assets/images/Group184.png" alt="">

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>

