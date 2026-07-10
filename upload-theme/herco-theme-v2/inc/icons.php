<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Minimal stroke icons — 20×20, currentColor */
function herco_icon($name, $class = 'icon') {
    $icons = [
        'arrow'     => '<path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
        'quote'     => '<path d="M6 5h8v10H8V9H6V5zm6 0h8v10h-6V9h-2V5z" stroke="currentColor" stroke-width="1.25" fill="none"/>',
        'shield'    => '<path d="M10 3l6 3v5c0 4-2.5 6.5-6 8-3.5-1.5-6-4-6-8V6l6-3z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
        'wrench'    => '<path d="M14 6a3.5 3.5 0 00-4.8 4.8L5 15l1 1 4.2-4.2A3.5 3.5 0 1014 6z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
        'handshake' => '<path d="M4 11l3-2 3 2 4-3 3 2M7 13v3M13 13v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        'globe'     => '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M3 10h14M10 3c2 2.5 2 11.5 0 14M10 3c-2 2.5-2 11.5 0 14" stroke="currentColor" stroke-width="1.25"/>',
        'calendar'  => '<rect x="4" y="5" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M4 9h12M7 3v3M13 3v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        'store'     => '<path d="M4 8l6-4 6 4v9H4V8z" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M8 17v-5h4v5" stroke="currentColor" stroke-width="1.5"/>',
        'retail'    => '<path d="M3 7h14v10H3V7zm2-4h10v4H5V3z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
        'cart'      => '<path d="M3 5h2l2 9h8l2-6H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/><circle cx="9" cy="17" r="1" fill="currentColor"/><circle cx="15" cy="17" r="1" fill="currentColor"/>',
        'factory'   => '<path d="M3 17V9l4 3V9l4 3V7l6 4v6H3z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
        'pin'       => '<path d="M10 17s5-4.5 5-8a5 5 0 10-10 0c0 3.5 5 8 5 8z" stroke="currentColor" stroke-width="1.5" fill="none"/><circle cx="10" cy="9" r="1.5" fill="currentColor"/>',
        'phone'     => '<path d="M6 4h8a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
        'mail'      => '<rect x="3" y="5" width="14" height="10" rx="1.5" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M3 7l7 5 7-5" stroke="currentColor" stroke-width="1.5"/>',
        'clock'     => '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M10 6v4l3 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        'help'      => '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M10 13v.5M10 10a2 2 0 012-2c0-1.5-2-1.5-2 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        'menu'      => '<path d="M4 6h12M4 10h12M4 14h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        'chev'      => '<path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
    ];
    if (!isset($icons[$name])) return '';
    return '<svg class="' . esc_attr($class) . '" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">' . $icons[$name] . '</svg>';
}

/**
 * Renders social media icons for the footer.
 *
 * @param string $name The name of the social media icon (facebook, lazada, shopee, tiktok).
 * @return void
 */
function herco_render_social_icon( $name ) {
	$icons = array(
		'facebook' => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M14 9h3l.5-3H14V4.2c0-.9.3-1.5 1.6-1.5H17V.1C16.7 0 15.6 0 14.4 0 11.8 0 10 1.6 10 4.5V6H7v3h3v9h4V9Z"/></svg>',
		'lazada'   => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 4 6v8l8 8 8-8V6l-8-4Zm0 3 4 2-4 2-4-2 4-2Z"/></svg>',
		'shopee'   => '<svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 8h14l-1 13H6L5 8Zm4 0a3 3 0 0 1 6 0" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'tiktok'   => '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.18 3.05.28 4.58.02.24.03.48.07.71.54-.16 1.08-.3 1.62-.43 1.48-.37 2.96-.73 4.44-1.09.14,1.54.28,3.08.42,4.61-.53.15-1.06.28-1.59.41-1.41.35-2.82.69-4.23,1.02-.12,1.54-.23,3.08-.35,4.62-1.31.02-2.62.01-3.93.02-.07-1.53-.17-3.06-.26-4.59-.03-.24-.05-.48-.08-.72-.53.16-1.06.3-1.59.44-1.42.36-2.84.72-4.26,1.08-.14-1.54-.28-3.08-.42-4.62.53-.14 1.06-.28 1.59-.41 1.41-.35 2.82-.7 4.23-1.04.12-1.54.23-3.08.35-4.61Z"/></svg>',
	);

	if ( isset( $icons[ $name ] ) ) {
		// The SVGs are static strings defined in this function, so this is safe.
		echo $icons[ $name ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
