=== DuracellTomi's Google Tag Manager for WordPress ===
Contributors: duracelltomi
Donate link: http://duracelltomi.com/
Tags: google tag manager, tag manager, google, adwords, google adwords, adwords remarketing, remarketing, google analytics, analytics
Requires at least: 3.0.1
Tested up to: 3.7.1
Stable tag: 0.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

The first Google Tag Manager plugin for WordPress with business goals in mind.

== Description ==

Google Tag Manager is Google's free tool to everyone to be able to manage your analyitcs, PPC and other code snipetts
using an intuitive web UI.

This plugin can place the necessary container code snippet into your website so that you do not need to edit your theme files.

= Basic data included =

Google Tag Manager for WordPress builds a so called dataLayer variable for you. Using this you can manage your tags
very easily since you can fire them using rules that include

* post/page titles
* post/page dates
* post/page category names
* post/page tag names
* post/page author names
* post types
* logged in status
* logged in user role

= Tag Manager Events =

This plugin can fire several Tag Manager events so that you can include special tags when

* the visitor clicks on an outbound link
* the visitor clicks on a download link
* the visitor clicks on an email link
* the visitor moves between elements of a form (comment, contact, etc.)

Link URLs are included in the Tag Manager event so that you can use them for example in a Google Analytics event tag.

= Google AdWords remarketing =

Google Tag Manager for WordPress can add every dataLayer variable as an AdWords remarketing custom parameter list.
Using this you can create more sophisticated remarketing lists.

= Integration =

Google Tag Manager for WordPress can integrate with several popular plugins.

* Contact Form 7: fire an event after a successful form submission
* WooCommerce:
	* fire event when visitors ads a product to your cart
	* include transaction data to be sent to Google/Universal Analytics
	* include necessary remarketing tags for Google AdWords Dynamic Remarketing

More integration to come!

== Installation ==

1. Upload `duracelltomi-google-tag-manager-for-wordpress` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Settings / Google Tag Manager and enter your Google Tag Manager container ID and setup additional options

== Frequently Asked Questions ==

= Can I exclude certain user roles from being tracked? =

Google Tag Manager is not just about visitor tracking.
The ability to include a Google/Universal Analytics tag is only one feature
you can manage.

Therefor there is no need to have an option to exclude the container code snippet
on certain cases.

If you want to exclude logged in users or certain user roles, use the corresponting dataLayer variable (visitorType)
and an exclude filter in Google Tag Manager.

== Screenshots ==

1. Admin panel
2. Basic settings
3. Events
4. Integration panel
5. Advanced settings

== Changelog ==

= 0.3 =
* Updated: admin page does not show an alert box if Tag Manager ID or dataLayer variable name is incorrect. Instead it shows a warning line below the input field.
* Updated: rewritten the code for WooCommerce dynamic remarketing. Added tag for homepage and order completed page.

= 0.2 =
* ! BACKWARD INCOMPATIBLE CHANGE ! - Names of Tag Manager click events has been changed to comply with naming conventions:
	* ContactFormSubmitted -> gtm4wp.contactForm7Submitted
	* DownloadClick -> gtm4wp.downloadClick
	* EmailClick -> gtm4wp.emailClick
	* OutboundClick -> gtm4wp.outboundClick
	* AddProductToCart -> gtm4wp.addProductToCart
* Updated: click events are now disabled by default to reflect recently released Tag Manager auto events. I do not plan to remove this functionality. You can decide which solution you would like to use :-)
* Updated: language template (pot) file and Hungarian translation
* Added: new form move events to track how visitors interact with your (comment, contact, etc.) forms
* Added: event names to admin options page so that you know what events to use in Google Tag Manager
* Added: Google Tag Manager icon to admin settings page
* Added: Settings link to admin plugins page
* Fixed: null value in visitorType dataLayer variable if no logged in user exists (now 'visitor-logged-out')

= 0.1 =
* First beta release

== Upgrade Notice ==

= 0.3 =
This is a minor release. If you are using WooCommerce you should update to include more accurate adwords dynamic remarketing feature.

= 0.2 =
BACKWARD INCOMPATIBLE CHANGE: Names of Tag Manager click events has been changed to comply naming conventions.
See changelog for details. Do not forget to update your Tag Manager container setup after upgrading this plugin!

= 0.1 =
This is the first public beta, no upgrade is needed.
