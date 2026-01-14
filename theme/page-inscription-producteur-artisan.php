<?php
/**
 * Template Name: Inscription Producteur Artisan
 * Description: Page d'inscription pour les producteurs et artisans
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
		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- Section Titre - Partenariat LocalBox -->
				<section class="partnership-header bg-white py-16 mt-5 mb-20">
					<div class="container mx-auto px-5 md:px-10 text-center">
						<h1 class="text-5xl md:text-6xl font-black uppercase tracking-tight hero-title">
							Partenariat<br>LocalBox
						</h1>
					</div>
				</section>

				<!-- Section Hero - Vous êtes un producteur local -->
				<section class="hero-section relative bg-[#EDAE57] py-20 overflow-visible">
					<!-- Vague en haut -->
					<div class="absolute top-0 left-0 w-full h-20 -translate-y-full">
						<svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-full wave-top">
							<path d="M0,60 Q300,0 600,60 T1200,60 L1200,120 L0,120 Z" fill="#EDAE57"/>
						</svg>
					</div>

					<!-- Onde décorative en bas -->
					<div class="absolute bottom-0 left-0 w-full h-20 translate-y-full wave-bottom">
						<svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-full">
							<path d="M0,60 Q300,0 600,60 T1200,60 L1200,0 L0,0 Z" fill="#EDAE57"/>
						</svg>
					</div>

					<div class="container mx-auto px-5 md:px-10 relative z-10">
						<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
							<!-- Contenu gauche -->
							<div>
								<h1 class="text-4xl md:text-5xl font-black uppercase leading-tight mb-6 text-black hero-content-title">
									Vous êtes un<br>producteur local
								</h1>
								<p class="text-lg mb-6 text-black hero-content-text">
									LocalBox rassemble les meilleurs produits artisanaux et gastronomiques de chaque région de France dans des coffrets uniques envoyés aux quatre coins du pays.
								</p>
								<p class="text-lg mb-8 text-black hero-content-text">
									Nous collaborons directement avec des producteurs engagés, fiers de leur terroir, pour faire connaître leurs créations à un public curieux et gourmand.
								</p>
								<a href="/formulaire-partenaire/" class="inline-block bg-[#d61456] hover:bg-[#b80f47] text-white font-black uppercase px-6 py-3 rounded transition hero-content-btn">
									Remplir notre formulaire →
								</a>
							</div>

							<!-- Image droite -->
							<div class="flex justify-center hero-image">
								<div class="bg-white rounded-2xl overflow-hidden shadow-lg w-full max-w-sm h-80 flex items-center justify-center">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
									<?php else : ?>
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/svg/agricultuer.png' ); ?>" alt="Producteur local" class="w-full h-full object-cover">
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- Section Pourquoi rejoindre Locals Box -->
				<section class="benefits-section bg-white py-20">
					<div class="container mx-auto px-5 md:px-10">
<h2 class="text-3xl md:text-4xl font-black uppercase mb-16 text-center benefits-title">
							Pourquoi rejoindre<br>LocalBox
						</h2>

					<div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start mb-12">
						<!-- Mascottes à gauche -->
						<div class="flex flex-col gap-12 items-center -ml-8">
							<!-- Mascotte Macaron -->
							<div class="w-full max-w-sm h-72 flex items-center justify-center -mb-10 -mr-36 mascotte-macaron">
								<svg viewBox="0 0 400 400" class="w-full h-full" style="max-width: 420px;">
									<image href="<?php echo esc_url( get_template_directory_uri() . '/assets/svg/mascotte-macaron.svg' ); ?>" width="400" height="400" x="0" y="0"/>
								</svg>
							</div>
							<!-- Mascotte Wine -->
							<div class="w-full max-w-sm h-96 flex items-center justify-center -mt-40 -ml-80 mascotte-wine">
								<svg viewBox="0 0 500 500" class="w-full h-full" style="max-width: 500px;">
									<image href="<?php echo esc_url( get_template_directory_uri() . '/assets/svg/mascotte-wine.svg' ); ?>" width="500" height="500" x="0" y="0"/>
								</svg>
							</div>
						</div>

						<!-- Contenu à droite -->
						<div class="space-y-8">
							<!-- Visibilité accrue -->
							<div class="benefit-item">
								<h3 class="text-xl font-black uppercase mb-3">Visibilité accrue</h3>
								<p class="text-gray-800">
									Vos produits sont présentés dans nos box, notre site, et dans nos campagnes de communication.
								</p>
							</div>

							<!-- Ventes simplifiées -->
							<div class="benefit-item">
								<h3 class="text-xl font-black uppercase mb-3">Ventes simplifiées</h3>
								<p class="text-gray-800">
									Nous gérons la logistique, la préparation et l'envoi des box.
								</p>
							</div>

							<!-- Mise en avant authentique -->
							<div class="benefit-item">
								<h3 class="text-xl font-black uppercase mb-3">Mise en avant authentique</h3>
								<p class="text-gray-800">
									Chaque produit est accompagné d'une présentation de votre histoire et de votre savoir-faire.
								</p>
							</div>

							<!-- Partenariat équitable -->
							<div class="benefit-item">
								<h3 class="text-xl font-black uppercase mb-3">Partenariat équitable</h3>
								<p class="text-gray-800">
									Nous construisons ensemble une offre transparente, sans frais cachés.
								</p>
							</div>
							<a href="/formulaire-partenaire/" class="inline-block bg-[#d61456] hover:bg-[#b80f47] text-white font-black uppercase px-6 py-3 rounded transition benefit-btn">
								Remplir notre formulaire →
							</a>
						</div>
					</div>
				</section>

				<!-- Section Comment ça marche -->
				<section class="how-it-works bg-gray-50 py-20">
					<div class="container mx-auto px-5 md:px-10">
						<h2 class="text-3xl md:text-4xl font-black uppercase mb-16 text-center how-title">
							Comment ça marche ?
						</h2>

						<!-- Étapes -->
						<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
							<!-- Étape 1 -->
							<div class="bg-[#fde8b5] p-8 rounded-lg text-center step-item">
								<h3 class="text-xl font-black uppercase mb-4">Étape 1</h3>
								<p class="text-gray-800">
									Remplissez le formulaire de contact pour nous présenter vos produits.
								</p>
							</div>

							<!-- Étape 2 -->
							<div class="bg-[#fde8b5] p-8 rounded-lg text-center step-item">
								<h3 class="text-xl font-black uppercase mb-4">Étape 2</h3>
								<p class="text-gray-800">
									Nous échangeons sur les quantités, la saisonnalité et la disponibilité.
								</p>
							</div>

							<!-- Étape 3 -->
							<div class="bg-[#fde8b5] p-8 rounded-lg text-center step-item">
								<h3 class="text-xl font-black uppercase mb-4">Étape 3</h3>
								<p class="text-gray-800">
									Votre produit est sélectionné pour figurer dans une prochaine Locals Box.
								</p>
							</div>
						</div>

						<!-- Étape 4 - Largeur complète -->
						<div class="bg-[#f5c86c] p-8 rounded-lg text-center step-item-large">
							<h3 class="text-xl font-black uppercase mb-4">Étape 4</h3>
							<p class="text-gray-800">
								Nous gérons la logistique et la promotion – vous concentrez sur votre production.
							</p>
						</div>
					</div>
				</section>

				<!-- Section CTA - Rejoignez-nous -->
				<section class="cta-section bg-[#d61456] py-20 relative overflow-hidden" id="remplir-formulaire">
					<!-- Onde décorative -->
					<div class="absolute top-0 left-0 w-full h-20 bg-white" style="clip-path: polygon(0 0%, 100% 20%, 100% 0%, 0% 0%);"></div>

					<div class="container mx-auto px-5 md:px-10 relative z-10 pt-10">
						<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
							<!-- Contenu gauche -->
							<div>
								<h2 class="text-3xl md:text-4xl font-black uppercase text-white mb-6 cta-title">
									Rejoignez-nous
								</h2>
								<p class="text-white text-lg mb-8 cta-text">
									Faites partie du réseau LocalBox et partagez le goût authentique de votre région ! Contactez notre équipe dès aujourd'hui pour devenir partenaire.
								</p>
								<a href="/formulaire-partenaire/" class="inline-block bg-black hover:bg-gray-900 text-white font-black uppercase px-6 py-3 rounded transition cta-btn">
									Remplir notre formulaire →
								</a>
							</div>

							<!-- Image droite -->
							<div class="flex justify-center cta-image">
								<div class="bg-[#c8f4a1] rounded-2xl overflow-hidden shadow-lg w-full max-w-sm h-80 flex items-center justify-center">
									<img src="https://asset.bloomnation.com/c_pad,d_vendor:global:catalog:product:image.png,f_auto,fl_preserve_transparency,q_auto/v1705623853/vendor/8046/catalog/product/2/0/20230130071712_file_63d817b8eab7b_63d81826349e5.png" alt="Rejoignez Locals Box" class="w-full h-full object-cover">
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- Contenu personnalisé de la page -->
				<section class="page-content py-20 bg-[#d61456]">
					<div class="container mx-auto px-5 md:px-10">
						<div <?php _tw_content_class('entry-content'); ?>>
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div>
				</section>

			</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		endwhile; /* End of the loop. */
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<!-- GSAP et ScrollTrigger Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger);

// Animation du titre Partenariat
gsap.from(".hero-title", {
	scrollTrigger: {
		trigger: ".partnership-header",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 30,
	duration: 1,
	ease: "power2.out"
});

// Animation ondulantes des vagues
gsap.to(".wave-top", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		scrub: 1
	},
	x: 50,
	duration: 2,
	ease: "sine.inOut"
});

gsap.to(".wave-bottom", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		scrub: 1
	},
	x: -50,
	duration: 2,
	ease: "sine.inOut"
});

// Animation hero content
gsap.from(".hero-content-title", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: -50,
	duration: 1,
	ease: "power3.out"
});

gsap.from(".hero-content-text", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 20,
	stagger: 0.2,
	duration: 1,
	ease: "power3.out",
	delay: 0.3
});

gsap.from(".hero-content-btn", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	scale: 0.8,
	duration: 1,
	ease: "back.out",
	delay: 0.6
});

// Animation image hero avec parallax
gsap.from(".hero-image", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: 50,
	scale: 0.9,
	duration: 1,
	ease: "power3.out"
});

gsap.to(".hero-image", {
	scrollTrigger: {
		trigger: ".hero-section",
		start: "top center",
		scrub: 1
	},
	y: 30,
	duration: 1
});

// Animation titre avantages
gsap.from(".benefits-title", {
	scrollTrigger: {
		trigger: ".benefits-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 40,
	duration: 1,
	ease: "power2.out"
});

// Animation mascottes
gsap.from(".mascotte-macaron", {
	scrollTrigger: {
		trigger: ".benefits-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: -100,
	rotation: -15,
	duration: 1.2,
	ease: "back.out",
	delay: 0.2
});

gsap.from(".mascotte-wine", {
	scrollTrigger: {
		trigger: ".benefits-section",
		start: "top 60%",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: -100,
	rotation: 15,
	duration: 1.2,
	ease: "back.out",
	delay: 0.4
});

// Animation items avantages
gsap.from(".benefit-item", {
	scrollTrigger: {
		trigger: ".benefits-section",
		start: "top 60%",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: 50,
	stagger: 0.15,
	duration: 0.8,
	ease: "power3.out"
});

gsap.from(".benefit-btn", {
	scrollTrigger: {
		trigger: ".benefits-section",
		start: "top 60%",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	scale: 0.8,
	duration: 1,
	ease: "back.out",
	delay: 0.7
});

// Animation titre comment ça marche
gsap.from(".how-title", {
	scrollTrigger: {
		trigger: ".how-it-works",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 40,
	duration: 1,
	ease: "power2.out"
});

// Animation étapes avec delay staggeré
gsap.from(".step-item", {
	scrollTrigger: {
		trigger: ".how-it-works",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 50,
	stagger: 0.2,
	duration: 0.8,
	ease: "back.out",
	delay: 0.3
});

gsap.from(".step-item-large", {
	scrollTrigger: {
		trigger: ".how-it-works",
		start: "center center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	scale: 0.9,
	y: 30,
	duration: 1,
	ease: "power3.out"
});

// Animation CTA titre
gsap.from(".cta-title", {
	scrollTrigger: {
		trigger: ".cta-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: -30,
	duration: 1,
	ease: "power2.out"
});

// Animation CTA texte
gsap.from(".cta-text", {
	scrollTrigger: {
		trigger: ".cta-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	y: 20,
	duration: 1,
	ease: "power2.out",
	delay: 0.2
});

// Animation CTA bouton
gsap.from(".cta-btn", {
	scrollTrigger: {
		trigger: ".cta-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	scale: 0.8,
	duration: 1,
	ease: "back.out",
	delay: 0.4
});

// Animation CTA image avec parallax
gsap.from(".cta-image", {
	scrollTrigger: {
		trigger: ".cta-section",
		start: "top center",
		toggleActions: "play none none reverse"
	},
	opacity: 0,
	x: 100,
	scale: 0.9,
	duration: 1,
	ease: "power3.out"
});

gsap.to(".cta-image", {
	scrollTrigger: {
		trigger: ".cta-section",
		start: "top center",
		scrub: 1
	},
	y: -30,
	duration: 1
});

// Hover effects sur les boutons
document.querySelectorAll('a[href="#remplir-formulaire"], a[href="#form"]').forEach(btn => {
	btn.addEventListener('mouseenter', () => {
		gsap.to(btn, { scale: 1.05, duration: 0.3, ease: "power2.out" });
	});
	btn.addEventListener('mouseleave', () => {
		gsap.to(btn, { scale: 1, duration: 0.3, ease: "power2.out" });
	});
});

// Animation hover sur les mascottes
document.querySelector('.mascotte-macaron')?.addEventListener('mouseenter', () => {
	gsap.to('.mascotte-macaron', {
		scale: 1.1,
		rotation: 5,
		y: -20,
		duration: 0.4,
		ease: "power2.out"
	});
});

document.querySelector('.mascotte-macaron')?.addEventListener('mouseleave', () => {
	gsap.to('.mascotte-macaron', {
		scale: 1,
		rotation: 0,
		y: 0,
		duration: 0.4,
		ease: "power2.out"
	});
});

document.querySelector('.mascotte-wine')?.addEventListener('mouseenter', () => {
	gsap.to('.mascotte-wine', {
		scale: 1.1,
		rotation: -5,
		y: -20,
		duration: 0.4,
		ease: "power2.out"
	});
});

document.querySelector('.mascotte-wine')?.addEventListener('mouseleave', () => {
	gsap.to('.mascotte-wine', {
		scale: 1,
		rotation: 0,
		y: 0,
		duration: 0.4,
		ease: "power2.out"
	});
});
</script>

<?php
get_footer();
