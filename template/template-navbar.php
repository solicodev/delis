<?php
$navbar = wp_get_nav_menu_items('main-menu');
?>
<div class="fullscreen-menu">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-6">
                <?php if ($navbar): ?>
                <nav>
                    <?php foreach ($navbar as $menu): ?>
                    <div class="nav-item-wrap">
                        <a href="<?php echo $menu->url; ?>">
                            <div class="d-inline-flex justify-content-start align-items-center">
                                <img src="<?php echo get_field('menu_item_image',$menu) ?>" alt="">
                                <span><?php echo $menu->title; ?></span>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </nav>
                <?php endif;?>
            </div>
            <div class="col-5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/navbar-shape.png" class="img-fluid"
                     alt="">
            </div>
        </div>
    </div>
</div>