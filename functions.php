<?php
 /**
  * THEME ASSETS (CSS + JS) WITH CACHE BUSTING
  */
 function theme_enqueue_assets() {
     // Absolute paths for filemtime()
     $css_path = get_template_directory() . '/assets/css/style.css';
     $js_path  = get_template_directory() . '/assets/js/scripts.js';

     // Cache-busting versions
     $css_ver = file_exists($css_path) ? filemtime($css_path) : false;
     $js_ver  = file_exists($js_path)  ? filemtime($js_path)  : false;

     // Main stylesheet
     wp_enqueue_style(
         'theme-style',
         get_template_directory_uri() . '/assets/css/style.css',
         array(),
         $css_ver,
         'all'
     );

     // Frontend JS (with wp.* dependencies)
     wp_enqueue_script(
         'theme-scripts',
         get_template_directory_uri() . '/assets/js/scripts.js',
         array('wp-dom-ready', 'wp-blocks'),
         $js_ver,
         true
     );
 }
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');


 /**
  * PURE CLASSIC THEME MODE — REMOVE ALL GUTENBERG CSS
  */

 // Disable block styles entirely
 add_action('after_setup_theme', function() {
     remove_theme_support('wp-block-styles');
 });

 // Disable global styles (theme.json + presets)
 add_filter('wp_enqueue_global_styles', '__return_false');

 // Disable block supports CSS (layout, spacing, elements, etc.)
 add_filter('wp_should_load_separate_core_block_assets', '__return_false');

 // Dequeue any remaining block styles
 function theme_remove_block_css() {
     wp_dequeue_style('wp-block-library');
     wp_dequeue_style('wp-block-library-theme');
     wp_dequeue_style('wc-block-style');
     wp_dequeue_style('global-styles');
     wp_dequeue_style('wp-elements'); // removes :root :where(.wp-element-button...) rules
 }
 add_action('wp_enqueue_scripts', 'theme_remove_block_css', 100);

 // Prevent inline global styles from being printed
 remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
 remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

 /**
  * DISABLE EMOJIS
  */
 function theme_disable_emojis() {
     remove_action('wp_head', 'print_emoji_detection_script', 7);
     remove_action('admin_print_scripts', 'print_emoji_detection_script');
     remove_action('wp_print_styles', 'print_emoji_styles');
     remove_action('admin_print_styles', 'print_emoji_styles');
     remove_filter('the_content_feed', 'wp_staticize_emoji');
     remove_filter('comment_text_rss', 'wp_staticize_emoji');
     remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

     add_filter('tiny_mce_plugins', function($plugins) {
         return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
     });
 }
 add_action('init', 'theme_disable_emojis');

 /**
  * THEME SUPPORT
  */
 function theme_add_support() {
     add_theme_support('menus');
     // removed wp-block-styles (we disable it above)
     add_theme_support('post-thumbnails');
     add_theme_support('title-tag');
     add_theme_support('responsive-embeds');
     add_theme_support('custom-logo');
     add_theme_support('editor-styles');

     add_editor_style('/assets/css/style.css');
 }
 add_action('after_setup_theme', 'theme_add_support');


 /**
  * EDITOR STYLES (with cache busting)
  */
 function theme_editor_styles() {
     $editor_css_path = get_template_directory() . '/assets/css/style.css';
     $editor_css_ver  = file_exists($editor_css_path) ? filemtime($editor_css_path) : false;

     wp_enqueue_style(
         'theme-editor-style',
         get_template_directory_uri() . '/assets/css/style.css',
         array(),
         $editor_css_ver
     );
 }
 add_action('enqueue_block_editor_assets', 'theme_editor_styles');

 /**
  * BLOCK EDITOR SCRIPTS (for registering custom block styles)
  */
 function theme_enqueue_block_editor_assets() {

     $editor_js_path = get_template_directory() . '/assets/js/scripts.js';
     $editor_js_ver  = file_exists($editor_js_path) ? filemtime($editor_js_path) : false;

     wp_enqueue_script(
         'theme-editor-scripts',
         get_template_directory_uri() . '/assets/js/scripts.js',
         array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
         $editor_js_ver,
         true
     );
 }
 add_action('enqueue_block_editor_assets', 'theme_enqueue_block_editor_assets');

 /**
  * CUSTOM BLOCK CATEGORY
  */
 add_filter('block_categories_all', function($categories) {
     $categories[] = array(
         'slug'  => 'einzweidinge-category',
         'title' => 'Einzweidinge',
     );
     return $categories;
 });

 /**
  * WRAP CLASSIC BLOCK CONTENT
  */
 function theme_wrap_classic_block($block_content, $block) {
     if ($block['blockName'] === null && !empty(trim($block_content))) {
         return '<div class="blog-article-section"><div class="blog-article-section__wrapper">'
             . $block_content .
             '</div></div>';
     }
     return $block_content;
 }
 add_filter('render_block', 'theme_wrap_classic_block', 10, 2);

 /**
  * MENU CLASS CLEANUP
  */
 function theme_clean_menu_classes($classes, $item) {
     return (array) get_post_meta($item->ID, '_menu_item_classes', true);
 }
 add_filter('nav_menu_css_class', 'theme_clean_menu_classes', 10, 2);

 function theme_add_class_to_links($atts, $item, $args) {
     if (isset($args->add_a_class)) {
         $atts['class'] = $args->add_a_class;
     }
     return $atts;
 }
 add_filter('nav_menu_link_attributes', 'theme_add_class_to_links', 10, 3);

 /**
  * CUSTOM LANGUAGE ATTRIBUTE OVERRIDE
  */
 function theme_custom_language_attributes($output) {
     $slugs = array('english');

     if (is_page($slugs) || is_single($slugs)) {
         $current = get_bloginfo('language');
         $output = str_replace('lang="' . $current . '"', 'lang="en-US"', $output);
     }

     return $output;
 }
 add_filter('language_attributes', 'theme_custom_language_attributes');

?>
