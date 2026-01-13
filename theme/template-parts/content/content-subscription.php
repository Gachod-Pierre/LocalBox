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
	<section class="subscription-hero">
		<div class="subscription-hero-content">
			<h2 class="subscription-title">Notre Abonnement</h2>
			<p class="subscription-intro">
				Découvrez notre formule d'abonnement exclusif : recevez chaque mois une box unique pendant 12 mois !
			</p>
			<p class="subscription-description">
				Chaque box renferme une sélection de produits variés, soigneusement choisis pour vous surprendre et vous faire découvrir de nouvelles expériences tout au long de l'année. En vous abonnant, vous bénéficiez d'un tarif avantageux et d'une livraison automatique chaque mois, sans vous préoccuper de renouveler votre commande.
			</p>
			<p class="subscription-offer">
				Offrez-vous (ou offrez à quelqu'un) un an de découvertes, de plaisir et de nouveautés livrés directement à domicile !
			</p>

			<div class="subscription-offer-wrapper">
				<div class="offer-left">
					<h3 class="offer-title">12 Box & 1 Gratuite</h3>
					<p class="offer-cta">M'abonner au box mensuel</p>
				</div>
				<div class="offer-center">
					<span class="price-amount">45€</span>
					<span class="price-period">/MOIS</span>
				</div>
				<div class="offer-right">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/main-box.svg'); ?>" alt="Box Abonnement" class="offer-image">
				</div>
			</div>
		</div>
	</section><!-- .subscription-hero -->

	<div <?php _tw_content_class( 'entry-content' ); ?>>

		<!-- Contenu principal de la page -->
		<?php the_content(); ?>
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
.subscription-hero {
	background-color: #f4f0ef;
	padding: 60px 0;
	margin-bottom: 60px;
	border-radius: 0;
	width: 100vw;
	margin-left: calc(-50vw + 50%);
}

.subscription-hero-content {
	max-width: 1200px;
	margin: 0 auto;
	padding: 0 40px;
}

.subscription-title {
	font-size: 48px;
	font-weight: 900;
	text-transform: uppercase;
	margin-bottom: 20px;
	color: #000;
	letter-spacing: 1px;
}

.subscription-intro {
	font-size: 18px;
	margin-bottom: 15px;
	color: #333;
	line-height: 1.6;
}

.subscription-description {
	font-size: 14px;
	margin-bottom: 15px;
	color: #555;
	line-height: 1.6;
}

.subscription-offer {
	font-size: 14px;
	margin-bottom: 40px;
	color: #555;
	line-height: 1.6;
}

.subscription-offer-details {
	display: grid;
	grid-template-columns: 1fr auto 1fr;
	gap: 40px;
	align-items: center;
	background: white;
	padding: 40px;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.subscription-offer-wrapper {
	display: grid;
	grid-template-columns: 1fr auto 1fr;
	gap: 40px;
	align-items: center;
	margin-top: 40px;
}

.offer-left {
	text-align: left;
}

.offer-center {
	text-align: center;
}

.offer-right {
	text-align: center;
}

.offer-title {
	font-size: 32px;
	font-weight: 900;
	text-transform: uppercase;
	margin-bottom: 20px;
	color: #000;
	line-height: 1.2;
}

.offer-cta {
	background-color: #dc3b5f;
	color: white;
	padding: 15px 30px;
	border-radius: 50px;
	font-weight: 600;
	display: inline-block;
	text-transform: uppercase;
	cursor: pointer;
	transition: background-color 0.3s;
	font-size: 14px;
	letter-spacing: 0.5px;
	margin-bottom: 0;
}

.offer-cta:hover {
	background-color: #c12a50;
}

.price-amount {
	font-size: 64px;
	font-weight: 900;
	color: #000;
	line-height: 1;
	display: block;
	text-align: center;
}

.price-period {
	font-size: 24px;
	font-weight: 700;
	color: #333;
	margin-top: 10px;
	display: block;
	text-align: center;
}

.offer-image {
	max-width: 280px;
	width: 100%;
	height: auto;
	display: block;
	margin: 0 auto;
}

@media (max-width: 768px) {
	.subscription-offer-details {
		grid-template-columns: 1fr;
		gap: 20px;
		padding: 20px;
	}

	.subscription-title {
		font-size: 32px;
	}

	.offer-title {
		font-size: 24px;
	}

	.price-amount {
		font-size: 48px;
	}

	.price-period {
		font-size: 18px;
	}
}

.subscription-form-section {
	max-width: 600px;
	margin: 40px auto;
	padding: 30px;
	background-color: #f9f9f9;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.subscription-form-section h2 {
	margin-bottom: 20px;
	color: #333;
}

.form-group {
	margin-bottom: 20px;
	display: flex;
	flex-direction: column;
}

.form-group label {
	margin-bottom: 8px;
	font-weight: 500;
	color: #333;
}

.required {
	color: #dc3545;
}

.form-control {
	padding: 12px;
	border: 1px solid #ddd;
	border-radius: 4px;
	font-size: 14px;
	font-family: inherit;
	transition: border-color 0.3s;
}

.form-control:focus {
	outline: none;
	border-color: #007bff;
	box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25);
}

.form-checkbox {
	flex-direction: row;
	align-items: flex-start;
}

.form-checkbox input {
	margin-right: 10px;
	margin-top: 5px;
	width: 18px;
	height: 18px;
	cursor: pointer;
}

.form-checkbox label {
	margin-bottom: 0;
	cursor: pointer;
}

.btn {
	padding: 12px 30px;
	border: none;
	border-radius: 4px;
	font-size: 16px;
	font-weight: 600;
	cursor: pointer;
	transition: all 0.3s;
}

.btn-primary {
	background-color: #007bff;
	color: white;
}

.btn-primary:hover {
	background-color: #0056b3;
}

.btn-primary:disabled {
	background-color: #ccc;
	cursor: not-allowed;
}

.subscription-message {
	margin-top: 20px;
	padding: 15px;
	border-radius: 4px;
	font-weight: 500;
}

.subscription-message.success {
	background-color: #d4edda;
	border: 1px solid #c3e6cb;
	color: #155724;
}

.subscription-message.error {
	background-color: #f8d7da;
	border: 1px solid #f5c6cb;
	color: #721c24;
}
</style>

<script>
document.addEventListener( 'DOMContentLoaded', function() {
	const form = document.getElementById( 'subscription-form' );
	const messageDiv = document.getElementById( 'subscription-message' );

	if ( form ) {
		form.addEventListener( 'submit', function( e ) {
			e.preventDefault();

			const submitBtn = document.getElementById( 'subscribe-btn' );
			submitBtn.disabled = true;
			submitBtn.textContent = 'Traitement...';

			const formData = new FormData( form );
			formData.append( 'action', 'handle_subscription' );

			fetch( '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
				method: 'POST',
				body: formData
			} )
			.then( response => response.json() )
			.then( data => {
				messageDiv.style.display = 'block';

				if ( data.success ) {
					messageDiv.classList.remove( 'error' );
					messageDiv.classList.add( 'success' );
					messageDiv.textContent = 'Merci! Votre abonnement a été créé avec succès.';
					form.reset();
				} else {
					messageDiv.classList.remove( 'success' );
					messageDiv.classList.add( 'error' );
					messageDiv.textContent = data.message || 'Une erreur s\'est produite. Veuillez réessayer.';
				}

				submitBtn.disabled = false;
				submitBtn.textContent = 'S\'abonner maintenant';
			} )
			.catch( error => {
				console.error( 'Error:', error );
				messageDiv.style.display = 'block';
				messageDiv.classList.remove( 'success' );
				messageDiv.classList.add( 'error' );
				messageDiv.textContent = 'Une erreur réseau s\'est produite.';
				submitBtn.disabled = false;
				submitBtn.textContent = 'S\'abonner maintenant';
			} );
		} );
	}
} );
</script>
