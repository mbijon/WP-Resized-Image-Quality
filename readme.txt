=== WP Resized Image Quality ===
Contributors: mbijon
Tags: image, thumbnail, compression, quality, YSlow, PageSpeed, bandwidth, jpeg, jpg, size, file, storage, uploader, uploaded, imagemagick, gd library
Requires at least: 2.7
Tested up to: 3.6-beta4
Stable tag: 2.0

Get better uploaded quality or save bandwidth: Change the JPEG compression-level of uploaded images and thumbnails.

== Description ==

Get better uploaded quality or save bandwidth: Change the JPEG compression-level of uploaded images and thumbnails.

The WP Resized Image Quality plugin lets you change the compression-level of uploaded JPEG images and thumbnails. Set it for maximum quality when you want images to look their best, or take advantage of lower quality settings to save bandwidth.

The admin page uses an easy slider to set the compression level, making this easier to use than other compression plugins or functions.php settings.

== Installation ==

1. Install 'WP Resized Image Quality' through the WordPress.org plugin directory, or by uploading the files to your server
2. After activating the Plugin, change your image quality settings on the Settings page in WP-Admin: Settings > Image Quality
3. That's it.  You're ready to go!

= Requirements =

* PHP 5.2 or above
* WordPress 3.1 or above

== Frequently Asked Questions ==

= What was the default image quality in WordPress? =

The default image compression setting for JPEGs is 90%.

= What happens to uploaded images if I turn the plugin off? =

After you deactivate the plugin all new images will use the default 90% compression setting. Images uploaded while the plugin was active will stay at their old compression level.

= Does this plugin compress PNG files? =

Unfortunately, it doesn't. All the PNG compression tools I've found aren't standard on most servers. You would need root access and a more-complicated plugin to get PNG compression working.

== Screenshots ==

1. Admin page with one setting, simple enough

== Changelog ==

= 2.0 =
* Move image compression toggle from custom Settings > Image Quality page to Settings > Media

= 1.0.3 =
* (attempted) Fix WP.org screenshot display

= 1.0.1 =
* Fixed JS error in wp-admin pages, show our JS only in own wp-admin page

= 1.0 =
* Initial release