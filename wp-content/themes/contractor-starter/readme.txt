=== Contractor Starter Theme ===

Contributors: automattic, Matt Anderson, John Vang, Tou Toua Yang
Tags: custom-theme

Requires at least: 6.0.0
Tested up to: 6.2.2
Requires PHP: 8.0
Stable tag: 2.0.0
License: GNU General Public License v2 or later
License URI: LICENSE

A starter theme called Contractor Starter Theme.

== Description ==

A customer Wordpress starter theme, built on the Underscores theme by Hook Agency, exclusively for contractors.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Core Plugins installed =
* ACF Pro
* Rankmath SEO Pro
* Gravity Forms
* WP Rocket
* Perfmatters
* FacetWP
* Wordfence

== Changelog ==

= Version 2.0.3 =
* >> Jul 28 2023
    + Updated theme requirements (readme.txt, style.css)
    + Updated theme FAQs to include core plugins (readme.txt)
    * Removed pointer-events from post progress bar (_globals.scss).
    * Moved iframe CSS resets to a class (_globals.scss).
    * Fixed overscroll issue with mobile nav (_globals.scss).
    * Added page scroll-freeze with mobile nav active (responsive-nav.js).
    * Removed Gravity Forms refurl function (functions.php).
    * Fixed paragraph spacing issue - removed bottom margin on last-of-type (_globals.scss).
    * Removed CSS for slide-up jQuery feature on #mobile-handler (_globals.scss).
    * Resolved issues with 'live domain' script feature in Theme Options (header.php, footer.php).
    * Removed test blog template (page-blog-two.php)
    * Added PPC Lead form to Gravity Forms.
    * Set service page templates to top-level & fixed menu settings.
* >> Jul 10 2023
    * Picture tag browser default margin removed
    * Removed CSS reset rule removing margin-bottom on all <p> tags
    * Added missing template (process.php)
    * Changed 'careers' CPT to 'jobs' and updated template part (content-jobs.php)
    * Cleaned up redundant code in init.js file
    * Fixed errors in FacetWP queries for Review & FAQ filters.

= Version 2.0.2 - 2023 =

= Version 2.0.1 - Feb 9 2023 =
+ CSS compiling location changed from /inc/scss to /inc/css
+ Bug fix: $spacer variables & utility classes were replaced with SASS function to generate spacer utility classes.
+ Added FacetWP (plugin) and set up for all post AJAS filtering.

= Version 2.0.0 - Jan 1 2023 =
* Theme converted to SASS, file tree re-worked
* Proper BEM syntax implemented across all starter templates + components
* Slick slider removed - replaced with Tiny Slider JS
* Featherlight removed - replaced with Magnific Popup
* Updated credits (readme.txt)
* Added custom script support to Theme Options
* Page Builder field group updates:
    * Company History layout - removed
    * Card Grid > Team Member layout - removed 
    * Card Grid > Projects layout - removed
    * Team Members layout - added

= Version 1.0.1 - Mar 23 2022 =
* Customized 'the_archive_title() function to remove prefixes (wp-includes > general-template.php)
* Updated credits (readme.txt)

= Version 1.0.0 - Mar 10 2022 =
* Initial release of Contractor Starter Theme
* WooCommerce and Jetpack support removed.

= 1.0 - May 12 2015 =
* Initial release of underscores

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Accessibility resets from normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* This theme utilizes Bootstrap Grid (https://getbootstrap.com/)