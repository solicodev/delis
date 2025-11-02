</main><!-- /#main -->
<footer>
    <section id="footer">

        <div class=" wrapper p-md-5">
            <div class="container last-footer">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-3  text-start">

                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/Group152.png" alt="">
                        <p>دسر خوشمزه‌ی تو!</p>

                    </div>
                    <div class="col-12 col-md-5 ">
                        <div class="row box-center">
                            <div class="col-md-6 ">
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12 ">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/request.svg"
                                         class="link-Image"/>
                                    <a href="<?php echo home_url('story'); ?>" class="link-Text stretched-link"> قصه‌ی
                                        دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/request.svg"
                                         class="link-Image"/>
                                    <a href="<?php echo home_url('faq'); ?>" class="link-Text stretched-link"> سوال‌های
                                        شما</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/request.svg"
                                         class="link-Image"/>
                                    <a href="<?php echo home_url('history'); ?>" class="link-Text stretched-link">دسرهای
                                        دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>

                                <div class="link-Container position-relative d-flex flex-column col-6 col-md-12">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/request.svg"
                                         class="link-Image"/>
                                    <a href="<?php echo home_url('history'); ?>" class="link-Text stretched-link">
                                        ارتباط با دلیس</a>
                                    <div class="border-btm">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-md-3 ">
                        <div class="icon-box d-flex justify-content-between align-items-center">

                            <p>از جدیدترین اخبار مطلع شوید.</p>

                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Menuu.svg" alt="">
                        </div>
                        <div class="container">
                            <form class="">
                                <div class="row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label">نام</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label class="form-label">شماره تماس</label>
                                        <input type="tel" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="mb-3 ">
                                    <label class="form-label">ایمیل</label>
                                    <input type="email" class="form-control" placeholder="">
                                </div>

                                <button type="submit" class="btn btn-custom px-4 py-2">ارسال</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="footer-bar d-flex justify-content-center align-items-center ">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/Solicoo.svg" class="m-2" alt="">
            <p class="m-0">تمام حقوق محفوظ و متعلق به گروه صنایع غذایی سولیکو کاله است.</p>
        </div>

    </section>
</footer>
</body>
<?php
wp_footer();
?>

