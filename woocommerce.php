<?php
/**
 * The template for displaying all woocommerce pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );


?>

<div class="wrapper colson-wrapper" id="woocommerce-wrapper">

	<div class="row">
		<section id="category-title" class="category-title-area">
			<div class="container">
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>

					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
				</header>
			</div>
		</section>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

			<?php
				$template_name = '\archive-product.php';
				$args = array();
				$template_path = '';
				$default_path = untrailingslashit( plugin_dir_path(__FILE__) ) . '\woocommerce';

					if ( is_singular( 'product' ) ) {

						woocommerce_content();

			//For ANY product archive, Product taxonomy, product search or /shop landing page etc Fetch the template override;
				} 	elseif ( file_exists( $default_path . $template_name ) )
					{
					wc_get_template( $template_name, $args, $template_path, $default_path );

			//If no archive-product.php template exists, default to catchall;
				}	else  {
					woocommerce_content( );
				}

			;?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
