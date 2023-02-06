<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MilkanTrninic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); 
	
	?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'milkantrninic' ); ?></a>

        <header id="masthead" class="site-header">
			<div class="headergreybox"></div>
            <div class="site-branding">
                <a href="<?php echo get_site_url();?>" class="custom-logo-link" rel="home" aria-current="page"><img
                        width="32" height="32" src="<?php echo IMG_DIR;?>logo.svg"
                        class="custom-logo" alt="seniorwptest">
				</a>
                <?php
			//the_custom_logo();
			
			if ( is_front_page() && is_home() ) :
				//Removed from frontpage
			else :
				?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
			endif;
			$milkantrninic_description = get_bloginfo( 'description', 'display' );
			if ( ($milkantrninic_description || is_customize_preview()) && ( !is_front_page() && !is_home() ) ) :
				?>
                <p class="site-description">
                    <?php echo $milkantrninic_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
            </nav><!-- #site-navigation -->
			<nav id="site-navigation" class="mobile-main-navigation">
                <div class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e( '', 'milkantrninic' ); ?>
					<img
                        width="25" height="25" src="<?php echo IMG_DIR;?>icon-hamburger.svg"
                        class="icon-hamburger icon-open" alt="icon hamburger">
						<img
                        width="20" height="20" src="<?php echo IMG_DIR;?>icon-close.svg"
                        class="icon-hamburger icon-close" alt="icon hamburger">
					</div>
                <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			<script>
				document.querySelector('.mobile-main-navigation .menu-toggle').addEventListener('click', () => {
				document.querySelector(".mobile-main-navigation .menu-top-menu-container").classList.toggle("show");
				document.querySelector('.mobile-main-navigation .menu-toggle .icon-open').classList.toggle("hide");
				document.querySelector('.mobile-main-navigation .menu-toggle .icon-close').classList.toggle("show");
				
				});
				document.addEventListener('click', (event) =>{ var x = event.target; console.log(x)});
				document.querySelector('.mobile-main-navigation  .menu-top-menu-container').addEventListener('click', () => {
				document.querySelector(".mobile-main-navigation .menu-top-menu-container").classList.toggle("show");
				document.querySelector('.mobile-main-navigation .menu-toggle .icon-open').classList.toggle("hide");
				document.querySelector('.mobile-main-navigation .menu-toggle .icon-close').classList.toggle("show");
				
				});
				
</script>
            </nav>
        </header><!-- #masthead -->