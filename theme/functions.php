<?php

/**
 * _tw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _tw
 */

/**
 * Charger les polices Anek Gujarati + Eight dans l’éditeur Gutenberg
 */
function localbox_editor_fonts()
{
	add_editor_style([
		'https://fonts.googleapis.com/css2?family=Anek+Gujarati:wght@300;400;500;600;700&display=swap',
		'https://use.typekit.net/TON_ID.css'
	]);
}
add_action('admin_init', 'localbox_editor_fonts');


if (! defined('_TW_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('_TW_VERSION', '0.1.0');
}

if (! defined('_TW_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `_tw_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'_TW_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (! function_exists('_tw_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _tw_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _tw, use a find and replace
		 * to change '_tw' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('_tw', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', '_tw'),
				'menu-2' => __('Footer Menu', '_tw'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', '_tw_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _tw_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', '_tw'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', '_tw'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', '_tw_widgets_init');


/**
 * Enqueue the block editor script.
 */
function _tw_enqueue_block_editor_script()
{
	$current_screen = function_exists('get_current_screen') ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_script(
			'_tw-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			_TW_VERSION,
			true
		);
		wp_add_inline_script('_tw-editor', "tailwindTypographyClasses = '" . esc_attr(_TW_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', '_tw_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function _tw_tinymce_add_class($settings)
{
	$settings['body_class'] = _TW_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', '_tw_tinymce_add_class');

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function _tw_modify_heading_levels($args, $block_type)
{
	if ('core/heading' !== $block_type) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array(2, 3, 4);

	return $args;
}
add_filter('register_block_type_args', '_tw_modify_heading_levels', 10, 2);


/**
 * Enqueue styles & scripts du thème
 */
function localbox_enqueue_assets()
{
	/* -------------------------
     *  CSS PRINCIPAL
     * ------------------------- */
	wp_enqueue_style(
		'_tw-style',
		get_stylesheet_uri(),
		array(),
		_TW_VERSION
	);

	/* -------------------------
     *  JS GÉNÉRÉS PAR ESBUILD
     * ------------------------- */

	// Script principal
	wp_enqueue_script(
		'_tw-script',
		get_template_directory_uri() . '/js/script.min.js',
		array(),
		_TW_VERSION,
		true
	);

	// Script du menu
	wp_enqueue_script(
		'_tw-menu',
		get_template_directory_uri() . '/js/menu.min.js',
		array(),
		_TW_VERSION,
		true
	);

	// Script d'animation du Hero (généré par esbuild)
	wp_enqueue_script(
		'localbox-animations',
		get_template_directory_uri() . '/js/hero-animations.min.js',
		array('gsap', 'gsap-scrolltrigger'),
		_TW_VERSION,
		true
	);

	// Script pour la section valeurs
	wp_enqueue_script(
		'localbox-values',
		get_template_directory_uri() . '/js/values-scroll.min.js',
		array(),
		_TW_VERSION,
		true
	);

	// Carousel des box (page d'accueil)
	if (is_front_page()) {
		wp_enqueue_script(
			'localbox-monthlybox-carousel',
			get_template_directory_uri() . '/js/monthlybox-carousel.min.js',
			array(),
			_TW_VERSION,
			true
		);
	}

	// Animations About page (GSAP)
	if (is_page('a-propos')) {
		wp_enqueue_script(
			'localbox-about',
			get_template_directory_uri() . '/js/about-animations.min.js',
			array('gsap', 'gsap-scrolltrigger'),
			_TW_VERSION,
			true
		);
	}



	/* -------------------------
     *  LIBRAIRIES EXTERNES
     * ------------------------- */

	// GSAP depuis CDN
	wp_enqueue_script(
		'gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
		array(),
		null,
		true
	);

	// ScrollTrigger (dépend de gsap)
	wp_enqueue_script(
		'gsap-scrolltrigger',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
		array('gsap'),
		null,
		true
	);



	/* -------------------------
     *  SCRIPTS WORDPRESS
     * ------------------------- */
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'localbox_enqueue_assets');





/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Subscription handler functions.
 */
require get_template_directory() . '/inc/subscription-handler.php';

/**
 * Join product meta lookup table for price sorting.
 */
function localbox_add_price_lookup_join($join, $query)
{
	if (is_admin() || !$query->is_main_query()) {
		return $join;
	}

	if (!(function_exists('is_shop') && (is_shop() || is_post_type_archive('product') || is_tax(array('product_cat', 'product_tag'))))) {
		return $join;
	}

	$orderby_param = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : '';
	if (!$orderby_param || ($orderby_param !== 'price-asc' && $orderby_param !== 'price-desc')) {
		return $join;
	}

	global $wpdb;
	$lookup = isset($wpdb->wc_product_meta_lookup) ? $wpdb->wc_product_meta_lookup : $wpdb->prefix . 'wc_product_meta_lookup';

	// Add join if not already present
	if (strpos($join, $lookup) === false) {
		$join .= " LEFT JOIN {$lookup} ON ({$wpdb->posts}.ID = {$lookup}.product_id) ";
	}

	return $join;
}
add_filter('posts_join', 'localbox_add_price_lookup_join', 10, 2);

/**
 * Handle price-based sorting on product archives.
 */
function localbox_apply_price_sort_orderby($orderby, $query)
{
	if (is_admin() || !$query->is_main_query()) {
		return $orderby;
	}

	if (!(function_exists('is_shop') && (is_shop() || is_post_type_archive('product') || is_tax(array('product_cat', 'product_tag'))))) {
		return $orderby;
	}

	$orderby_param = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : '';

	if (!$orderby_param) {
		return $orderby;
	}

	if ($orderby_param === 'price-asc') {
		global $wpdb;
		$lookup = isset($wpdb->wc_product_meta_lookup) ? $wpdb->wc_product_meta_lookup : $wpdb->prefix . 'wc_product_meta_lookup';
		return "{$lookup}.min_price ASC";
	} elseif ($orderby_param === 'price-desc') {
		global $wpdb;
		$lookup = isset($wpdb->wc_product_meta_lookup) ? $wpdb->wc_product_meta_lookup : $wpdb->prefix . 'wc_product_meta_lookup';
		return "{$lookup}.min_price DESC";
	}

	return $orderby;
}
add_filter('posts_orderby', 'localbox_apply_price_sort_orderby', 20, 2);
/**
 * Strip empty filter query vars on shop/product archives to avoid 404s
 * when URLs contain bare keys like ?product_cat&min_price.
 */
function localbox_cleanup_empty_shop_params()
{
	if (!class_exists('WooCommerce')) {
		return;
	}

	if (! (function_exists('is_shop') && (is_shop() || is_post_type_archive('product') || is_tax(array('product_cat', 'product_tag'))))) {
		return;
	}

	if (empty($_GET)) {
		return;
	}

	$allowedPrefixes = array('filter_', 'query_type_');
	$allowedExact = array('product_cat', 'min_price', 'max_price', 'orderby', 'order', 's', 'paged');

	$clean = array();
	foreach ($_GET as $k => $v) {
		$unslashed = wp_unslash($v);
		$isAllowed = in_array($k, $allowedExact, true) || array_reduce($allowedPrefixes, function ($carry, $p) use ($k) {
			return $carry || strpos($k, $p) === 0;
		}, false);
		if (!$isAllowed) {
			continue; // drop unknown params
		}
		if ($unslashed === '' || $unslashed === null) {
			continue; // drop empties
		}
		$clean[$k] = $unslashed;
	}

	// If no change, do nothing
	$hadEmpties = false;
	foreach ($_GET as $k => $v) {
		if ($v === '' || $v === null) {
			$hadEmpties = true;
			break;
		}
	}

	if (!$hadEmpties) {
		return;
	}

	// Determine base URL (shop archive or current term archive)
	if (is_shop() || is_post_type_archive('product')) {
		$base = wc_get_page_permalink('shop');
	} else {
		$qo = get_queried_object();
		$base = $qo && isset($qo->term_id) ? get_term_link($qo) : home_url(add_query_arg(array(), $GLOBALS['wp']->request));
	}

	if (!is_wp_error($base)) {
		wp_safe_redirect(esc_url_raw(add_query_arg($clean, $base)));
		exit;
	}
}
add_action('template_redirect', 'localbox_cleanup_empty_shop_params', 8);

/**
 * Add region filter to the WP_Query when "region" param is present.
 * This allows filtering by region + epicerie-fine category simultaneously.
 */
function localbox_add_region_tax_query($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}

	if (!(function_exists('is_shop') && (is_shop() || is_post_type_archive('product')))) {
		return;
	}

	$region = isset($_GET['region']) ? sanitize_text_field(wp_unslash($_GET['region'])) : '';
	if (!$region) {
		return;
	}

	// Get existing tax_query or create new one
	$tax_query = $query->get('tax_query');
	if (!is_array($tax_query)) {
		$tax_query = array();
	}

	// Add region category to the tax_query
	$tax_query[] = array(
		'taxonomy' => 'product_cat',
		'field' => 'slug',
		'terms' => $region,
		'operator' => 'IN',
	);

	// Set the updated tax_query
	$query->set('tax_query', $tax_query);
}
add_action('pre_get_posts', 'localbox_add_region_tax_query');

/**
 * Strip empty query vars early to avoid WordPress generating a 404
 * when tax query vars like product_cat are present but empty.
 */
function localbox_clean_empty_shop_request($query_vars)
{
	if (is_admin()) {
		return $query_vars;
	}

	// Only clean for front-end product-related routes; cheap path check.
	$shop_id = function_exists('wc_get_page_id') ? wc_get_page_id('shop') : 0;
	$shop_slug = $shop_id ? basename(get_permalink($shop_id)) : 'shop';
	$req_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
	$looks_like_shop = strpos($req_uri, '/' . $shop_slug) !== false || strpos($req_uri, '/product-category/') !== false || (isset($query_vars['post_type']) && $query_vars['post_type'] === 'product');

	if (!$looks_like_shop) {
		return $query_vars;
	}

	// Drop empties for known keys (prevents 404)
	foreach ($query_vars as $k => $v) {
		$is_tax = in_array($k, array('product_cat', 'product_tag'), true);
		$is_attr_filter = (strpos($k, 'filter_') === 0) || (strpos($k, 'query_type_') === 0);
		$is_orderby = ($k === 'orderby');
		$is_region = ($k === 'region');
		if (!($is_tax || $is_attr_filter || $is_orderby || $is_region)) {
			continue;
		}
		if ($v === '' || $v === null) {
			unset($query_vars[$k]);
		}
	}

	return $query_vars;
}
add_filter('request', 'localbox_clean_empty_shop_request', 8);

/**
 * Prevent WordPress from forcing a 404 on product archives with custom query vars.
 */
function localbox_prevent_404_on_shop($preempt, $wp_query)
{
	if (is_admin() || !$wp_query->is_main_query()) {
		return $preempt;
	}
	// If it's the Woo shop, product archive, or product tax, don't treat as 404
	if ((function_exists('is_shop') && (is_shop() || is_post_type_archive('product'))) || is_tax(array('product_cat', 'product_tag'))) {
		return false; // do not handle 404
	}
	return $preempt;
}
add_filter('pre_handle_404', 'localbox_prevent_404_on_shop', 10, 2);

/**
 * Ajouter un formulaire Add to Cart avec quantité personnalisée pour la boucle shop
 */
function localbox_custom_add_to_cart_loop()
{
	global $product;

	if (! $product->is_purchasable()) {
		return;
	}

	$product_id = $product->get_id();
	$min_qty = apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product);
	$max_qty = apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product);
	$input_value = $product->get_min_purchase_quantity();
?>
	<div class="product-price-qty" style="display: flex; align-items: center; justify-content: space-between; gap: 10px; margin: 0 20px 20px; width: calc(100% - 40px); box-sizing: border-box;">
		<form method="post" class="cart product-add-to-cart-form" onclick="event.stopPropagation();" style="display: flex; align-items: center; gap: 10px; margin: 0; box-sizing: border-box; flex: 1;">
			<div class="quantity">
				<button type="button" class="qty-minus" data-action="minus">−</button>
				<input type="number" class="input-text qty text" name="quantity" value="<?php echo esc_attr($input_value); ?>" min="<?php echo esc_attr($min_qty); ?>" max="<?php echo esc_attr($max_qty); ?>" step="1" placeholder="1" inputmode="numeric" readonly />
				<button type="button" class="qty-plus" data-action="plus">+</button>
			</div>
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>" class="button wp-element-button" style="flex: 1; padding: 10px 15px; background-color: #fff3e0; color: #000; border: 2px solid #000; border-radius: 6px; cursor: pointer; font-weight: 700; font-size: 11px; text-transform: uppercase; letter-spacing: 0.3px; transition: all 0.3s;">
				<?php echo esc_html($product->single_add_to_cart_text()); ?>
			</button>
		</form>
	</div>
	<script>
		(function() {
			const form = document.querySelector('.product-add-to-cart-form');
			if (!form) return;

			const qtyInput = form.querySelector('input[name="quantity"]');
			const minusBtn = form.querySelector('.qty-minus');
			const plusBtn = form.querySelector('.qty-plus');

			if (!qtyInput || !minusBtn || !plusBtn) return;

			const min = parseInt(qtyInput.getAttribute('min')) || 1;
			const max = parseInt(qtyInput.getAttribute('max')) || Infinity;

			// Détruire tous les event listeners de WooCommerce
			const newInput = qtyInput.cloneNode(true);
			qtyInput.parentNode.replaceChild(newInput, qtyInput);
			const freshQtyInput = form.querySelector('input[name="quantity"]');

			// Forcer les attributs
			freshQtyInput.setAttribute('step', '1');
			freshQtyInput.step = 1;

			// Fonction pour mettre à jour la quantité
			function updateQty(operation) {
				let qty = parseInt(freshQtyInput.value) || min;
				if (operation === 'minus' && qty > min) {
					freshQtyInput.value = qty - 1;
				} else if (operation === 'plus' && qty < max) {
					freshQtyInput.value = qty + 1;
				}
				freshQtyInput.dispatchEvent(new Event('change', {
					bubbles: true
				}));
			}

			// Attacher les listeners sur les nouveaux éléments
			const newMinusBtn = form.querySelector('.qty-minus');
			const newPlusBtn = form.querySelector('.qty-plus');

			newMinusBtn.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				updateQty('minus');
			});

			newPlusBtn.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				updateQty('plus');
			});

			// Empêcher les flèches du clavier de modifier la quantité par 5
			freshQtyInput.addEventListener('keydown', function(e) {
				if (e.key === 'ArrowUp') {
					e.preventDefault();
					updateQty('plus');
				} else if (e.key === 'ArrowDown') {
					e.preventDefault();
					updateQty('minus');
				}
			});
		})();
	</script>
<?php
}
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_shop_loop_item', 'localbox_custom_add_to_cart_loop', 10);

/**
 * AJAX handler for loading filtered products on construisez-votre-propre-box page
 */
function localbox_load_filtered_products()
{
	// Verify nonce - but allow nopriv, so check if nonce exists first
	if (isset($_POST['nonce'])) {
		if (!wp_verify_nonce($_POST['nonce'], 'localbox_nonce')) {
			wp_send_json_error(array('message' => 'Nonce verification failed'));
			return;
		}
	}

	$region = isset($_POST['region']) ? sanitize_text_field(wp_unslash($_POST['region'])) : '';
	$category = isset($_POST['category']) ? sanitize_text_field(wp_unslash($_POST['category'])) : 'epicerie-fine';
	$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
	$orderby = isset($_POST['orderby']) ? sanitize_text_field(wp_unslash($_POST['orderby'])) : '';

	// DEBUG: Log the parameters
	error_log('AJAX localbox_load_filtered_products called with: region=' . $region . ', category=' . $category);

	// Build tax_query
	$tax_query = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $category,
		),
	);

	// Add region filter if present
	if ($region) {
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $region,
			'operator' => 'IN',
		);
		// Set relation to AND to require both categories
		$tax_query['relation'] = 'AND';
	}

	// DEBUG: Log the tax query
	error_log('Tax Query: ' . json_encode($tax_query));

	// Build orderby
	$orderby_mapping = array(
		'price-asc' => 'meta_value_num',
		'price-desc' => 'meta_value_num',
	);
	$product_orderby = isset($orderby_mapping[$orderby]) ? $orderby_mapping[$orderby] : 'date';
	$product_order = ($orderby === 'price-desc') ? 'DESC' : 'ASC';

	// Query products
	$products_args = array(
		'post_type' => 'product',
		'posts_per_page' => 10,
		'paged' => $paged,
		'tax_query' => $tax_query,
		'orderby' => $product_orderby === 'meta_value_num' ? 'meta_value_num' : 'date',
		'meta_key' => $product_orderby === 'meta_value_num' ? '_price' : '',
		'order' => $product_order,
	);

	$products_query = new WP_Query($products_args);

	ob_start();

	if ($products_query->have_posts()) {
		echo '<div class="products-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">';

		while ($products_query->have_posts()) {
			$products_query->the_post();
			wc_get_template_part('content', 'product');
		}

		echo '</div>';

		// Pagination
		if ($products_query->max_num_pages > 1) {
			echo '<div class="pagination mt-8 flex justify-center gap-2">';
			echo paginate_links(array(
				'total' => $products_query->max_num_pages,
				'current' => max(1, $paged),
				'prev_text' => '← Précédent',
				'next_text' => 'Suivant →',
				'type' => 'plain',
			));
			echo '</div>';
		}

		wp_reset_postdata();
	} else {
		echo '<div class="no-products p-8 text-center">';
		echo '<p class="text-lg">' . __('Aucun produit trouvé avec ces critères.', '_tw') . '</p>';
		echo '</div>';
	}

	$html = ob_get_clean();

	wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_localbox_load_filtered_products', 'localbox_load_filtered_products');
add_action('wp_ajax_nopriv_localbox_load_filtered_products', 'localbox_load_filtered_products');
