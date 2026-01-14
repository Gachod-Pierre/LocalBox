



<div class="relative w-full">
	<!-- Mascotte sausage haut gauche -->
	<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-sausage.svg" alt="Mascotte sausage" class="absolute left-0 top-0 w-32 lg:w-48" style="z-index:10;">
	<!-- Mascotte bretzel bas gauche -->
	<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-bretzel.svg" alt="Mascotte bretzel" class="absolute left-8 bottom-0 w-32 lg:w-48" style="z-index:10;">
	<!-- Mascotte waffle bas droite -->
	<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/mascotte-waffle.svg" alt="Mascotte waffle" class="absolute right-0 bottom-0 w-32 lg:w-48" style="z-index:10;">

	<section class="w-full bg-[#F7F3F3] py-16 relative overflow-hidden ">
		<div class="container mx-auto px-4 relative z-10 p-30">
			<div class="flex flex-col lg:flex-row items-center gap-8">
				<!-- Partie gauche: Box -->
				<div class="lg:w-1/2 flex flex-col justify-center relative order-1 lg:order-1">
					<div class="flex justify-center items-center h-full">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/template-box.jpg" alt="Box" class="w-96 max-w-full" style="margin-left:0;">
					</div>
				</div>
				<!-- Partie droite: Texte -->
				<div class="lg:w-1/2 order-2 lg:order-2 flex flex-col justify-center items-start">
					<h3 class="font-black uppercase tracking-tight leading-none text-4xl md:text-6xl lg:text-7xl text-[#C92358] mb-6 text-left">
						CONSTRUIT<br>TA BOX
					</h3>
					<p class="text-gray-800 text-base md:text-lg leading-relaxed mb-4 text-left">
						C'est toi qui la composeras avec des produits de chez nous, ou d'un autre coin que tu aimes. Tu choisis tes goûts, tes surprises, et tu réunis en un seul coffret tout ce qui te fait vibrer : des petites gourmandises, des artisanats locaux, ou même des objets spéciaux qui racontent une histoire.
					</p>
					<p class="text-gray-800 text-base md:text-lg leading-relaxed mb-8 text-left">
						L'idée, c'est de proposer quelque chose de fun, simple à réaliser, et plein de vie, qui donne envie d'ouvrir, de découvrir, et de partager. Tu peux créer ta box pour toi ou pour offrir, et faire découvrir à d'autres le bonheur des produits régionaux, avec ton style et ta touche personnelle.
					</p>
					<a href="<?php echo esc_url(get_permalink(get_page_by_path('construisez-votre-propre-box'))); ?>" class="inline-flex items-center gap-2 bg-[#C92358] text-white px-6 py-3 rounded-full font-bold uppercase text-sm hover:bg-[#A71E4D] transition-colors">
						VOIR NOS PRODUITS
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>
