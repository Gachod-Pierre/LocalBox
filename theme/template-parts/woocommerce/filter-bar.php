<?php
/**
 * Reusable WooCommerce filter bar.
 * Outputs a GET form targeting the shop archive with supported query vars.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WooCommerce')) {
    return;
}

$shop_url = wc_get_page_permalink('shop');

// Helper: detect global attribute by slug sans prefix or by name.
function _tw_get_attribute_taxonomy_by_slug_or_name($needle)
{
    $needle = strtolower($needle);
    $taxes = wc_get_attribute_taxonomies();
    if (!$taxes) {
        return null;
    }
    foreach ($taxes as $tax) {
        $slug = isset($tax->attribute_name) ? strtolower($tax->attribute_name) : '';
        $label = isset($tax->attribute_label) ? strtolower($tax->attribute_label) : '';
        if ($slug === $needle || $label === $needle) {
            return $tax;
        }
    }
    return null;
}

// Attempt to map "Type de produits" and "Quantité" to attributes if they exist.
$attr_type = _tw_get_attribute_taxonomy_by_slug_or_name('type');
$attr_quantite = _tw_get_attribute_taxonomy_by_slug_or_name('quantite');

// Selected values from current request (if on archive).
$selected_cat = isset($_GET['product_cat']) ? sanitize_text_field(wp_unslash($_GET['product_cat'])) : '';
$selected_orderby = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : '';

// Build attribute selections
$selected_type = isset($_GET['filter_' . ($attr_type ? $attr_type->attribute_name : 'type')]) ? sanitize_text_field(wp_unslash($_GET['filter_' . ($attr_type ? $attr_type->attribute_name : 'type')])) : '';
$selected_quantite = isset($_GET['filter_' . ($attr_quantite ? $attr_quantite->attribute_name : 'quantite')]) ? sanitize_text_field(wp_unslash($_GET['filter_' . ($attr_quantite ? $attr_quantite->attribute_name : 'quantite')])) : '';

?>
<form method="get" action="<?php echo esc_url($shop_url); ?>" class="shop-filters flex gap-5 mb-12 flex-wrap items-center">
    <?php
    // Categories dropdown (Secteur).
    $cats = get_terms(
        array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        )
    );
    ?>
    <div class="filter-item flex-1 min-w-[180px]">
        <label class="sr-only" for="product_cat">Catégorie</label>
        <select id="product_cat" name="product_cat" class="w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase tracking-widest cursor-pointer">
            <option value=""><?php esc_html_e('Toutes les catégories', '_tw'); ?></option>
            <?php if (!is_wp_error($cats)) : foreach ($cats as $cat) : ?>
                    <option value="<?php echo esc_attr($cat->slug); ?>" <?php selected($selected_cat, $cat->slug); ?>><?php echo esc_html($cat->name); ?></option>
                <?php endforeach; endif; ?>
        </select>
    </div>

    <?php if ($attr_type) :
        $type_tax = wc_attribute_taxonomy_name($attr_type->attribute_name);
        $type_terms = get_terms(
            array(
                'taxonomy' => $type_tax,
                'hide_empty' => true,
            )
        );
        $type_param = 'filter_' . $attr_type->attribute_name; // Woo expects filter_{attribute}
    ?>
        <div class="filter-item flex-1 min-w-[180px]">
            <label class="sr-only" for="type_filter">Type</label>
            <select id="type_filter" name="<?php echo esc_attr($type_param); ?>" class="w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase tracking-widest cursor-pointer">
                <option value=""><?php esc_html_e('Tous les types', '_tw'); ?></option>
                <?php if (!is_wp_error($type_terms)) : foreach ($type_terms as $t) : ?>
                        <option value="<?php echo esc_attr($t->slug); ?>" <?php selected($selected_type, $t->slug); ?>><?php echo esc_html($t->name); ?></option>
                    <?php endforeach; endif; ?>
            </select>
            <input type="hidden" name="query_type_<?php echo esc_attr($attr_type->attribute_name); ?>" value="and" />
        </div>
    <?php endif; ?>

    <div class="filter-item flex-1 min-w-[180px]">
        <label class="sr-only" for="orderby">Trier par</label>
        <select id="orderby" name="orderby" class="w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase tracking-widest cursor-pointer">
            <option value=""><?php esc_html_e('Trier par', '_tw'); ?></option>
            <option value="price-asc" <?php selected($selected_orderby, 'price-asc'); ?>><?php esc_html_e('Prix croissant', '_tw'); ?></option>
            <option value="price-desc" <?php selected($selected_orderby, 'price-desc'); ?>><?php esc_html_e('Prix décroissant', '_tw'); ?></option>
        </select>
    </div>

    <?php if ($attr_quantite) :
        $q_tax = wc_attribute_taxonomy_name($attr_quantite->attribute_name);
        $q_terms = get_terms(
            array(
                'taxonomy' => $q_tax,
                'hide_empty' => true,
            )
        );
        $q_param = 'filter_' . $attr_quantite->attribute_name;
    ?>
        <div class="filter-item flex-1 min-w-[180px]">
            <label class="sr-only" for="quantite_filter">Quantité</label>
            <select id="quantite_filter" name="<?php echo esc_attr($q_param); ?>" class="w-full px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase tracking-widest cursor-pointer">
                <option value=""><?php esc_html_e('Toutes les quantités', '_tw'); ?></option>
                <?php if (!is_wp_error($q_terms)) : foreach ($q_terms as $qt) : ?>
                        <option value="<?php echo esc_attr($qt->slug); ?>" <?php selected($selected_quantite, $qt->slug); ?>><?php echo esc_html($qt->name); ?></option>
                    <?php endforeach; endif; ?>
            </select>
            <input type="hidden" name="query_type_<?php echo esc_attr($attr_quantite->attribute_name); ?>" value="and" />
        </div>
    <?php endif; ?>

    <div class="filter-actions flex gap-3 w-full md:w-auto">
        <button type="submit" class="px-5 py-3 bg-black text-white rounded-full text-xs font-bold uppercase tracking-widest">Filtrer</button>
        <a href="<?php echo esc_url($shop_url); ?>" class="px-5 py-3 bg-white border-2 border-black rounded-full text-xs font-bold uppercase tracking-widest">Réinitialiser</a>
    </div>
</form>

<script>
// Clean empty filter params before submit
(function(){
    var form = document.currentScript && document.currentScript.previousElementSibling && document.currentScript.previousElementSibling.tagName === 'FORM'
        ? document.currentScript.previousElementSibling
        : document.querySelector('form.shop-filters');
    if(!form) return;
    form.addEventListener('submit', function(){
        // Remove empty params so URLs don't contain bare keys (which can cause 404/canonical issues)
        var candidates = Array.prototype.slice.call(form.querySelectorAll('[name="product_cat"],[name^="filter_"],[name^="query_type_"],[name="orderby"]'));
        candidates.forEach(function(el){
            var val = (el.value || '').toString().trim();
            if(!val){ el.setAttribute('disabled','disabled'); }
        });
        // Re-enable after submit just in case of client-side navigation preventing submit
        setTimeout(function(){ candidates.forEach(function(el){ el.removeAttribute('disabled'); }); }, 0);
    });
})();
</script>
