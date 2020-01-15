<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer text-center" id="colophon">
					<p class="text-center"><a href="#0"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/genoscreen-logo-center.svg" alt="Logo Genoscreen" class="img-fluid" style="width: 380px;" /></a></p>

					<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

					<p class="legal text-center">©Genoscreen: 2001-<?php echo date("Y"); ?> | <a href="#0">Legal notice</a></p>
				</footer>

			</div>

		</div>

	</div>

</div>
