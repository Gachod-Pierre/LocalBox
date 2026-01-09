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

	<?php _tw_post_thumbnail(); ?>

	<div <?php _tw_content_class( 'entry-content' ); ?>>
		<!-- Contenu principal de la page (vide pour shop) -->
	</div><!-- .entry-content -->

	<!-- Section produits - en dehors de entry-content pour pleine largeur -->
	<section class="shop-products">
			<h2 class="shop-title">Tous nos produits</h2>

			<!-- Filtres -->
			<div class="shop-filters">
				<div class="filter-item">
					<button class="filter-btn">Sectaire <span>▼</span></button>
				</div>
				<div class="filter-item">
					<button class="filter-btn">Type de produits <span>▼</span></button>
				</div>
				<div class="filter-item">
					<button class="filter-btn">Prix <span>▼</span></button>
				</div>
				<div class="filter-item">
					<button class="filter-btn">Quantité <span>▼</span></button>
				</div>
			</div>

			<?php
			// Afficher les produits (si WooCommerce est actif)
			if ( class_exists( 'WooCommerce' ) ) {
				// WooCommerce shortcode avec 4 colonnes
				echo do_shortcode( '[products limit="12" columns="4"]' );
			} else {
				// Afficher un message si WooCommerce n'est pas activé
				echo '<div class="shop-notice">';
				echo '<p>' . __( 'Le plugin WooCommerce n\'est pas activé. Veuillez installer et activer WooCommerce pour afficher les produits.', '_tw' ) . '</p>';
				echo '</div>';
			}
			?>
		</section><!-- .shop-products -->

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
	margin: 0;
	padding: 40px;
	background-color: #f5f1ed;
	border-radius: 0;
}

.shop-title {
	font-size: 48px;
	font-weight: 900;
	text-transform: uppercase;
	margin: 0 0 40px 0;
	color: #000;
	letter-spacing: 0.5px;
}

/* Filtres */
.shop-filters {
	display: flex;
	gap: 20px;
	margin-bottom: 50px;
	flex-wrap: wrap;
	align-items: center;
}

.filter-item {
	flex: 1;
	min-width: 150px;
}

.filter-btn {
	width: 100%;
	padding: 12px 20px;
	background: white;
	border: 2px solid #000;
	border-radius: 30px;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
	cursor: pointer;
	letter-spacing: 0.5px;
	transition: all 0.3s;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.filter-btn:hover {
	background-color: #f0f0f0;
}

.filter-btn span {
	font-size: 10px;
	margin-left: 10px;
}

.shop-notice {
	padding: 20px;
	background-color: #fff3cd;
	border: 1px solid #ffeaa7;
	border-radius: 4px;
	color: #856404;
	text-align: center;
}

/* WooCommerce Styles */
.shop-products .woocommerce {
	background: transparent !important;
	padding: 0 !important;
	margin: 0 !important;
}

/* Result count et sorting */
.shop-products .woocommerce-result-count {
	display: none;
}

.shop-products .woocommerce-ordering {
	display: none;
}

/* Grille de produits */
.shop-products ul.products,
.shop-products .products {
	display: grid !important;
	grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
	gap: 20px !important;
	margin: 0 !important;
	padding: 0 !important;
	list-style: none !important;
	width: 100% !important;
	align-items: stretch !important;
}

.shop-products li.product {
	background: #fef4e8 !important;
	border-radius: 12px !important;
	overflow: hidden !important;
	transition: transform 0.3s, box-shadow 0.3s !important;
	display: flex !important;
	flex-direction: column !important;
	margin: 0 !important;
	padding: 0 !important;
	border: none !important;
	box-shadow: none !important;
	width: 100% !important;
	height: 100% !important;
}

.shop-products li.product:hover {
	transform: translateY(-3px) !important;
	box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1) !important;
}

/* Image du produit */
.shop-products a.woocommerce-loop-product__link {
	display: flex !important;
	flex-direction: column !important;
	height: 100% !important;
	text-decoration: none !important;
	color: inherit !important;
	padding: 0 !important;
}

.shop-products a.woocommerce-loop-product__link img {
	width: 100% !important;
	height: 280px !important;
	object-fit: cover !important;
	display: block !important;
	margin: 0 !important;
	padding: 0 !important;
	flex-shrink: 0 !important;
}

/* Titre du produit */
.shop-products h2.woocommerce-loop-product__title {
	font-size: 16px !important;
	font-weight: 900 !important;
	text-transform: uppercase !important;
	margin: 0 !important;
	color: #000 !important;
	letter-spacing: 0.5px !important;
	padding: 20px 20px 15px 20px !important;
	line-height: 1.4 !important;
	width: 100% !important;
	box-sizing: border-box !important;
	min-height: 50px !important;
	display: flex !important;
	align-items: center !important;
}

/* Prix */
.shop-products .price {
	font-size: 12px !important;
	font-weight: 700 !important;
	margin: 12px 20px 0 20px !important;
	color: #c1392b !important;
	display: block !important;
	width: calc(100% - 40px) !important;
	box-sizing: border-box !important;
}

/* Bouton Ajouter au panier */
.shop-products a.add_to_cart_button.button {
	width: calc(100% - 40px) !important;
	padding: 10px 15px !important;
	background-color: #fff3e0 !important;
	color: #000 !important;
	border: 2px solid #000 !important;
	border-radius: 6px !important;
	cursor: pointer !important;
	font-weight: 700 !important;
	font-size: 11px !important;
	text-transform: uppercase !important;
	letter-spacing: 0.3px !important;
	transition: all 0.3s !important;
	margin: 12px 20px 20px 20px !important;
	margin-top: auto !important;
	display: block !important;
	text-align: center !important;
	text-decoration: none !important;
	box-sizing: border-box !important;
}

.shop-products a.add_to_cart_button.button:hover {
	background-color: #000 !important;
	color: white !important;
}

/* Pagination */
.shop-products .woocommerce-pagination {
	display: flex !important;
	justify-content: center !important;
	margin-top: 40px !important;
	gap: 10px !important;
}

.shop-products .page-numbers {
	padding: 8px 12px;
	border: 1px solid #ccc;
	border-radius: 4px;
	text-decoration: none;
	color: #000;
}

.shop-products .page-numbers.current {
	background: #000;
	color: white;
	border-color: #000;
}

@media (max-width: 1200px) {
	.shop-products ul.products {
		grid-template-columns: repeat(3, 1fr) !important;
	}
}

@media (max-width: 768px) {
	.shop-title {
		font-size: 32px;
	}

	.shop-filters {
		flex-direction: column;
	}

	.filter-item {
		width: 100%;
		min-width: unset;
	}

	.shop-products ul.products {
		grid-template-columns: repeat(2, 1fr) !important;
		gap: 15px !important;
	}

	.shop-products {
		padding: 20px;
	}
}
</style>
