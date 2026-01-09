<?php
/**
 * Template part for displaying shop page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<?php _tw_post_thumbnail(); ?>

	<div <?php _tw_content_class( 'entry-content' ); ?>>

		<!-- Contenu principal de la page -->
		<?php the_content(); ?>

		<!-- Section produits -->
		<section class="shop-products">
			<h2><?php _e( 'Nos Produits', '_tw' ); ?></h2>

			<?php
			// Afficher les produits (si WooCommerce est actif)
			if ( class_exists( 'WooCommerce' ) ) {
				// WooCommerce shortcode
				echo do_shortcode( '[products limit="12" columns="3"]' );
			} else {
				// Afficher un message si WooCommerce n'est pas activé
				echo '<div class="shop-notice">';
				echo '<p>' . __( 'Le plugin WooCommerce n\'est pas activé. Veuillez installer et activer WooCommerce pour afficher les produits.', '_tw' ) . '</p>';
				echo '</div>';
			}
			?>
		</section><!-- .shop-products -->

		<?php
		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', '_tw' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Edit <span class="sr-only">%s</span>', '_tw' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

<style>
.shop-products {
	margin: 40px 0;
	padding: 30px;
	background-color: #f9f9f9;
	border-radius: 8px;
}

.shop-products h2 {
	margin-bottom: 30px;
	text-align: center;
	color: #333;
}

.shop-notice {
	padding: 20px;
	background-color: #fff3cd;
	border: 1px solid #ffeaa7;
	border-radius: 4px;
	color: #856404;
	text-align: center;
}

/* Styles pour les produits WooCommerce */
.products {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
	gap: 20px;
	margin: 0;
}

.product {
	background: white;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	transition: transform 0.3s, box-shadow 0.3s;
}

.product:hover {
	transform: translateY(-5px);
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.product img {
	width: 100%;
	height: 250px;
	object-fit: cover;
	display: block;
}

.product-info {
	padding: 15px;
}

.product-info h3 {
	margin: 0 0 10px 0;
	font-size: 16px;
}

.product-info .price {
	color: #007bff;
	font-weight: bold;
	margin-bottom: 10px;
}

.product-info .button {
	width: 100%;
	padding: 10px;
	background-color: #007bff;
	color: white;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	font-weight: 600;
	transition: background-color 0.3s;
}

.product-info .button:hover {
	background-color: #0056b3;
}
</style>
