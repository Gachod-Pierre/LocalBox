<?php
/**
 * Template Name: Formulaire Partenaire
 * Description: Formulaire multi-étapes de candidature pour les fournisseurs
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package _tw
 */

get_header();

// Traiter l'envoi du formulaire
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['supplier_form_nonce'] ) && isset( $_POST['final_step'] ) ) {
	// Vérifier le nonce
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['supplier_form_nonce'] ) ), 'supplier_form_action' ) ) {
		wp_die( 'Erreur de sécurité' );
	}

	// Récupérer et valider les données
	$form_data = array(
		'company_name'         => sanitize_text_field( wp_unslash( $_POST['company_name'] ?? '' ) ),
		'contact_name'         => sanitize_text_field( wp_unslash( $_POST['contact_name'] ?? '' ) ),
		'address'              => sanitize_text_field( wp_unslash( $_POST['address'] ?? '' ) ),
		'region'               => sanitize_text_field( wp_unslash( $_POST['region'] ?? '' ) ),
		'phone'                => sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) ),
		'email'                => sanitize_email( wp_unslash( $_POST['email'] ?? '' ) ),
		'activity_type'        => sanitize_text_field( wp_unslash( $_POST['activity_type'] ?? '' ) ),
		'experience_years'     => sanitize_text_field( wp_unslash( $_POST['experience_years'] ?? '' ) ),
		'company_description'  => sanitize_textarea_field( wp_unslash( $_POST['company_description'] ?? '' ) ),
		'products_list'        => sanitize_textarea_field( wp_unslash( $_POST['products_list'] ?? '' ) ),
		'products_origin'      => sanitize_textarea_field( wp_unslash( $_POST['products_origin'] ?? '' ) ),
		'pricing'              => sanitize_textarea_field( wp_unslash( $_POST['pricing'] ?? '' ) ),
		'monthly_quantity'     => sanitize_textarea_field( wp_unslash( $_POST['monthly_quantity'] ?? '' ) ),
		'delivery_methods'     => sanitize_textarea_field( wp_unslash( $_POST['delivery_methods'] ?? '' ) ),
		'production_capacity'  => sanitize_textarea_field( wp_unslash( $_POST['production_capacity'] ?? '' ) ),
		'certifications'       => sanitize_textarea_field( wp_unslash( $_POST['certifications'] ?? '' ) ),
	);

	// Validation basique
	$errors = array();
	if ( empty( $form_data['company_name'] ) ) {
		$errors[] = 'Le nom de l\'entreprise est obligatoire';
	}
	if ( empty( $form_data['contact_name'] ) ) {
		$errors[] = 'Le nom du contact est obligatoire';
	}
	if ( empty( $form_data['email'] ) || ! is_email( $form_data['email'] ) ) {
		$errors[] = 'L\'adresse email est invalide';
	}
	if ( empty( $form_data['phone'] ) ) {
		$errors[] = 'Le téléphone est obligatoire';
	}

	if ( empty( $errors ) ) {
		// Construire le contenu du mail
		$email_subject = 'Nouvelle candidature fournisseur - ' . $form_data['company_name'];
		$email_body    = "Nouvelle candidature reçue :\n\n";
		$email_body   .= "=== INFORMATIONS SUR L'ENTREPRISE ===\n";
		$email_body   .= "Nom de l'entreprise : " . $form_data['company_name'] . "\n";
		$email_body   .= "Contact principal : " . $form_data['contact_name'] . "\n";
		$email_body   .= "Adresse : " . $form_data['address'] . "\n";
		$email_body   .= "Région : " . $form_data['region'] . "\n";
		$email_body   .= "Téléphone : " . $form_data['phone'] . "\n";
		$email_body   .= "Email : " . $form_data['email'] . "\n\n";

		$email_body .= "=== DESCRIPTION DE L'ACTIVITÉ ===\n";
		$email_body .= "Type d'activité : " . $form_data['activity_type'] . "\n";
		$email_body .= "Expérience : " . $form_data['experience_years'] . "\n";
		$email_body .= "Description : " . $form_data['company_description'] . "\n\n";

		$email_body .= "=== PRODUITS PROPOSÉS ===\n";
		$email_body .= "Liste : " . $form_data['products_list'] . "\n";
		$email_body .= "Origine : " . $form_data['products_origin'] . "\n";
		$email_body .= "Tarifs : " . $form_data['pricing'] . "\n";
		$email_body .= "Quantité/mois : " . $form_data['monthly_quantity'] . "\n\n";

		$email_body .= "=== CONDITIONS ET LOGISTIQUE ===\n";
		$email_body .= "Modalités de livraison : " . $form_data['delivery_methods'] . "\n";
		$email_body .= "Capacité de production : " . $form_data['production_capacity'] . "\n";
		$email_body .= "Certifications : " . $form_data['certifications'] . "\n";

		// Envoyer l'email
		$to      = 'paolameloni1221@gmail.com';
		$headers = array( 'Content-Type: text/plain; charset=UTF-8' );
		$headers[] = 'From: ' . get_option( 'blogname' ) . ' <' . get_option( 'admin_email' ) . '>';
		$headers[] = 'Reply-To: ' . $form_data['email'];

		if ( wp_mail( $to, $email_subject, $email_body, $headers ) ) {
			$success_message = 'Merci ! Votre candidature a été envoyée avec succès. Nous vous contacterons bientôt.';
		} else {
			$errors[] = 'Erreur lors de l\'envoi du formulaire. Veuillez réessayer.';
		}
	}
}
?>

<section id="primary">
	<main id="main">

		<?php
		while ( have_posts() ) :
			the_post();
		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- Section Header - Devenez Fournisseur -->
				<section class="supplier-header bg-[#FF6B35] py-24 relative overflow-hidden">
					<!-- Éléments décoratifs -->
					<div class="absolute top-10 left-10 text-white opacity-70 text-2xl">★</div>
					<div class="absolute top-32 right-20 text-white opacity-70 text-2xl">★</div>
					<div class="absolute bottom-16 left-20 text-white opacity-70 text-2xl">★</div>
					<div class="absolute bottom-10 right-10 text-white opacity-70 text-2xl">★</div>

					<div class="container mx-auto px-5 md:px-10 relative z-10 text-center">
						<p class="text-white text-lg font-bold mb-4 tracking-wider">DEVENEZ</p>
						<h1 class="text-5xl md:text-6xl font-black uppercase text-white mb-8 leading-tight">
							Fournisseur
						</h1>
						<p class="text-white text-lg max-w-2xl mx-auto">
							Participer à la valorisation des produits de votre région en devenant fournisseur LocalBox. Nous collaborons avec des producteurs, artisans et créateurs locaux pour proposer des box authentiques, composées de saveur faire régional. Remplissez le formulaire ci-dessous pour présenter vos produits et rejoindre notre sélection de partenaires.
						</p>
					</div>
				</section>

				<!-- Section Formulaire Multi-étapes -->
				<section class="form-section bg-[#FF6B35] py-20 pb-32">
					<div class="container mx-auto px-5 md:px-10 max-w-4xl">

						<?php if ( ! empty( $success_message ) ) : ?>
							<div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-8 form-success">
								<?php echo esc_html( $success_message ); ?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $errors ) ) : ?>
							<div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-8 form-errors">
								<ul class="list-disc list-inside">
									<?php foreach ( $errors as $error ) : ?>
										<li><?php echo esc_html( $error ); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>

						<div class="bg-[#E8D5C4] p-10 rounded-3xl">
							<!-- Barre de progression -->
							<div class="mb-12">
								<div class="flex justify-between mb-4">
									<span class="text-sm font-black uppercase text-gray-800">Étape <span id="current-step">1</span> / 3</span>
									<span class="text-sm font-black uppercase text-gray-800" id="step-title">Contact & Entreprise</span>
								</div>
								<div class="w-full bg-white bg-opacity-40 rounded-full h-2 overflow-hidden">
									<div id="progress-bar" class="bg-[#FF6B35] h-full rounded-full transition-all duration-300" style="width: 33.33%"></div>
								</div>
							</div>

							<form id="multi-step-form" method="POST" class="space-y-10">
								<?php wp_nonce_field( 'supplier_form_action', 'supplier_form_nonce' ); ?>
								<input type="hidden" name="final_step" id="final_step" value="0">

								<!-- ÉTAPE 1: Contact & Entreprise -->
								<div class="form-step" data-step="1">
									<h2 class="text-2xl font-black uppercase mb-8 text-center">Contact & Entreprise</h2>

									<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
										<input type="text" name="company_name" placeholder="Nom de l'entreprise / producteur" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										<input type="text" name="contact_name" placeholder="Nom du contact principal" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										<input type="text" name="address" placeholder="Adresse complète" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										<input type="text" name="region" placeholder="Région d'activité" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										<input type="tel" name="phone" placeholder="Téléphone" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										<input type="email" name="email" placeholder="Adresse e-mail" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
									</div>
								</div>

								<!-- ÉTAPE 2: Activité & Produits -->
								<div class="form-step hidden" data-step="2">
									<h2 class="text-2xl font-black uppercase mb-8 text-center">Activité & Produits</h2>

									<div class="space-y-6">
										<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
											<input type="text" name="activity_type" placeholder="Type d'activité (producteur, artisan, créateur, autre)" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
											<input type="text" name="experience_years" placeholder="Depuis combien de temps exercez-vous ?" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										</div>

										<textarea name="company_description" placeholder="Présentation de votre entreprise (quelques lignes)" rows="4" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-2xl focus:outline-none focus:ring-2 focus:ring-[#FF6B35]"></textarea>

										<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
											<input type="text" name="products_list" placeholder="Liste des produits" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
											<input type="text" name="products_origin" placeholder="Origine des produits" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
											<input type="text" name="pricing" placeholder="Tarifs indicatifs" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
											<input type="text" name="monthly_quantity" placeholder="Quantité disponible par mois" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										</div>
									</div>
								</div>

								<!-- ÉTAPE 3: Logistique & Validation -->
								<div class="form-step hidden" data-step="3">
									<h2 class="text-2xl font-black uppercase mb-8 text-center">Logistique & Validation</h2>

									<div class="space-y-6">
										<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
											<input type="text" name="delivery_methods" placeholder="Modalités de livraison" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
											<input type="text" name="production_capacity" placeholder="Capacité de production" required class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">
										</div>

										<input type="text" name="certifications" placeholder="Certifications ou labels" class="form-input w-full px-6 py-3 bg-white bg-opacity-60 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35]">

										<div class="flex items-start gap-4 mt-8">
											<input type="checkbox" id="accept_conditions" name="accept_conditions" required class="w-5 h-5 mt-1">
											<label for="accept_conditions" class="text-gray-800">
												Je certifie que les informations fournies sont exactes.
											</label>
										</div>
									</div>
								</div>

								<!-- Navigation Boutons -->
								<div class="flex justify-between gap-4 mt-12">
									<button type="button" id="prev-btn" class="hidden px-8 py-3 bg-gray-400 text-white font-black uppercase rounded hover:bg-gray-500 transition nav-btn">
										← Précédent
									</button>
									<div></div>
									<button type="button" id="next-btn" class="px-8 py-3 bg-[#2C2C2C] text-white font-black uppercase rounded hover:bg-black transition nav-btn">
										Suivant →
									</button>
									<button type="submit" id="submit-btn" class="hidden px-8 py-3 bg-[#2C2C2C] text-white font-black uppercase rounded hover:bg-black transition nav-btn">
										Envoyer
									</button>
								</div>
							</form>
						</div>
					</div>
				</section>

			</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		endwhile;
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger);

let currentStep = 1;
const totalSteps = 3;
const steps = ['Contact & Entreprise', 'Activité & Produits', 'Logistique & Validation'];

// Initialiser le formulaire
document.addEventListener('DOMContentLoaded', () => {
	updateForm();
	loadFormData();
	setupValidation();
});

// Afficher/cacher les étapes
function updateForm() {
	document.querySelectorAll('.form-step').forEach(step => {
		step.classList.add('hidden');
	});
	document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('hidden');

	// Animations GSAP
	gsap.from(`.form-step[data-step="${currentStep}"]`, {
		opacity: 0,
		y: 20,
		duration: 0.5,
		ease: 'power2.out'
	});

	// Mettre à jour la barre de progression
	const progress = (currentStep / totalSteps) * 100;
	gsap.to('#progress-bar', { width: progress + '%', duration: 0.4 });

	document.getElementById('current-step').textContent = currentStep;
	document.getElementById('step-title').textContent = steps[currentStep - 1];

	// Mettre à jour les boutons
	document.getElementById('prev-btn').classList.toggle('hidden', currentStep === 1);
	document.getElementById('next-btn').classList.toggle('hidden', currentStep === totalSteps);
	document.getElementById('submit-btn').classList.toggle('hidden', currentStep !== totalSteps);

	// Animations des boutons
	gsap.from('.nav-btn:not(.hidden)', {
		opacity: 0,
		scale: 0.8,
		duration: 0.4,
		ease: 'back.out'
	});
}

// Validation des champs d'une étape
function validateStep(step) {
	const stepElement = document.querySelector(`.form-step[data-step="${step}"]`);
	const inputs = stepElement.querySelectorAll('.form-input[required]');
	const checkbox = stepElement.querySelector('#accept_conditions[required]');
	let isValid = true;

	inputs.forEach(input => {
		if (!input.value.trim()) {
			isValid = false;
			input.style.borderColor = '#FF6B35';
			gsap.to(input, { duration: 0.2, scale: 0.98 });
		} else {
			input.style.borderColor = '';
		}
	});

	// Vérifier la checkbox si elle existe et est requise
	if (checkbox && !checkbox.checked) {
		isValid = false;
		checkbox.style.accentColor = '#FF6B35';
		gsap.to(checkbox, { duration: 0.2, scale: 0.9 });
	}

	return isValid;
}

// Sauvegarder les données dans sessionStorage
function saveFormData() {
	const form = document.getElementById('multi-step-form');
	const formData = new FormData(form);

	for (let [key, value] of formData.entries()) {
		sessionStorage.setItem(key, value);
	}
}

// Charger les données depuis sessionStorage
function loadFormData() {
	const inputs = document.querySelectorAll('.form-input');
	inputs.forEach(input => {
		const saved = sessionStorage.getItem(input.name);
		if (saved) {
			input.value = saved;
		}
	});
}

// Configuration des événements
function setupValidation() {
	document.getElementById('next-btn').addEventListener('click', () => {
		saveFormData();
		if (validateStep(currentStep)) {
			if (currentStep < totalSteps) {
				currentStep++;
				updateForm();
				window.scrollTo({ top: 0, behavior: 'smooth' });
			}
		}
	});

	document.getElementById('prev-btn').addEventListener('click', () => {
		saveFormData();
		if (currentStep > 1) {
			currentStep--;
			updateForm();
			window.scrollTo({ top: 0, behavior: 'smooth' });
		}
	});

	document.getElementById('multi-step-form').addEventListener('submit', (e) => {
		e.preventDefault();
		if (validateStep(currentStep)) {
			document.getElementById('final_step').value = '1';
			saveFormData();
			document.getElementById('multi-step-form').submit();
		}
	});

	// Hover effects
	document.querySelectorAll('.nav-btn').forEach(btn => {
		btn.addEventListener('mouseenter', () => {
			gsap.to(btn, { scale: 1.05, duration: 0.3, ease: 'power2.out' });
		});
		btn.addEventListener('mouseleave', () => {
			gsap.to(btn, { scale: 1, duration: 0.3, ease: 'power2.out' });
		});
	});
}

// Animation du message de succès
if (document.querySelector('.form-success')) {
	gsap.from('.form-success', {
		opacity: 0,
		y: -20,
		duration: 0.8,
		ease: 'power2.out'
	});
}
</script>

<?php
get_footer();
