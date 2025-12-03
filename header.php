<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'delis' ); ?></a>

<div id="wrapper">
    <header class="custom-header d-flex justify-content-between align-items-center">
        <?php get_template_part( 'template/template','navbar'); ?>
        <div class="header-icon left">
            <a class="nav-button" href="#">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/toggle-btn.svg" alt="">
            </a>
        </div>

        <div class="header-logo text-center">
            <a href="<?php echo home_url();?>">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/Logo-delis.png"  class="text-logo" alt="Delis" /></a>
        </div>

        <div class="header-icon right">
            <a class="menu-btn">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/Menuu.svg" alt="">
            </a>
        </div>

    </header>

	<main id="main">
		<?php