/** Stroke icons — matches inc/icons.php (20×20) */
window.hercoIcon = (function () {
  var icons = {
    arrow: '<path d="M4 10h12M12 6l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
    quote: '<path d="M6 5h8v10H8V9H6V5zm6 0h8v10h-6V9h-2V5z" stroke="currentColor" stroke-width="1.25" fill="none"/>',
    shield: '<path d="M10 3l6 3v5c0 4-2.5 6.5-6 8-3.5-1.5-6-4-6-8V6l6-3z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
    wrench: '<path d="M14 6a3.5 3.5 0 00-4.8 4.8L5 15l1 1 4.2-4.2A3.5 3.5 0 1014 6z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
    handshake: '<path d="M4 11l3-2 3 2 4-3 3 2M7 13v3M13 13v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
    globe: '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M3 10h14M10 3c2 2.5 2 11.5 0 14M10 3c-2 2.5-2 11.5 0 14" stroke="currentColor" stroke-width="1.25"/>',
    calendar: '<rect x="4" y="5" width="12" height="11" rx="1.5" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M4 9h12M7 3v3M13 3v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
    pin: '<path d="M10 17s5-4.5 5-8a5 5 0 10-10 0c0 3.5 5 8 5 8z" stroke="currentColor" stroke-width="1.5" fill="none"/><circle cx="10" cy="9" r="1.5" fill="currentColor"/>',
    phone: '<path d="M6 4h8a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" stroke="currentColor" stroke-width="1.5" fill="none"/>',
    mail: '<rect x="3" y="5" width="14" height="10" rx="1.5" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M3 7l7 5 7-5" stroke="currentColor" stroke-width="1.5"/>',
    clock: '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M10 6v4l3 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
    help: '<circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.5" fill="none"/><path d="M10 13v.5M10 10a2 2 0 012-2c0-1.5-2-1.5-2 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
    menu: '<path d="M4 6h12M4 10h12M4 14h8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
    chev: '<path d="M7 4l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>'
  };

  return function (name, className) {
    className = className || 'icon';
    if (!icons[name]) return '';
    return '<svg class="' + className + '" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">' + icons[name] + '</svg>';
  };
})();
