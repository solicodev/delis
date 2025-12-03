<?php
/* template name: Faq */

get_header();

?>
<section id="hero-section">
    <div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-12">
            <div class="title-group">
                <h2>سوال‌های شما</h2>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/hero-faqq.png" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="row align-content-center align-items-center">
        <div class="col-md-6 position-relative order-last order-lg-first">
            <h2 class="">
                سوال دارید؟ ما اینجاییم.</h2>
<p class="mt-5">
    اینجا می‌تونید جواب رایج‌ترین سوال‌ها درباره محصولات و تجربه دلیس رو خیلی سریع پیدا کنید. اگر چیزی از قلم افتاد، با خیال راحت بپرسید.</p>
            <img src="<?php echo get_template_directory_uri()?>/assets/images/Group212.png" alt=""  class="girl-bit  d-none d-lg-block ">

        </div>
        <div class="col-md-6">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/hero-faq.png" alt="" class="img-fluid">
        </div>
    </div>
    </div>
    <div class="col-md-5">
    </div>
</section>
<section id="faq">
    <?php
    $categories = get_field('faq_category');
    if ($categories):
        ?>

        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq-tabs nav flex-row flex-nowrap nav-pills justify-content-between" id="faq_category" role="tablist">
                        <?php
                        $tab_index = 0;
                        foreach ($categories as $cat):
                            $active = ($tab_index === 0) ? 'active' : '';
                            ?>
                            <div class="nav-link  <?php echo $active; ?> d-flex flex-column"
                                    id="tab-<?php echo $tab_index; ?>"
                                    data-bs-toggle="pill"
                                    data-bs-target="#content-<?php echo $tab_index; ?>"
                                    type="button" role="tab">
                                <?php if (!empty($cat['category-icon'])): ?>
                                    <img src="<?php echo esc_url($cat['category-icon']); ?>" alt="" class="me-2" width="64">
                                <?php endif; ?>
                                <?php echo esc_html($cat['category-title']); ?>
                            </div>
                            <?php
                            $tab_index++;
                        endforeach;
                        ?>
                    </div>
                </div>


                <!-- Tab Contents -->
                <div class="col-md-12">
                    <div class="tab-content" id="faqTabsContent">

                        <?php
                        $content_index = 0;
                        foreach ($categories as $cat):
                            $active = ($content_index === 0) ? 'show active' : '';
                            $faq_items = $cat['faq_items'];  // repeater nested
                            ?>

                            <div class="tab-pane fade <?php echo $active; ?>"
                                 id="content-<?php echo $content_index; ?>"
                                 role="tabpanel">

                                <?php if ($faq_items): ?>

                                    <div class="accordion custom-accordion" id="faq-<?php echo $content_index; ?>">

                                        <?php
                                        $q_index = 0;
                                        foreach ($faq_items as $faq):
                                            ?>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button <?php echo ($q_index !== 0) ? 'collapsed' : '' ?>"
                                                            type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse-<?php echo $content_index; ?>-<?php echo $q_index; ?>">
                                                        <?php echo esc_html($faq['question']); ?>
                                                    </button>
                                                </h2>

                                                <div id="collapse-<?php echo $content_index; ?>-<?php echo $q_index; ?>"
                                                     class="accordion-collapse collapse <?php echo ($q_index === 0) ? 'show' : ''; ?>"
                                                     data-bs-parent="#faq-<?php echo $content_index; ?>">

                                                    <div class="accordion-body">
                                                        <?php echo wp_kses_post($faq['answer']); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            $q_index++;
                                        endforeach;
                                        ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                            <?php
                            $content_index++;
                        endforeach;
                        ?>

                    </div>
                </div>

            </div>
        </div>

    <?php endif; ?>

</section>

<?php get_footer(); ?>
