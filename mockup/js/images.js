/**
 * Theme image slots — matches inc/images.php placeholder map.
 */
(function () {
  var UPLOADS = 'assets/images/';
  var THEME_PH = '../assets/images/placeholders/';
  var EXTS = ['webp', 'jpg', 'jpeg', 'png', 'svg'];

  var PLACEHOLDER_FILES = {
    hero: 'hero.svg',
    'dist-1': 'dist-traditional.svg',
    'dist-2': 'dist-retail.svg',
    'dist-3': 'dist-ecommerce.svg',
    'dist-4': 'dist-industrial.svg',
    about: 'about.svg',
    'affiliate-1': 'affiliate.svg',
    'affiliate-2': 'affiliate.svg',
    'affiliate-3': 'affiliate.svg',
    logo: 'brand-logo.svg'
  };

  function placeholderUrl(key) {
    return THEME_PH + (PLACEHOLDER_FILES[key] || 'generic.svg');
  }

  function tryImage(name, onDone, extIndex) {
    extIndex = extIndex || 0;
    if (extIndex >= EXTS.length) {
      onDone(null);
      return;
    }
    var probe = new Image();
    probe.onload = function () { onDone(UPLOADS + name + '.' + EXTS[extIndex]); };
    probe.onerror = function () { tryImage(name, onDone, extIndex + 1); };
    probe.src = UPLOADS + name + '.' + EXTS[extIndex];
  }

  function slotEl(el) {
    if (el.classList.contains('hero__bg')) return el;
    return el.closest('.dist-card__media') ||
      el.closest('.about-visual') ||
      el.closest('.affiliate-badge') ||
      el.closest('[data-herco-slot]') ||
      el;
  }

  function markPlaceholder(el, isPlaceholder) {
    var root = slotEl(el);
    root.classList.toggle('is-placeholder', isPlaceholder);
    if (el.classList.contains('hero__bg')) {
      el.classList.toggle('hero__bg--placeholder', isPlaceholder);
    }
  }

  function applyImg(img) {
    var name = img.getAttribute('data-img');
    if (!name) return;

    tryImage(name, function (url) {
      if (url) {
        img.src = url;
        img.hidden = false;
        img.classList.remove('herco-img--placeholder');
        markPlaceholder(img, false);
        if (name === 'logo') {
          document.querySelectorAll('[data-logo-fallback]').forEach(function (el) { el.hidden = true; });
        }
      } else {
        img.src = placeholderUrl(name);
        img.classList.add('herco-img--placeholder');
        markPlaceholder(img, true);
        if (name === 'logo') {
          img.hidden = true;
        }
      }
    });
  }

  function applyBg(el) {
    var name = el.getAttribute('data-bg-img');
    if (!name) return;

    tryImage(name, function (url) {
      el.style.backgroundImage = "url('" + (url || placeholderUrl(name)) + "')";
      markPlaceholder(el, !url);
    });
  }

  function bindAll() {
    document.querySelectorAll('img[data-img]').forEach(applyImg);
    document.querySelectorAll('[data-bg-img]').forEach(applyBg);
  }

  window.hercoImagesInit = bindAll;
  bindAll();
  document.addEventListener('herco:content-ready', bindAll);
  document.addEventListener('herco:rendered', bindAll);
})();
