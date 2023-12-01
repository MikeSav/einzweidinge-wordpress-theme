<?php
/**
 * Register CSS Class
 */
function add_css() {
    $version = wp_get_theme()->get('Version');
    wp_register_style('first', get_template_directory_uri() . '/assets/css/style.css', false, $version, 'all');
    wp_enqueue_style('first');
}

add_action('wp_enqueue_scripts', 'add_css');

/**
 * REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
 */
function remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // REMOVE WOOCOMMERCE BLOCK CSS
    wp_dequeue_style('global-styles'); // REMOVE THEME.JSON

}

remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
add_action('wp_enqueue_scripts', 'remove_wp_block_library_css', 100);

function wps_deregister_styles() {
    wp_dequeue_style('global-styles');
}

add_action('wp_enqueue_scripts', 'wps_deregister_styles', 100);

/**
 * Register JS
 */
function add_script() {
    wp_register_script('js-script', get_template_directory_uri() . '/assets/js/scripts.js', true);
    wp_enqueue_script('js-script');
}

add_action('wp_enqueue_scripts', 'add_script');

function discard_menu_classes($classes, $item) {
    return (array)get_post_meta($item->ID, '_menu_item_classes', true);
}

add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);
add_filter('block_categories_all', function ($categories) {
    // Adding a new category.
    $categories[] = array(
        'slug' => 'einzweidinge-category',
        'title' => 'Einzweidinge'
    );

    return $categories;
});

/**
 * Stick a div with blog-article class around a classic
 */
add_filter('render_block', 'wrap_classic_block', 10, 2);

function wrap_classic_block($block_content, $block) {
    if (null === $block['blockName'] && !empty($block_content) && !ctype_space($block_content)) {
        $block_content = '<div class="blog-article-section"><div class="blog-article-section__wrapper">' . $block_content . '</div></div>';
    }
    return $block_content;
}

function add_additional_class_on_a($classes, $item, $args) {
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
add_filter('should_load_separate_core_block_assets', '__return_true');

/**
 * Disable emojis in WordPress
 */
add_action('init', 'smartwp_disable_emojis');

function smartwp_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

/**
 * Pretty obvious, get rid of emoji plugin
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins))
    {
        return array_diff($plugins, array(
            'wpemoji'
        ));
    }
    else
    {
        return array();
    }
}

/**
 * Enable menus and other shit...
 */
function add_support() {
    add_theme_support('menus');
    add_theme_support('wp-block-styles');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');
    add_theme_support('editor-styles');
    add_editor_style(get_template_directory_uri() . '/assets/css/style.css');
}

add_action('after_setup_theme', 'add_support');

wp_register_style('einzweidingeRandom', plugin_dir_url(__FILE__) . '/assets/css/style.css', array(
    'einzweidinge'
) , null, // example of no version number...
// ...and no CSS media type
);

wp_enqueue_style('einzweidingeRandom');

/**
 * Modify language attributes for specific pages and posts.
 */
function my_custom_language_attributes($output) {
    // Define an array of page and post slugs to modify.
    $page_slugs = array(
        'english'
    ); // Add any additional page or post slugs here
    // Check if the current page or post is in the defined array of slugs.
    if (is_page($page_slugs) || is_single($page_slugs))
    {
        // Get the current language.
        $lang = get_bloginfo('language');
        // Set the desired language.
        $new_lang = 'en-US';
        // Replace the current language with the new language in the HTML attributes.
        $output = str_replace('lang="' . $lang . '"', 'lang="' . $new_lang . '"', $output);
    }

    // Return the modified HTML attributes.
    return $output;
}

// Hook the function to the language_attributes filter.
add_filter('language_attributes', 'my_custom_language_attributes');
?>