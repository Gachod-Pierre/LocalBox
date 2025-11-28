<?php
/**
 * Template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

get_header();
?>

<section id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		// Hero Section
		get_template_part( 'template-parts/front-page-content/content', 'hero' );

		// Introduction Section (à décommenter quand prêt)
		// get_template_part( 'template-parts/front-page-content/content', 'intro' );

		// Features Section (à décommenter quand prêt)
		// get_template_part( 'template-parts/front-page-content/content', 'features' );
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
