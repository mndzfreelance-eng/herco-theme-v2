/* HERCO redesign — progressive-enhancement script (no dependencies) */
(function () {
  "use strict";

  /* --- Mobile nav toggle --- */
  var toggle = document.querySelector("#navToggle");
  var menu = document.querySelector("#mobileMenu");
  if (toggle && menu) {
    toggle.addEventListener("click", function () {
      var open = menu.classList.toggle("hidden") === false;
      toggle.setAttribute("aria-expanded", String(open));
      var icon = toggle.querySelector(".material-symbols-outlined");
      if (icon) { icon.textContent = open ? "close" : "menu"; }
    });
    menu.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", function () {
        menu.classList.add("hidden");
        toggle.setAttribute("aria-expanded", "false");
        var icon = toggle.querySelector(".material-symbols-outlined");
        if (icon) { icon.textContent = "menu"; }
      });
    });
  }

  /* --- Header shadow on scroll --- */
  var header = document.querySelector("[data-header]");
  if (header) {
    var onScroll = function () {
      header.classList.toggle("shadow-md", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* --- Mega Menus (Desktop & Mobile) --- */
  function setupMegaMenus() {
    // Desktop hover behavior
    var desktopMegaNavItems = document.querySelectorAll("[data-mega-menu]");
    if (window.matchMedia("(min-width: 1024px)").matches) {
      desktopMegaNavItems.forEach(function (navItem) {
        var trigger = navItem.querySelector(".mega-trigger");
        var panel = navItem.querySelector(".mega-panel");
        if (!trigger) return;
        if (!panel) return;

        trigger.addEventListener("click", function (event) {
          event.preventDefault(); // Prevent default link behavior
          event.stopPropagation(); // Stop event from bubbling up to document

          var isCurrentlyOpen = navItem.classList.contains("is-open");

          // Close all other open mega-menus
          desktopMegaNavItems.forEach(function (otherNavItem) {
            if (otherNavItem !== navItem && otherNavItem.classList.contains("is-open")) {
              otherNavItem.classList.remove("is-open");
              otherNavItem.querySelector(".mega-trigger").setAttribute("aria-expanded", "false");
            }
          });

          // Toggle current mega-menu
          if (isCurrentlyOpen) {
            navItem.classList.remove("is-open");
            trigger.setAttribute("aria-expanded", "false");
          } else {
            navItem.classList.add("is-open");
            trigger.setAttribute("aria-expanded", "true");
          }
        });
      });

      // Close mega-menu when clicking outside
      document.addEventListener("click", function (event) {
        desktopMegaNavItems.forEach(function (navItem) {
          if (!navItem.contains(event.target) && navItem.classList.contains("is-open")) {
            navItem.classList.remove("is-open");
            navItem.querySelector(".mega-trigger").setAttribute("aria-expanded", "false");
          }
        });
      });
    }

    // Mobile click behavior
    var mobileMegaToggles = document.querySelectorAll(".mobile-mega-toggle");
    mobileMegaToggles.forEach(function (toggle) {
      var panel = toggle.nextElementSibling;
      if (!panel || !panel.classList.contains("mobile-mega-panel")) return;

      toggle.addEventListener("click", function () {
        var isPanelNowVisible = !panel.classList.toggle("hidden"); // true if panel is now visible, false if now hidden
        toggle.setAttribute("aria-expanded", String(isPanelNowVisible));
        
        var icon = toggle.querySelector(".material-symbols-outlined");
        if (icon) {
          var parentNavItem = toggle.closest('.py-3');
          if (isPanelNowVisible) { // If panel is now visible
            icon.style.transform = "rotate(180deg)";
            if(parentNavItem) parentNavItem.classList.remove('border-b');
          } else {
            icon.style.transform = "";
            if(parentNavItem) parentNavItem.classList.add('border-b');
          }
        }
      });
    });
  }
  setupMegaMenus();

  /* --- Brand filter (brands page) --- */
  var chips = document.querySelectorAll("[data-filter]");
  var tiles = document.querySelectorAll(".brand-tile[data-cat]");
  if (chips.length && tiles.length) {
    chips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        var cat = chip.getAttribute("data-filter");
        chips.forEach(function (c) {
          c.setAttribute("aria-pressed", "false");
          c.classList.remove("bg-heritage-navy", "text-white", "border-heritage-navy");
          c.classList.add("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        });
        chip.setAttribute("aria-pressed", "true");
        chip.classList.add("bg-heritage-navy", "text-white", "border-heritage-navy");
        chip.classList.remove("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        tiles.forEach(function (t) {
          var show = cat === "all" || t.getAttribute("data-cat").indexOf(cat) !== -1;
          t.classList.toggle("is-hidden", !show);
        });
      });
    });
  }

  /* --- Scroll reveal --- */
  var reveal = document.querySelectorAll("[data-reveal]");
  if (reveal.length && "IntersectionObserver" in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
    reveal.forEach(function (el) { io.observe(el); });
  } else {
    reveal.forEach(function (el) { el.classList.add("in"); });
  }

  /* --- Animated counters --- */
  var counterGroups = document.querySelectorAll("[data-counter-group]");
  var counters = document.querySelectorAll("[data-counter-target]");
  var prefersReducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var runCounter = function (el, delay) {
    var target = Number(el.getAttribute("data-counter-target"));
    if (!Number.isFinite(target)) { return; }

    if (prefersReducedMotion) {
      el.textContent = String(target);
      return;
    }

    window.setTimeout(function () {
      var duration = 1450;
      var start = 0;
      var startTime = null;
      var step = function (timestamp) {
        if (startTime === null) { startTime = timestamp; }
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        var value = Math.floor(start + (target - start) * eased);
        el.textContent = value.toLocaleString();
        if (progress < 1) {
          window.requestAnimationFrame(step);
        } else {
          el.textContent = target.toLocaleString();
        }
      };

      window.requestAnimationFrame(step);
    }, delay || 0);
  };

  if (counterGroups.length) {
    if ("IntersectionObserver" in window && !prefersReducedMotion) {
      var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) { return; }
          var groupCounters = entry.target.querySelectorAll("[data-counter-target]");
          groupCounters.forEach(function (el, index) {
            runCounter(el, index * 110);
          });
          counterObserver.unobserve(entry.target);
        });
      }, { threshold: 0.35 });
      counterGroups.forEach(function (group) { counterObserver.observe(group); });
    } else {
      counters.forEach(function (el) { runCounter(el); });
    }
  }

  /* --- Partner testimonial slider --- */
  var testimonialSlider = document.querySelector("[data-testimonial-slider]");
  if (testimonialSlider) {
    var slides = testimonialSlider.querySelectorAll("[data-testimonial-slide]");
    var dots = testimonialSlider.querySelectorAll("[data-testimonial-dot]");
    var prev = testimonialSlider.querySelector("[data-testimonial-prev]");
    var next = testimonialSlider.querySelector("[data-testimonial-next]");
    var currentIndex = 0;
    var autoRotate = null;

    var showSlide = function (index) {
      currentIndex = (index + slides.length) % slides.length;
      slides.forEach(function (slide, slideIndex) {
        slide.classList.toggle("hidden", slideIndex !== currentIndex);
      });
      dots.forEach(function (dot, dotIndex) {
        var active = dotIndex === currentIndex;
        dot.setAttribute("aria-current", active ? "true" : "false");
        dot.classList.toggle("bg-heritage-navy", active);
        dot.classList.toggle("bg-border-gray", !active);
      });
    };

    var restartAutoRotate = function () {
      if (autoRotate) { window.clearInterval(autoRotate); }
      autoRotate = window.setInterval(function () {
        showSlide(currentIndex + 1);
      }, 6500);
    };

    if (slides.length > 1) {
      if (prev) {
        prev.addEventListener("click", function () {
          showSlide(currentIndex - 1);
          restartAutoRotate();
        });
      }
      if (next) {
        next.addEventListener("click", function () {
          showSlide(currentIndex + 1);
          restartAutoRotate();
        });
      }
      dots.forEach(function (dot, index) {
        dot.addEventListener("click", function () {
          showSlide(index);
          restartAutoRotate();
        });
      });
      showSlide(0);
      if (!(window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches)) {
        restartAutoRotate();
      }
    }
  }

  /* --- Contact form (demo only) --- */
  var form = document.querySelector("#contact-form");
  if (form && !form.getAttribute("action")) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var note = form.querySelector(".form-note");
      if (note) { note.hidden = false; }
      form.reset();
    });
  }

  /* --- FAQ Accordion and Filtering --- */
  function setupFaqs() {
    var faqQuestions = document.querySelectorAll(".faq-question");
    faqQuestions.forEach(function (question) {
      question.addEventListener("click", function () {
        var answer = this.nextElementSibling;
        var icon = this.querySelector(".faq-icon");
        var isExpanded = this.getAttribute("aria-expanded") === "true";

        // Close all other open FAQ items in the same container
        var parentContainer = this.closest('[data-faq-container]');
        if (parentContainer) {
          parentContainer.querySelectorAll('.faq-question[aria-expanded="true"]').forEach(function(openQuestion) {
            if (openQuestion !== question) {
              openQuestion.setAttribute("aria-expanded", "false");
              openQuestion.nextElementSibling.classList.add("hidden");
              openQuestion.querySelector(".faq-icon").style.transform = "";
            }
          });
        }

        // Toggle current FAQ item
        this.setAttribute("aria-expanded", String(!isExpanded));
        answer.classList.toggle("hidden");
        if (!isExpanded) {
          icon.style.transform = "rotate(180deg)";
        } else {
          icon.style.transform = "";
        }
      });
    });

    var faqFilterChips = document.querySelectorAll("[data-faq-filter]");
    var faqItems = document.querySelectorAll(".faq-item");
    faqFilterChips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        var category = this.getAttribute("data-faq-filter");
        faqFilterChips.forEach(function (c) {
          c.setAttribute("aria-pressed", "false");
          c.classList.remove("bg-heritage-navy", "text-white", "border-heritage-navy");
          c.classList.add("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        });
        this.setAttribute("aria-pressed", "true");
        this.classList.add("bg-heritage-navy", "text-white", "border-heritage-navy");
        this.classList.remove("bg-surface-container-lowest", "text-on-surface-variant", "border-border-gray");
        faqItems.forEach(function (item) {
          var show = category === "all" || item.getAttribute("data-faq-category") === category;
          item.classList.toggle("hidden", !show);
        });
      });
    });
  }
  setupFaqs();

  /* --- Brand Detail Page Dynamic Content (Mockup Only) --- */
  function setupBrandDetailPage() {
    var urlParams = new URLSearchParams(window.location.search);
    var brandName = urlParams.get('brand');

    if (brandName && document.body.classList.contains('brand-detail-page')) { // Assuming you add a class to brand-detail.html body
      // Update page title
      document.title = brandName + ' — Herco Trading Inc.';

      // Update hero section
      var heroTitle = document.querySelector('.hero-brand-title'); // Add this class to your h1
      if (heroTitle) heroTitle.innerHTML = brandName + ': [Catchy Slogan or Identity Statement]';

      var heroLogo = document.querySelector('.hero-brand-logo'); // Add this class to your img
      if (heroLogo) {
        // Normalize brand name for image filename (e.g., "3M" -> "3m-logo.png", "Black+Decker" -> "black-decker-logo.png")
        var logoFileName = brandName.toLowerCase().replace(/[^a-z0-9]/g, '-') + '-logo.png';
        heroLogo.src = 'assets/brand-logos/' + logoFileName;
        heroLogo.alt = brandName + ' Logo';
      }

      // Update other brand-specific placeholders (e.g., descriptions, USPs, catalog links)
      document.querySelectorAll('[data-brand-name-placeholder]').forEach(function(el) {
        el.textContent = el.textContent.replace(/Brand Name/g, brandName);
        if (el.tagName === 'A' && el.hasAttribute('href') && el.getAttribute('href').includes('brand-name-catalog.pdf')) {
          el.setAttribute('href', 'assets/' + brandName.toLowerCase().replace(/[^a-z0-9]/g, '-') + '-catalog.pdf');
        }
        if (el.tagName === 'A' && el.hasAttribute('href') && el.getAttribute('href').includes('contact.html?brand=Brand%20Name')) {
          el.setAttribute('href', 'contact.html?brand=' + encodeURIComponent(brandName));
        }
      });
    }
  }
  setupBrandDetailPage();

  /* --- Footer year --- */
  var yr = document.querySelector("[data-year]");
  if (yr) { yr.textContent = new Date().getFullYear(); }
})();
