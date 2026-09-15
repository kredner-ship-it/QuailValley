=== Quail Valley Charities ===
Requires at least: 6.0
Tested up to: 6.6
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A one-page WordPress theme for Quail Valley Charities (Vero Beach, FL),
converted from the original static HTML/CSS/JS design. Every section is
editable from wp-admin, no plugin required.

== Installation ==

1. In wp-admin, go to Appearance > Themes > Add New Theme > Upload Theme.
2. Choose quailvalley-charities.zip and click Install Now, then Activate.
3. That's it — the homepage renders automatically. You do NOT need to
   create or assign a "Home" page first; the design lives in
   front-page.php, which WordPress uses for the site's front page
   automatically under the default Settings > Reading configuration.

== Editing content ==

Go to Appearance > Customize. Every section of the page has its own
panel section with plain-text fields:

- Hero Section
- Mission / History Section (includes an optional photo upload — until
  you add one, the original placeholder graphic is shown)
- Impact Stats Section (3 stat number/label pairs)
- Donate & Grants Section
- Events Section (one event name per line; add or remove lines freely)
- Leadership Section
- Newsletter Section
- Footer & Contact Info (phone, location, Facebook URL, SEO description)

Changes preview live and save immediately — nothing needs to be
republished or rebuilt.

== Logo ==

Appearance > Customize > Site Identity > Logo. Until you upload one, the
header and footer show the original text wordmark ("Quail Valley /
CHARITIES") so the site looks correct out of the box.

== Navigation menus ==

The header and footer both work immediately with the original six
in-page links (About, Impact, Grants & Donate, Events, Board, Contact) —
no setup required. If you want to customize the nav (rename items, add a
real WordPress Page, reorder), go to Appearance > Menus, create a menu,
and assign it to the "Primary Menu" location (and optionally "Footer
Menu"). Until you do, the built-in defaults are used automatically.

== The newsletter signup form ==

The "Subscribe" form on the page is not connected to an email service.
Submitting it shows a message saying so. To make it functional, either:
- Swap in an embed/shortcode from your email provider (Mailchimp,
  Constant Contact, etc.) in front-page.php's Newsletter section, or
- Ask your developer to wire assets/js/main.js's form handler to a real
  endpoint (e.g. via the WordPress REST API or admin-ajax.php).

== Known placeholders ==

These were placeholders in the original design and remain so here —
fill them in via the Customizer whenever the real information is ready:

- Facebook page URL (Footer & Contact Info section) — until set, the
  Facebook icon shows a "this is a placeholder" alert on click.
- Mission section photo — until uploaded, a graphical placeholder box
  is shown instead of a real photo.
- Donate/grant buttons currently point to a phone number
  ((772) 492-2069) rather than an online payment processor or a grant
  application form, matching how the organization's donation process
  worked on the original site. If/when a Givebutter, Classy, or similar
  donation page exists, update the button links in the Donate & Grants
  Customizer section.

== A note on accessibility ==

The paragraph/link text color specified in this project's brand style
guide (#8B8178 on white/cream backgrounds) measures roughly 3.8:1
contrast, below the WCAG AA minimum of 4.5:1 for body text. It was
implemented exactly as specified. If accessibility compliance matters
for your organization, consider darkening this color slightly for
light-background sections.

== Support ==

This theme has no external dependencies (no required plugins, no
build step, no bundler). All source files are plain PHP, CSS, and
vanilla JavaScript, so any WordPress developer can maintain it.
