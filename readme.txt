=== WP Resized Image Quality Plugin ===
Contributors: mbijon
Tags: image, thumbnail, compression, quality, YSlow, PageSpeed, bandwidth, jpeg, jpg, size, file, storage, uploader, uploaded, imagemagick, gd library
Requires at least: 2.7
Tested up to: 3.5.1
Stable tag: 1.0.2

== Description ==

Get better uploaded quality or save bandwidth: Change the JPEG compression-level of uploaded images and thumbnails.

The WP Resized Image Quality plugin lets you change the compression-level of uploaded images and thumbnails. Set it for maximum quality when you want images to look their best, or take advantage of lower quality settings to save bandwidth.

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

The default image quality is 90%.

= What happens to uploaded images if I turn the plugin off? =

After you deactivate the plugin all new images will use the default 90% compression setting. Images uploaded while the plugin was active will stay at their old compression level.

== Screenshots ==

1. Admin page with one setting, simple enough

== Changelog ==

= 1.0.2 =
* Fix WP.org screenshot display

= 1.0.1 =
* Fixed JS error in wp-admin pages, show our JS only in own wp-admin page

= 1.0 =
* Initial release