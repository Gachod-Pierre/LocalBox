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
	<section class="shop-products px-5 py- bg-[#f5f1ed] md:px-10">
		<h2 class="shop-title text-5xl font-black uppercase pb-20 pt-10 md:text-4xl">Tous nos produits</h2>

		<!-- Filtres -->
		<div class="shop-filters flex gap-5 mb-12 flex-wrap items-center">
			<div class="filter-item flex-1 min-w-[150px]">
				<button class="filter-btn w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase cursor-pointer tracking-widest transition-all hover:bg-gray-100 flex items-center justify-between">Sectaire <span class="text-[10px] ml-2.5">▼</span></button>
			</div>
			<div class="filter-item flex-1 min-w-[150px]">
				<button class="filter-btn w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase cursor-pointer tracking-widest transition-all hover:bg-gray-100 flex items-center justify-between">Type de produits <span class="text-[10px] ml-2.5">▼</span></button>
			</div>
			<div class="filter-item flex-1 min-w-[150px]">
				<button class="filter-btn w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase cursor-pointer tracking-widest transition-all hover:bg-gray-100 flex items-center justify-between">Prix <span class="text-[10px] ml-2.5">▼</span></button>
			</div>
			<div class="filter-item flex-1 min-w-[150px]">
				<button class="filter-btn w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase cursor-pointer tracking-widest transition-all hover:bg-gray-100 flex items-center justify-between">Quantité <span class="text-[10px] ml-2.5">▼</span></button>
			</div>
		</div>

		<?php
		// Afficher les produits (si WooCommerce est actif)
		if (class_exists('WooCommerce')) {
			// WooCommerce shortcode avec 4 colonnes
			echo do_shortcode('[products limit="8" columns="4" paginate="true"]');
		} else {
			// Afficher un message si WooCommerce n'est pas activé
			echo '<div class="shop-notice p-5 bg-yellow-100 border border-yellow-300 rounded text-yellow-900 text-center">';
			echo '<p>' . __('Le plugin WooCommerce n\'est pas activé. Veuillez installer et activer WooCommerce pour afficher les produits.', '_tw') . '</p>';
			echo '</div>';
		}
		?>
	</section><!-- .shop-products -->


	<?php
	// Ajout de la section "makeyourown" avant le footer
	get_template_part('template-parts/content-front/makeyourown-section');
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