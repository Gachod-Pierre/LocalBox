<?php

/**
 * Template part for displaying the footer content
 *
 * @package _tw
 */
?>

<footer id="colophon" class="bg-black text-white pt-10 relative">

	<!-- NEWSLETTER (dans le flux, overlap desktop seulement) -->
	<section class="flex justify-center">

		<div class="bg-[#C5B4E2] text-black rounded-xl px-6 py-10 md:px-12 md:py-14 shadow-xl
                    max-w-4xl
                    mx-4
                    -mt-32">
			<h2 class="text-center text-3xl md:text-4xl font-extrabold tracking-wide leading-tight">
				AJOUTEZ NOUS À VOTRE<br class="md:hidden" /> BOITE DE RÉCEPTION
			</h2>
			<p class="mt-3 text-center text-sm md:text-base">
				Recevez des offres spéciales et toutes les dernières nouveautés et actualités dans votre boite mail !
			</p>
			<!-- FORMULAIRE -->
			<form class="mt-6 flex flex-col md:flex-row items-center justify-center gap-4">
				<input type="text" placeholder="Nom complet*"
					class="w-full md:w-auto flex-1 rounded-2xl px-4 py-3 bg-white text-black" />
				<input type="email" placeholder="Adresse Email*"
					class="w-full md:w-auto flex-1 rounded-2xl px-4 py-3 bg-white text-black" />
				<button type="submit"
					class="px-6 py-3 rounded-2xl bg-black text-white font-semibold flex items-center gap-2">
					Envoyer
					<span>➤</span>
				</button>
			</form>
			<label class="flex items-center justify-start mt-4 text-xs gap-2 max-w-lg ">
				<input type="checkbox" />
				<span>
					Oui, je souhaite recevoir des mises à jour, des promotions et des offres de la part de LocalBox.
					Je comprends que je peux me désabonner à tout moment.
				</span>
			</label>
		</div>
	</section>

	<!-- FOOTER -->
	<div class="max-w-7xl mx-auto px-6 mt-20 pb-16
            grid grid-cols-2 gap-10
            md:grid-cols-4 md:grid-rows-2 md:gap-16">

		<!-- COL 1 -->
		<div class="col-span-1 md:row-span-2">
			<div class="flex flex-col gap-4 text-sm font-bold tracking-wide">
				<a href="#">ACCUEIL</a>
				<a href="#">BOX DU MOIS</a>
				<a href="#">CRÉER MA BOX</a>
				<a href="#">COMPTE</a>
				<a href="#">PARTENARIAT</a>
			</div>
		</div>

		<!-- COL 2 -->
		<div class="col-span-1 md:row-span-2">
			<div class="flex flex-col gap-4 text-sm font-bold tracking-wide">
				<a href="/a-propos/">À PROPOS</a>
				<a href="#">NEWS</a>
				<a href="#">CONTACTEZ-NOUS</a>
				<a href="#">POLITIQUE DE CONFIDENTIALITÉ</a>
				<a href="#">CONDITION GÉNÉRALE DE VENTE</a>
			</div>
		</div>

		<!-- COL 3 — Mini newsletter -->
		<div class="col-span-2 md:col-span-1 md:row-span-2">
			<h3 class="text-lg font-bold tracking-wide mb-3">S’ABONNER</h3>

			<p class="text-xs mb-4">
				Recevez des offres spéciales et toutes les dernières nouveautés et actualités dans votre boite mail !
			</p>

			<input type="text" placeholder="Nom complet*" class="w-full bg-transparent border-b border-gray-400 py-2" />
			<input type="email" placeholder="Adresse Email*" class="w-full bg-transparent border-b border-gray-400 py-2 mt-4" />

			<label class="flex items-center justify-start mt-4 text-xs gap-2">
				<input type="checkbox" />
				<span>Oui, je souhaite recevoir des mises à jour...</span>
			</label>

			<div class="flex gap-4 mt-5 text-lg">
				<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Insta.svg'); ?>" alt="Instagram"></a>
				<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Facebook.svg'); ?>" alt="Facebook"></a>
				<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Tiktok.svg'); ?>" alt="TikTok"></a>
			</div>
		</div>

		<!-- COL 4 — Contactez-nous -->
		<div class="col-span-1 md:col-start-4 md:row-start-1">
			<h3 class="text-lg font-bold tracking-wide mb-3">CONTACTEZ-NOUS</h3>
			<p class="text-sm">+33 6 46 36 93 73</p>
			<p class="text-sm">contact@localbox.fr</p>
			<p class="text-sm">ventes@localbox.fr</p>
		</div>

		<!-- COL 5 — Siège social -->
		<div class="col-span-1 md:col-start-4 md:row-start-2">
			<h3 class="text-lg font-bold tracking-wide mb-3">SIÈGE SOCIAL</h3>
			<p class="text-sm">LocalBox France</p>
			<p class="text-sm">12 rue des Saveurs</p>
			<p class="text-sm">69002 Lyon, France</p>
		</div>

	</div>


	<!-- LOGO XXL -->
	<div class="px-6 w-full flex justify-center items-center py-10 bg-black">
		<img
			src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/LocalBoxBig.svg'); ?>"
			alt="Localbox"
			class="w-full h-auto max-w-[1600px]">
	</div>


</footer>