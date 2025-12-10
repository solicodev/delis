<?php
/* template name: contact */

get_header();

?>
<section id="hero-section">
    <div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-12">
            <div class="title-group">
                <h1>ارتباط با دلیس</h1>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/contact-us.png" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="row align-content-center align-items-start justify-content-between position-relative">
        <div class="col-md-5  order-last order-lg-first">
            <h2 class="py-2">صدای شما، شیرین ترین طعم ما       </h2>
<p>
    ما عاشق شنیدن صدای شمائیم، چه بخوای از یه طعم جدید تعریف کنی، چه بخوای یه پیشنهاد خوشمزه بدی یا حتی یه انتقاد دوستانه بگی.</p>
            <img src="<?php echo get_template_directory_uri()?>/assets/images/Group212.png" alt=""  class="girl-bit   ">
        </div>
        <div class="col-md-5">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/old-phone.png" alt="" class="img-fluid phone-img">
        </div>
    </div>
    </div>
    <div class="col-md-5">
    </div>
</section>
 <section>
     <div class="container ">
         <div class="row   align-content-center align-items-center  justify-content-between" >
             <div class="col-md-5">
                 <img src="<?php echo get_template_directory_uri()?>/assets/images/comment.png " alt="" class="img-fluid">
             </div>
             <div class="col-md-6">
                 <h2 class="py-5">
                     پیامت رو برای ما بنویس.                 </h2>
                 <?php echo do_shortcode('[contact-form-7 id="a0dd3ef" title="تماس با ما"]'); ?>

             </div>
         </div>
     </div>
 </section>
<section id="contact-way" >
    <div class="container position-relative">
        <div class="row   align-content-center align-items-center justify-content-between" >

            <div class="col-md-5 ">
                <h2 class="py-5">
                    راه‌های تماس با دلیس
                </h2>

           <div class="row icon-box py-3">
               <div class="col-lg-5 col-sm-12">

                   <img src="<?php echo get_template_directory_uri()?>/assets/images/phone.svg" alt="">  <span> آدرس دفتر مرکزی: </span></div>
               <div class="col-lg-7 col-sm-12">
                   <p>تهران، خیابان آذربایجان شرقی، پلاک 103</p>
               </div>
           </div>
                <div class="row icon-box justify-content-between middle-box ">
                <div class="col-5">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/Vec38.svg" alt="">  <span> شماره تماس:  </span></div>
               <div class="col-7">
                   <p class="tex-left">021-61938</p>
               </div>
                </div>
                <div class="row icon-box justify-content-between py-3">
                <div class="col-5">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/Vec39.svg" alt="">  <span> ایمیل:  </span></div>
               <div class="col-7">                   <p class="text-left">care@solico-group.com</p>
               </div></div>
           </div>
            <div class="col-md-5 order-first order-lg-last">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/contact-way.png " alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<section class="instagram about-page" id="instagram">
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

<?php get_footer(); ?>
