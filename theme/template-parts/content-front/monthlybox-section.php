<!-- VAGUE -->
<div class="relative w-full overflow-hidden pointer-events-none z-10" style="margin-top: 0px;background-color: #F7F3F3;">
    <svg class="w-full h-auto" viewBox="0 0 1440 140" xmlns="http://www.w3.org/2000/svg">
        <path d="
            M0,40
            C300,-10 600,120 900,40
            C1200,-20 1440,40 1440,40
            L1440,140 L0,140 Z"
            fill="#C92358">
        </path>
    </svg>
</div>

<section class="w-full bg-[#C92358] py-16 relative overflow-hidden p-10">
	<!-- Cercles concentriques en arrière-plan -->
	<div class="absolute bottom-0 right-0 flex items-center justify-center pointer-events-none" style="width: 50%; height: 80%; transform: translateY(-10%);">
		<div class="absolute rounded-full border-2 border-white/20" style="width: 400px; height: 400px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 600px; height: 600px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 800px; height: 800px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 1000px; height: 1000px;"></div>
	</div>

	<div class="container mx-auto px-4 relative z-10">
		<div class="flex flex-col lg:flex-row items-center gap-8">

			<?php
			$mb_slides = [
				[
					'label' => 'Occitanie',
					'href' => 'http://localbox.local/product/box-occitanie',
					'desc' => 'Prépare-toi à voyager sans bouger de chez toi : chaque coffret est une invitation au plaisir, à la découverte et au partage. Dans la Box Occitanie, tu retrouves tout le meilleur du Sud : des gourmandises artisanales, des petits trésors du terroir et des surprises pleines de soleil, tous choisis avec passion auprès de producteurs locaux.',
					'img' => get_template_directory_uri() . '/assets/regionbox/Occitanie.png'
				],
				['label' => 'Bourgogne Franche Comté', 'href' => 'http://localbox.local/product/box-bourgogne-franche-comte/', 'desc' => 'Découvre les saveurs généreuses de la Bourgogne-Franche-Comté : produits authentiques et savoir-faire régional dans une box pensée pour les épicuriens.', 'img' => get_template_directory_uri() . '/assets/regionbox/Bourgogne.png'],
				['label' => 'Corse', 'href' => 'http://localbox.local/product/box-corse/', 'desc' => 'Cap sur l\'île de beauté : charcuteries, douceurs et spécialités corses pour un voyage gustatif unique.', 'img' => get_template_directory_uri() . '/assets/regionbox/Corse.png'],
				['label' => 'Hauts-de-France', 'href' => 'http://localbox.local/product/box-hauts-de-france/', 'desc' => 'Une sélection généreuse et conviviale des Hauts-de-France, entre tradition et caractère.', 'img' => get_template_directory_uri() . '/assets/regionbox/Haut_de_France.png'],
				['label' => 'Normandie', 'href' => 'http://localbox.local/product/box-normandie/', 'desc' => 'Le meilleur du terroir normand : douceur, caractère et authenticité au rendez-vous.', 'img' => get_template_directory_uri() . '/assets/regionbox/Normandie.png'],
				['label' => 'Nouvelle-Aquitaine', 'href' => 'http://localbox.local/product/box-nouvelle-aquitaine/', 'desc' => 'Entre océan et vignobles, une box riche en découvertes locales et gourmandes.', 'img' => get_template_directory_uri() . '/assets/regionbox/Nouvelle_Aquitaine.png'],
				['label' => 'Pays de la Loire', 'href' => 'http://localbox.local/product/box-pays-de-la-loire/', 'desc' => 'Des saveurs ligériennes fines et délicates, idéales pour les curieux du goût.', 'img' => get_template_directory_uri() . '/assets/regionbox/Pays_De_La_Loire.png'],
				['label' => 'Provence-Alpes-Côte d\'Azur', 'href' => 'http://localbox.local/product/box-provence-alpes-cote-dazur/', 'desc' => 'Soleil, parfums et spécialités du Sud : une invitation à la dolce vita.', 'img' => get_template_directory_uri() . '/assets/regionbox/Provence_Alpes.png'],
				['label' => 'Auvergne-Rhône-Alpes', 'href' => 'http://localbox.local/product/box-auvergne-rhone-alpes/', 'desc' => 'Caractère et montagne : une sélection chaleureuse et réconfortante de produits régionaux.', 'img' => get_template_directory_uri() . '/assets/regionbox/Auvergne.png'],
				['label' => 'Bretagne', 'href' => 'http://localbox.local/product/box-bretagne/', 'desc' => 'Terre de caractère : spécialités bretonnes gourmandes et authentiques pour les amateurs de bon goût.', 'img' => get_template_directory_uri() . '/assets/regionbox/Bretagne.png'],
				['label' => 'Centre-Val de Loire', 'href' => 'http://localbox.local/product/box-centre-val-de-loire/', 'desc' => 'Patrimoine et finesse : une box élégante pour sublimer les produits du Centre-Val de Loire.', 'img' => get_template_directory_uri() . '/assets/regionbox/Centre_Val_de_Loire.png'],
				['label' => 'Grand Est', 'href' => 'http://localbox.local/product/box-grand-est/', 'desc' => 'Traditions et terroirs du Grand Est : des pépites locales à partager sans modération.', 'img' => get_template_directory_uri() . '/assets/regionbox/Grand_Est.png'],
			];
			?>
			
			<!-- Partie gauche: Texte -->
			<div class="lg:w-1/2">
				<div class="flex justify-between items-start mb-8">
					<h3 class="font-black uppercase tracking-tight leading-none text-4xl md:text-6xl lg:text-7xl text-white">
						Nos Box du Mois
					</h3>
					<span id="mb-counter" class="text-white text-2xl md:text-4xl font-black">1/<?php echo count($mb_slides); ?></span>
				</div>

				<h4 id="mb-title" class="text-3xl md:text-5xl font-black uppercase text-white mb-6"><?php echo esc_html($mb_slides[0]['label']); ?></h4>

				<p id="mb-desc" class="text-white text-base md:text-lg leading-relaxed mb-8">
					<?php echo esc_html($mb_slides[0]['desc']); ?>
				</p>

				<a id="mb-link" href="<?php echo esc_url($mb_slides[0]['href']); ?>" class="inline-flex items-center gap-2 bg-white text-[#C92358] px-6 py-3 rounded-full font-bold uppercase text-sm hover:bg-gray-100 transition-colors">
					Découvrir la box
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
					</svg>
				</a>
			</div>

			<!-- Partie droite: Carousel des box -->
			<div class="lg:w-1/2 relative">
				<div class="flex justify-end gap-3 mb-4 mt-12 relative z-20">
					<button id="mb-prev" class="bg-white/20 hover:bg-white/30 text-white rounded-full p-2 pointer-events-auto" aria-label="Précédent">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
					</button>
					<button id="mb-next" class="bg-white/20 hover:bg-white/30 text-white rounded-full p-2 pointer-events-auto" aria-label="Suivant">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
					</button>
				</div>

				<div class="relative">
					<!-- Cercle blanc derrière l'image -->
					<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 bg-white rounded-full ml-4 mt-1" style="width: 400px; height: 400px; z-index: 0; margin-top: -189px;"></div>

					<img id="mb-image" src="<?php echo esc_url($mb_slides[0]['img']); ?>"
						 alt="Box <?php echo esc_attr($mb_slides[0]['label']); ?>"
						 class="w-full max-w-md relative z-10 mr-9"
					 style="margin-left: 8rem; margin-top: -6rem;">
				</div>
			</div>

		</div>
	</div>

</section>

<script type="application/json" id="mb-data"><?php echo wp_json_encode($mb_slides); ?></script>

<!-- Vague décorative en bas -->
<div class="w-full overflow-hidden pointer-events-none z-10" style="background-color:  #C92358">
	<svg class="w-full h-auto" viewBox="0 0 1440 140" xmlns="http://www.w3.org/2000/svg">
		<path d="
			M0,40
			C300,-10 600,120 900,40
			C1200,-20 1440,40 1440,40
			L1440,140 L0,140 Z"
			fill="#F7F3F3">
		</path>
	</svg>
</div>
