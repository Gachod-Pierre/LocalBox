<?php

/**
 * Template part for displaying the header content
 *
 * @package _tw
 */
?>

<header id="masthead" class="sticky top-0 z-40 backdrop-blur-3xl bg-[#F4F0EF]/70 text-black">
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
			<!-- Icône panier WooCommerce -->
			<a
				href="<?php echo esc_url(wc_get_cart_url()); ?>"
				class="focus:outline-none cursor-pointer inline-flex items-center"
				aria-label="Panier">
				<img
					src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/icon-box.svg'); ?>"
					alt="Panier"
					class="h-7 w-7 transition-colors duration-200" />
			</a>

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
		<a
			href="<?php echo esc_url(wc_get_cart_url()); ?>"
			class="focus:outline-none cursor-pointer"
			aria-label="Panier">
			<img
				id="sidebarBoxIcon"
				src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/icon-box.svg'); ?>"
				alt="Panier"
				class="h-7 w-7 opacity-0 pointer-events-none transition-opacity duration-200 brightness-0 invert" />
		</a>

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
	<div class="flex-1 flex flex-col justify-start py-[3vh] px-10">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'container'      => false,
				'menu_class'     => 'flex flex-col gap-6 text-4xl font-extrabold tracking-wide font-heading',
				'fallback_cb'    => false,
			)
		);
		?>
	</div>

	<!-- Social -->
	<div class="px-10 pb-10">
		<p class="text-xs uppercase tracking-[0.2em] text-gray-400 mb-2">Social</p>
		<div class="flex gap-4 mt-5 text-lg">
			<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Insta.svg'); ?>" alt="Instagram"></a>
			<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Facebook.svg'); ?>" alt="Facebook"></a>
			<a href="#"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/svg/Tiktok.svg'); ?>" alt="TikTok"></a>
		</div>
	</div>
</div>