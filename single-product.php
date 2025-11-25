<?php
get_header();
$terms = wp_get_post_terms(get_the_ID(),'product-category');

$all_flavors = array();
if (have_rows('flavor_items')):
    while (have_rows('flavor_items')) : the_row();
        if (get_row_layout() == 'product_flavor'):
            $flavor = get_sub_field('flavor');
            $image = get_sub_field('image');
            $name = get_sub_field('name');
            $shape1 = get_sub_field('shape_1');
            $shape2 = get_sub_field('shape_2');
            array_push($all_flavors, array(
                'name' => $flavor->slug,
                'image' => $image['sizes']['large'],
                'pname'=>$name,
                'shape1'=>$shape1,
                'shape2'=>$shape2
            ));
        endif;
    endwhile;
endif;
?>
<div id="single-product-wrap" class="<?php echo $all_flavors[0]['name'] ?>">
    <div class="background-color">
        <div class="scale-anim">
        </div>
    </div>
    <section id="product-hero" class="<?php echo $terms[0]->slug; ?>">
        <div class="gradient"></div>
        <div class="h-100 position-relative container">
            <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1'];?>" alt="">
            <img class="shape-float shape shape2" src="<?php echo $all_flavors[0]['shape2'];?>" alt="">
            <div class="big-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="1433" height="231" viewBox="0 0 1433 231"
                     fill="none">
                    <g filter="url(#filter0_g_2170_1012)">
                        <path d="M4.00039 223.24L10.6704 17.3402H52.7204L124.06 160.6L194.53 17.3402H236.58L241.51 223.24H192.5L189.89 121.74L140.01 223.24H103.76L54.1704 122.9L50.4004 223.24H4.00039ZM300.727 59.6802C282.747 59.6802 271.437 47.2102 271.437 31.8402C271.437 16.4702 282.457 4.00022 300.727 4.00022C318.997 4.00022 330.017 16.4702 330.017 31.8402C330.017 47.2102 318.997 59.6802 300.727 59.6802ZM324.507 75.0502V223.24H277.237V75.0502H324.507ZM405.234 226.14C374.784 226.14 357.384 209.32 357.384 178.29V8.64023H404.654V173.65C404.654 182.06 409.004 185.83 416.544 185.83C420.604 185.83 424.664 184.67 427.564 182.64L438.584 216.28C431.914 222.08 419.154 226.14 405.234 226.14ZM448.858 223.24V8.64023H496.128V133.34L550.068 75.3402H606.328L539.918 146.68C543.978 149.29 547.748 153.06 550.648 157.41L560.798 173.36C566.598 181.77 574.138 186.99 585.738 186.99C592.408 186.99 597.338 185.25 602.848 182.64L612.708 217.44C601.978 223.82 589.508 226.43 576.458 226.43C550.358 226.43 534.408 217.44 521.358 195.69L511.208 179.74C506.278 171.33 501.638 166.11 496.128 162.92V223.24H448.858ZM672.464 225.85C635.924 225.85 607.794 211.64 603.154 181.77L642.304 172.2C644.624 182.06 655.934 189.89 674.204 189.89C685.224 189.89 693.634 186.12 693.634 179.74C693.634 173.07 681.164 171.33 666.664 169.01C630.124 163.21 611.854 148.71 611.854 122.03C611.854 90.7102 641.724 72.4402 676.234 72.4402C705.814 72.4402 732.204 87.2302 735.974 111.88L697.694 122.9C695.374 115.07 687.544 108.69 673.624 108.69C663.764 108.69 656.514 112.46 656.514 118.84C656.514 125.8 669.274 128.99 681.454 131.31C717.704 137.4 738.004 148.71 738.004 178C738.004 209.32 707.264 225.85 672.464 225.85ZM759.532 223.24V8.64023H806.802V75.0502L804.772 107.53C816.372 85.2002 835.512 73.0202 858.422 73.0202C893.802 73.0202 912.072 97.0902 911.782 143.2L911.202 223.24H863.932L864.512 146.1C864.512 126.38 857.842 116.52 844.792 116.52C833.482 116.52 823.332 123.48 816.662 143.2C810.862 158.57 807.092 184.38 806.512 223.24H759.532ZM1089.81 76.2102V223.24H1042.54L1043.7 199.46C1033.84 217.15 1017.89 226.14 996.725 226.14C957.865 226.14 934.375 198.59 934.375 155.38C934.375 139.14 937.855 124.64 944.525 112.17C958.155 87.5202 981.935 73.0202 1008.9 73.0202C1029.2 73.0202 1043.99 81.1402 1051.82 93.9002L1055.88 76.2102H1089.81ZM1015.86 113.91C995.855 113.91 983.095 130.73 983.095 153.64C983.095 173.94 992.665 185.25 1008.61 185.25C1027.46 185.25 1042.25 167.56 1042.25 143.49C1042.25 125.22 1032.1 113.91 1015.86 113.91ZM1122.6 223.24V8.64023H1169.87V133.34L1223.81 75.3402H1280.07L1213.66 146.68C1217.72 149.29 1221.49 153.06 1224.39 157.41L1234.54 173.36C1240.34 181.77 1247.88 186.99 1259.48 186.99C1266.15 186.99 1271.08 185.25 1276.59 182.64L1286.45 217.44C1275.72 223.82 1263.25 226.43 1250.2 226.43C1224.1 226.43 1208.15 217.44 1195.1 195.69L1184.95 179.74C1180.02 171.33 1175.38 166.11 1169.87 162.92V223.24H1122.6ZM1364.76 226.14C1348.23 226.14 1334.02 223.24 1322.13 217.44C1297.48 205.26 1283.56 182.35 1283.56 151.03C1283.56 135.66 1286.75 122.03 1293.71 110.14C1306.76 86.9402 1330.83 73.0202 1359.25 73.0202C1375.78 73.0202 1389.41 76.5002 1399.56 83.7502C1420.73 98.2502 1428.85 125.8 1424.21 162.05H1331.99C1334.31 175.97 1347.07 185.83 1368.53 185.83C1380.13 185.83 1391.73 181.48 1398.69 173.36L1423.92 202.07C1412.61 215.99 1394.34 226.14 1364.76 226.14ZM1361.28 106.66C1346.2 106.66 1335.76 116.81 1332.57 131.31H1384.77C1384.48 114.78 1375.78 106.66 1361.28 106.66Z"/>
                    </g>
                    <defs>
                        <filter id="filter0_g_2170_1012" x="0" y="0" width="1432.85" height="230.43"
                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                            <feTurbulence type="fractalNoise" baseFrequency="0.125 0.125" numOctaves="3"
                                          seed="2108"/>
                            <feDisplacementMap in="shape" scale="8" xChannelSelector="R" yChannelSelector="G"
                                               result="displacedImage" width="100%" height="100%"/>
                            <feMerge result="effect1_texture_2170_1012">
                                <feMergeNode in="displacedImage"/>
                            </feMerge>
                        </filter>
                    </defs>
                </svg>
            </div>
            <div class="product-frame">
                <a class="next-product"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-single/arrow-next.png"></a>
                <div class="product-frame-wrap">
                    <div class="product-image-outer">
                        <div class="product-image-inner">
                            <img id="product-main-image" src="<?php echo $all_flavors[0]['image'] ?>"
                                 class="product img-fluid">
                        </div>
                    </div>
                </div>
                <a class="prev-product"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/product-single/arrow.png"></a>
            </div>
            <div>
                <h1 class="shape" id="product-name"><?php echo $all_flavors[0]['pname'];?></h1>
            </div>
        </div>
    </section>
    <section id="product-info">
        <div class="container h-100">
            <div class="row h-100 justify-content-evenly align-items-center">
                <div class="col-12 col-lg-3">
                    <div class="product-desc">
                        <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1'];?>" alt="">
                        <h3>میلک شیک موزی</h3>
                        <p class="">یه جرعه خنک، لطیف و موزی برای وقتی که هوس یه طعم ساده و خوش‌حال‌کننده می‌کنی.
                            سبک، دلنشین و درست همون اندازه‌ای که حالتو بهتر کنه.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div id="product-box">

                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-5 gap-5">
                        <a class="next-product"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/product-single/arrow-next.png"></a>
                        <a class="prev-product"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/product-single/arrow.png"></a>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="product-desc">
                        <h3>ترکیب دلنشینش:</h3>
                        <p class="">یه جرعه خنک، لطیف و موزی برای وقتی که هوس یه طعم ساده و خوش‌حال‌کننده می‌کنی.
                            سبک، دلنشین و درست همون اندازه‌ای که حالتو بهتر کنه.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="product-slogan">
        <div class="container h-100 position-relative">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="slogan">
                        دلیس با یک رویای بزرگ متولد شد. پر کردن لحظه‌هاتون با طعم‌های جادویی.
                    </div>
                </div>
            </div>
            <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1'];?>" alt="">
            <img class="shape-float shape shape2" src="<?php echo $all_flavors[0]['shape2'];?>" alt="">
        </div>
    </section>
    <section id="product-decorative">
    </section>
    <section id="product-others">
        <div class="title-group">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-single/oher-product.png">
            <h2>بقیه دسرها</h2>
        </div>
        <div class="container">
            <div id="other-product" class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    $categories = get_terms(
                        array(
                            'taxonomy' => 'product-category',
                            'hide_empty' => false,
                            'exclude' => array(get_the_ID())
                        )
                    );
                    foreach ($categories as $category) :
                        $cat = get_field('image', 'term_' . $category->term_id);
                        ?>
                        <div class="swiper-slide">
                            <div class="select-category">
                                <span><?php echo $category->name; ?></span>
                                <img class="mx-auto d-block img-fluid" src="<?php echo $cat['url']; ?>"
                                     alt="<?php echo $cat['title']; ?>">
                            </div>
                        </div>
                    <?php
                    endforeach; ?>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    let index = 1;
    var flavors =<?php echo json_encode($all_flavors);?>;
    document.querySelectorAll('.next-product').forEach(function (t) {
        t.addEventListener('click', function (e) {
            if (index === flavors.length - 1) {
                index = 0
            } else {
                index++
            }
            changeFlavor()
        })
    })
    document.querySelectorAll('.prev-product').forEach(function (t) {
        t.addEventListener('click', function (e) {
            if (index === 0) {
                index = flavors.length - 1
            } else {
                index--
            }
            changeFlavor()
        })
    })

    function changeFlavor() {
        document.querySelector('#single-product-wrap').className = "";
        document.querySelector('#single-product-wrap').classList.add(flavors[index].name)
        setTimeout(function (t) {
            document.getElementById('product-main-image').src = flavors[index].image
            document.getElementById('product-name').innerHTML = flavors[index].pname
            document.querySelector('.shape1').src = flavors[index].shape1
            document.querySelector('.shape2').src = flavors[index].shape2
        }, 500)
    }

</script>
<?php
get_footer();
?>

