<?php
/**
 * Template part for displaying the hero section on the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<section class="relative min-h-screen flex items-center justify-center overflow-hidden">

	<!-- Background Image/Overlay -->
	<div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500">
		<div class="absolute inset-0 bg-white opacity-40"></div>
	</div>

	<!-- Content Container -->
	<div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8">
		<div class="max-w-4xl mx-auto text-center">

		<!-- Main Heading -->
		<h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-black mb-6 leading-tight">
			Découvrez les produits de nos belles régions françaises
		</h1>

		<!-- Subtitle -->
			<p class="text-xl sm:text-2xl md:text-3xl text-gray-100 mb-8 font-light leading-relaxed">
				Découvrez les produits de nos belles régions françaises
			</p>

			<!-- CTA Button -->
			<div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
				<a href="#contact" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out">
					<?php esc_html_e( 'Commencer maintenant', '_tw' ); ?>
					<svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
					</svg>
				</a>
				<a href="#about" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 ease-in-out">
					<?php esc_html_e( 'En savoir plus', '_tw' ); ?>
				</a>
			</div>

		</div>
	</div>

	<!-- Scroll Indicator -->
	<div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
		<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
		</svg>
	</div>

</section>
