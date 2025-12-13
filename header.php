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
                <svg xmlns="http://www.w3.org/2000/svg" width="53" height="31" viewBox="0 0 53 31" fill="none">
                    <path class="heart" d="M48.4051 1.04384C43.2381 0.508416 42.4519 5.03243 42.4519 6.17166C42.4519 5.03243 41.5323 1.04384 37.3186 1.04384C33.0317 1.04384 32.0234 5.83599 33.9077 8.30826C36.1878 11.2998 42.4519 16 42.4519 16C42.4519 16 49.0527 11.1722 50.9635 8.30826C53.2442 4.89001 51.4791 1.36237 48.4051 1.04384Z" stroke="#FFCD00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <line class="line" x1="1" y1="10" x2="26" y2="10" stroke="#FFCD00" stroke-width="2" stroke-linecap="round"/>
                    <line class="line" x1="1" y1="20" x2="32" y2="20" stroke="#FFCD00" stroke-width="2" stroke-linecap="round"/>
                    <path class="line" d="M1 30H50" stroke="#FFCD00" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="48" viewBox="0 0 23 48" fill="none">
                    <path class="line" d="M22 24L1 46.5M1 24L22 46.5" stroke="#FFCD00" stroke-width="2" stroke-linecap="round"/>
                    <path class="heart" d="M17.4051 1.04384C12.2381 0.508416 11.4519 5.03243 11.4519 6.17166C11.4519 5.03243 10.5323 1.04384 6.31856 1.04384C2.03173 1.04384 1.02335 5.83599 2.9077 8.30826C5.18783 11.2998 11.4519 16 11.4519 16C11.4519 16 18.0527 11.1722 19.9635 8.30826C22.2442 4.89001 20.4791 1.36237 17.4051 1.04384Z" stroke="#FFCD00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="header-logo text-center">
            <a href="<?php echo home_url();?>">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/Logo-delis.png"  class="text-logo" alt="Delis" /></a>
        </div>

        <div class="header-icon right">
            <a class="menu-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="50" viewBox="0 0 29 50" fill="none">
                    <path class="heart" d="M20.4051 1.04384C15.2381 0.508416 14.4519 5.03243 14.4519 6.17166C14.4519 5.03243 13.5323 1.04384 9.31856 1.04384C5.03173 1.04384 4.02335 5.83599 5.9077 8.30826C8.18783 11.2998 14.4519 16 14.4519 16C14.4519 16 21.0527 11.1722 22.9635 8.30826C25.2442 4.89001 23.4791 1.36237 20.4051 1.04384Z" stroke="#FFCD00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle class="line" cx="14.5" cy="35.5" r="6.5" stroke="#FFCD00" stroke-width="2"/>
                    <rect class="line" x="1" y="22" width="27" height="27" rx="7" stroke="#FFCD00" stroke-width="2"/>
                    <circle class="line" cx="23" cy="27" r="1" fill="#FFCD00"/>
                </svg>
            </a>
        </div>

    </header>

	<main id="main">
		<?php