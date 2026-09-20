
<?php
/* Template Name: landing */
get_header('landing');
$img = get_template_directory_uri() . '/assets/images';
?>
<div id="landing-page">
    <section id="landing-hero">
        <div class="container">
            <div class="row justify-content-between align-items-center g-3">
                <div class="col-12 col-md-6">
                    <div class="hero-copy text-center text-md-end position-relative">
                        <h1>مسابقه نقاشی <span>دلیس</span></h1>
                        <p>
                            نقاشیت رو بکش، آپلود کن و در قرعه‌کشی جوایز شگفت‌انگیز دلیس شرکت کن؛ از پلی‌استیشن تا اسکوتر و پک‌های خوشمزه دلیس منتظرتن.                        </p>
                        <div class="d-none d-md-flex flex-row gap-3 mt-4 landing-hero-actions">
                            <a href="#landing-form" class="delis-btn secondary">شرکت در مسابقه</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#landing-download-modal" class="delis-btn">دانلود برگه نقاشی</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/paint.png" class="img-fluid" alt="">

                </div>
                <div class="col-12 d-md-none mt-4">
                    <div class="d-flex flex-column gap-3 landing-hero-actions">
                        <a href="#landing-form" class="delis-btn secondary">ورود به مسابقه</a>
                        <a href="#landing-rules" class="delis-btn">قوانین و مقررات</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="landing-prizes">
        <div class="container position-relative">
            <div class="">
                <h2>جوایز رویایی منتظر برنده‌هاست</h2>
                <img src="<?php echo get_template_directory_uri()?>/assets/images/heart2.svg" class="position-absolute img-heart" alt="">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/bs.svg" class="position-absolute img-bs" alt="">
            </div>
            <div class="row justify-content-center text-center g-3 landing-prize-row">
                <?php
                $prizes = array(
                    array('scooter.png', 'اسکوتر برقی'),
                    array('ps5.png', 'پلی‌استیشن ۵'),
                    array('tablet.png', 'تبلت'),
                    array('jamedadi.png', 'جامدادی'),
                    array('packpro.png', 'پک محصولات دلیس'),
                );
                $index=0;
                foreach ($prizes as $prize) :
                    ?>
                    <div class="<?php echo ($index==2) ? 'col-12' : 'col-6'?> col-md">
                        <div class="landing-prize">
                            <img src="<?php echo $img; ?>/<?php echo $prize[0]; ?>" alt="<?php echo esc_attr($prize[1]); ?>">
                            <span><?php echo $prize[1]; ?></span>
                        </div>
                    </div>
                <?php $index++; endforeach; ?>
            </div>
        </div>
    </section>
    <?php
    $countdown_raw = get_field( 'countdown_deadline' );
    $countdown_tz  = function_exists( 'wp_timezone' ) ? wp_timezone() : new DateTimeZone( 'Asia/Tehran' );
    try {
        $deadline_dt = new DateTime( $countdown_raw ? $countdown_raw : '2026-10-02 12:00:00', $countdown_tz );
    } catch ( Exception $e ) {
        $deadline_dt = new DateTime( '2026-10-02 12:00:00', $countdown_tz );
    }
    $remaining_days    = (int) floor( ( $deadline_dt->getTimestamp() - time() ) / DAY_IN_SECONDS );
    $countdown_expired = $remaining_days <= 0;
    $countdown_label   = 'قرعه‌کشی جشنواره در ۱۰ مهرماه برگزار می‌شود';
    if ( class_exists( 'IntlDateFormatter' ) ) {
        $jalali_fmt = new IntlDateFormatter(
            'fa_IR@calendar=persian',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            $deadline_dt->getTimezone(),
            IntlDateFormatter::TRADITIONAL,
            'd MMMM'
        );
        $jalali_part = $jalali_fmt ? $jalali_fmt->format( $deadline_dt ) : '';
        if ( $jalali_part ) {
            $countdown_label = sprintf( 'قرعه‌کشی جشنواره در %sماه برگزار می‌شود', $jalali_part );
        }
    }
    ?>
    <section id="landing-countdown" class="position-relative<?php echo $countdown_expired ? ' is-expired' : ''; ?>">
        <div class="container">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/" alt="">
            <div class="landing-count-card">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/girl.svg" class="position-absolute img-girl" alt="">

                <div class="row align-items-center justify-content-between g-3 landing-count-live">
                    <div class="col-12 col-md-5 text-center text-md-end">
                        <h4 class="landing-count-title"><?php echo $countdown_expired ? 'زمان قرعه‌کشی تمام شد' : 'تاریخ قرعه‌کشی'; ?></h4>
                        <span class="mb-0 landing-count-copy"<?php echo $countdown_expired ? ' hidden' : ''; ?>><?php echo esc_html( $countdown_label ); ?></span>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="landing-timer d-flex justify-content-center justify-content-md-end  gap-2 gap-md-3" data-deadline="<?php echo esc_attr( $deadline_dt->format( 'c' ) ); ?>">
                            <div class="time-box">
                                <strong data-unit="seconds">00</strong>
                                <span>ثانیه</span>
                            </div>
                            <div class="time-box">
                                <strong data-unit="minutes">00</strong>
                                <span>دقیقه</span>
                            </div>
                            <div class="time-box">
                                <strong data-unit="hours">00</strong>
                                <span>ساعت</span>
                            </div>
                            <div class="time-box">
                                <strong data-unit="days">00</strong>
                                <span>روز</span>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo $img; ?>/landing/jump-kid.svg" class="jump-kid" alt="">
        </div>
    </section>
    <section id="landing-gallery">
        <div class="container">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-12 col-md-4 mt-5 mt-md-0 p-sm-0">
                    <div class="landing-stack text-center order-last order-md-first">
                        <div class="swiper" id="landing-gallery-slider">
                            <div class="swiper-wrapper">
                                <?php
                                $gallery_slides = get_field( 'landing_gallery' );
                                if ( empty( $gallery_slides ) ) {
                                    $gallery_slides = array(
                                        array( 'painting' => $img . '/upload2.png', 'name' => 'آرشام' ),
                                        array( 'painting' => $img . '/upload3.png', 'name' => 'داوین' ),
                                        array( 'painting' => $img . '/upload4.png', 'name' => 'آران' ),
                                        array( 'painting' => $img . '/upload2.png', 'name' => 'آرشام' ),
                                        array( 'painting' => $img . '/upload3.png', 'name' => 'داوین' ),
                                        array( 'painting' => $img . '/upload4.png', 'name' => 'آران' ),
                                    );
                                }
                                foreach ( $gallery_slides as $slide ) :
                                    $painting     = isset( $slide['painting'] ) ? $slide['painting'] : '';
                                    $painting_url = is_array( $painting ) ? ( isset( $painting['url'] ) ? $painting['url'] : '' ) : $painting;
                                    $painting_alt = is_array( $painting ) && ! empty( $painting['alt'] ) ? $painting['alt'] : 'نقاشی منتخب';
                                    $winner_name  = isset( $slide['name'] ) ? trim( (string) $slide['name'] ) : '';
                                    if ( empty( $painting_url ) ) {
                                        continue;
                                    }
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="landing-gallery-item">
                                            <?php if ( $winner_name ) : ?>
                                                <div class="landing-winner-tag">
                                                    <span class="landing-winner-tag__name"><?php echo esc_html( $winner_name ); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <img src="<?php echo esc_url( $painting_url ); ?>" alt="<?php echo esc_attr( $painting_alt ); ?>">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 text-center order-first order-md-last">
                    <div class="d-flex flex-row justify-content-center">
<span><img src="<?php echo $img;?>/starr.svg" alt=""></span>
                        <h2>دوستان کوچولو دلیس  </h2>
                        <span><img src="<?php echo $img;?>/starr.svg" alt=""></span>

                    </div>
                    <p>
                        دنیای دلیس پر از رنگ و خلاقیته! اینجا می‌تونید نقاشی‌های دوستای کوچولومون در دوره قبل رو ببینید.                    </p>

                    <a href="#landing-form" class="delis-btn secondary d-none d-md-inline-block">آپلود نقاشی</a>

                </div>

            </div>
        </div>
    </section>
    <section id="landing-paper">
        <div class="container position-relative">
            <div class="row align-items-center justify-content-between g-3">
                <div class="col-12 col-md-5">
                    <div class=" right-align">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/dotted.svg" class="position-absolute img-dotted" alt="">

                        <h2>اگر برگه نقاشی نداری دانلود کن</h2>
                    </div>
                    <p class="">
                        فایل دیجیتال برگه نقاشی مخصوص دلیس رو دانلود کن، پرینت بگیر و با رنگ‌ها و خلاقیت خودت نقاشی رو کامل کن. یک سرگرمی ساده و دوست‌داشتنی برای ساختن لحظه‌های شاد و خلاقانه در کنار دلیس!                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#landing-download-modal" class="delis-btn mt-4 d-none d-md-inline-block">دانلود فایل نقاشی</a>
                </div>
<div class="col-md-6 position-relative">
    <div>
        <img src="<?php echo get_template_directory_uri()?>/assets/images/gilass.svg" class="position-absolute img-gilass shape-float" alt="">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/gilass2.svg" class="position-absolute img-gilass2 shape-float" alt="">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/gilass4.svg" class="position-absolute img-gilass4 shape-float" alt="">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/gilass5.svg" class="position-absolute img-gilass5 shape-float" alt="">

    </div>

    <img src="<?php echo $img;?>/Group53.png" class="img-fluid" alt="">
    <a href="#" data-bs-toggle="modal" data-bs-target="#landing-download-modal" class="delis-btn mt-4 d-inline-block d-md-none">دانلود فایل نقاشی</a>

</div>

                    </div></div>

    </section>
    <section id="landing-form">
        <div class="container position-relative">

            <h2>نقاشیت رو برای ما بفرست</h2>
            <div class="landing-form-card">
                <?php get_template_part( 'template/template', 'campaign-form', array( 'inline' => true ) ); ?>
            </div>
        </div>
    </section>
    <section id="delis-sale">

        <div class="container">
            <div class="row g-3">
                <div class="col-md-6">
                    <h4>
                        دلیس، تخفیفان و کودک‌پدیا؛ دست به دست هم برای یک مهر شادتر
                    </h4>
                    <p>
                        این لندینگ آماده‌ست تا پارتنرهایی مثل تخفیفان و کودک‌پدیا، دلیس را در سایت خودشون معرفی کنن و خانواده‌ها را مستقیم به مسابقه نقاشی لینک بدن.
                    </p>
                </div>
                <div class="col-md-6 order-first order-md-last text-center position-relative">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Vector405.svg" class="position-absolute girl-beat" alt="">
                    <img src="<?php echo get_template_directory_uri()?>/assets/images/Group209.svg"  class="position-absolute beat"  alt="">

                </div>
            </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="discount-section">
                    <div class="discount-box">

                        <div class="discount-header row align-items-center g-3">
                            <div class="col-md-6">
                                <div class="discount-title">
                                    تخفیفان
                                </div>
                            </div>

                            <div class="col-md-6 text-start">
                                <div class="discount-badge">
                                    تفریح بیشتر، با تخفیف بیشتر!
                                </div>
                            </div>
                        </div>

                        <div class="discount-line"></div>

                        <div class="discount-content">
                            بعد از شرکت در مسابقه، پیشنهادهای جذاب تخفیفان برای
                            تفریح و سرگرمی خانواد‌ه‌ها را ببین و برای یک روز شاد
                            و هیجان‌انگیز آماده شو.
                        </div>

                        <a href="#" class="discount-button">
                            مشاهده تخفیف‌های تخفیفان
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="discount-section">
                    <div class="discount-box">

                        <div class="discount-header row align-items-center g-3">
                            <div class="col-md-6">
                                <div class="discount-title">
                                    کودک پدیا
                                </div>
                            </div>

                            <div class="col-md-6 text-start">
                                <div class="discount-badge">
                                    وقتشه یک تفریح تازه پیدا کنی!                                </div>
                            </div>
                        </div>

                        <div class="discount-line"></div>

                        <div class="discount-content">
                            با کودک‌پدیا، دنیای بازی و سرگرمی را کشف کن و از پیشنهادهای ویژه خانه‌های بازی و مراکز تفریحی برای کودکان و خانواده‌ها باخبر شو.
                        </div>

                        <a href="#" class="discount-button">
                            مشاهده تخفیف‌های تخفیفان
                        </a>

                    </div>
                </div>

            </div>

        </div>

            <div class="row g-3">
                <div class="steps-section">
                    <div class="steps-row">

                        <div class="step-item">
                            <div class="step-icon">
                                <img src="<?php echo $img?>/Star.svg" alt="">
                            </div>

                            <div class="step-content">

                                <h3>معرفی برند دلیس در سایت پارتنر با بنر<br> و محتوای اختصاصی</h3>

                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-icon">
                                <img src="<?php echo $img?>/Star.svg" alt="">
                            </div>

                            <div class="step-content">
                                <h3>لینک مستقیم کاربران پارتنر به لندینگ <br>مسابقه نقاشی دلیس</h3>

                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-icon">
                                <img src="<?php echo $img?>/Star.svg" alt="">
                            </div>

                            <div class="step-content">
                                <h3>ووچر تخفیف خانه‌بازی و شهربازی برای <br>جذب بیشتر خانواده‌ها</h3>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<div class="modal fade" id="landing-download-modal" tabindex="-1" aria-labelledby="landing-download-title" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down">
        <div class="modal-content">
            <a data-bs-dismiss="modal" aria-label="بستن">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="48" viewBox="0 0 23 48" fill="none">
                    <path class="line" d="M22 24L1 46.5M1 24L22 46.5" stroke="#FFCD00" stroke-width="2" stroke-linecap="round"/>
                    <path class="heart" d="M17.4051 1.04384C12.2381 0.508416 11.4519 5.03243 11.4519 6.17166C11.4519 5.03243 10.5323 1.04384 6.31856 1.04384C2.03173 1.04384 1.02335 5.83599 2.9077 8.30826C5.18783 11.2998 11.4519 16 11.4519 16C11.4519 16 18.0527 11.1722 19.9635 8.30826C22.2442 4.89001 20.4791 1.36237 17.4051 1.04384Z" stroke="#FFCD00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <h3 id="landing-download-title">برگه نقاشیت را انتخاب کن</h3>
            <p>یکی از طرح‌ها را دانلود کن، روی کاغذ بکش و عکسش را برای ما بفرست.</p>
            <div class="row g-3  p-5 landing-sheet-grid">
                <?php
                $sheets = array(
                    array('draw.svg', 'برگه ۱', 'مداد و کتاب'),
                    array('draw1.svg', 'برگه ۲', 'دسر خوشمزه'),
                    array('draw2.svg', 'برگه ۳', 'ستاره و قلب'),
                    array('draw3.svg', 'برگه ۴', 'نقاشی آزاد'),
                    array('draw4.svg', 'برگه ۴', 'نقاشی آزاد'),
                    array('draw5.svg', 'برگه ۴', 'نقاشی آزاد'),
                    array('draw6.svg', 'برگه ۴', 'نقاشی آزاد'),
                    array('draw4.svg', 'برگه ۴', 'نقاشی آزاد'),

                );
                foreach ( $sheets as $sheet ) :
                    $file = $img . '/' . $sheet[0];
                    ?>
                    <div class="col-6 col-md-3">
                        <div class="landing-sheet">
                            <div class="landing-sheet-preview">
                                <img src="<?php echo esc_url( $file ); ?>" alt="<?php echo esc_attr( $sheet[1] ); ?>">
                            </div>

                            <a href="<?php echo esc_url( $file ); ?>" download="<?php echo esc_attr( $sheet[0] ); ?>" class="delis-btn secondary">دانلود</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer('landing');