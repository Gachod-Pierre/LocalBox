<?php
/**
 * Template Name: Construisez votre propre box
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

					<!-- Section produits -->
					<section class="shop-products px-5 py- bg-[#f5f1ed] md:px-10">

						<?php
						// Get the filtered category from meta or default to "epicerie-fine"
						$filtered_category = get_post_meta(get_the_ID(), '_shop_filtered_category', true);
						if (!$filtered_category) {
							$filtered_category = 'epicerie-fine'; // Default category slug
						}

						if (class_exists('WooCommerce')) {
							$current_cat = isset($_GET['product_cat']) ? sanitize_text_field(wp_unslash($_GET['product_cat'])) : '';

							// If no category selected, force redirect with the filtered category
							if (!$current_cat && !isset($_GET['orderby'])) {
								wp_safe_redirect(esc_url_raw(add_query_arg('product_cat', $filtered_category, get_permalink())));
								exit;
							}
						}
						?>

						<!-- Carousel / Featured Products Section -->
						<div class="featured-carousel mb-16">
							<div class="text-center mb-12">
								<h2 class="shop-title text-7xl md:text-6xl font-black uppercase pb-6 pt-10">Choisissez votre box</h2>
								<p class="text-base md:text-lg leading-relaxed max-w-3xl mx-auto px-5">
									C'est toi qui la composeras avec des produits de chez nous ou d'un autre coin que tu aimes. Tu choisis tes goûts, tes surprises, et tu réunis dans un seul coffret tout ce qui te fait vibrer : de petites gourmandises, de l'artisanat local ou même des objets spéciaux qui racontent une histoire. L'idée, c'est de proposer quelque chose de fun, simple à réaliser et plein de vie, qui donne envie d'ouvrir, de découvrir et de partager. Tu peux créer ta box pour toi ou pour offrir, et faire découvrir à d'autres le bonheur des produits régionaux, avec ton style et ta touche personnelle.
								</p>
							</div>

							<?php
							if (class_exists('WooCommerce')) {
								// Get products from "box" category for carousel
								$carousel_args = array(
									'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => 'box', // Display only "box" category in carousel
										),
									),
									'orderby' => 'date',
									'order' => 'DESC',
								);

								$carousel_products = new WP_Query($carousel_args);
								$total_carousel = $carousel_products->found_posts;

								if ($carousel_products->have_posts()) {
									echo '<div class="carousel-wrapper relative">';
									echo '<div class="carousel-container overflow-hidden">';
									echo '<div class="carousel-items flex transition-transform duration-300" id="productCarousel">';

									while ($carousel_products->have_posts()) {
										$carousel_products->the_post();
										$product = wc_get_product(get_the_ID());
										$category = get_the_terms(get_the_ID(), 'product_cat');
										$category_name = ($category && !is_wp_error($category)) ? $category[0]->name : '';
										?>
										<div class="carousel-item w-full flex-shrink-0 px-5 md:px-10 py-12">
											<div class="flex flex-col md:flex-row items-center justify-between gap-8 md:gap-16 min-h-96">
												<!-- Left: Product Info -->
												<div class="carousel-info w-full md:w-2/5 flex flex-col justify-center">
													<?php if ($category_name): ?>
														<p class="text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider"><?php echo esc_html($category_name); ?></p>
													<?php endif; ?>
													<h3 class="text-4xl md:text-5xl font-black mb-6 leading-tight text-[#2d5a3d]"><?php the_title(); ?></h3>

													<!-- Add to Cart Form -->
													<form method="post" class="cart product-add-to-cart-form inline-flex items-center gap-4">
														<?php
														$min_qty = $product->get_min_purchase_quantity();
														$max_qty = $product->get_max_purchase_quantity();
														$input_value = $min_qty;
														?>
														<input type="hidden" name="quantity" value="<?php echo esc_attr($input_value); ?>" />
														<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="px-8 py-3 bg-[#2d5a3d] text-white rounded-full font-bold uppercase text-sm whitespace-nowrap">
															Choisir cette box
														</button>
													</form>
												</div>

												<!-- Right/Center: Product Image -->
												<div class="carousel-image w-full md:w-3/5 flex justify-center md:justify-end">
													<div class="relative">
														<?php echo woocommerce_get_product_thumbnail('large'); ?>
													</div>
												</div>
											</div>
										</div>
										<?php
									}

									echo '</div>'; // .carousel-items
									echo '</div>'; // .carousel-container

									// Navigation Arrows
									echo '<button class="carousel-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 px-4 py-2 text-2xl font-bold">‹</button>';
									echo '<button class="carousel-next absolute right-0 top-1/2 -translate-y-1/2 z-10 px-4 py-2 text-2xl font-bold">›</button>';

									// Counter
									echo '<div class="carousel-counter text-center mt-6 text-lg font-bold"><span id="carouselCurrent">1</span>/<span id="carouselTotal">' . esc_html($total_carousel) . '</span></div>';

									echo '</div>'; // .carousel-wrapper

									wp_reset_postdata();
								}
							}
							?>
						</div>

						<!-- Filters Section -->
						<h2 class="shop-title text-4xl font-black uppercase pb-8 pt-10 md:text-3xl">Tous nos produits</h2>
						<?php get_template_part('template-parts/woocommerce/filter-bar'); ?>

						<!-- Products Grid -->
						<?php
						if (class_exists('WooCommerce')) {
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

	<script>
		(function() {
			const carousel = document.getElementById('productCarousel');
			const prevBtn = document.querySelector('.carousel-prev');
			const nextBtn = document.querySelector('.carousel-next');
			const currentSpan = document.getElementById('carouselCurrent');
			let currentIndex = 0;
			const itemCount = carousel ? carousel.querySelectorAll('.carousel-item').length : 0;

			function updateCarousel() {
				if (!carousel) return;
				const offset = -currentIndex * 100;
				carousel.style.transform = `translateX(${offset}%)`;
				if (currentSpan) currentSpan.textContent = currentIndex + 1;
			}

			if (prevBtn) {
				prevBtn.addEventListener('click', function() {
					currentIndex = (currentIndex - 1 + itemCount) % itemCount;
					updateCarousel();
				});
			}

			if (nextBtn) {
				nextBtn.addEventListener('click', function() {
					currentIndex = (currentIndex + 1) % itemCount;
					updateCarousel();
				});
			}

			// Quantity controls for carousel add to cart
			const forms = document.querySelectorAll('.carousel-item .product-add-to-cart-form');
			forms.forEach(function(form) {
				const minusBtn = form.querySelector('.qty-minus');
				const plusBtn = form.querySelector('.qty-plus');
				const qtyInput = form.querySelector('input[name="quantity"]');

				if (!qtyInput || !minusBtn || !plusBtn) return;

				const min = parseInt(qtyInput.getAttribute('min')) || 1;
				const max = parseInt(qtyInput.getAttribute('max')) || Infinity;

				minusBtn.addEventListener('click', function(e) {
					e.preventDefault();
					let qty = parseInt(qtyInput.value) || min;
					if (qty > min) qtyInput.value = qty - 1;
				});

				plusBtn.addEventListener('click', function(e) {
					e.preventDefault();
					let qty = parseInt(qtyInput.value) || min;
					if (qty < max) qtyInput.value = qty + 1;
				});
			});
		})();
	</script>

<?php
get_footer();

