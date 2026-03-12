<?php
/**
 * Contact Form Handler
 * Hooked to admin-post.php for both logged-in and logged-out users.
 *
 * @package nattaponio
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_ajax_nattaponio_contact', 'nattaponio_handle_contact_form');
add_action('wp_ajax_nopriv_nattaponio_contact', 'nattaponio_handle_contact_form');

function nattaponio_handle_contact_form()
{
    // Buffer all output so PHP notices/warnings don't corrupt the JSON response.
    ob_start();

    $is_ajax = !empty($_POST['is_ajax']);
    $redirect = isset($_POST['redirect_to']) ? esc_url_raw($_POST['redirect_to']) : home_url('/');

    // --- Nonce check ---
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'nattaponio_contact_nonce')) {
        ob_end_clean();
        nattaponio_contact_respond($is_ajax, false, 'Security check failed. Please refresh and try again.', $redirect);
        return;
    }

    // --- Sanitize & validate ---
    $name = sanitize_text_field(wp_unslash($_POST['contact_name'] ?? ''));
    $email = sanitize_email(wp_unslash($_POST['contact_email'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['contact_message'] ?? ''));

    if (empty($name) || empty($email) || empty($message)) {
        ob_end_clean();
        nattaponio_contact_respond($is_ajax, false, 'Please fill in all required fields.', $redirect);
        return;
    }

    if (!is_email($email)) {
        ob_end_clean();
        nattaponio_contact_respond($is_ajax, false, 'Please enter a valid email address.', $redirect);
        return;
    }

    // --- Build email ---
    $recipient = nattaponio_get_theme_option('nattaponio_contact_recipient', get_option('admin_email'));
    if (empty($recipient)) {
        $recipient = get_option('admin_email');
    }

    $site_name = get_bloginfo('name');
    $subject = "[{$site_name}] New Contact: " . $name;

    $body = "You received a new contact form submission.\n\n";
    $body .= "Name:    {$name}\n";
    $body .= "Email:   {$email}\n";
    $body .= "Message:\n{$message}\n\n";
    $body .= "---\nSent from " . home_url('/');

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: Nattapon Jaroenchai <hello@nattapon.io>',
        "Reply-To: {$name} <{$email}>", );

    $sent = wp_mail($recipient, $subject, $body, $headers);
    ob_end_clean();

    if ($sent) {
        nattaponio_contact_respond($is_ajax, true, "Message sent! I'll get back to you soon.", $redirect . '?contact=success');
    }
    else {
        nattaponio_contact_respond($is_ajax, false, 'Could not send the message. Please email me directly.', $redirect . '?contact=error');
    }
}

/**
 * Send JSON (AJAX) or redirect (traditional form) response and exit.
 */
function nattaponio_contact_respond(bool $is_ajax, bool $success, string $message, string $redirect): void
{
    if ($is_ajax) {
        $response = array('message' => $message);

        if ($success) {
            wp_send_json_success($response); // Sends success: true and dies
        }
        else {
            wp_send_json_error($response); // Sends success: false and dies
        }
    }
    else {
        wp_safe_redirect($redirect);
        exit;
    }
}
