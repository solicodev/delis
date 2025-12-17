</main><!-- /#main -->
<section id="top-footer">
</section>

<footer>
    <section id="footer">
        <div class=" wrapper position-relative  p-4">
            <div class="container last-footer">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-3 text-center text-lg-end ">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group152.png" alt="" class="logo-img">
                        <p class="mt-3">دِلیس، برند خلاق گروه سولیکو است که از سال ۱۳۹۸ فعالیت خود را آغاز کرده تا با دسرهای جذابش، لحظه‌ها را شیرین‌تر کند. </p>
                        <a target="_blank" href="<?php echo get_field('instagram_link','option');?>">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/Men3.svg" alt="" class="">
                        </a>
                    </div>
                    <div class="col-12 col-md-5 ">
                        <div class="row box-center text-center text-lg-end">
                            <div class="col-md-6  right-title ">
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12 link-top ">
                                <span class="text-hover">درباره ما</span>
                                    <a href="<?php echo home_url('about-us'); ?>" class="link-Text stretched-link"> قصه‌ی
                                         دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12">
                                    <span class="text-hover">پاسخ های شما</span>
                                    <a href="<?php echo home_url('faq'); ?>" class="link-Text stretched-link"> سوال‌های
                                        شما</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 left-title">
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12 link-top">
                                    <span class="text-hover">خوشمزه</span>
                                    <a href="<?php echo home_url('products'); ?>" class="link-Text stretched-link">دسرهای
                                        دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>

                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12">
                                    <span class="text-hover">همراه شو</span>
                                    <a href="<?php echo home_url('contact-us'); ?>" class="link-Text stretched-link">
                                        ارتباط با دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 ">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/Group316.png" alt="" class="img-fluid  d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar d-flex flex-column flex-lg-row  justify-content-center align-items-center ">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Solicoo.svg" class="m-2" alt="">
            <p class="m-0">تمام حقوق محفوظ و متعلق به گروه صنایع غذایی سولیکو است.</p>
        </div>

    </section>
</footer>
<?php
wp_footer();
?>

