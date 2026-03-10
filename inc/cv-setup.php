<?php
/**
 * CV Registration & CMB2 Fields
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types for the CV
 */
function nattaponio_register_cv_cpts()
{
    // 1. Publications
    register_post_type('cv_publication', array(
        'labels' => array(
            'name' => 'Publications',
            'singular_name' => 'Publication',
            'add_new_item' => 'Add New Publication',
            'edit_item' => 'Edit Publication',
            'all_items' => 'All Publications'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'page-attributes'), // Content will be handled by CMB2 fields to keep it strict
        'menu_icon' => 'dashicons-media-document',
        'menu_position' => 20,
    ));

    // 2. Experience
    register_post_type('cv_experience', array(
        'labels' => array(
            'name' => 'Experience',
            'singular_name' => 'Experience',
            'add_new_item' => 'Add New Experience',
            'edit_item' => 'Edit Experience',
            'all_items' => 'All Experience'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'page-attributes'), // Title is Job Role, editor for bullets
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 21,
    ));

    // 3. Education
    register_post_type('cv_education', array(
        'labels' => array(
            'name' => 'Education',
            'singular_name' => 'Education',
            'add_new_item' => 'Add New Education',
            'edit_item' => 'Edit Education',
            'all_items' => 'All Education'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'page-attributes'), // Title is Degree
        'menu_icon' => 'dashicons-welcome-learn-more',
        'menu_position' => 22,
    ));
}
add_action('init', 'nattaponio_register_cv_cpts');

/**
 * CMB2 Metaboxes and Options Pages
 */
function nattaponio_register_cv_metaboxes()
{

    // Safety check for CMB2
    if (!defined('CMB2_LOADED')) {
        return;
    }

    /**
     * Publication Metabox
     */
    $pub_box = new_cmb2_box(array(
        'id' => 'cv_publication_metabox',
        'title' => 'Publication Details',
        'object_types' => array('cv_publication'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true,
    ));

    // Citation Text
    $pub_box->add_field(array(
        'name' => 'Citation Text',
        'desc' => 'The full citation text (e.g., Authors. (Year). "Title". Venue.)',
        'id' => '_cv_pub_citation',
        'type' => 'textarea',
    ));

    // DOI Link
    $pub_box->add_field(array(
        'name' => 'DOI',
        'desc' => 'Link to the DOI or publication page (e.g., https://doi.org/10.1016/j.envsoft.2...)',
        'id' => '_cv_pub_doi',
        'type' => 'text_url',
    ));

    $pub_box->add_field(array(
        'name' => 'Publication Type',
        'id' => '_cv_pub_type',
        'type' => 'select',
        'show_option_none' => false,
        'default' => 'journal',
        'options' => array(
            'journal' => 'Journal',
            'conference' => 'Conference',
        ),
    ));
    $pub_box->add_field(array(
        'name' => 'PDF Link',
        'id' => '_cv_pub_pdf',
        'type' => 'text_url',
    ));
    $pub_box->add_field(array(
        'name' => 'Code Link',
        'id' => '_cv_pub_code',
        'type' => 'text_url',
    ));
    $pub_box->add_field(array(
        'name' => 'Data Link',
        'id' => '_cv_pub_data',
        'type' => 'text_url',
    ));

    /**
     * Experience Metabox
     */
    $exp_box = new_cmb2_box(array(
        'id' => 'cv_experience_metabox',
        'title' => 'Experience Details',
        'object_types' => array('cv_experience'),
    ));
    $exp_box->add_field(array(
        'name' => 'Company / Lab',
        'id' => '_cv_exp_company',
        'type' => 'text',
    ));
    $exp_box->add_field(array(
        'name' => 'Date Range',
        'desc' => 'e.g., 2021 - Present',
        'id' => '_cv_exp_dates',
        'type' => 'text',
    ));

    /**
     * Education Metabox
     */
    $edu_box = new_cmb2_box(array(
        'id' => 'cv_education_metabox',
        'title' => 'Education Details',
        'object_types' => array('cv_education'),
    ));
    $edu_box->add_field(array(
        'name' => 'University / Location',
        'desc' => 'e.g., National University of Singapore (NUS) • Singapore',
        'id' => '_cv_edu_university',
        'type' => 'text',
    ));
    $edu_box->add_field(array(
        'name' => 'Date Range',
        'desc' => 'e.g., 2016 - 2020',
        'id' => '_cv_edu_dates',
        'type' => 'text',
    ));
    $edu_box->add_field(array(
        'name' => 'Dissertation / Honors',
        'desc' => 'e.g., "Scalable Graph Neural Networks for Dynamic Spatial Trajectories" or "First Class Honors"',
        'id' => '_cv_edu_dissertation',
        'type' => 'text',
    ));

    /**
     * Global CV Options Page
     */
    $cv_opt = new_cmb2_box(array(
        'id' => 'cv_global_options',
        'title' => 'CV Settings & Global Info',
        'object_types' => array('options-page'),
        'option_key' => 'nattaponio_cv_options', // Custom option key
        'icon_url' => 'dashicons-admin-generic',
        'menu_title' => 'CV Settings',
    ));

    // Profile Details
    $cv_opt->add_field(array('name' => 'Profile Name', 'id' => 'cv_name', 'type' => 'text', 'default' => 'Nattapon, Ph.D.'));
    $cv_opt->add_field(array('name' => 'Job Title', 'id' => 'cv_job', 'type' => 'text', 'default' => 'Senior Research Scientist | GeoAI & Machine Learning'));
    $cv_opt->add_field(array('name' => 'Location', 'id' => 'cv_location', 'type' => 'text', 'default' => 'Bangkok, Thailand'));
    $cv_opt->add_field(array('name' => 'ORCID', 'id' => 'cv_orcid', 'type' => 'text'));
    $cv_opt->add_field(array('name' => 'Google Scholar URL', 'id' => 'cv_scholar', 'type' => 'url'));
    $cv_opt->add_field(array('name' => 'LinkedIn URL', 'id' => 'cv_linkedin', 'type' => 'url'));
    $cv_opt->add_field(array('name' => 'GitHub URL', 'id' => 'cv_github', 'type' => 'url'));

    // Research Interests Group
    $group_req_int = $cv_opt->add_field(array(
        'id' => 'cv_research_interests',
        'type' => 'group',
        'description' => 'Research Interests Cards',
        'options' => array(
            'group_title' => 'Interest {#}',
            'add_button' => 'Add Another Interest',
            'remove_button' => 'Remove Interest',
            'sortable' => true,
        ),
    ));
    $cv_opt->add_group_field($group_req_int, array('name' => 'Icon Symbol (Google Material)', 'id' => 'icon', 'type' => 'text', 'default' => 'public'));
    $cv_opt->add_group_field($group_req_int, array('name' => 'Title', 'id' => 'title', 'type' => 'text'));
    $cv_opt->add_group_field($group_req_int, array('name' => 'Description', 'id' => 'desc', 'type' => 'textarea_small'));

    // Teaching Group
    $group_teaching = $cv_opt->add_field(array(
        'id' => 'cv_teaching',
        'type' => 'group',
        'description' => 'Teaching & Advising',
        'options' => array('group_title' => 'Item {#}', 'add_button' => 'Add Item', 'remove_button' => 'Remove Item', 'sortable' => true),
    ));
    $cv_opt->add_group_field($group_teaching, array('name' => 'Icon', 'id' => 'icon', 'type' => 'text', 'default' => 'school'));
    $cv_opt->add_group_field($group_teaching, array('name' => 'Course / Role Title', 'id' => 'title', 'type' => 'text'));
    $cv_opt->add_group_field($group_teaching, array('name' => 'Details', 'id' => 'desc', 'type' => 'text'));

    // Service Group
    $group_service = $cv_opt->add_field(array(
        'id' => 'cv_service',
        'type' => 'group',
        'description' => 'Academic / Community Service',
        'options' => array('group_title' => 'Service {#}', 'add_button' => 'Add Service', 'remove_button' => 'Remove Service', 'sortable' => true),
    ));
    $cv_opt->add_group_field($group_service, array('name' => 'Role (e.g., Program Committee)', 'id' => 'role', 'type' => 'text'));
    $cv_opt->add_group_field($group_service, array('name' => 'Organizations/Conferences', 'id' => 'orgs', 'type' => 'text'));

    // Awards Group
    $group_awards = $cv_opt->add_field(array(
        'id' => 'cv_awards',
        'type' => 'group',
        'description' => 'Awards & Honors',
        'options' => array('group_title' => 'Award {#}', 'add_button' => 'Add Award', 'remove_button' => 'Remove Award', 'sortable' => true),
    ));
    $cv_opt->add_group_field($group_awards, array('name' => 'Icon', 'id' => 'icon', 'type' => 'text', 'default' => 'emoji_events'));
    $cv_opt->add_group_field($group_awards, array('name' => 'Title', 'id' => 'title', 'type' => 'text'));
    $cv_opt->add_group_field($group_awards, array('name' => 'Issuer & Year', 'id' => 'desc', 'type' => 'text'));

}
add_action('cmb2_admin_init', 'nattaponio_register_cv_metaboxes');
