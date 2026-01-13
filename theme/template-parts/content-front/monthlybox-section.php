<!-- VAGUE -->
<div class="relative w-full overflow-hidden pointer-events-none z-10" style="margin-top: -1px;background-color: #F7F3F3;">
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
	<div class="absolute bottom-0 right-0 flex items-center justify-center pointer-events-none" style="width: 50%; height: 80%; transform: translateY(10%);">
		<div class="absolute rounded-full border-2 border-white/20" style="width: 400px; height: 400px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 600px; height: 600px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 800px; height: 800px;"></div>
		<div class="absolute rounded-full border-2 border-white/20" style="width: 1000px; height: 1000px;"></div>
	</div>

	<div class="container mx-auto px-4 relative z-10">
		<div class="flex flex-col lg:flex-row items-center gap-8">

			<!-- Partie gauche: Texte -->
			<div class="lg:w-1/2">
				<div class="flex justify-between items-start mb-8">
					<h3 class="font-black uppercase tracking-tight leading-none text-4xl md:text-6xl lg:text-7xl text-white">
						Nos Box du Mois
					</h3>
					<span class="text-white text-2xl md:text-4xl font-black">1/13</span>
				</div>

				<h4 class="text-3xl md:text-5xl font-black uppercase text-white mb-6">
					Occitanie
				</h4>

				<p class="text-white text-base md:text-lg leading-relaxed mb-8">
					Prépare-toi à voyager sans bouger de chez toi : chaque coffret est une invitation au plaisir, à la découverte et au partage. Dans la Box Occitanie, tu retrouves tout le meilleur du Sud : des gourmandises artisanales, des petits trésors du terroir et des surprises pleines de soleil, tous choisis avec passion auprès de producteurs locaux.
				</p>

				<a href="#" class="inline-flex items-center gap-2 bg-white text-[#C92358] px-6 py-3 rounded-full font-bold uppercase text-sm hover:bg-gray-100 transition-colors">
					Voir nos box du mois
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
					</svg>
				</a>
			</div>

			<!-- Partie droite: Image de la box -->
			<div class="lg:w-1/2 flex justify-center relative">
				<div class="relative">
					<!-- Cercle blanc derrière l'image -->
					<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 bg-white rounded-full" style="width: 400px; height: 400px; z-index: 0; margin-top: -100px;"></div>

					<img src="<?php echo get_template_directory_uri(); ?>/assets/svg/main-box.svg"
						 alt="Box Occitanie"
						 class="w-full max-w-md relative z-10">
			</div>

		</div>
	</div>

</section>

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
