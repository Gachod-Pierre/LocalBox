<?php

/**
 * Template part for displaying the header content
 *
 * @package _tw
 */
?>

<header id="masthead" class="bg-[#f4f0ef] text-black relative z-40">
	<div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-4">
		<!-- Logo -->
		<a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center">
			<img
				src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/logo.svg'); ?>"
				alt="<?php bloginfo('name'); ?>"
				class="h-8 w-auto" />
			<span class="sr-only"><?php bloginfo('name'); ?></span>
		</a>

		<!-- Zone droite -->
		<div class="flex items-center gap-6">
			<!-- Icône box -->
			<button
				class="focus:outline-none cursor-pointer"
				aria-label="Box">
				<img
					id="headerBoxIcon"
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/icon-box.svg'); ?>"
					alt="Box"
					class="h-7 w-7 transition-colors duration-200" />
			</button>

			<!-- Bouton menu -->
			<button
				id="menuBtn"
				class="relative w-8 h-8 flex items-center justify-center focus:outline-none z-50 cursor-pointer"
				aria-expanded="false"
				aria-controls="sidebar"
				type="button">

				<!-- Burger -->
				<img
					id="burgerIcon"
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/menu.svg'); ?>"
					alt="Ouvrir le menu"
					class="w-8 h-8 transition-opacity duration-200" />

				<!-- Croix -->
				<img
					id="closeIcon"
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/close.svg'); ?>"
					alt="Fermer le menu"
					class="w-8 h-8 absolute inset-0 opacity-0 pointer-events-none transition-opacity duration-200" />
			</button>
		</div>
	</div>
</header>

<!-- Volet latéral -->
<div
	id="sidebar"
	class="fixed right-0 bottom-0 w-full md:w-96 bg-black text-white translate-x-full 
           transition-transform duration-300 z-[9999] flex flex-col"
	style="top: var(--admin-bar-height, 0px);">
	<!-- Top bar du volet -->
	<div class="flex items-center justify-end px-6 h-20 shrink-0 gap-6">
		<button
			class="focus:outline-none cursor-pointer"
			aria-label="Box">
			<img
				id="sidebarBoxIcon"
				src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/icon-box.svg'); ?>"
				alt="Box"
				class="h-7 w-7 opacity-0 pointer-events-none transition-opacity duration-200 brightness-0 invert" />
		</button>

		<button
			id="sidebarCloseBtn"
			class="focus:outline-none cursor-pointer"
			aria-label="Fermer le menu"
			type="button">
			<img
				id="closeIconSidebar"
				src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/close.svg'); ?>"
				alt="Fermer"
				class="h-7 w-7 opacity-0 pointer-events-none transition-opacity duration-200" />
		</button>
	</div>

	<!-- Menu principal -->
	<div class="flex-1 flex flex-col justify-center px-10">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'flex flex-col gap-6 text-3xl md:text-4xl font-extrabold tracking-wide',
				'fallback_cb'    => false,
			)
		);
		?>
	</div>

	<!-- Social -->
	<div class="px-10 pb-10">
		<p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-2">Social</p>
		<div class="flex gap-6 text-sm">
			<a href="#" class="hover:text-gray-200">Instagram</a>
			<a href="#" class="hover:text-gray-200">LinkedIn</a>
			<a href="#" class="hover:text-gray-200">Twitter</a>
		</div>
	</div>
</div>