=== WP Resized Image Quality ===
Contributors: mbijon
Tags: image, thumbnail, compression, quality, YSlow, PageSpeed, bandwidth, jpeg, jpg, size, file, storage, uploader, uploaded, imagemagick, gd library
Requires at least: 3.1
Tested up to: 3.8.0
Stable tag: 2.1

Get better uploaded quality or save bandwidth: Change the JPEG compression-level of uploaded images and thumbnails.


== Description ==

Get better uploaded quality or save bandwidth: Change the JPEG compression-level of uploaded images and thumbnails.

'Resized Image Quality' lets you *easily* change the compression-level of uploaded JPEG images and thumbnails. Set it for maximum quality when you want images to look their best, or take advantage of lower quality settings to save bandwidth.

The only interface is a slider aqdded to the Settings > Media admin page, making this easier to use than other compression plugins or functions.php settings.


== Installation ==

1. Install 'WP Resized Image Quality' through the WordPress.org plugin directory, by uploading to your server, or git/grunt/Composer method if you're that kind of dev
2. After activating the Plugin, change your image quality settings on the Settings page in WP-Admin: Settings > Media
3. That's it.  You're ready to go!


= Requirements =

* PHP 5.2 or above
* WordPress 3.1 or above
* WP-compatible, server-side image library: gdlib or ImageMagick (ImageMagick is preferred)


== Frequently Asked Questions ==

= What was the default image quality in WordPress? =

The default image compression setting for JPEGs is 90%.


= What about PNG and GIF images? Are they compressed? =

WordPress doesn't currently support PNG compression internally (none at all). There are other image-handling plugins that compress PNGs and GIFs, but they either require server-side tools or a 3rd-party service. For a Plugin using server-side tools, try 'EWWW Image Optimizer'. For a Plugin using a 3rd-party service, try 'WP Smush.it'.


= How can I update JPEGs uploaded before installing this plugin at a different setting? =

First, install this plugin and choose your new compression level. Then install the Regenerate Thumbnails plugin, http://wordpress.org/plugins/regenerate-thumbnails/, and run it. All the regenerated thumbnails will be compressed at the compression % from this plugin.


= What happens to uploaded images if I turn the plugin off? =

Images uploaded while the plugin was active will stay at their original/old compression level (to recompress them, I recommend the Regenerate Thumbnails plugin). After you deactivate the custom compression setting will be removed and all new images will use WP's default 90% compression setting.



== Screenshots ==

1. No complicated media/compression interface. Just one slider added to the Settings > Admin page


== Changelog ==

= 2.1 =
* Add handling of the 'wp_editor_set_quality' filter that was added in WP 3.5 for ImageMagick API
* Update styles to use colors from WP3.8 admin themes
* Docs & screenshot reflect new placement of slider on the Settings > Media admin page

= 2.0 =
* Move image compression toggle from custom Settings > Image Quality page to Settings > Media
* Add note to current custom Admin page that UX will permanently move to Settings > Media in v3.0

= 1.0.3 =
* (attempted) Fix WP.org screenshot display

= 1.0.1 =
* Fixed JS error in wp-admin pages, show our JS only in own wp-admin page

= 1.0 =
* Initial release