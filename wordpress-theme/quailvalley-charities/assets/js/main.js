(function () {
  "use strict";

  /* Mobile nav toggle */
  var toggle = document.getElementById("navToggle");
  var nav = document.getElementById("primaryNav");

  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var isOpen = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(isOpen));
      document.body.classList.toggle("nav-open", isOpen);
    });

    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        nav.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
        document.body.classList.remove("nav-open");
      });
    });
  }

  /* Scroll reveal, respecting prefers-reduced-motion */
  var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var revealTargets = document.querySelectorAll(
    ".stat-card, .action-card, .event-card, .person-card, .split-copy, .split-media"
  );

  if (!prefersReducedMotion && "IntersectionObserver" in window) {
    revealTargets.forEach(function (el) { el.classList.add("reveal"); });

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15 }
    );

    revealTargets.forEach(function (el) { observer.observe(el); });
  }

  /* Newsletter form: no backend wired yet, so give clear placeholder feedback */
  var form = document.getElementById("newsletterForm");
  var status = document.getElementById("newsletterStatus");

  if (form && status) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      var email = document.getElementById("newsletterEmail");
      if (!email.value || !email.validity.valid) {
        status.textContent = "Please enter a valid email address.";
        return;
      }
      status.textContent =
        "Thanks for your interest! This form isn't connected to an email service yet — wire it up to Mailchimp, Constant Contact, or similar.";
      form.reset();
    });
  }

  /* Donate / grant / social links are placeholders until real URLs are provided */
  document.querySelectorAll("[data-placeholder-link]").forEach(function (link) {
    link.addEventListener("click", function (event) {
      if (link.getAttribute("href") === "#") {
        event.preventDefault();
        window.alert(
          "This is a placeholder link. Connect it to your real donation page, grant application, or social profile."
        );
      }
    });
  });

  /* Footer year */
  var yearEl = document.getElementById("year");
  if (yearEl) { yearEl.textContent = String(new Date().getFullYear()); }
})();
