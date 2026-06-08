document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.getElementById('navToggle');
  const nav    = document.querySelector('.main-navigation');
  if (toggle && nav) {
    toggle.addEventListener('click', () => nav.classList.toggle('open'));
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => nav.classList.remove('open')));
  }

  /* Page transition loader */
  const loader = document.getElementById('hercoLoader');
  const showLoader = () => {
    if (!loader) return;
    loader.classList.add('is-active');
    loader.setAttribute('aria-hidden', 'false');
  };
  const hideLoader = () => {
    if (!loader) return;
    loader.classList.remove('is-active');
    loader.setAttribute('aria-hidden', 'true');
  };

  hideLoader();

  document.querySelectorAll('a[href]').forEach(link => {
    link.addEventListener('click', e => {
      const href = link.getAttribute('href');
      if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:')) return;
      if (link.target === '_blank' || link.hasAttribute('download')) return;
      try {
        const url = new URL(href, window.location.origin);
        if (url.origin === window.location.origin && !e.ctrlKey && !e.metaKey && e.button === 0) {
          showLoader();
        }
      } catch (_) { /* ignore invalid URLs */ }
    });
  });

  window.addEventListener('pageshow', ev => {
    if (ev.persisted) hideLoader();
  });

  /* Brands horizontal scroll — drag + wheel */
  const brandsScroll = document.querySelector('.brands-scroll');
  if (brandsScroll) {
    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    brandsScroll.addEventListener('mousedown', e => {
      isDown = true;
      brandsScroll.style.cursor = 'grabbing';
      startX = e.pageX - brandsScroll.offsetLeft;
      scrollLeft = brandsScroll.scrollLeft;
    });
    brandsScroll.addEventListener('mouseleave', () => {
      isDown = false;
      brandsScroll.style.cursor = '';
    });
    brandsScroll.addEventListener('mouseup', () => {
      isDown = false;
      brandsScroll.style.cursor = '';
    });
    brandsScroll.addEventListener('mousemove', e => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - brandsScroll.offsetLeft;
      brandsScroll.scrollLeft = scrollLeft - (x - startX) * 1.2;
    });
    brandsScroll.addEventListener('wheel', e => {
      if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
        e.preventDefault();
        brandsScroll.scrollLeft += e.deltaY;
      }
    }, { passive: false });
  }
});
