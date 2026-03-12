<?php
/**
 * Theme functions and definitions
 *
 * @package nattaponio
 */

if (!function_exists('nattaponio_setup')):
    function nattaponio_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
            'menu-1' => esc_html__('Primary', 'nattaponio'),
        )
        );

        // Switch default core markup for search form, comment form, and comments to output valid HTML5.
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
    }
endif;
add_action('after_setup_theme', 'nattaponio_setup');

/**
 * Enqueue scripts and styles.
 */
function nattaponio_scripts()
{
    wp_enqueue_style('nattaponio-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Google Fonts & Icons
    wp_enqueue_style('nattaponio-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Kanit:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Prompt:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap', array(), null);
    wp_enqueue_style('nattaponio-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap', array(), null);
    wp_enqueue_style('nattaponio-icons-fill', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap', array(), null);

    // Enqueue Tailwind via CDN
    wp_enqueue_script('nattaponio-tailwind', 'https://cdn.tailwindcss.com?plugins=forms,container-queries', array(), null, false);

    // Enqueue our custom script that configures Tailwind
    wp_enqueue_script('nattaponio-tailwind-config', get_template_directory_uri() . '/assets/js/tailwind-config.js', array('nattaponio-tailwind'), '1.0.0', false);

    // Enqueue our main stylesheet for custom component classes
    wp_enqueue_style('nattaponio-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'nattaponio_scripts');

/**
 * Add custom Tailwind CSS classes to WordPress navigation menu anchor tags
 */
function nattaponio_nav_menu_link_attributes($atts, $item, $args)
{
    if ($args->theme_location == 'menu-1') {
        // Detect if mobile menu based on the menu_id we passed in header.php
        $is_mobile = strpos($args->menu_id, 'mobile') !== false;

        $base_classes = 'transition-colors';
        $active_classes = '';
        $inactive_classes = '';

        if ($is_mobile) {
            $base_classes .= ' text-base font-medium border-b border-primary/10 pb-2 block';
            $active_classes = 'text-primary';
            $inactive_classes = 'hover:text-primary';
        }
        else {
            $base_classes .= ' text-sm font-semibold inline-block';
            $active_classes = 'text-slate-100 bg-[#0f172a] px-5 py-2 rounded-full border border-[#1e293b] hover:border-primary/50';
            $inactive_classes = 'text-slate-300 hover:text-primary';
        }

        // Check if item is current or ancestor
        if (in_array('current-menu-item', $item->classes) || in_array('current-page-ancestor', $item->classes)) {
            $atts['class'] = $base_classes . ' ' . $active_classes;
        }
        else {
            $atts['class'] = $base_classes . ' ' . $inactive_classes;
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'nattaponio_nav_menu_link_attributes', 10, 3);

/**
 * Load CMB2 (bundled with theme)
 */
if (file_exists(get_template_directory() . '/CMB2/init.php')) {
    require_once get_template_directory() . '/CMB2/init.php';
}

/**
 * Custom Theme Options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * CV Setup (CPTs and CMB2)
 */
require get_template_directory() . '/inc/cv-setup.php';

/**
 * Contact Form Handler
 */
require get_template_directory() . '/inc/contact-form-handler.php';

/**
 * Dynamic Page Titles
 * Hooks into WordPress's built-in title-tag support to customise
 * the <title> per page type.
 */
function nattaponio_dynamic_title($title_parts)
{
    $site_name = get_bloginfo('name');

    if (is_front_page()) {
        $title_parts['title'] = $site_name;
        $title_parts['tagline'] = get_bloginfo('description');
        unset($title_parts['site']);
        return $title_parts;
    }

    if (is_page('cv') || is_page_template('page-cv.php')) {
        $title_parts['title'] = 'CV';
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    if (is_home() || is_page('blogs') || is_page_template('page-blogs.php')) {
        $white = nattaponio_get_theme_option('nattaponio_blog_title_white', 'Blog &');
        $green = nattaponio_get_theme_option('nattaponio_blog_title_green', 'Learning Notes');
        $title_parts['title'] = strip_tags($white . ' ' . $green);
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    if (is_404()) {
        $title_parts['title'] = 'Page Not Found';
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    if (is_singular()) {
        $title_parts['title'] = get_the_title();
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    if (is_category()) {
        $title_parts['title'] = single_cat_title('', false);
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    if (is_tag()) {
        $title_parts['title'] = single_tag_title('', false);
        $title_parts['site'] = $site_name;
        return $title_parts;
    }

    // Default: just enforce the site name.
    $title_parts['site'] = $site_name;
    return $title_parts;
}
add_filter('document_title_parts', 'nattaponio_dynamic_title');

// Use an en-dash as the separator between title and site name.
add_filter('document_title_separator', function () {
    return '–';
});

/**
 * SEO & Social Meta Tags
 * Outputs <meta> tags for search engines, Open Graph (Facebook/LinkedIn),
 * and Twitter Cards, using Theme Options defaults with page-specific overrides.
 */
function nattaponio_output_seo_meta()
{
    global $post;

    // --- Collect data ---
    $site_name = get_bloginfo('name');

    // Description: post excerpt → theme option → hardcoded fallback
    $fallback_desc = 'Researcher and lecturer in GeoAI, CyberGIS, and Remote Sensing. Bridging geography and artificial intelligence.';
    $default_desc = nattaponio_get_theme_option('nattaponio_seo_description', $fallback_desc);
    if (empty($default_desc)) {
        $default_desc = $fallback_desc;
    }
    if (is_singular() && !empty($post) && has_excerpt($post->ID)) {
        $description = wp_strip_all_tags(get_the_excerpt($post->ID));
    }
    else {
        $description = $default_desc;
    }
    $description = esc_attr(wp_trim_words($description, 30, ''));

    // OG Title
    if (is_front_page()) {
        $og_title = $site_name . ' – ' . get_bloginfo('description');
    }
    elseif (is_singular() && !empty($post)) {
        $og_title = get_the_title() . ' – ' . $site_name;
    }
    else {
        $og_title = wp_title('–', false, 'right') . $site_name;
    }
    $og_title = esc_attr($og_title);

    // Canonical URL — check is_front_page() FIRST, because on a static
    // front page is_singular() is also true and would give the wrong URL.
    if (is_front_page()) {
        $canonical = home_url('/');
    }
    elseif (is_singular() && !empty($post)) {
        $canonical = get_permalink($post->ID);
    }
    elseif (is_home()) {
        // Blog posts index page
        $page_for_posts = get_option('page_for_posts');
        $canonical = $page_for_posts ? get_permalink($page_for_posts) : home_url('/');
    }
    else {
        $canonical = home_url(add_query_arg(array()));
    }
    $canonical = esc_url($canonical);

    // OG Image: featured image → theme option → theme asset fallback
    $og_image_url = '';
    if (is_singular() && !empty($post) && has_post_thumbnail($post->ID)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
        $og_image_url = $img ? esc_url($img[0]) : '';
    }
    if (empty($og_image_url)) {
        $og_image_url = esc_url(nattaponio_get_theme_option('nattaponio_seo_og_image', ''));
    }
    if (empty($og_image_url)) {
        $og_image_url = esc_url(get_template_directory_uri() . '/assets/img/social_share.png');
    }

    $author = esc_attr(nattaponio_get_theme_option('nattaponio_seo_author', 'Nattapon'));
    $robots = esc_attr(nattaponio_get_theme_option('nattaponio_seo_robots', 'index, follow'));
    $twitter_handle = esc_attr(nattaponio_get_theme_option('nattaponio_seo_twitter_handle', ''));
    $twitter_card = esc_attr(nattaponio_get_theme_option('nattaponio_seo_twitter_card', 'summary_large_image'));
    // og:type is 'article' only for single blog posts, never for the front page.
    $og_type = (is_singular('post') && !is_front_page()) ? 'article' : 'website';
    $cv_name = esc_attr(nattaponio_get_theme_option('nattaponio_cv_name', ''));

    // Article dates
    $pub_time = $mod_time = '';
    if ('article' === $og_type && !empty($post)) {
        $pub_time = esc_attr(get_the_date('c', $post->ID));
        $mod_time = esc_attr(get_the_modified_date('c', $post->ID));
    }

    // --- Output ---
    echo "\n<!-- SEO & Social Meta Tags (nattaponio theme) -->\n";

    // Basic SEO
    if ($description)
        echo '<meta name="description" content="' . $description . '">' . "\n";
    echo '<meta name="author" content="' . $author . '">' . "\n";
    echo '<meta name="robots" content="' . $robots . '">' . "\n";
    echo '<link rel="canonical" href="' . $canonical . '">' . "\n";

    // Open Graph
    echo '<meta property="og:type" content="' . $og_type . '">' . "\n";
    echo '<meta property="og:title" content="' . $og_title . '">' . "\n";
    if ($description)
        echo '<meta property="og:description" content="' . $description . '">' . "\n";
    echo '<meta property="og:url" content="' . $canonical . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
    echo '<meta property="og:locale" content="' . esc_attr(get_locale()) . '">' . "\n";
    if ($og_image_url) {
        echo '<meta property="og:image" content="' . $og_image_url . '">' . "\n";
        echo '<meta property="og:image:width" content="1200">' . "\n";
        echo '<meta property="og:image:height" content="630">' . "\n";
    }
    if ('article' === $og_type) {
        if ($pub_time)
            echo '<meta property="article:published_time" content="' . $pub_time . '">' . "\n";
        if ($mod_time)
            echo '<meta property="article:modified_time" content="' . $mod_time . '">' . "\n";
        echo '<meta property="article:author" content="' . $author . '">' . "\n";
    }

    // Twitter Cards
    echo '<meta name="twitter:card" content="' . $twitter_card . '">' . "\n";
    echo '<meta name="twitter:title" content="' . $og_title . '">' . "\n";
    if ($description)
        echo '<meta name="twitter:description" content="' . $description . '">' . "\n";
    if ($og_image_url)
        echo '<meta name="twitter:image" content="' . $og_image_url . '">' . "\n";
    if ($twitter_handle) {
        echo '<meta name="twitter:site" content="' . $twitter_handle . '">' . "\n";
        echo '<meta name="twitter:creator" content="' . $twitter_handle . '">' . "\n";
    }

    // Academic citation meta (CV page)
    if ($cv_name)
        echo '<meta name="citation_author" content="' . $cv_name . '">' . "\n";

    echo "<!-- / SEO Meta Tags -->\n\n";
}
add_action('wp_head', 'nattaponio_output_seo_meta', 1);


add_action('phpmailer_init', 'nattaponio_phpmailer_smtp');
function nattaponio_phpmailer_smtp($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'mail.nattapon.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587; // Or 465
    $phpmailer->Username = 'hello@nattapon.io'; // Use your full email
    $phpmailer->Password = 'LxQDS2eXsdg7GqKSQhGW';
    $phpmailer->SMTPSecure = 'tls'; // Use 'ssl' if port is 465
    $phpmailer->From = 'hello@nattapon.io';
    $phpmailer->FromName = get_bloginfo('name');
}