<?php
/**
 * Template Name: Faire ma propre box
 * Description: Template personnalisé pour la page de création de box avec produits filtrés
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package _tw
 */

get_header();
?>

	<section id="primary">
		<main id="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				// Display page title and content
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php _tw_post_thumbnail(); ?>

					<div <?php _tw_content_class('entry-content'); ?>>
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<!-- Section produits filtrés par catégorie -->
					<section class="shop-products px-5 py- bg-[#f5f1ed] md:px-10">
						<h2 class="shop-title text-5xl font-black uppercase pb-20 pt-10 md:text-4xl"><?php the_title(); ?></h2>

						<?php
						// Get the filtered category from meta or default to "epicerie-fine"
						$filtered_category = get_post_meta(get_the_ID(), '_shop_filtered_category', true);
						if (!$filtered_category) {
							$filtered_category = 'epicerie-fine'; // Default category slug
						}

						// Force the category filter in the URL if not already set
						if (class_exists('WooCommerce')) {
							$current_cat = isset($_GET['product_cat']) ? sanitize_text_field(wp_unslash($_GET['product_cat'])) : '';

							// If no category selected, force redirect with the filtered category
							if (!$current_cat && !isset($_GET['orderby'])) {
								wp_safe_redirect(esc_url_raw(add_query_arg('product_cat', $filtered_category, get_permalink())));
								exit;
							}

							// If category is explicitly changed to something else, allow it
							if ($current_cat && $current_cat !== $filtered_category) {
								// User wants to see a different category, allow it
							}
						}
						?>

						<!-- Filtres (liés aux filtres WooCommerce) -->
						<?php get_template_part('template-parts/woocommerce/filter-bar'); ?>

						<?php
						// Display products with the filtered category
						if (class_exists('WooCommerce')) {
							// Build the shortcode with the filtered category
							$shortcode = '[products category="' . esc_attr($filtered_category) . '" limit="10" columns="5" paginate="true"]';
							echo do_shortcode($shortcode);
						} else {
							echo '<div class="shop-notice p-5 bg-yellow-100 border border-yellow-300 rounded text-yellow-900 text-center">';
							echo '<p>' . __('Le plugin WooCommerce n\'est pas activé.', '_tw') . '</p>';
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

				<?php

				// If comments are open or we have at least one comment, load the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
