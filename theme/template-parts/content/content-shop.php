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

	<div <?php _tw_content_class('entry-content'); ?>>
		<!-- Contenu principal de la page (vide pour shop) -->
	</div><!-- .entry-content -->

	<!-- Section produits - en dehors de entry-content pour pleine largeur -->
	<section class="shop-products px-5 py- bg-[#f5f1ed] md:px-10 pb-20">
		<h2 class="shop-title text-5xl font-black uppercase pb-20 pt-10 md:text-4xl">Tous nos produits</h2>

		<?php
		// If filter params are present, redirect to the real shop archive so Woo filters apply.
		if (class_exists('WooCommerce')) {
			$has_filters = false;
			foreach (array_keys($_GET) as $key) {
				if ($key === 'product_cat' || $key === 'orderby' || strpos($key, 'filter_') === 0) {
					$has_filters = true;
					break;
				}
			}
			// Avoid redirect loops: never redirect if we're already on the real shop archive
			if ($has_filters && !is_shop() && !is_post_type_archive('product')) {
				$shop_url = wc_get_page_permalink('shop');
				$args = array_map('wp_unslash', $_GET);
				$args = array_filter($args, function ($v) {
					return $v !== '' && $v !== null;
				});
				wp_safe_redirect(esc_url_raw(add_query_arg($args, $shop_url)));
				exit;
			}
		}
		?>
		<!-- Filtres (liés aux filtres WooCommerce) -->
		<?php get_template_part('woocommerce/filter-bar'); ?>

		<?php
		// Afficher les produits (si WooCommerce est actif)
		if (class_exists('WooCommerce')) {
			// Listing basique via shortcode (non filtré ici). Les filtres redirigent vers l'archive.
			echo do_shortcode('[products limit="10" columns="5" paginate="true"]');
		} else {
			// Afficher un message si WooCommerce n'est pas activé
			echo '<div class="shop-notice p-5 bg-yellow-100 border border-yellow-300 rounded text-yellow-900 text-center">';
			echo '<p>' . __('Le plugin WooCommerce n\'est pas activé. Veuillez installer et activer WooCommerce pour afficher les produits.', '_tw') . '</p>';
			echo '</div>';
		}
		?>
	</section><!-- .shop-products -->


	<?php
	get_template_part('template-parts/content-front/makeyourown-section');
	?>

	<?php
	get_template_part('template-parts/content-front/content-subscription');
	?>



	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__('Edit <span class="sr-only">%s</span>', '_tw'),
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