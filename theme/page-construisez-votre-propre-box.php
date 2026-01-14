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
											<div class="flex flex-col md:flex-row items-center justify-between gap-8 py-12 px-8">
												<!-- Left: Region Info -->
												<div class="w-full md:w-1/4 flex flex-col justify-center">
													<p class="text-sm italic text-gray-600 mb-2">Soleil et convivialité</p>
													<h4 class="text-5xl md:text-6xl font-black mb-6 leading-tight text-[#2d5a3d]"><?php echo esc_html($region_name); ?></h4>
													<div class="flex items-center gap-4">
														<button type="button" class="select-region px-8 py-3 bg-[#2d5a3d] text-white rounded-full font-bold uppercase text-sm w-fit" data-region="<?php echo esc_attr($region_slug); ?>">
															Choisir cette box
														</button>
														<button class="carousel-prev flex-shrink-0 p-2 hover:opacity-70 transition-opacity">
															<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-x-[-1]">
																<path d="M20.3653 14.8754L19.3432 15.3075C16.4458 16.7624 14.2736 20.33 14.0782 23.5478C14.074 23.6196 14.0523 23.7473 14.1305 23.7763L19.4578 25C19.5106 22.6307 20.1894 20.2023 21.7113 18.3602C23.4931 16.2035 26.251 15.1213 29 14.8754L29 10.112C26.2494 9.83388 23.4894 8.75055 21.7118 6.57756C20.2079 4.73911 19.5186 2.35927 19.4589 8.50574e-07L14.0766 1.23953C14.3386 4.77552 16.4125 8.31363 19.6876 9.81806C19.8973 9.91462 20.1419 10.0233 20.3659 10.0629C20.3801 10.1843 20.3152 10.094 20.2877 10.094L0.0475394 10.094L0.000527078 10.141L0.000526871 14.8754L20.3653 14.8754Z" fill="#154F41"/>
															</svg>
														</button>
														<button class="carousel-next flex-shrink-0 p-2 hover:opacity-70 transition-opacity">
															<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M20.3653 14.8754L19.3432 15.3075C16.4458 16.7624 14.2736 20.33 14.0782 23.5478C14.074 23.6196 14.0523 23.7473 14.1305 23.7763L19.4578 25C19.5106 22.6307 20.1894 20.2023 21.7113 18.3602C23.4931 16.2035 26.251 15.1213 29 14.8754L29 10.112C26.2494 9.83388 23.4894 8.75055 21.7118 6.57756C20.2079 4.73911 19.5186 2.35927 19.4589 8.50574e-07L14.0766 1.23953C14.3386 4.77552 16.4125 8.31363 19.6876 9.81806C19.8973 9.91462 20.1419 10.0233 20.3659 10.0629C20.3801 10.1843 20.3152 10.094 20.2877 10.094L0.0475394 10.094L0.000527078 10.141L0.000526871 14.8754L20.3653 14.8754Z" fill="#154F41"/>
															</svg>
														</button>
													</div>
												</div>

												<!-- Center: Region Image (Large) -->
												<div class="w-full md:w-3/4 flex justify-center items-center">
													<div class="relative w-96 h-96 md:w-full md:h-96 flex items-center justify-center">
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

									echo '</div>'; // .carousel-wrapper
								}
							}
							?>
						</div>

					</section><!-- .shop-products -->

					<!-- Terminer la composition Button -->
					<div id="finishBoxContainer" class="flex justify-center py-12 px-5 bg-[#f5f1ed] hidden">
						<button id="finishBoxButton" type="button" class="px-8 py-3 bg-[#2d5a3d] text-white rounded-full font-bold uppercase text-sm hover:opacity-80 transition-opacity">
							Terminer la composition
						</button>
					</div>

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
			const currentSpan = document.getElementById('carouselCurrent');
			let currentIndex = 0;
			const itemCount = carousel ? carousel.querySelectorAll('.carousel-item').length : 0;

			function updateCarousel() {
				if (!carousel) return;
				const offset = -currentIndex * 100;
				carousel.style.transform = `translateX(${offset}%)`;
				if (currentSpan) currentSpan.textContent = currentIndex + 1;
			}

			function setupCarouselButtons() {
				const prevBtns = document.querySelectorAll('.carousel-prev');
				const nextBtns = document.querySelectorAll('.carousel-next');

				prevBtns.forEach(btn => {
					btn.removeEventListener('click', prevClickHandler);
					btn.addEventListener('click', prevClickHandler);
				});

				nextBtns.forEach(btn => {
					btn.removeEventListener('click', nextClickHandler);
					btn.addEventListener('click', nextClickHandler);
				});
			}

			function prevClickHandler() {
				currentIndex = (currentIndex - 1 + itemCount) % itemCount;
				updateCarousel();
			}

			function nextClickHandler() {
				currentIndex = (currentIndex + 1) % itemCount;
				updateCarousel();
			}

			// Initial setup
			setupCarouselButtons();

			// Handle "Choisir cette box" button - filter products by region without page reload
			const selectRegionBtns = document.querySelectorAll('.select-region');
			console.log('Found select-region buttons:', selectRegionBtns.length);
			selectRegionBtns.forEach(function(btn) {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					console.log('Button clicked!');
					// Show finish button
					const finishContainer = document.getElementById('finishBoxContainer');
					console.log('Finish container:', finishContainer);
					if (finishContainer) {
						finishContainer.classList.remove('hidden');
						console.log('Button should be visible now');
					}
					const region = this.getAttribute('data-region');
					if (region) {
						// Save region to localStorage
						localStorage.setItem('selectedRegion', region);
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

			// Handle "Terminer la composition" button
			const finishButton = document.getElementById('finishBoxButton');
			if (finishButton) {
				finishButton.addEventListener('click', function(e) {
					e.preventDefault();
					localStorage.removeItem('selectedRegion');
					location.reload();
				});
			}

			// Restore region from localStorage on page load
			window.addEventListener('load', function() {
				const savedRegion = localStorage.getItem('selectedRegion');
				if (savedRegion) {
					console.log('Restoring region from localStorage:', savedRegion);
					// Show finish button
					const finishContainer = document.getElementById('finishBoxContainer');
					if (finishContainer) {
						finishContainer.classList.remove('hidden');
					}
					// Load products for saved region
					const nonceField = document.querySelector('input[name="localbox_nonce_field"]');
					const nonce = nonceField ? nonceField.value : '';

					fetch(ajaxurl, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded',
						},
						body: new URLSearchParams({
							'action': 'localbox_load_filtered_products',
							'nonce': nonce,
							'region': savedRegion,
							'category': 'epicerie-fine',
							'paged': 1
						})
					})
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							const productsSection = document.querySelector('.shop-products');
							if (productsSection) {
								const gridParent = productsSection.querySelector('.products-grid')?.parentElement || productsSection;
								gridParent.innerHTML = data.data.html;
							}
						}
					})
					.catch(error => console.error('Fetch error:', error));
				}
			});
		})();
	</script>

<?php
get_footer();

