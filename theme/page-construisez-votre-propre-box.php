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
						// Output nonce for AJAX
						wp_nonce_field('localbox_nonce', 'localbox_nonce_field');

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
								<h2 class="shop-title text-7xl md:text-6xl font-black uppercase pb-6 pt-10">Construisez votre box</h2>
								<p class="text-base md:text-lg leading-relaxed max-w-3xl mx-auto px-5">
									C'est toi qui la composeras avec des produits de chez nous ou d'un autre coin que tu aimes. Tu choisis tes goûts, tes surprises, et tu réunis dans un seul coffret tout ce qui te fait vibrer : de petites gourmandises, de l'artisanat local ou même des objets spéciaux qui racontent une histoire.
								</p>
							</div>

							<?php
							if (class_exists('WooCommerce')) {
								// Get all region categories (excluding epicerie-fine, uncategorized, and box)
								$excluded_slugs = array('epicerie-fine', 'uncategorized', 'box');
								$excluded_ids = array();

								foreach ($excluded_slugs as $slug) {
									$term = get_term_by('slug', $slug, 'product_cat');
									if ($term && !is_wp_error($term)) {
										$excluded_ids[] = $term->term_id;
									}
								}

								$region_categories = get_terms(array(
									'taxonomy' => 'product_cat',
									'hide_empty' => false,
									'exclude' => $excluded_ids,
								));

								$total_carousel = count($region_categories);

								if ($region_categories && !is_wp_error($region_categories) && $total_carousel > 0) {
									echo '<div class="carousel-wrapper relative bg-[#f5f1ed] rounded-lg p-8 md:p-12">';

									// Top section with title and counter
									echo '<div class="flex justify-between items-start mb-8">';
									echo '<h3 class="text-4xl md:text-5xl font-black text-[#2d5a3d] uppercase">Choisissez votre box</h3>';
									echo '<div class="carousel-counter text-2xl font-bold"><span id="carouselCurrent">1</span>/<span id="carouselTotal">' . esc_html($total_carousel) . '</span></div>';
									echo '</div>';

									// Carousel container
									echo '<div class="carousel-container overflow-hidden relative">';
									echo '<div class="carousel-items flex transition-transform duration-300" id="productCarousel">';

									foreach ($region_categories as $index => $region_cat) {
										$region_slug = $region_cat->slug;
										$region_name = $region_cat->name;
										$region_image = get_term_meta($region_cat->term_id, 'thumbnail_id', true);
										$region_image_url = $region_image ? wp_get_attachment_url($region_image) : '';
										?>
										<div class="carousel-item w-full flex-shrink-0" data-region="<?php echo esc_attr($region_slug); ?>">
											<div class="flex flex-col md:flex-row items-center justify-between gap-8 py-12">
												<!-- Left: Region Info -->
												<div class="w-full md:w-1/3 flex flex-col justify-center">
													<p class="text-sm italic text-gray-600 mb-2">Soleil et convivialité</p>
													<h4 class="text-5xl md:text-6xl font-black mb-6 leading-tight text-[#2d5a3d]"><?php echo esc_html($region_name); ?></h4>
													<button type="button" class="select-region px-8 py-3 bg-[#2d5a3d] text-white rounded-full font-bold uppercase text-sm w-fit" data-region="<?php echo esc_attr($region_slug); ?>">
														Choisir cette box
													</button>
												</div>

												<!-- Right: Region Image -->
												<div class="w-full md:w-2/3 flex justify-center md:justify-end">
													<div class="relative w-80 h-80 md:w-96 md:h-96 flex items-center justify-center">
														<?php if ($region_image_url) : ?>
															<img src="<?php echo esc_url($region_image_url); ?>" alt="<?php echo esc_attr($region_name); ?>" class="w-full h-full object-contain">
														<?php else : ?>
															<div class="text-gray-400 text-center">
																<p class="text-lg font-semibold"><?php echo esc_html($region_name); ?></p>
															</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
										<?php
									}

									echo '</div>'; // .carousel-items
									echo '</div>'; // .carousel-container

									// Navigation Arrows
									echo '<button class="carousel-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 px-4 py-2 text-3xl font-bold text-[#2d5a3d]">‹</button>';
									echo '<button class="carousel-next absolute right-0 top-1/2 -translate-y-1/2 z-10 px-4 py-2 text-3xl font-bold text-[#2d5a3d]">›</button>';

									echo '</div>'; // .carousel-wrapper
								}
							}
							?>
						</div>

					</section><!-- .shop-products -->

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
		// Make ajaxurl available if not already defined
		if (typeof ajaxurl === 'undefined') {
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		}

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

			// Handle "Choisir cette box" button - filter products by region without page reload
			const selectRegionBtns = document.querySelectorAll('.select-region');
			selectRegionBtns.forEach(function(btn) {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					const region = this.getAttribute('data-region');
					if (region) {
						// Get nonce
						const nonceField = document.querySelector('input[name="localbox_nonce_field"]');
						const nonce = nonceField ? nonceField.value : '';

						console.log('Loading products for region:', region, 'nonce:', nonce);

						// Update URL with pushState (no reload)
						const currentURL = new URL(window.location);
						currentURL.searchParams.set('product_cat', 'epicerie-fine');
						currentURL.searchParams.set('region', region);
						window.history.pushState({region: region}, '', currentURL.toString());

						// Load products via AJAX
						fetch(ajaxurl, {
							method: 'POST',
							headers: {
								'Content-Type': 'application/x-www-form-urlencoded',
							},
							body: new URLSearchParams({
								'action': 'localbox_load_filtered_products',
								'nonce': nonce,
								'region': region,
								'category': 'epicerie-fine',
								'paged': 1
							})
						})
						.then(response => {
							console.log('Response status:', response.status);
							return response.json();
						})
						.then(data => {
							console.log('Response data:', data);
							if (data.success) {
								// Update products grid
								const productsSection = document.querySelector('.shop-products');
								if (productsSection) {
									const gridParent = productsSection.querySelector('.products-grid')?.parentElement || productsSection;
									gridParent.innerHTML = data.data.html;
								}

								// Scroll to products section smoothly
								if (productsSection) {
									setTimeout(() => {
										productsSection.scrollIntoView({behavior: 'smooth', block: 'start'});
									}, 100);
								}
							} else {
								console.error('AJAX error:', data.data);
							}
						})
						.catch(error => console.error('Fetch error:', error));
					}
				});
			});
		})();
	</script>

<?php
get_footer();

