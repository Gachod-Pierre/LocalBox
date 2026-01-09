<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

				// Detect page and load appropriate content template
				$post_slug = get_post_field( 'post_name' );
				$post_title = get_the_title();

				if ( $post_slug === 'subscription' || strpos( strtolower( $post_title ), 'abonnement' ) !== false ) {
					get_template_part( 'template-parts/content/content', 'subscription' );
				} elseif ( strpos( strtolower( $post_title ), 'shop' ) !== false || strpos( strtolower( $post_title ), 'boutique' ) !== false ) {
					get_template_part( 'template-parts/content/content', 'shop' );
				} else {
					get_template_part( 'template-parts/content/content', 'page' );
				}

				// If comments are open, or we have at least one comment, load
				// the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

