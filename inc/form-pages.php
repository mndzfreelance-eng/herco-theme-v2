<?php
/**
 * Form pages — Request Quote, Warranty, Schedule a Call, etc.
 * Built-in forms work without Contact Form 7 or page editor content.
 */
if (!defined('ABSPATH')) exit;

/** All Quick Access form page slugs. */
function herco_form_page_slugs() {
    return [
        'request-quote',
        'warranty-claim',
        'after-sales-support',
        'retailer-application',
        'supplier-partnership',
        'schedule-a-call',
    ];
}

/** Hardcoded defaults — always available even if site-content.json is missing. */
function herco_form_pages_defaults() {
    return [
        'request-quote' => [
            'title'     => 'Request a Quotation',
            'label'     => 'Sales',
            'intro'     => 'Get pricing for bulk orders or specific product inquiries. Fill out the form below and our sales team will respond within 1–2 business days.',
            'cf7_title' => 'Request for Quotation',
            'email'     => 'sales@herco.com.ph',
            'submit'    => 'Send Quote Request',
        ],
        'warranty-claim' => [
            'title'     => 'Warranty Claim',
            'label'     => 'After-Sales',
            'intro'     => 'File a product warranty claim for any Herco-distributed product. Please include the product model, serial number, and proof of purchase. We aim to respond within 3–5 business days.',
            'cf7_title' => 'Warranty Claim',
            'email'     => 'aftersales@herco.com.ph',
            'submit'    => 'Submit Claim',
        ],
        'after-sales-support' => [
            'title'     => 'After-Sales Support',
            'label'     => 'Service',
            'intro'     => 'Request service, repair, or replacement parts for products purchased through Herco channels. Describe the issue and our service team will assist you.',
            'cf7_title' => 'After-Sales Support',
            'email'     => 'service@herco.com.ph',
            'submit'    => 'Send Support Request',
        ],
        'retailer-application' => [
            'title'     => 'Retailer Application',
            'label'     => 'Partner',
            'intro'     => 'Apply to become an authorized Herco retailer. Tell us about your business and the brands you currently carry.',
            'cf7_title' => 'Retailer Application',
            'email'     => 'bizdev@herco.com.ph',
            'submit'    => 'Submit Application',
        ],
        'supplier-partnership' => [
            'title'     => 'Supplier Partnership',
            'label'     => 'Sourcing',
            'intro'     => 'Introduce your brand to the Philippine market through Herco. Share your company profile and product range for our sourcing team to review.',
            'cf7_title' => 'Supplier Partnership',
            'email'     => 'sourcing@herco.com.ph',
            'submit'    => 'Send Partnership Inquiry',
        ],
        'schedule-a-call' => [
            'title'     => 'Schedule a Call',
            'label'     => 'Consultation',
            'intro'     => 'Book a consultation with our business development team. Let us know your preferred date and what you would like to discuss.',
            'cf7_title' => 'Schedule a Call',
            'email'     => 'sales@herco.com.ph',
            'submit'    => 'Request a Call',
        ],
    ];
}

function herco_form_pages_registry() {
    $defaults = herco_form_pages_defaults();
    $json     = herco_site_content_get('formPages', []);
    if (!is_array($json)) {
        $json = [];
    }

    $out = [];
    foreach ($defaults as $slug => $default) {
        $merged = wp_parse_args(is_array($json[$slug] ?? null) ? $json[$slug] : [], $default);
        $merged['email'] = $merged['email'] ?: get_theme_mod('herco_email', 'info@herco.com.ph');
        $out[$slug] = $merged;
    }

    return $out;
}

function herco_get_form_page($slug) {
    $registry = herco_form_pages_registry();
    return $registry[$slug] ?? null;
}

function herco_contact_form_topics() {
    return [
        ''                    => __( 'Select an option', 'herco' ),
        'warranty-claim'      => __( 'Warranty Claim', 'herco' ),
        'after-sales-support' => __( 'After-Sales Support', 'herco' ),
        'request-quote'       => __( 'Request a Quotation', 'herco' ),
        'retailer-application' => __( 'Retailer Application', 'herco' ),
        'supplier-partnership' => __( 'Supplier Partnership', 'herco' ),
        'other'               => __( 'Other inquiry', 'herco' ),
    ];
}

function herco_contact_form_config() {
    return [
        'title'      => __( 'Contact', 'herco' ),
        'label'      => __( 'General Inquiry', 'herco' ),
        'intro'      => __( 'We welcome customers, suppliers and partnership inquiries. Fill out the form and the Herco team will reply through the contact details you provide.', 'herco' ),
        'cf7_title'  => '',
        'email'      => get_theme_mod( 'herco_email', 'info@herco.com.ph' ),
        'submit'     => __( 'Send Message', 'herco' ),
        'topics'     => herco_contact_form_topics(),
    ];
}

function herco_get_native_form_config( $slug ) {
    if ( 'contact' === $slug ) {
        return herco_contact_form_config();
    }

    return herco_get_form_page( $slug );
}

function herco_current_form_slug() {
    global $herco_form_slug;
    if (!empty($herco_form_slug)) {
        return $herco_form_slug;
    }
    if (is_page()) {
        return get_post_field('post_name', get_queried_object_id());
    }
    return '';
}

function herco_is_form_page($slug = null) {
    $current = herco_current_form_slug();
    if (!$current) {
        return false;
    }
    if ($slug !== null) {
        return $current === $slug;
    }
    return in_array($current, herco_form_page_slugs(), true);
}

function herco_clean_form_page_content($page_id) {
    $page = get_post($page_id);
    if (!$page || $page->post_type !== 'page') {
        return;
    }
    $content = trim($page->post_content);
    if ($content === '' || strpos($content, '[') !== false) {
        wp_update_post(['ID' => $page_id, 'post_content' => '']);
    }
}

/** Remove Elementor / page-builder overrides so theme template renders. */
function herco_reset_form_page_builder($page_id) {
    delete_post_meta($page_id, '_elementor_edit_mode');
    delete_post_meta($page_id, '_elementor_data');
    delete_post_meta($page_id, '_elementor_template_type');
    delete_post_meta($page_id, '_wp_page_template');
}

function herco_create_form_pages() {
    $registry = herco_form_pages_registry();

    foreach ($registry as $slug => $config) {
        $existing = get_page_by_path($slug);

        if ($existing) {
            herco_clean_form_page_content($existing->ID);
            herco_reset_form_page_builder($existing->ID);
            if ($existing->post_title !== $config['title']) {
                wp_update_post(['ID' => $existing->ID, 'post_title' => $config['title']]);
            }
            continue;
        }

        $page_id = wp_insert_post([
            'post_title'   => $config['title'],
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ], true);

        if (!is_wp_error($page_id) && $page_id) {
            herco_reset_form_page_builder($page_id);
        }
    }
}
add_action('after_switch_theme', 'herco_create_form_pages');
add_action('admin_init', 'herco_create_form_pages');
add_action('init', 'herco_create_form_pages', 5);

function herco_render_cf7_form($cf7_title) {
    if (!function_exists('wpcf7_contact_form') || !$cf7_title) {
        return false;
    }

    $form = get_page_by_title($cf7_title, OBJECT, 'wpcf7_contact_form');
    if (!$form) {
        return false;
    }

    echo do_shortcode('[contact-form-7 id="' . (int) $form->ID . '"]');
    return true;
}

function herco_render_native_form($slug, $config, $args = []) {
    $args = wp_parse_args(
        $args,
        [
            'form_id'             => '',
            'show_topic'          => false,
            'topic_options'       => [],
            'message_placeholder' => '',
        ]
    );

    $brand = isset($_GET['brand']) ? sanitize_text_field(wp_unslash($_GET['brand'])) : '';
    $topic = isset($_GET['topic']) ? sanitize_text_field(wp_unslash($_GET['topic'])) : '';
    $sent  = isset($_GET['sent']) && $_GET['sent'] === '1';
    $error = isset($_GET['error']) && $_GET['error'] === '1';
    ?>
    <?php if ($sent) : ?>
      <div class="herco-form-success" role="status">
        <?php esc_html_e('Thank you — your message has been sent. Our team will get back to you shortly.', 'herco'); ?>
      </div>
    <?php endif; ?>
    <?php if ($error) : ?>
      <div class="herco-form-error" role="alert">
                <?php esc_html_e('Please check the required fields and try again.', 'herco'); ?>
      </div>
    <?php endif; ?>
        <form<?php echo $args['form_id'] ? ' id="' . esc_attr( $args['form_id'] ) . '"' : ''; ?> class="herco-form wpcf7-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <?php wp_nonce_field('herco_form_submit', 'herco_form_nonce'); ?>
      <input type="hidden" name="action" value="herco_form_submit">
      <input type="hidden" name="herco_form_slug" value="<?php echo esc_attr($slug); ?>">
      <div class="form-row">
        <div>
          <label class="field-label" for="herco-name-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Full Name', 'herco'); ?> *</label>
                    <input class="herco-form-control" type="text" id="herco-name-<?php echo esc_attr($slug); ?>" name="herco_name" required autocomplete="name">
        </div>
        <div>
          <label class="field-label" for="herco-company-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Company', 'herco'); ?></label>
                    <input class="herco-form-control" type="text" id="herco-company-<?php echo esc_attr($slug); ?>" name="herco_company" autocomplete="organization">
        </div>
      </div>
      <div class="form-row">
        <div>
          <label class="field-label" for="herco-email-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Email', 'herco'); ?> *</label>
                    <input class="herco-form-control" type="email" id="herco-email-<?php echo esc_attr($slug); ?>" name="herco_email" required autocomplete="email">
        </div>
        <div>
          <label class="field-label" for="herco-phone-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Phone', 'herco'); ?></label>
                    <input class="herco-form-control" type="tel" id="herco-phone-<?php echo esc_attr($slug); ?>" name="herco_phone" autocomplete="tel">
        </div>
      </div>
            <?php if ( ! empty( $args['show_topic'] ) && ! empty( $args['topic_options'] ) ) : ?>
            <div class="form-row full">
                <div>
                    <label class="field-label" for="herco-topic-<?php echo esc_attr($slug); ?>"><?php esc_html_e('I\'m reaching out as a...', 'herco'); ?></label>
                    <select class="herco-form-control" id="herco-topic-<?php echo esc_attr($slug); ?>" name="herco_topic">
                        <?php foreach ( $args['topic_options'] as $value => $label ) : ?>
                            <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $topic, $value ); ?>><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>
      <?php if ($slug === 'schedule-a-call') : ?>
      <div class="form-row">
        <div>
          <label class="field-label" for="herco-date-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Preferred Date', 'herco'); ?></label>
                    <input class="herco-form-control" type="date" id="herco-date-<?php echo esc_attr($slug); ?>" name="herco_date">
        </div>
        <div>
          <label class="field-label" for="herco-time-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Preferred Time', 'herco'); ?></label>
                    <input class="herco-form-control" type="time" id="herco-time-<?php echo esc_attr($slug); ?>" name="herco_time">
        </div>
      </div>
      <?php endif; ?>
      <div class="form-row full">
        <div>
          <label class="field-label" for="herco-message-<?php echo esc_attr($slug); ?>"><?php esc_html_e('Message', 'herco'); ?> *</label>
                    <textarea class="herco-form-control" id="herco-message-<?php echo esc_attr($slug); ?>" name="herco_message" rows="6" required placeholder="<?php echo esc_attr( $args['message_placeholder'] ); ?>"><?php
            if ($brand) {
                echo esc_textarea(sprintf(__('I would like a quotation for %s products.', 'herco'), $brand));
            } elseif ($slug === 'schedule-a-call') {
                echo esc_textarea(__('I would like to schedule a call to discuss…', 'herco'));
            }
          ?></textarea>
        </div>
      </div>
            <p><input type="submit" class="herco-form-submit" value="<?php echo esc_attr($config['submit']); ?>"></p>
    </form>
    <?php
}

function herco_handle_form_submit() {
    if (!isset($_POST['herco_form_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['herco_form_nonce'])), 'herco_form_submit')) {
        wp_die(esc_html__('Security check failed.', 'herco'));
    }

    $slug   = sanitize_key(wp_unslash($_POST['herco_form_slug'] ?? ''));
    $config = herco_get_native_form_config($slug);
    if (!$config) {
        wp_die(esc_html__('Invalid form.', 'herco'));
    }

    $name    = sanitize_text_field(wp_unslash($_POST['herco_name'] ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['herco_email'] ?? ''));
    $phone   = sanitize_text_field(wp_unslash($_POST['herco_phone'] ?? ''));
    $company = sanitize_text_field(wp_unslash($_POST['herco_company'] ?? ''));
    $topic   = sanitize_key(wp_unslash($_POST['herco_topic'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['herco_message'] ?? ''));
    $date    = sanitize_text_field(wp_unslash($_POST['herco_date'] ?? ''));
    $time    = sanitize_text_field(wp_unslash($_POST['herco_time'] ?? ''));

    $page = get_page_by_path($slug);
    $redirect = $page ? get_permalink($page) : home_url('/' . $slug . '/');

    if ($name === '' || ! is_email( $email ) || $message === '') {
        wp_safe_redirect(add_query_arg('error', '1', $redirect));
        exit;
    }

    $topics      = isset( $config['topics'] ) && is_array( $config['topics'] ) ? $config['topics'] : [];
    $topic_label = isset( $topics[ $topic ] ) ? $topics[ $topic ] : '';
    $subject = sprintf('[%s] %s — %s', get_bloginfo('name'), $config['title'], $name);
    $body    = "Name: {$name}\nCompany: {$company}\nEmail: {$email}\nPhone: {$phone}\n";
    if ( $topic_label ) {
        $body .= "Inquiry Type: {$topic_label}\n";
    }
    if ($date || $time) {
        $body .= 'Preferred: ' . $date . ($time ? " at {$time}" : '') . "\n";
    }
    $body .= "\nMessage:\n{$message}\n";
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>'];

    if ( ! wp_mail($config['email'], $subject, $body, $headers) ) {
        wp_safe_redirect(add_query_arg('error', '1', $redirect));
        exit;
    }

    wp_safe_redirect(add_query_arg('sent', '1', $redirect));
    exit;
}
add_action('admin_post_herco_form_submit', 'herco_handle_form_submit');
add_action('admin_post_nopriv_herco_form_submit', 'herco_handle_form_submit');

function herco_form_page_template($template) {
    if (herco_is_form_page()) {
        $custom = get_template_directory() . '/template-form-page.php';
        if (file_exists($custom)) {
            return $custom;
        }
    }
    return $template;
}
add_filter('template_include', 'herco_form_page_template', 99);

/** Stop Elementor from replacing form page content with blank canvas. */
function herco_disable_elementor_on_form_pages() {
    if (!herco_is_form_page()) {
        return;
    }
    if (class_exists('\Elementor\Plugin')) {
        remove_action('get_header', [\Elementor\Plugin::$instance->frontend, 'get_header']);
        remove_action('get_footer', [\Elementor\Plugin::$instance->frontend, 'get_footer']);
    }
}
add_action('wp', 'herco_disable_elementor_on_form_pages', 1);
