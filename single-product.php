<?php
get_header();
$product_info = get_field('product_info');
$all_flavors = array();
if (have_rows('flavor_items')):
    while (have_rows('flavor_items')) : the_row();
        if (get_row_layout() == 'product_flavor'):
            $flavor = get_sub_field('flavor');
            $image = get_sub_field('image');
            $name = get_sub_field('name');
            $shape1 = get_sub_field('shape_1');
            $shape2 = get_sub_field('shape_2');
            $desc = get_sub_field('short_description');
            $product_info = get_sub_field('product_info');
            if ($product_info):
                $ingredients = $product_info['ingredients'];
                $ingredientHtml = '';
                foreach ($ingredients as $ingredient) {
                    $ingredientHtml .= ' ' . $ingredient['name'] . '،';
                }
                $nutrition_facts = $product_info['nutrition_fact'];
                $nutritionHtml = '';
                foreach ($nutrition_facts as $nutrition_fact) :
                    $nutritionHtml.= '<div class="item"><div class="name"><span class="icon ' . $nutrition_fact['name']['value'] . '"></span><span class="text">' . $nutrition_fact['name']['label'] . '</span></div><div class="value">' . $nutrition_fact['value'] . '</div></div>';
            endforeach; endif;
            array_push($all_flavors, array(
                'name' => $flavor->slug,
                'image' => $image['sizes']['large'],
                'pname' => $name,
                'shape1' => $shape1,
                'shape2' => $shape2,
                'desc' => $desc,
                'ingredient' => $ingredientHtml,
                'nutrition' => $nutritionHtml,
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
    <section id="product-hero" class="<?php echo $post->post_name; ?>">
        <div class="gradient"></div>
        <div class="h-100 position-relative container">
            <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1']; ?>" alt="">
            <img class="shape-float shape shape2" src="<?php echo $all_flavors[0]['shape2']; ?>" alt="">
            <div class="big-text">
                <?php echo get_field('english_name'); ?>
            </div>
            <div class="product-frame">
                <a class="slider-btn next-product">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="23" viewBox="0 0 17 23" fill="none">
                        <path d="M15.8426 10.2553L1.57668 0.185218C0.91427 -0.282368 0 0.191366 0 1.00219V21.1423C0 21.9532 0.914269 22.4269 1.57668 21.9593L15.8426 11.8892C16.4071 11.4908 16.4071 10.6537 15.8426 10.2553Z"
                              fill="#10069F"/>
                    </svg>
                    </span>
                </a>
                <div class="product-frame-wrap">

                    <div class="product-image-outer">
                        <div class="product-image-inner">
                            <img id="product-main-image" src="<?php echo $all_flavors[0]['image'] ?>"
                                 class="product img-fluid">
                        </div>
                    </div>

                </div>
                <a class="slider-btn prev-product">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="23" viewBox="0 0 17 23" fill="none">
                        <path d="M15.8426 10.2553L1.57668 0.185218C0.91427 -0.282368 0 0.191366 0 1.00219V21.1423C0 21.9532 0.914269 22.4269 1.57668 21.9593L15.8426 11.8892C16.4071 11.4908 16.4071 10.6537 15.8426 10.2553Z"
                              fill="#10069F"/>
                    </svg>
                    </span>
                </a>
            </div>
            <div>
                <h1 class="shape product-name"><?php echo $all_flavors[0]['pname']; ?></h1>
            </div>
        </div>
    </section>
    <section id="product-info">
        <div class="container h-100">
            <div class="row h-100 justify-content-evenly align-items-center">
                <div class="col-12 col-lg-3">
                    <div class="product-desc">
                        <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1']; ?>" alt="">
                        <h2 ><?php echo get_the_title() ?></h2>
                        <p id="short-description">
                            <?php echo $all_flavors[0]['desc']; ?>
                        </p>
                        <p class="d-none d-lg-block">
                            <strong>ترکیب دلنشین: </strong>
                            <span id="ingredient-wrap">
                                 <?php echo $all_flavors[0]['ingredient']; ?>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div id="product-box">
                    </div>
                    <div class="d-flex align-items-center justify-content-center my-5 gap-5">
                        <a class="slider-btn next-product">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="23" viewBox="0 0 17 23" fill="none">
                        <path d="M15.8426 10.2553L1.57668 0.185218C0.91427 -0.282368 0 0.191366 0 1.00219V21.1423C0 21.9532 0.914269 22.4269 1.57668 21.9593L15.8426 11.8892C16.4071 11.4908 16.4071 10.6537 15.8426 10.2553Z"
                              fill="#10069F"/>
                    </svg>
                    </span>
                        </a>
                        <a class="slider-btn prev-product">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="23" viewBox="0 0 17 23" fill="none">
                        <path d="M15.8426 10.2553L1.57668 0.185218C0.91427 -0.282368 0 0.191366 0 1.00219V21.1423C0 21.9532 0.914269 22.4269 1.57668 21.9593L15.8426 11.8892C16.4071 11.4908 16.4071 10.6537 15.8426 10.2553Z"
                              fill="#10069F"/>
                    </svg>
                    </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="product-desc d-none d-lg-block">
                        <h3 class="nutrition-facts-title">جدول ارزش غذایی:</h3>
                        <div class="nutrition-facts">
                            <?php echo $all_flavors[0]['nutrition']; ?>
                        </div>
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
            <img class="shape-float shape shape1" src="<?php echo $all_flavors[0]['shape1']; ?>" alt="">
            <img class="shape-float shape shape2" src="<?php echo $all_flavors[0]['shape2']; ?>" alt="">
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
                    $categories = get_posts(
                        array(
                            'post_type' => 'product',
                            'posts_per_page' => -1,
                            'exclude' => array(get_the_ID())
                        )
                    );
                    foreach ($categories as $category) :
                        ?>
                        <div class="swiper-slide">
                            <div class="select-category">
                                <span><?php echo $category->post_title; ?></span>
                                <img class="mx-auto d-block img-fluid" src="<?php echo get_the_post_thumbnail_url($category); ?>"
                                     alt="<?php echo $category->post_title; ?>">
                                <a class="stretched-link" href="<?php echo get_the_permalink($category); ?>"></a>
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
            document.getElementById('ingredient-wrap').innerHTML = flavors[index].ingredient
            document.getElementById('short-description').innerHTML = flavors[index].desc
            document.querySelector('.nutrition-facts').innerHTML = flavors[index].nutrition
            document.querySelector('.nutrition-facts').innerHTML = flavors[index].nutrition
            document.querySelectorAll('.product-name').forEach(function (item) {
                item.innerHTML = flavors[index].pname
            })

            document.querySelectorAll('.shape1').forEach(function (item) {
                item.src = flavors[index].shape1
            })
            document.querySelectorAll('.shape2').forEach(function (item) {
                item.src = flavors[index].shape2
            })
        }, 500)
    }

</script>
<?php
get_footer();
?>

