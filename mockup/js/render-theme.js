/**
 * Renders mockup sections from HERCO_SITE — mirrors PHP templates.
 */
(function () {
  var ACTION_ICONS = ['quote', 'shield', 'wrench', 'handshake', 'globe', 'calendar'];
  var ACTIONS = [
    ['Request a Quotation', 'Get pricing for bulk orders or specific product inquiries.', '/request-quote/'],
    ['Warranty Claim', 'File a product warranty claim and track its resolution.', '/warranty-claim/'],
    ['After-Sales Support', 'Request service, repair, or replacement for purchased products.', '/after-sales-support/'],
    ['Retailer Application', 'Apply to become an authorized Herco retailer.', '/retailer-application/'],
    ['Supplier Partnership', 'Introduce your brand to the Philippine market through Herco.', '/supplier-partnership/'],
    ['Schedule a Call', 'Book a consultation with our business development team.', '/schedule-a-call/']
  ];

  var PLACEHOLDER_FILES = {
    'dist-1': 'dist-traditional.svg',
    'dist-2': 'dist-retail.svg',
    'dist-3': 'dist-ecommerce.svg',
    'dist-4': 'dist-industrial.svg'
  };

  function site() {
    return window.HERCO_SITE || {};
  }

  function ph(key) {
    return '../assets/images/placeholders/' + (PLACEHOLDER_FILES[key] || key + '.svg');
  }

  function renderHero() {
    var h = site().hero || {};
    var badge = document.querySelector('[data-herco="hero-badge"]');
    var title = document.querySelector('[data-herco="hero-title"]');
    var desc = document.querySelector('[data-herco="hero-desc"]');
    if (badge && h.badge) badge.textContent = h.badge;
    if (title && h.title) title.innerHTML = h.title;
    if (desc && h.desc) desc.textContent = h.desc;
  }

  function renderBrands() {
    var el = document.querySelector('[data-herco="brands-scroll"]');
    if (!el) return;
    var names = site().brandsFallback || [];
    el.innerHTML = names.map(function (name) {
      return '<div class="brand-scroll-item"><span class="brand-scroll-name">' + name + '</span></div>';
    }).join('');
    var link = document.querySelector('[data-herco="brands-link"]');
    if (link && window.hercoIcon) {
      link.innerHTML = 'View all brands ' + hercoIcon('arrow', 'icon icon--sm');
    }
  }

  function renderDist() {
    var el = document.querySelector('[data-herco="dist-grid"]');
    if (!el) return;
    var cards = site().distCards || [];
    el.innerHTML = cards.map(function (c) {
      return (
        '<article class="dist-card">' +
          '<div class="dist-card__media is-placeholder" data-herco-slot="' + c.placeholder + '">' +
            '<img src="' + ph(c.placeholder) + '" data-img="' + c.placeholder + '" alt="' + c.title + '" class="herco-img--placeholder">' +
          '</div>' +
          '<h3>' + c.title + '</h3>' +
          '<p>' + c.desc + '</p>' +
        '</article>'
      );
    }).join('');
  }

  function renderActions() {
    var el = document.querySelector('[data-herco="actions-grid"]');
    if (!el || !window.hercoIcon) return;
    el.innerHTML = ACTIONS.map(function (a, i) {
      return (
        '<a class="action-card" href="' + a[2] + '">' +
          '<span class="action-card__num">' + String(i + 1).padStart(2, '0') + '</span>' +
          '<span class="action-card__icon">' + hercoIcon(ACTION_ICONS[i]) + '</span>' +
          '<span class="action-card__body">' +
            '<span class="action-card__title">' + a[0] + '</span>' +
            '<span class="action-card__desc">' + a[1] + '</span>' +
          '</span>' +
          '<span class="action-card__go">' + hercoIcon('chev') + '</span>' +
        '</a>'
      );
    }).join('');
  }

  function renderAbout() {
    var about = site().about || {};
    var body = document.querySelector('[data-herco="about-body"]');
    if (body && about.whoWeAre) {
      body.innerHTML = about.whoWeAre.map(function (p) { return '<p>' + p + '</p>'; }).join('');
    }
    var mv = document.querySelector('[data-herco="about-mv"]');
    if (mv && about.mission) {
      mv.innerHTML =
        '<div class="mv-card navy">' +
          '<h3>Mission Statement</h3>' +
          '<ul class="mv-list">' + about.mission.map(function (m) { return '<li>' + m + '</li>'; }).join('') + '</ul>' +
        '</div>' +
        '<div class="mv-card light">' +
          '<h3>Vision Statement</h3>' +
          '<p>' + (about.vision || '') + '</p>' +
        '</div>';
    }
    var row = document.querySelector('[data-herco="affiliates-row"]');
    if (row && about.affiliates) {
      row.innerHTML = about.affiliates.map(function (a) {
        return (
          '<div class="affiliate-badge is-placeholder" data-herco-slot="' + a.key + '">' +
            '<img src="../assets/images/placeholders/affiliate.svg" data-img="' + a.key + '" alt="' + a.alt + '" class="herco-img--placeholder">' +
            '<span class="affiliate-badge__fallback">' + a.fallback + '</span>' +
          '</div>'
        );
      }).join('');
    }
  }

  function renderIcons() {
    document.querySelectorAll('[data-icon]').forEach(function (el) {
      if (window.hercoIcon) el.innerHTML = hercoIcon(el.getAttribute('data-icon'));
    });
  }

  function renderAll() {
    renderHero();
    renderBrands();
    renderDist();
    renderActions();
    renderAbout();
    renderIcons();
    document.dispatchEvent(new CustomEvent('herco:rendered'));
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', renderAll);
  } else {
    renderAll();
  }
  document.addEventListener('herco:content-ready', renderAll);
})();
