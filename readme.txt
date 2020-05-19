=== Baskerville ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.5.0
Tested up to: 5.4.1
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


== Installation ==

1. Upload the theme
2. Activate the theme

All theme specific options are handled through the WordPress Customizer.


== Frequently Asked Questions ==

== Implement Like Functionality

1. Go to http://www.themezilla.com/plugins/zillalikes/ and download the plugin.
2. Upload the plugin to the /wp-content/plugins/ folder on your WordPress installation.
3. Go to Admin > Plugins > Installed Plugins.
4. Find "ZillaLikes" in the list and activate it.
5. Click ZillaLikes in the menu.
6. Check "I want to use my own CSS styles".
7. Click "Save Changes".


== The Link Format

1. Create a new post.
2. Select "Link" in the Format window to the right.
3. In the post content, enter the title of your link within a paragraph element, and the link to the page in a link element.
4. Directly after the two elements, add the <!--more--> tag followed by the rest of the content. Example:

<p>[title]</p>
<a href="[url]">[website]</a>
<!--more-->
The rest of the content...

5. Publish.
6. The link title and link will now be displayed in a separate section from the content of your post.


== The Quote Format

1. Create a new post.
2. Select "Quote" in the Format window to the right.
3. In the post content, enter the quote content within a blockquote element, and the quote attribution within a cite element.
4. Directly after the two elements, add the <!--more--> tag followed by the rest of the content. Example:

<blockquote>[quote content]
<cite>[quote attribution]</cite>
</blockquote>
<!--more-->
The rest of the content...

5. Publish.
6. The quote will now be displayed in a separate section from the content of your post.


== The Video Format

1. Create a new post.
2. Select "Video" in the Format window to the right.
3. In the post content, enter the full url to the video you want to include.
4. Directly after the url, add the <!--more--> tag followed by the rest of the content. Example:

https://www.youtube.com/watch?v=iszwuX1AK6A
<!--more-->
The rest of the content...

5. Publish.
6. The video will now be displayed in a separate section from the content of your post.


== Licenses ==

Pacifico
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Pacifico

Roboto
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Roboto

Roboto Slab
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Roboto+Slab

FontAwesome
License: SIL Open Font License, 1.1 
Source: https://fontawesome.io

Flexslider 2
License: GPLv2 
Source: http://flexslider.woothemes.com

Standard header image
License: CC0 1.0 Universal 
Source: http://www.unsplash.com

screenshot.png header image
License: CC0 Public Domain 
Source: http://www.unsplash.com

screenshot.png post image
License: CC0 Public Domain 
Source: http://www.unsplash.com


== Changelog ==

Version 2.1.4 (2020-05-19)
-------------------------
- Fixed potential notices in the widgets included in the theme.

Version 2.1.3 (2020-05-07)
-------------------------
- Added a failsafe for the Masonry code misjudging height of video embeds on archive pages.
- Fixed the footer wrapper being output when the widget areas aren't active.
- Bumped "Tested up to" to 5.4.1.
- Removed `license.txt` from the theme folder.

Version 2.1.2 (2020-04-21)
-------------------------
- Fixed the figcaption element missing caption styles (thanks, @idekogel!).
- Updated the calendar widget styles to handle the new calendar navigation.

Version 2.1.1 (2020-03-30)
-------------------------
- Updated baskerville_meta() to use the date format specified in the site settings instead of a custom one defined by the theme.
- Set Firefox font smoothing to grayscale, to better match the appearance of Safari and Chrome on MacOS.

Version 2.1.0 (2020-03-23)
-------------------------
- Removed the Twitter profile field and the option to show the author email to posts (kudos to @poena). These changes were required for Baskerville to remain on the WordPress.org theme directory. For more information, see this blog post: https://andersnoren.se/changes-to-baskerville/.
- Added support for the core custom_logo setting, and updated the old baskerville_logo setting to only be displayed if you already have a baskerville_logo image set (more kudos to @poena).
- Bumped the "Requires at least" tag to 4.5.0, since Baskerville is now using custom_logo.
- Fixed the search field focus on toggle click (thanks to @germundal).
- Removed the admin CSS for setting a max width on the post thumbnail image, since that has been fixed in Core for many years now.
- Updated the resolution of the screenshot to 1200x900px, and changed the file format to .jpg to save ~100 kb in file size. Same images as in the previous screenshot, same licenses.
- Improved the Masonry call in global.js.
- Code formatting cleanup in functions.php.

Version 2.0.2 (2020-02-29)
-------------------------
- Added an `! is_admin()` check to the stylesheet enqueues.

Version 2.0.1 (2020-02-06)
-------------------------
- Fixed incorrect text domain.

Version 2.0.0 (2020-02-06)
-------------------------
- Fixed notice when using the "Video" post format and not adding the more tag (kudos to @terriann).
- Updated "Tested up to" to 5.3.2.
- Updated the theme description to remove mention of the video widget, which was removed in version 1.20.
- Removed usage of the title attribute on link elements.
- Added theme tags for "block-styles" and "wide-blocks".
- Removed get_post_meta call for audio url in content-audio.php, since the variable hasn't been used for a couple of years ¯\_(ツ)_/¯
- Added checks for post_password_required() before outputting post media.
- Cleaned up some escaping, conditionals, etc.
- Removed superfluous uses of wp_reset_query().
- Added calls to wp_link_pages() after each the_content() call.
- Unified archive.php, search.php, and index.php into index.php.
- Improved handling of archive titles, better SEO on archives.
- Added output of archive description.
- Replaced link and div toggles in the header with button elements.
- Made the search form more accessible.
- Added base styles for input elements outside of post content, as well as for more types of inputs.
- Added base styles for heading elements outside of the post content.
- Changed the post title on image.php to a h1 element.
- Updated the blog title to only be a h1 element on the front page.
- Removed imagesloaded from the theme and registered the version included in Core instead.
- Updated Flexslider to 2.7.2, and included a non-minified version as well as the enqueued, minified one.
- Added theme version to the enqueues of style.css and js/global.js.
- Optimized image files.
- Added skip link.
- Made sure all elements has outline on focus.
- Added display of main menu sub menus on focus.
- Made edit icon @2x on high-retina screens.
- Added output of sticky indicator to content-status.php.
- Removed the languages folder, since GlotPress handles that for us now.

Version 1.35 (2019-04-07)
-------------------------
- Fixed the bottom margin of the last item in a gallery block

Version 1.34 (2019-04-07)
-------------------------
- Added the new wp_body_open() function, along with a function_exists check

Version 1.33 (2019-01-18)
-------------------------
- Fixed the global $current_user variable being overwritten in the contributor template

Version 1.32 (2018-12-07)
-------------------------
- Fixed Gutenberg style changes required due to changes in the block editor CSS and classes
- Fixed the Classic Block TinyMCE buttons being set to the wrong font

Version 1.31 (2018-12-07)
-------------------------
- Set the third widget area in the footer to be visible on tablets
- Removed old vendor prefixes
- Updated 2X resolution media query with missing assets (should be updated to SVGs, but oh well)

Version 1.30 (2018-11-30)
-------------------------
- Fixed Gutenberg editor styles font being overwritten

Version 1.29 (2018-11-03)
-------------------------
- Fixed the archive template date formatting

Version 1.28 (2018-10-18)
-------------------------
- Added theme support for Gutenberg alignwide and alignfull

Version 1.27 (2018-10-07)
-------------------------
- Updated with Gutenberg support
	- Gutenberg editor styles
	- Styling of Gutenberg blocks
	- Custom Baskerville Gutenberg palette
	- Custom Baskerville Gutenberg typography styles
- Added option to disable Google Fonts with a translateable string
- Improved compatibility with < PHP 5.5
- Various fixes

Version 1.26 (2018-05-23)
-------------------------
- Fixed untranslateable string in functions.php
- Fixed the cookie consent checkbox not being displayed

Version 1.25 (2017-12-04)
-------------------------
- Fixed a typo in content-link.php

Version 1.24 (2017-12-03)
-------------------------
- Replaced shorthand ternanry with non-shorthand ternary, due to it breaking in pre PHP 5.3

Version 1.23 (2017-12-03)
-------------------------
- Fixed enqueue issue

Version 1.22 (2017-12-03)
-------------------------
- Made all functions in functions.php pluggable

Version 1.21 (2017-11-28)
-------------------------
- Removed the changelog.txt (se first list item in previous version)
- Removed conditionals around the_content() output, as the conditional was interfering with plugins using the_content() to output stuff

Version 1.20 (2017-11-26)
-------------------------
- Updated to the new readme.txt format, with changelog.txt incorporated into it
- Removed the old video widget included in the theme, as there's one in core now
- Added a demo link to the stylesheet theme description
- Fixed notice in comments.php
- Changed closing element comment structure
- General code cleanup, improvements in readability
- Removed duplicate comment-reply enqueueing from the header (already in functions)
- SEO improvements (title structure, mostly)
- Better handling of edge cases (missing title, missing content)
- Updated enqueue scripts dependency structure
- Combined all body_class functions into one
- Added missing function prefixes
- Made text string translateable
- Fixed for get_author_meta( 'description' ) now including a paragraph element
- Updated contributors template to hide email for users that have showemail != true
- Removed duplicate get_header in template-fullwidth.php
 
Version 1.19 (2016-06-28)
-------------------------
- Added the new theme directory tags

Version 1.18 (2016-03-12)
-------------------------
- Removed wp_title() from header.php

Version 1.17 (2015-08-25)
-------------------------
- Fixed an issue with overflowing images
- Added the .screen-reader-text class

Version 1.16 (2015-08-11)
-------------------------
- Added the title_tag() function, replaced old custom title function
- Removed the post meta fields from functions.php
- Removed the code displaying the content of the post meta fields from content-[format].php and single.php.
- Moved the post-meta into a function called baskerville_meta() in functions.php
- Adjusted content-quote, content-link and content-video to use a method not dependent on meta fields
- Removed a add_shortcode function from functions.php
- Changed the title to a h1 element on singular for SEO reasons
- Changed the theme widgets to use __construct()
- Updated the Swedish translation
- Removed mediaelement.js
- Removed the get domain name from URL function
- Removed audio format styling and icon images

Version 1.15 (2014-09-26)
-------------------------
- Added styling for email input fields in the post content
- Fixed so that images smaller than the featured media area is centered
- Fixed the display of Disqus comments
- Fixed so that other post types (ie the Jetpack portfolio post type) is displayed correctly

Version 1.14 (2014-08-06)
-------------------------
- Optimized style.css
- Fixed so that the scaling effect on featured images works in non-webkit browsers

Version 1.13 (2014-08-05)
-------------------------
- Fixed an issue which would prevent WordPress Mediaelement.js style from loading
- Minor CSS tweaks and fixes


Version 1.12 (2014-08-02)
-------------------------
- Fixed a bug which made it so that the author email was always visible in the post meta, even if it had been set as hidden in the settings

Version 1.11 (2014-07-31)
-------------------------
– Added form styling to the post content CSS to better support Contact Form 7 and other form based plugins
- Added a function to prevent WordPress built-in medieaelement.js styles from kicking in
- Improved the Masonry function in global.js to be leaner and meaner
– Replaced the Masonry files included with the theme with the ones packaded with WordPress

Version 1.10 (2014-07-31)
-------------------------
- Fixed so that plugins can add post thumbnail sizes when Baskerville is active

Version 1.09 (2014-07-19)
-------------------------
- Fixed so that the post-image size is the same as the maximum width of the container

Version 1.08 (2014-06-25)
-------------------------
- Removed a stray closing div from footer.php
- Replaced the search field in the header with get_search_form();
- Added sanitize_callback to theme customization in functions.php

Version 1.07 (2014-06-12)
-------------------------
- Replaced esc_attr() with the_title_attribute() in link title attributes
- Fixed a bug where the audio player would overflow in some browsers

Version 1.06 (2014-06-11)
-------------------------
- Escaped the_title() in link title attributes
- Increased the contrast of the post-excerpt element

Version 1.05 (2014-06-09)
-------------------------
- Fixed a bug where template-archives.php would always display comments

Version 1.04 (2014-06-08)
-------------------------
- Minor fixes and touch-ups to template-contributors.php
- Realized that the image post format was missing, added it in

Version 1.03 (2014-06-08)
-------------------------
- Fixed a bug in the search form in the header
- Upped the resolution of home-g.png, author-w.png and the post-nav icons in the /2x/ folder
- Adjusted font sizes and line heights of elements @ 600px

Version 1.02 (2014-06-07)
-------------------------
- Added yet another missing text domain

Version 1.01 (2014-06-07)
-------------------------
- Added support for custom background
- Added missing text domains in template-contributors.php
- Minor adjustments to style.css

Version 1.00 (2014-06-07)
-------------------------