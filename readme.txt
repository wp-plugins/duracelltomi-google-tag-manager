=== DuracellTomi's Google Tag Manager for WordPress ===
Contributors: duracelltomi
Donate link: http://duracelltomi.com/
Tags: google tag manager, tag manager, gtm, google, adwords, google adwords, adwords remarketing, remarketing, google analytics, analytics
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 0.8.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.html

The first Google Tag Manager plugin for WordPress with business goals in mind.

== Description ==

Google Tag Manager (GTM) is Google's free tool to everyone to be able to manage your analyitcs, PPC and other code snipetts
using an intuitive web UI.

This plugin can place the necessary container code snippet into your website so that you do not need to edit your theme files.

= Basic data included =

Google Tag Manager for WordPress (aka GTM4WP or GTM 4 WP) builds a so called dataLayer variable for you. Using this you can manage your tags
very easily since you can fire them using rules that include

* post/page titles
* post/page dates
* post/page category names
* post/page tag names
* post/page author names
* post types
* post count on the current page + in the current category/tag/taxonomy
* logged in status
* logged in user role
* search data

Use search data to generate Analytics events when an empty search result is being shown.
This is useful to see what people are searching for that is not available on your site (for example a product).

Use post count to generate Analytics events when an empty result is being shown.
This can be useful to catch empty (product) categories.

= Browser / OS / Device data =

* browser data (name, version, engine)
* OS data (name, version)
* device data (type, manufacturer, model)

Data is provided using the WhichBrowser library: http://whichbrowser.net/

= Weather data =

Add the current weather conditions into the dataLayer so that you can use this information to generate special
remarketing lists and additional segmentation in your web analytics solution:

* weather category like clouds, rain, snow, etc.
* weather description: more detailed data
* temperature in Celsius or Fahrenheit
* air pressure
* wind speed and degrees

Weather data is queried from Open Weather Map. Depending on your websites traffic, additional fees may be applied:

http://openweathermap.org/price

To determine to current location of your visitor, this plugin uses geoplugin.net.
Depending on your websites traffic, additional fees may be applied:

http://www.geoplugin.com/premium

= Tag Manager Events =

This plugin can fire several Tag Manager event so that you can include special tags when

* the visitor clicks on an outbound link
* the visitor clicks on a download link
* the visitor clicks on an email link
* the visitor moves between elements of a form (comment, contact, etc.)
* the visitor clicks on a Facebook like/share (limited feature) or Twitter button

Link URLs are included in the Tag Manager event so that you can use them for example in a Google Analytics event tag.

= Scroll tracking =

Fire tags based on how the visitor scrolls from the top to the bottom of a page.
You can track this as Analytics events and/or fire remarketing/conversion tags to if you want to track micro conversions.
Separate readers (who spend a specified amount of time on a page) from scrollers (who only scroll through within seconds)

Scroll tracking is based on the solution originally created by

* Nick Mihailovski
* Thomas Baekdal
* Avinash Kaushik
* Joost de Valk
* Eivind Savio
* Justin Cutroni

Original script:
http://cutroni.com/blog/2012/02/21/advanced-content-tracking-with-google-analytics-part-1/

= Google AdWords remarketing =

Google Tag Manager for WordPress can add every dataLayer variable as an AdWords remarketing custom parameter list.
Using this you can create more sophisticated remarketing lists.

= Blacklist & Whitelist Tag Manager tags and macros =

To increase security on your website, you can whitelist and blacklist tags and macros.
This means you can disable certain tags from being fired or prevent the use of certain macro types
from being used regardless of your current Tag Manager setup.

If your Google account is being hacked that is associated with your Google Tag Manager account,
an attacker could easily execute malware on your website without accessing its code on your hosting server.

By blacklisting custom HTML tags and/or custom JavaScript macros for example you can have a more secure Tag Manager container
if you do not use those kind of elements.

= Integration =

Google Tag Manager for WordPress can integrate with several popular plugins.

* Contact Form 7: fire an event after a successful form submission
* WooCommerce:
	* Classic e-commerce:
		* fire event when visitors ads a product to your cart
		* include transaction data to be sent to Google/Universal Analytics
		* include necessary remarketing tags for Google AdWords Dynamic Remarketing
	* Enhanced e-commerce (experimental!):
		*	implementation of [Enhanced E-commerce](https://developers.google.com/tag-manager/enhanced-ecommerce)
		* Does not include tracking of promotions since WooCommerce does not have such a feature (yet)

More integration to come!

== Installation ==

1. Upload `duracelltomi-google-tag-manager-for-wordpress` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to Settings / Google Tag Manager and enter your Google Tag Manager container ID and setup additional options

== Frequently Asked Questions ==

= How can I implement enhanced e-commerce in Google Tag Manager =

First of all please remember that this feature of this plugin is still experimental and the feature of Google Analytics
is still in beta. Therefore it is recommended to create a separate web property to be used with enhanced e-commerce
in paralel to you current "classic" e-commerce tracking.

To be able to implement the necessary tags just follow the instructions shown on the official documentation of Google:
https://developers.google.com/tag-manager/enhanced-ecommerce

There is only one thing you have to change: event names:

* productClick -> gtm4wp.productClick
* addToCart -> gtm4wp.addProductToCart
* removeFromCart -> gtm4wp.removeProductFromCart
* promotionClick -> gtm4wp.promotionClick

= Why isn't there an option do blacklist tag/macro classes =

Although Google recommends to blacklist tags and macros using classes, I found it complicated for people to understand
what tags and macros are being blacklisted/whitelisted automatically using classses. Therefore I decided to include
individual tags and macros on the blacklist tabs.

Please remember that tags are useless without macros so only blacklist macros if you are certain that you do not use them
with any macro in your container.

= How can I track add-to-cart events in WooCommerce =

To track add-to-cart events you have to catch the dataLayer event gtm4wp.addProductToCart

There are 3 additional dataLayer variables that can be accessed during the event using classic ecommerce tracking:

* productName: the name of the product where the cart button has been pressed
* productSKU: the SKU you entered in your product settings
* productID: the ID of the WordPress post that holds your product data

= How can I track scroll events in Google Tag Manager? =

To track scrolling of your visitor you need to setup some tag in Google Tag Manager.

What type of tags?
In most cases you will need Google/Universal Analytics event tags but you can use AdWords remarketing
or conversion tags as well to collect micro conversions or to focus only on visitors who spend more time
reading your contents.

There are five dataLayer events you can use in your rule definitions:

* gtm4wp.reading.articleLoaded: the content has been loaded
* gtm4wp.reading.startReading: the visitor started to scroll. You can use the dataLayer variable `timeToScroll` to see how many seconds have passed since the article has been loaded
* gtm4wp.reading.contentBottom: the visitor reached the end of the content (not the page!). `timeToScroll` dataLayer variable updated
* gtm4wp.reading.pagebottom: the visitor reached the end of the page. `timeToScroll` dataLayer variable updated
* gtm4wp.reading.readerType: at this point we are confident whether the visitor is a 'scanner' or 'reader' depending on how much time have passed since the content has been loaded. `readerType` dataLayer variable holds the type of the visitor

= Can I exclude certain user roles from being tracked? =

Google Tag Manager is not just about visitor tracking.
The ability to include a Google/Universal Analytics tag is only one feature you can manage.

Therefore there is no need to have an option to exclude the container code snippet on certain cases.

If you want to exclude logged in users or certain user roles, use the corresponding dataLayer variable (visitorType)
and an exclude filter in Google Tag Manager.

= How do I put the Google Tag Manager container code next to the opening body tag? =

Go to the admin section of the plugin and select "Custom" from the placement settings.
This way my plugin does not put the code snippet into the footer of the page.

In this case you have to edit your template files.
Go to `wp-content/plugins/themes/<your theme dir>` and edit `header.php`.
In most cases you will find the opening `<body>` tag here.

If you can not find it, contact the author of the theme and ask for instructions.

In case you found the opening `<body>` tag, open a new line just after it and insert this line of code:
`<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>`

Be careful not to include this line inside any `<div>`, `<p>`, `<header>`, `<article>` and so on.
It can break you theme.

= Why can not this plugin insert the container snippet after the opening body tag automatically? =

Currently WordPress has two 'commands' or 'hooks' that a programmer can use: one for the `<head>` section and
one for the bottom of `<body>`. There is no way to inject any content after the opening body tag without manually editing your template files.

Fortunately some theme authors already resolved this so in some cases you do not need to edit your template.
I suggest first to select the Custom placement and use Google Tag Assistant Chrome browser extension to check
whether the container code is placed as expected.

If it shows an error, go and edit your theme manually.

= Facebook like/share/send button events do not fire for me, why? =

It is a limitation of Facebook. Click event tracking is only available for html5/xfbml buttons.
If you or your social plugin inserts the Facebook buttons using IFRAME-s (like Sociable), it is not possible to track likes.

== Screenshots ==

1. Admin panel
2. Basic settings
3. Events
4. Integration panel
5. Advanced settings
6. Scroll tracking

== Changelog ==

= 0.8.2 =

* Fixed: broken links when listing subcategories instead of products (thanks Jon)
* Fixed: wheather/weather typo (thanks John Hockaday)
* Fixed: wrong usage of get_the_permalink() instead of get_permalink() (thanks Szepe Viktor)

= 0.8.1 =

* Fixed: PHP error in enhanced ecommerce implementation when using layered nav widget

= 0.8 =

* Updated: Added subtabs to the admin UI to make room for new features :-)
* Updated: WhichBrowser library to the latest version
* Added: You can now dismiss plugin notices permanently for each user
* Added: weather data. See updated plugin description for details
* Added: Enhanced E-commerce for WooCommerce (experimental!)
* Fixed: PHP notice in frontend.php script. Credit to Daniel Sousa

= 0.7.1 =

* Fixed: WooCommerce 2.1.x compatibility

= 0.7 =

* Updated/Fixed: dataLayer variables are now populated at the end of the head section. Using this the container code can appear just after the opening body tag, thus Webmaster Tools verification using Tag Manager option will work
* Added: blacklist or whitelist tags and macros to increase security of your Tag Manager setup


= 0.6 =

* Updated: better add-to-cart events for WooCommerce, it includes now product name, SKU and ID
* Added: browser, OS and device data to dataLayer variables
* Added: postCountOnPage and postCountTotal dataLayer variables to track empty categories/tags/taxonomies

= 0.5.1 =

* Fixed: WooCommerce integration did not work on some environments

= 0.5 =
* Added: scroll tracking
* Fixed: social tracking option on the admin panel was being shown as an edit box instead of a checkbox
* Fixed: WooCommerce transaction data was not included in the dataLayer if you selected "Custom" code placement
* Fixed: do not do anything if you enabled WooCommerce integration but did not activate WooCommerce plugin itself
* Updated: do not re-declare dataLayer variable if it already exists (because another script already created it before my plugin was run)

= 0.4 =
* Added: you can now select container code placement. This way you can insert the code snippet after the opening body tag. Please read FAQ for details
* Added: initial support for social event tracking for Facebook and Twitter buttons. Please read FAQ for details
* Updated: event name on successful WooCommerce transaction: OrderCompleted -> gtm4wp.orderCompleted
* Fixed: frontend JS codes did not load on some WordPress installs

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

= 0.8.2 =

Another bugfix release for WooCommerce users with Enhanced Ecommerce enabled

= 0.8.1 =

Bugfix release for WooCommerce users with Enhanced Ecommerce enabled

= 0.8 =

This version instroduces Enhanced E-commerce implementation for WooCommerce. Please note that this
feature of the plugin is still experimental and the feature of Google Analytics is still in beta.
Read the plugin FAQ for details.

= 0.7.1 =

If you are using WooCommerce and updated to 2.1.x you SHOULD update immediatelly.
This release includes a fix so that transaction data can be passed to GTM.

= 0.7 =

Improved code so that Webmaster Tools verification can work using your GTM container tag.
Blacklist or whitelist tags and macros to increase security of your Tag Manager setup.
Fixed: WhichBroswer library was missing from 0.6

= 0.6 =

Improved add-to-cart events for WooCommerce, added browser/OS/device infos and post count infos.

= 0.5.1 =

Bug fix release for WooCommerce users.

= 0.5 =
Besides of some fixes this version includes scroll tracking events for Google Tag Manager.

= 0.4 =
Important change: Tag Manager event name of a WooCommerce successful order has been changed. 
See changelog for details.

= 0.3 =
This is a minor release. If you are using WooCommerce you should update to include more accurate AdWords dynamic remarketing feature.

= 0.2 =
BACKWARD INCOMPATIBLE CHANGE: Names of Tag Manager click events has been changed to comply with naming conventions.
See changelog for details. Do not forget to update your Tag Manager container setup after upgrading this plugin!

= 0.1 =
This is the first public beta, no upgrade is needed.
