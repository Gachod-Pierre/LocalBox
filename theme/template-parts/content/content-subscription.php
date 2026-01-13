<?php

/**
 * Template part for displaying subscription page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php _tw_post_thumbnail(); ?>

	<!-- Section Présentation Abonnement -->
	<section class="bg-[#f4f0ef] py-16 mb-16 w-screen ml-[calc(-50vw+50%)]">
		<div class="max-w-[1200px] mx-auto px-6 md:px-10">
			<h2 class="text-3xl md:text-5xl font-black uppercase tracking-wide text-black mb-5">
				Notre Abonnement
			</h2>

			<p class="text-base md:text-lg text-zinc-800 leading-relaxed mb-4">
				Découvrez notre formule d'abonnement exclusif : recevez chaque mois une box unique pendant 12 mois !
			</p>

			<p class="text-sm text-zinc-600 leading-relaxed mb-4">
				Chaque box renferme une sélection de produits variés, soigneusement choisis pour vous surprendre et vous faire découvrir de nouvelles expériences tout au long de l'année. En vous abonnant, vous bénéficiez d'un tarif avantageux et d'une livraison automatique chaque mois, sans vous préoccuper de renouveler votre commande.
			</p>

			<p class="text-sm text-zinc-600 leading-relaxed mb-10">
				Offrez-vous (ou offrez à quelqu'un) un an de découvertes, de plaisir et de nouveautés livrés directement à domicile !
			</p>

			<div class="grid grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-6 md:gap-10 items-center">

				<div class="text-left">
					<h3 class="text-2xl md:text-3xl font-black uppercase leading-tight text-black mb-5">
						12 Box &amp; 1 Gratuite
					</h3>

					<?php
					$product_id = 263;
					$product = wc_get_product($product_id);
					$product_url = get_permalink($product_id);
					?>

					<a
						href="<?php echo esc_url($product_url); ?>"
						class="inline-flex items-center justify-center rounded-full px-8 py-4 bg-[#dc3b5f] text-white font-semibold uppercase tracking-wide text-sm transition-colors hover:bg-[#c12a50] no-underline">
						M'abonner aux box mensuelles
					</a>

					<?php if ($product): ?>
						<p class="mt-3 text-xs text-zinc-500">
							<?php echo wp_kses_post($product->get_price_html()); ?> • Paiement mensuel • Livraison automatique
						</p>
					<?php endif; ?>

				</div>

				<!-- Center -->
				<div class="text-center">
					<span class="block text-5xl md:text-6xl font-black text-black leading-none">
						45€
					</span>
					<span class="block text-lg md:text-2xl font-bold text-zinc-800 mt-2">
						/MOIS
					</span>
				</div>

				<!-- Right -->
				<div class="text-center">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/main-box.svg'); ?>"
						alt="Box Abonnement"
						class="w-full max-w-[280px] mx-auto h-auto" />
				</div>
			</div>
		</div>
	</section><!-- .subscription-hero -->

	<div <?php _tw_content_class('entry-content'); ?>>
		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', '_tw'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						__('Edit <span class="sr-only">%s</span>', '_tw'),
						array(
							'span' => array('class' => array()),
						)
					),
					get_the_title()
				)
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->