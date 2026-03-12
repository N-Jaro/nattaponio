<?php
/**
 * Theme Options Page using CMB2 Options Tabs/Groups
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

add_action('cmb2_admin_init', 'nattaponio_register_theme_options_metabox');
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function nattaponio_register_theme_options_metabox()
{

    /**
     * Registers options page menu item and form.
     */
    $cmb_options = new_cmb2_box(array(
        'id' => 'nattaponio_theme_options_page',
        'title' => esc_html__('Theme Options', 'nattaponio'),
        'object_types' => array('options-page'),
        'option_key' => 'nattaponio_options',
        'icon_url' => 'dashicons-admin-generic',
        'menu_title' => esc_html__('Theme Options', 'nattaponio'),
        'position' => 60,
    ));

    /*
     * Options fields ids only need
     * to be unique within this box.
     * Prefix is not needed.
     */

    // --- HOME PAGE / HERO TAB ---
    $cmb_options->add_field(array(
        'name' => 'Home Page: Hero Section',
        'desc' => 'Content specific to the top hero section of the home page.',
        'type' => 'title',
        'id' => 'hero_title'
    ));

    $cmb_options->add_field(array(
        'name' => 'Availability Badge Text',
        'id' => 'nattaponio_hero_availability',
        'type' => 'text',
        'default' => 'Available for Collaboration',
    ));

    $cmb_options->add_field(array(
        'name' => 'Greeting',
        'id' => 'nattaponio_hero_greeting',
        'type' => 'text',
        'default' => 'Hello, I\'m',
    ));

    $cmb_options->add_field(array(
        'name' => 'Name',
        'id' => 'nattaponio_hero_name',
        'type' => 'text',
        'default' => 'Nattapon',
    ));

    $cmb_options->add_field(array(
        'name' => 'Description',
        'id' => 'nattaponio_hero_description',
        'type' => 'textarea_small',
        'default' => 'Bridging the gap between geography and artificial intelligence. Specializing in GeoAI, Machine Learning, and RAG systems.',
    ));

    $cmb_options->add_field(array(
        'name' => 'Primary Button Text',
        'id' => 'nattaponio_hero_btn1_text',
        'type' => 'text',
        'default' => 'View Portfolio',
    ));

    $cmb_options->add_field(array(
        'name' => 'Primary Button URL',
        'id' => 'nattaponio_hero_btn1_url',
        'type' => 'text_url',
        'default' => '#',
    ));

    $cmb_options->add_field(array(
        'name' => 'Secondary Button Text',
        'id' => 'nattaponio_hero_btn2_text',
        'type' => 'text',
        'default' => 'Read Blog',
    ));

    $cmb_options->add_field(array(
        'name' => 'Secondary Button URL',
        'id' => 'nattaponio_hero_btn2_url',
        'type' => 'text_url',
        'default' => '#',
    ));


    // --- HOME PAGE / CARDS TAB ---
    $cmb_options->add_field(array(
        'name' => 'Home Page: Feature Cards',
        'desc' => 'The three informational cards displayed below the hero section.',
        'type' => 'title',
        'id' => 'cards_title'
    ));

    $cmb_options->add_field(array(
        'name' => 'Academic Card Title',
        'id' => 'nattaponio_academic_title',
        'type' => 'text',
        'default' => 'Academic Background',
    ));

    $cmb_options->add_field(array(
        'name' => 'Academic Description',
        'id' => 'nattaponio_academic_desc',
        'type' => 'textarea_small',
        'default' => 'Higher Education & Research focused on spatial data science and computational geography.',
    ));

    $cmb_options->add_field(array(
        'name' => 'Academic List Items (one per line)',
        'id' => 'nattaponio_academic_list',
        'type' => 'textarea',
        'default' => "PhD in Spatial Informatics\nResearch Lead at GeoLab",
    ));

    $cmb_options->add_field(array(
        'name' => 'Technical Card Title',
        'id' => 'nattaponio_technical_title',
        'type' => 'text',
        'default' => 'Technical Proficiency',
    ));

    $cmb_options->add_field(array(
        'name' => 'Technical Description',
        'id' => 'nattaponio_technical_desc',
        'type' => 'textarea_small',
        'default' => 'Advanced implementation of GeoAI models and Retrieval-Augmented Generation (RAG).',
    ));

    $cmb_options->add_field(array(
        'name' => 'Technical Skills (comma separated)',
        'id' => 'nattaponio_technical_skills',
        'type' => 'text',
        'default' => 'GeoAI, PyTorch, RAG, PostGIS, LLMs',
    ));

    $cmb_options->add_field(array(
        'name' => 'Hub Card Title',
        'id' => 'nattaponio_hub_title',
        'type' => 'text',
        'default' => 'Knowledge Sharing',
    ));

    $cmb_options->add_field(array(
        'name' => 'Hub Description',
        'id' => 'nattaponio_hub_desc',
        'type' => 'textarea_small',
        'default' => 'เป็นแหล่งรวมความรู้และเทคนิคเชิงลึก เพื่อให้นักวิจัยและผู้ที่สนใจก้าวทันโลก GeoAI และเทคโนโลยี GIS สมัยใหม่',
    ));

    for ($i = 1; $i <= 3; $i++) {
        $cmb_options->add_field(array(
            'name' => 'Hub Link ' . $i . ' Text',
            'id' => 'nattaponio_hub_link' . $i . '_text',
            'type' => 'text',
        ));
        $cmb_options->add_field(array(
            'name' => 'Hub Link ' . $i . ' URL',
            'id' => 'nattaponio_hub_link' . $i . '_url',
            'type' => 'text_url',
        ));
    }

    // --- GLOBAL: PROFILE / SIDEBAR ---
    $cmb_options->add_field(array(
        'name' => 'Global Profile Settings',
        'desc' => 'These settings dictate the profile card shown on the Home page, Blog sidebar, and globally.',
        'type' => 'title',
        'id' => 'profile_title'
    ));

    $cmb_options->add_field(array(
        'name' => 'Profile Picture',
        'id' => 'nattaponio_profile_image',
        'type' => 'file',
    ));

    $cmb_options->add_field(array(
        'name' => 'Profile Name',
        'id' => 'nattaponio_profile_name',
        'type' => 'text',
        'default' => 'Nattapon S.',
    ));

    $cmb_options->add_field(array(
        'name' => 'Job Title',
        'id' => 'nattaponio_profile_job',
        'type' => 'text',
        'default' => 'Senior Research Scientist',
    ));

    $cmb_options->add_field(array(
        'name' => 'CV Download File',
        'desc' => 'Upload your CV/resume file (PDF recommended). This will power the Download CV button on the home page.',
        'id' => 'nattaponio_profile_cv_url',
        'type' => 'file',
        'options' => array(
            'url' => false, // Hide the URL text input, show only the upload button
        ),
        'query_args' => array(
            'type' => 'application/pdf', // Default filter to PDFs in the media picker
        ),
    ));



    $cmb_options->add_field(array(
        'name' => 'Email Button Address',
        'desc' => 'Your contact email address. Will be used as a mailto: link on the home page status card.',
        'id' => 'nattaponio_profile_email',
        'type' => 'text',
        'default' => '',
    ));

    // --- BLOG PAGE TAB ---
    $cmb_options->add_field(array(
        'name' => 'Blog Directory Page',
        'desc' => 'Content specific to the /blogs/ page header.',
        'type' => 'title',
        'id' => 'blog_title'
    ));

    $cmb_options->add_field(array(
        'name' => 'Blog Title (White Part)',
        'id' => 'nattaponio_blog_title_white',
        'type' => 'text',
        'default' => 'Blog &',
    ));

    $cmb_options->add_field(array(
        'name' => 'Blog Title (Green Part)',
        'id' => 'nattaponio_blog_title_green',
        'type' => 'text',
        'default' => 'Learning Notes',
    ));

    $cmb_options->add_field(array(
        'name' => 'Blog Description',
        'id' => 'nattaponio_blog_description',
        'type' => 'textarea_small',
        'default' => 'A curated repository of technical deep-dives, workspace aesthetics, and the pursuit of the perfect brew.',
    ));

    // --- CONTACT PAGE TAB ---
    $cmb_options->add_field(array(
        'name' => 'Contact Page Settings',
        'desc' => 'Content specific to the Contact page.',
        'type' => 'title',
        'id'   => 'contact_page_title',
    ));

    $cmb_options->add_field(array(
        'name'    => 'Badge Label',
        'id'      => 'nattaponio_contact_badge',
        'type'    => 'text',
        'default' => 'COLLABORATION',
    ));

    $cmb_options->add_field(array(
        'name'    => 'Heading (White Part)',
        'id'      => 'nattaponio_contact_heading_white',
        'type'    => 'text',
        'default' => "Let's build something",
    ));

    $cmb_options->add_field(array(
        'name'    => 'Heading (Green / Gradient Part)',
        'id'      => 'nattaponio_contact_heading_green',
        'type'    => 'text',
        'default' => 'together.',
    ));

    $cmb_options->add_field(array(
        'name'    => 'Description',
        'id'      => 'nattaponio_contact_description',
        'type'    => 'textarea_small',
        'default' => "Whether it's research collaboration, technical inquiries, or just a coffee chat about AI and systems, I'm always reachable.",
    ));

    $cmb_options->add_field(array(
        'name'    => 'Quote Text',
        'id'      => 'nattaponio_contact_quote',
        'type'    => 'textarea_small',
        'default' => '"The best way to predict the future is to invent it."',
    ));

    $cmb_options->add_field(array(
        'name'    => 'Quote Author',
        'id'      => 'nattaponio_contact_quote_author',
        'type'    => 'text',
        'default' => 'Alan Kay',
    ));

    $cmb_options->add_field(array(
        'name'    => 'Form Recipient Email',
        'desc'    => 'Email address that receives contact form submissions. Defaults to the site admin email if left blank.',
        'id'      => 'nattaponio_contact_recipient',
        'type'    => 'text',
        'default' => '',
    ));

    // --- CV PAGE TAB ---
    $cmb_options->add_field(array(
        'name' => 'Contact Link',
        'desc' => 'URL for the main Contact button in the header. (e.g., mailto:email@example.com or /contact)',
        'id' => 'nattaponio_profile_contact_href',
        'type' => 'text_url',
    ));

    $cmb_options->add_field(array(
        'name' => 'CV Page Settings',
        'desc' => 'Content specific to the header of the CV page.',
        'type' => 'title',
        'id' => 'cv_title'
    ));

    $cmb_options->add_field(array(
        'name' => 'CV Display Name',
        'id' => 'nattaponio_cv_name',
        'type' => 'text',
        'default' => 'Nattapon, Ph.D.',
    ));

    $cmb_options->add_field(array(
        'name' => 'CV Job Title',
        'id' => 'nattaponio_cv_job',
        'type' => 'text',
        'default' => 'Senior Research Scientist | GeoAI & Machine Learning',
    ));

    $cmb_options->add_field(array(
        'name' => 'Location',
        'id' => 'nattaponio_cv_location',
        'type' => 'text',
        'default' => 'Bangkok, Thailand',
    ));

    $cmb_options->add_field(array(
        'name' => 'ORCID URL/ID',
        'id' => 'nattaponio_cv_orcid',
        'type' => 'text',
        'default' => 'orcid.org/0000-0001-2345-6789',
    ));

    $cmb_options->add_field(array(
        'name' => 'Google Scholar URL',
        'id' => 'nattaponio_cv_scholar',
        'type' => 'text_url',
    ));

    $cmb_options->add_field(array(
        'name' => 'LinkedIn URL',
        'id' => 'nattaponio_cv_linkedin',
        'type' => 'text_url',
    ));

    $cmb_options->add_field(array(
        'name' => 'GitHub URL',
        'id' => 'nattaponio_cv_github',
        'type' => 'text_url',
    ));

    // --- CV REPEATABLE GROUPS ---
    $cmb_options->add_field(array(
        'name' => 'CV Sections',
        'desc' => 'Repeatable sections for Research Interests, Teaching, Service, and Awards.',
        'type' => 'title',
        'id' => 'cv_sections_title'
    ));

    // Research Interests Group
    $group_interests_id = $cmb_options->add_field(array(
        'id' => 'nattaponio_cv_research_interests',
        'type' => 'group',
        'description' => 'Add your research interests',
        'options' => array(
            'group_title' => 'Interest {#}',
            'add_button' => 'Add Another Interest',
            'remove_button' => 'Remove Interest',
            'sortable' => true,
        ),
    ));
    $cmb_options->add_group_field($group_interests_id, array(
        'name' => 'Icon (Material Symbol)',
        'id' => 'icon',
        'type' => 'text',
        'default' => 'public'
    ));
    $cmb_options->add_group_field($group_interests_id, array(
        'name' => 'Title',
        'id' => 'title',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($group_interests_id, array(
        'name' => 'Description',
        'id' => 'desc',
        'type' => 'textarea_small'
    ));

    // Teaching Group
    $group_teaching_id = $cmb_options->add_field(array(
        'id' => 'nattaponio_cv_teaching',
        'type' => 'group',
        'description' => 'Add teaching experiences',
        'options' => array(
            'group_title' => 'Teaching {#}',
            'add_button' => 'Add Another Teaching',
            'remove_button' => 'Remove Teaching',
            'sortable' => true,
        ),
    ));
    $cmb_options->add_group_field($group_teaching_id, array(
        'name' => 'Icon (Material Symbol)',
        'id' => 'icon',
        'type' => 'text',
        'default' => 'cast_for_education'
    ));
    $cmb_options->add_group_field($group_teaching_id, array(
        'name' => 'Title',
        'id' => 'title',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($group_teaching_id, array(
        'name' => 'Description',
        'id' => 'desc',
        'type' => 'textarea_small'
    ));

    // Service Group
    $group_service_id = $cmb_options->add_field(array(
        'id' => 'nattaponio_cv_service',
        'type' => 'group',
        'description' => 'Add professional services',
        'options' => array(
            'group_title' => 'Service {#}',
            'add_button' => 'Add Another Service',
            'remove_button' => 'Remove Service',
            'sortable' => true,
        ),
    ));
    $cmb_options->add_group_field($group_service_id, array(
        'name' => 'Role',
        'id' => 'role',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($group_service_id, array(
        'name' => 'Organizations',
        'id' => 'orgs',
        'type' => 'textarea_small'
    ));

    // Awards Group
    $group_awards_id = $cmb_options->add_field(array(
        'id' => 'nattaponio_cv_awards',
        'type' => 'group',
        'description' => 'Add awards and honors',
        'options' => array(
            'group_title' => 'Award {#}',
            'add_button' => 'Add Another Award',
            'remove_button' => 'Remove Award',
            'sortable' => true,
        ),
    ));
    $cmb_options->add_group_field($group_awards_id, array(
        'name' => 'Icon (Material Symbol)',
        'id' => 'icon',
        'type' => 'text',
        'default' => 'emoji_events'
    ));
    $cmb_options->add_group_field($group_awards_id, array(
        'name' => 'Title',
        'id' => 'title',
        'type' => 'text'
    ));
    $cmb_options->add_group_field($group_awards_id, array(
        'name' => 'Description',
        'id' => 'desc',
        'type' => 'textarea_small'
    ));

    // --- SEO & SOCIAL SHARING ---
    $cmb_options->add_field(array(
        'name' => 'SEO & Social Sharing',
        'desc' => 'Site-wide defaults for search engine and social media meta tags. Per-page values (e.g. post excerpts, featured images) will take priority over these defaults.',
        'type' => 'title',
        'id' => 'seo_title',
    ));

    $cmb_options->add_field(array(
        'name' => 'Site Description',
        'desc' => 'Shown in Google search results and social link previews (≤160 characters recommended).',
        'id' => 'nattaponio_seo_description',
        'type' => 'textarea_small',
        'default' => 'Researcher and lecturer in GeoAI, CyberGIS, and Remote Sensing. Bridging geography and artificial intelligence.',
    ));

    $cmb_options->add_field(array(
        'name' => 'Site Author',
        'id' => 'nattaponio_seo_author',
        'type' => 'text',
        'default' => 'Nattapon',
    ));

    $cmb_options->add_field(array(
        'name' => 'Social / OG Image',
        'desc' => 'Default image shown when sharing any page on Facebook, LinkedIn, etc. (1200×630 px recommended).',
        'id' => 'nattaponio_seo_og_image',
        'type' => 'file',
    ));

    $cmb_options->add_field(array(
        'name' => 'Twitter / X Handle',
        'desc' => 'Your Twitter/X username including the @ symbol (e.g. @nattapon_io).',
        'id' => 'nattaponio_seo_twitter_handle',
        'type' => 'text',
        'default' => '',
    ));

    $cmb_options->add_field(array(
        'name' => 'Twitter Card Type',
        'id' => 'nattaponio_seo_twitter_card',
        'type' => 'select',
        'default' => 'summary_large_image',
        'options' => array(
            'summary_large_image' => 'Summary with Large Image (recommended)',
            'summary' => 'Summary (small thumbnail)',
        ),
    ));

    $cmb_options->add_field(array(
        'name' => 'Robots Directive',
        'desc' => 'Controls how search engines index this site.',
        'id' => 'nattaponio_seo_robots',
        'type' => 'select',
        'default' => 'index, follow',
        'options' => array(
            'index, follow' => 'Index & Follow (default — recommended for live site)',
            'noindex, follow' => 'No Index, Follow (hide from search engines)',
            'index, nofollow' => 'Index, No Follow',
            'noindex, nofollow' => 'No Index, No Follow (fully block)',
        ),
    ));

}

/**
 * Wrapper function around cmb2_get_option
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function nattaponio_get_theme_option($key = '', $default = false)
{
    if (function_exists('cmb2_get_option')) {
        // Use CMB2's built in get_option function!
        $val = cmb2_get_option('nattaponio_options', $key, $default);

        // Failsafe: if the value comes back effectively empty but there is an OLD native WP get_option, use it. (Smooth migration)
        if (($val === $default || empty($val)) && get_option($key)) {
            return get_option($key);
        }
        return $val;

    }

    // Fallback to get_option if CMB2 is not loaded yet.
    $opts = get_option('nattaponio_options', array());

    $val = $default;

    if ('all' == $key) {
        $val = $opts;
    }
    elseif (is_array($opts) && array_key_exists($key, $opts) && false !== $opts[$key]) {
        $val = $opts[$key];
    }

    if (($val === $default || empty($val)) && get_option($key)) {
        return get_option($key);
    }

    return $val;
}
