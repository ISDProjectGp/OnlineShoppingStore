=== Plugin Name ===
Contributors: Rustaurius, EtoileWebDesign
Donate Link: http://www.etoilewebdesign.com/plugin-donations/
Tags: product catalog, product catalog wp, product catalog wordpress, product catalog custom, product catalog layout, product catalog import, product catalog export, best product catalog, product catalog ajax, product catalog shortcode, product catalog inventory, product catalog list, product catalog search, product catalog organization, product catalog easy, product catalog simple, product catalog smart, catalog for products, catalog, wp catalog, catalog of goods, blog catalog, catalog plugin, catalogue, wp catalogue,  product catalogue, catalogue plugin, responsive, affiliate, display products, e-commerce, ecommerce, product, product gallery, product management, product portfolio, WordPress product catalog, store, widget, widgets
Requires at least: 3.5.0
Tested up to: 4.4.2
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

A responsive and easily customizable product catalog plugin for all your product catalog needs.

== Description ==

<a href='http://www.etoilewebdesign.com/ultimate-product-catalogue-demo/'>Product Catalog Demo</a>

Our responsive product catalog plugin is designed to display your products in an a sleek and easy to customize product catalog format. Choose between three default responsive layouts for your product catalog, or use the Custom CSS features or any of the hundreds of product catalog styling options. Make your product catalog easy to browse, sort and update with product catalog categories, sub-categories, tags and custom fields. Simple to add a product catalog to any page using the [product-catalogue] or [product-catalog] shortcode!

Perfect to create a product catalog for your store, art gallery, restaurant and more!

= Key Features =

* 3 default product catalog layouts (thumbnail, detail and list)
* Product catalog categories and sub-categories to organize your catalog, making product management and product filtering easy
* Custom fields for your product catalog
* Custom product pages 
* Product catalogs fully customizable with CSS
* Widgets to display recent products, product list, random products from your product directory
* Include product catalogs using the [product-catalogue id=’X’] or [product-catalog id=’X’] product shortcode
* Upload and import products directly from a spreadsheet for your product catalog
* Search product catalog functions with Javascript or AJAX
* Easy to use product catalog attributes like [starting_layout], [excluded_layout]
* Options page that makes it easy to customize product catalog features
* Display a specific product category in your product catalog using URL filtering

= Premium Features =
The premium version of our product catalog plugin includes a huge number of features, such as: the ability to add over 100 products for your product catalogs, additional product images, SEO friendly URLs, product tags and custom fields for sorting within your product catalog, custom product pages, a minimalist product catalog layout option, product export and more!

* Drag-and-drop and ultra-responsive tabbed product pages layout
* Product inquiry form
* Product reviews (using <a href='https://wordpress.org/plugins/ultimate-reviews/'>Ultimate Reviews</a>)
* Product tags for enhanced product catalog organization
* Additional images and videos for better product catalog display and product management
* Custom fields that can be added to your product catalog and used to include product manuals, additional information, etc., and for product catalog filtering
* SEO friendly catalog single product pages
* SEO By Yoast Integration for your product catalogs
* Product catalog styling options, labelling options for product directory elements
* For a more in depth list of product catalog features, please visit our FAQ page:


<http://www.etoilewebdesign.com/ultimate-product-catalogue-faq>


= Product Catalog Additional Languages =
* Brazilian Portugese product catalog (Thanks to <a href='http://wordpress.org/support/profile/tito_cadallora'>Tito_Cadallora</a>)
* Bulgarian product catalog (Thanks to Preslav P.)
* Canadian French product catalog (Thanks to Pascale DRP)
* Dutch product catalog (Thanks to Martin S.)
* German product catalog (Thanks to <a href='https://profiles.wordpress.org/thomymaster'>Thomas S.</a>)
* Greek product catalog (Thanks to <a href='http://bigdrop.gr/'>Christoforos A.</a>)
* Italian product catalog 
* Lithuanian product catalog (Thanks to <a href='http://wordpress.org/support/profile/adart'>AdArt</a>)
* Romanian product catalog (Thanks to Eszter N.)
* Russian product catalog (Thanks to Alexander M.)
* Spanish product catalog (Thanks to Irene L.)
* Turkish product catalog (Thanks to Ayhan)

Thanks to James K for a number of excellent product catalog features

Check out our product catalog Frequently Asked Questions here:
<https://wordpress.org/plugins/ultimate-product-catalogue/faq/>

Head over to the "Support" forum to report product catalog issues or make product catalog suggestions:
<https://wordpress.org/support/plugin/ultimate-product-catalogue>

Check out more product catalog videos on the product catalog FAQ page.

[youtube https://www.youtube.com/watch?v=vLIdbiD5rr4]

== Installation ==

1. Upload the `ultimate-product-catalogue` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place "[product-catalogue id='X']" or [product-catalog id=’X’] on the page where you want your catalog to display, where X is the ID of the product catalog to display
4. *The page that displays the product catalog needs to be a full-width type page for the catalog to display correctly*

--------------------------------------------------------------

To get started using the product catalog plugin, you can:
- Go to the "Products" tab in the Ultimate Product Catalogue Plugin (UPCP) admin menu, add products to your product catalog one at a time or by uploading a spreadsheet
- Create product catalog categories in the "Categories" tab, then create sub-categories in the "Sub-Categories" tab and assign your sub-categories to the correct category. These will display in the sidebar of your product catalog.
- Create a product catalog in the "Catalogues" tab, then add products, categories, or sub-categories to that product catalog
- Add additional images to a product by clicking on it and then adding them from the "Product Details" screen
- Create tags in the "Tags" tab, then assign as many tags as necessary to each product from the "Product Details" screen. These will display in the sidebar of your product catalog.
- Re-order your product catalogs by dragging and dropping product catalog items in the "Catalog Details" screen


== Frequently Asked Questions ==

= How do I display my product catalog? If I have more than one product catalog, what do I do? =

Put the following product catalog shortcode on whatever page you’re trying to put the product catalog on: ‘[product-catalogue id=’X’]’ or [product-catalog id=’X’]. Replace the ‘X’ with the ID of your product catalog. This can be found by clicking on your product catalog. The product catalog ID  is beside the product catalog name on the product catalog’s details page. You can also copy the product catalog shortcode directly from the “Catalogues” page.

To display one of your product catalogs, use the corresponding attribute ‘id='X'’ in the product-catalogue shortcode to specify that product catalog, where 'X' is replaced with the product catalog ID.

= Can my products be in more than one category or sub-category? =

No, products can only be in a single category and sub-category. Products can have as many tags desired, since tags are used to represent product attributes, and only tags that are used for a product within a product catalog are displayed in the product catalog sidebar.

= Can I load my product catalog with a layout other than the default "Thumbnail" product catalog layout? =

Add the attribute starting_layout=‘LAYOUT’ for your product catalog, where LAYOUT is replaced with the layout you would like to be the starting product catalog layout (List or Detail are the two options currently).

= I only want to display one product catalog layout and to remove the layout bar at the top from my product catalog? =

The attribute ‘excluded_layouts’ lets you stop one or more layouts from being displayed for your product catalog. It accepts a comma separated list of layouts you wish to exclude from your product catalog. For example, [product-catalogue id=‘X’ excluded_layouts=‘Thumbnail,List’] would make your product catalog display only the "Detail" view.

To remove the layout bar from your product catalog, you can try adding the following into your "Custom CSS" box for your product catalog (where the colour matches the colour of the product catalog you are using):

‘.Blue-prod-cat-header-div {display: none;}’

= My product description gets cut off even though I have changed the max characters for my product catalog, how can I fix this? =

There is a text area labelled "Custom CSS" when you click on the product catalog that you're editing. Try adding this to it:  ‘.prod-cat-addt-details-desc-div {max-height:none;}’

= How do I remove the sidebar from my product catalog? =

You can use the attribute [sidebar=‘No'] in the product-catalogue shortcode to remove the sidebar from a product catalog.

= Why aren’t my products uploading from the spreadsheet? =

There are a number of reasons why products might not be uploading correctly.
First, make sure that you’re uploading either a .xls or .xlsx file type (not .csv).
Second, make sure that you’ve written all of your field names correctly (Name, Slug, Description, Price, Image, Category, Sub-Category, Tags), especially custom fields, which need to be exactly the same as the field name.
Third, make sure that you don’t have any columns that have been edited unintentionally (which gives an “incorrect field name” error).

= How do I get custom changes I’ve made to the product page layout or the custom fields I’ve added in the product details to display? =

On  the “Options” page the “Custom Product Page” needs to be set to “Yes” for custom layout to display.

= How do I sort the order of the products within the catalog? =

You can arrange the order of the products by dragging and dropping the products on the “Catalogue Details” page .

= How do I translate the product catalog into my language? =
A great place to start learning about how to translate a plugin is at the link below: <http://premium.wpmudev.org/blog/how-to-translate-a-wordpress-plugin>

Once translated, you'll need to put the translated catalog mo- and po- files directly in the lang folder and make sure they are named properly for your localization.
If you do translate the product catalog, other users would love to have access to the files in your language. You can send them to us at Contact@EtoileWebDesign.com, and we’ll be sure they’re included in a future release.

= What is enabled in the 'Premium' version? =

The premium version includes a lot of great features including: the ability to add over 100 products, additional product images, SEO friendly product catalog URLs, product tags and custom fields for product catalog sorting, custom catalog product pages, a minimalist product catalog layout option and more!

* Super responsive tabbed layout with customizable tabs
* Drag-and-drop catalog product pages layout
* Lightbox, product inquiry form (using Contact Form 7) and product reviews (using <a href='https://wordpress.org/plugins/ultimate-reviews/'>Ultimate Reviews</a>)
* Custom fields that can be used to include product manuals, additional information, etc.
* SEO friendly product catalog single product pages
* Unlimited catalog products
* Additional images per product
* Product catalog pretty permalinks
* Product tags
* More product catalog layout options
* Related and Next/Previous catalog product display
* Styling, labeling and dozens of other options!

For a more in depth list, please visit our FAQ page:
<http://www.etoilewebdesign.com/ultimate-product-catalogue-faq>

For more questions and support you can post in the support forum:
<https://wordpress.org/support/plugin/ultimate-product-catalogue>



= Videos =

Tutorial Video 1 - Installation and Set Up
[youtube https://www.youtube.com/watch?v=-AwTj0pfooo]

Tutorial Video 2 - Categories and Sub-Categories
[youtube https://www.youtube.com/watch?v=9ATWI_UoYi4]

Tutorial Video 3 - Tags and Custom Fields
[youtube https://www.youtube.com/watch?v=JqqqFfogiQ8]

Tutorial Video 4 - The Options Page
[youtube https://www.youtube.com/watch?v=UxWENKqa9Rk]

Tutorial Video 5 - Widgets
[youtube https://www.youtube.com/watch?v=sLHBA4fXuYg]

Tutorial Video 6 - Shortcodes
[youtube https://www.youtube.com/watch?v=oJqVQQ-Y1TY]

Tutorial Video 7 - Extra URL Parameters for Filtering
[youtube https://www.youtube.com/watch?v=YYpRuukkqLw]

Tutorial Video 8 - Custom CSS
[youtube https://www.youtube.com/watch?v=tq386rMtpm8]

Premium Features (a little out of date, update coming soon!)
[youtube http://www.youtube.com/watch?v=l9mWNqOIB_w]

== Screenshots ==

1. View of the "Minimalist" catalog style in the "Thumbnail" view
2. View of the "Minimalist" catalog style in the "List" view
3. View of the "Minimalist" catalog style in the "Details" view
4. View of the "Tabbed Layout" catalog product page
5. View of the catalog lightbox feature
6. View of the catalog "Product Inquiry Form" inclusion from the Contact Form 7 plugin
7. View of the "Custom Page Layout" catalog product page
8. View of the new catalog "Styling" tab feature
9. View of the catalog "Products" tab 
10. View of the premium catalog options under the "Options" tab


== Changelog ==
= 3.7.13 =
- Resolved a minor compatibility issue that was causing the plugin menu to be inaccessible for some users

= 3.7.12 =
- Fixed another minor problem with the dashboard tab that was brought to our attention

= 3.7.11 =
- Fixed a minor problem with the dashboard tab that was brought to our attention

= 3.7.10 =
- Fixed a problem with custom field filtering that was reported

= 3.7.9 =
- Added a new Dashboard page that should make support and update information more accessible, as well as add information about plugins that are commonly used with the product catalog
- Added a "submit review" form to the "Reviews" area in the tabbed layout
- Changed the name of a few functions, to avoid a naming conflict

= 3.7.8 =
- Fixed a problem with the custom_fields attribute after a change to how attributes are extracted. The values now need to be separated by an equals sign (=) instead of by a greater than or equals sign (=>)

= 3.7.7 =
- Minor CSS Update

= 3.7.6 =
- Fixed an error where having just blank spaces in the "Product Link" field would lead to the links not working for products

= 3.7.5 =
- Added back in another missing feature, the "updatin results" label

= 3.7.4 =
- Added back in a missing function to display videos in the tabbed product page layout

= 3.7.3 =
- Included a new, sharper details icon thanks to a helpful plugin user!

= 3.7.2 =
- Fixed a number of styling options that weren't being updated in the most recent update

= 3.7.1 =
- Added a number of new sidebar styling options, including a "block" style and a "collapsible" option for categories when "hierarchical" mode is in use
- Fixed a number of minor margin issues for the responsive CSS

= 3.7.0 =
- Added two new premium catalog styles, block and hover
- Cleaned up some of the responsive CSS changes
- Removed the link icon from the default product page
- Changed the default product image when the plugin is installed

= 3.6.20 =
- Fixed a broken link

= 3.6.19 =
- Updated title of the plugin

= 3.6.18 =
- Added a category filter to the products page
- Made a number of minor UI changes

= 3.6.17 =
- Fixed an error where custom fields wouldn't display in the set order in the product content

= 3.6.16 =
- The product name now gets auto-inserted into the product inquiry form
- Fixed an error where a product or category that got deleted wouldn't update the count for the products in a catalogue correctly

= 3.6.15 =
- Added a way to switch to the next/previous products from the product editing screen

= 3.6.14 =
- Minor CSS update

= 3.6.13 =
- Updated the CSS so that custom "details" icons no longer repeat

= 3.6.12 =
- Updated a page setting for strict MySQL installs

= 3.6.11 =
- Minor CSS update

= 3.6.10 =
- Added a new label for the "Updating Results..." string that shows up when filtering

= 3.6.9 =
- Fixed a sorting error when a tag/category/custom field, etc. was selected and then unchecked when the sorting box wasn't present

= 3.6.8 =
- CSV files can now be used for product uploads
- Fixed an error where tag groups wouldn't display if the final tag had no group

= 3.6.7 =
- Product category names are updated now whenever the category's name is updated
- Fixed the tiling issue with the custom details icon

= 3.6.6 =
- Added in a new "Automatic" mode for next/previous products
- Fixed a potential source of scrambling for the custom product page

= 3.6.5 =
- Updated the pot file for translations

= 3.6.4 =
- Added in spaces between checkbox values in the "Tabbed" layout

= 3.6.3 =
- Added in an option to use thumbnails instead of full-size images. This can be toggled from the "Options" tab, and product images need the standard "medium" size to exist or else will return 404 errors.

= 3.6.2 =
- Small CSS change
- Fixed an error with a couple of the styling page settings

= 3.6.1 =
- Minor CSS update

= 3.6.0 =
- Additional image URLs are now included in the product export file
- Additional images can now be imported via spreadsheet
- Added ability to show catalogue name and description above the catalogue
- Added a new public class, UPCP_Product, which can be used to access product information by other plugins as well as in theme templates, etc.

= 3.5.53 =
- Fixed an extra closing div issue that could happen with certain options selected for the default product page

= 3.5.52 =
- On the "Products" tab, products should sort by price numerically if they have no string characters in them now

= 3.5.51 =
- Minor CSS update

= 3.5.50 =
- Fixed a few minor styling issues

= 3.5.49 =
- Fixed an error where "Hide Blank Custom Fields" wasn't applied to custom fields on the tabbed product page

= 3.5.48 =
- Added a color picker to color fields in the "Styling" tab

= 3.5.47 =
- Minor CSS update

= 3.5.46 =
- Fixed an error with placing custom field content into custom tabs in the "Tabbed" layout

= 3.5.45 =
- Fixed an error with tag groups where some tags could end up as radio buttons instead of checkboxes

= 3.5.44 =
- Fix for missing thumbnail title styling option
- Minor CSS fix for image stretching issues
- Made walk-through compatible with unsupported versions of PHP

= 3.5.43 =
- Added a walk-through for new installations

= 3.5.42 =
- Added a "Main Image Only" option to the lightbox
- Fixed an issue where the thumbnail layout could overlap on some sites

= 3.5.41 =
- Fixed a versioning error for any really quick upgraders :)

= 3.5.40 =
- Fixed the AJAX filtering to properly handle commas in text custom fields

= 3.5.39 =
- Fixed a versioning error for any really quick upgraders :)

= 3.5.38 =
- Added in an option to pass filtering results through the default WordPress content filter
- Added in a missing div tag

= 3.5.37 =
- Smoothed out page loading for custom product pages

= 3.5.36 =
- Custom fields that contain no products in a given catalogue are now hidden

= 3.5.35 =
- Another (hopfully the last) custom field substring match update

= 3.5.34 =
- Added a labeling option for the product inquiry form
- Switched the default action after adding additional images to stay on the product editing screen

= 3.5.33 =
- Minor CSS update

= 3.5.32 =
- Fixed an error for a different set of custom field substring cases

= 3.5.31 =
- Added an option to show the category descriptions below the category names

= 3.5.30 =
- Fixed an error where custom fields would make if they contained a substring of the selected field

= 3.5.29 =
- Fixed a custom products tab CSS class naming error for the catalog

= 3.5.28 =
- Fixed an error with custom file fields not displaying a download link

= 3.5.27 =
- Added in a new label for the "Read More" text on the details
- Fixed image sizing issues
- Updated some of the sidebar styling

= 3.5.26 =
- Added the ability to add new, custom tabs to the "Tabbed" product page layout (Use the dropdown on the "Product Pages" tab)
- Fixed the "Delete" button for tag groups
- Fixed a couple other small problems

= 3.5.25 =
- Fixed a problem where long category, sub-category and tag lists couldn't be ordered
- Fixed a video error for product videos

= 3.5.24 =
- Fixed an image width issue for the details layout

= 3.5.23 =
- YouTube videos should now work on the tabbed product page when lightbox isn't enabled

= 3.5.22 =
- Small compatibility update

= 3.5.21 =
- Many small CSS fixes and improvements

= 3.5.20 =
- Replaced a PHP function that was not available in 100% of installs

= 3.5.19 =
- Fixed the labeling for the tabbed product page

= 3.5.18 =
- Fixed the display ordering for categories, sub-categories and tags
- Included an updated Dutch translation

= 3.5.17 =
- Fixed some of the widget styles
- Small responsiveness fix

= 3.5.16 =
- Added in backwards compatibility with obsolete versions of PHP

= 3.5.15 =
- Minor jQuery update to fix a possible labeling error

= 3.5.14 =
- Minor CSS update

= 3.5.13 =
- Minor labeling update

= 3.5.12 =
- Fixed a character encoding issue with non-latin characters in AJAX search
- Fixed an labeling issue with saving

= 3.5.11 =
- Added in additional labeling options for the 'Sort By' section

= 3.5.10 =
- Minor CSS update

= 3.5.9 =
- Maintain filtering search text fix
- Minor language compatibility update

= 3.5.8 =
- Minor CSS fix for the styling options

= 3.5.7 =
- Fixed an error so that all "Extra Elements" on the product page can now be un-selected

= 3.5.6 =
- Small social media fix, so that you can select none of the options

= 3.5.5 =
- Added a bunch more labeling options
- Fixed product inquiry forms
- Minor CSS update

= 3.5.4 =
- Added a beta version of product reviews, using our new "Ultiamte Reviews" plugin
- Added in social media button options

= 3.5.3 =
- Fixed an error with custom fields where they displayed when blank even if the option to hide blank fields was selected

= 3.5.2 =
- Fixed an error with custom fields that made it impossible not to display them in the tabbed layout

= 3.5.1 =
- Added a new catalog search widget, so that a search bar can be added anywhere to your site
- Fixed a 'Details' layout sorting error

= 3.5.0 =
- Added a tonne of new stlying options to make it easier to customize the plugin with using CSS (CAREFUL upgrading production sites)
- Fixed a few small bugs
- More labelling options coming soon

= 3.4.8 =
- Fixed a potential missing categories/sub-categories/tags error for sidebar filtering

= 3.4.7 =
- Fixed a missing files error

= 3.4.6 =
- Changed the layout of the "Product Pages" tab to help reduce custom page scrambling

= 3.4.5 =
- Minor CSS update to make the plugin more responsive

= 3.4.4 =
- Fixed a custom field adding and editing bug

= 3.4.3 =
- Added an option to display custom fields in the tabbed layout
- Fixed a few small CSS issues
- Potentially fixed a missing div problem for the default product page

= 3.4.2 =
- Fixed a linking error for additional images

= 3.4.1 =
- Fixed a jQuery conflict error

= 3.4.0 =
- Major changes in this update, so use caution when upgrading a production site!
- Added a new premium product page layout option, tabbed, which is completely responsive
- Added a lightbox option for the images on the product page
- Added a number of sidebar styling options
- Fixed a number of small CSS issues and functionality bugs

= 3.3.4 =
- Fixed a display issue with the mobile version of the custom product page

= 3.3.3 =
- Fixed a potential notice notification when working with SEO By Yoast

= 3.3.2 =
- Added extra links to support materials to the dashboard tab

= 3.3.1 =
- Added the option to display custom fields in the "List" view
- Fixed a mobile CSS styling issue
- Fixed a display issue with reordering products within categories

= 3.3.0 = 
- Added an option to include a product inquiry form (requires Contact Form 7 plugin)
- Added a number of styling options for the pagination buttons
- Fixed a couple of small bugs

= 3.2.7 =
- Condensed the "Options" tab so that it's easier to navigate

= 3.2.6 =
- Fixed an error where xls spreadsheets weren't allowed to be uploaded
- Fixed a grammatical error

= 3.2.5 =
- Fixed a bug that could erase all options and product page layouts on some installations

= 3.2.4 =
- Minor CSS update for to correct small problems in the recent update
- Minor javascript fix to correct for incorrect catalog height on some pages after recent update

= 3.2.3 =
- Major upgrade to plugin CSS to increase responsivenss (WARNING: may cause any Custom CSS added to not work correctly)
- Fixed a deprecated YouTube API error

= 3.2.2 =
- Blank options no longer show in the "Additional Options" area 
- Additional filtering options are now sorted alphabetically

= 3.2.1 =
- Fixed category label not displaying when products are filtered
- Fixed a javascript error most users were getting

= 3.2.0 =
- Added ability to sort order of products in category by dragging and dropping from the category details page
- Added ability to sort order of categories, sub-categories, tags and custom fields in the sidebar (careful when upgrading, removes alphabetical ordering)
- Hide/Show custom field sorting options
- Option to default show or hide custom fields
- Option to not display custom fields on the main catalog page if they are empty
- Added the "Custom CSS" box to the 'catalogs' tab
- Improved initial page load time slightly
- Fixed an error with xlsx file uploads

= 3.1.11 =
- Fixed a potential spreadsheet upload error

= 3.1.10 =
- Fixed a CSS conflict that occurs in the sidebar labels with some themes

= 3.1.9 =
- Made titles clickable in "Details" layout
- Fixed a potential extra div error

= 3.1.8 =
- Included a Greek translation
- Fixed a small product pages bug

= 3.1.7 =
- Fixed a custom fields display error
- Fixed a tag groups tag display error

= 3.1.6 =
- Fixed an error with file downloads on custom product pages

= 3.1.5 =
- Fixed a potential error with product descriptions containing HTML tags

= 3.1.4 =
- Fixed a related products linking error
- Fixed extra text at the end of exports
- Fixed a warning on the "options" page
- Fixed a number of PHP warnings
- Fixed a minor potential security issue for malicious authenticated users

= 3.1.3 =
- Security fix for potential SQL-injection, depending on Options settings

= 3.1.2 =
- Security fix for spreadsheet uploads

= 3.1.1 =
- Fixed a selector conflict with WP Super Cache
- Fixed a number of PHP notices

= 3.1.0 =
- Added SEO By Yoast Integration
- Added ability to add YouTube videos for products
- Added ability to group tags
- Added option to display additional product information on the right side of the product page
- Added ability to sort additional images
- Added ability to export to CSV
- Switched the default action when editing an item so that admins remain on the edit page
- Fixed a bug with the "file" custom field type
- Fixed an include error for the admin area

= 3.0.16 =
- Fixed an error with the recent and random product widgets

= 3.0.15 =
- Fixed an error with Next/Previous products

= 3.0.14 =
- Fixed a mobile pagination error
- Fixed a text filtering problem with pagination

= 3.0.13=
- Fixed a small display bug

= 3.0.12 =
- Fixed an error with the access role option

= 3.0.11 =
- Fixed a mobile display issue
- Fixed an error with setting user access role

= 3.0.10 =
- Added a new premium option to set the user role that can access the plugin menus

= 3.0.9 =
- Fixed a related products link error

= 3.0.8 =
- Made searcing more than one custom field at a time possible
- Returned the missing category labels on category pages

= 3.0.7 =
- Fixed a mobile page display error

= 3.0.6 =
- Removed some debugging code accidentally left in from the last update

= 3.0.5 =
- Fixed an error on for checkbox custom field types

= 3.0.4 =
- Fixed a Tags display problem with category items in catalogs

= 3.0.3 =
- Fixed an error with filtering and labels
- Fixed a List-view height adjustment problem

= 3.0.2 =
- Fixed a repeating div that would be added in AJAX filtering

= 3.0.1 =
- Fixed a filtering error

= 3.0.0 =
- Added the ability to search custom fields
- Added a new display style for the catalog
- Added arguments to the new "insert-products" shortcode, so that products from a category or sub-category can be displayed
- Fixed a number of small display bugs

= 2.6.1 =
- Changed the behaviour of the new insert-products shortcode, when a catalogue_url is included

= 2.6 =
- Added 3 widgets, which let users display a number of products
- Added a new shortcode, insert-products, which lets users insert a small number of products
- Added next/previous products for individual products
- Added related products feature for individual products
- Fixed a "Back to catalogue" potential link error
- Fixed an image display problem with https sites

= 2.5.12 =
- Fixed error where links would not open in new windows even with the option set

= 2.5.11 =
- Added a search box for products
- Fixed a translation filtering error
- Fixed a redirect error for sub-domains using default WordPress permalink structure

= 2.5.10 =
- Fixed a small product pages bug

= 2.5.9 = 
- Fixes an important jquery error on non-plugin pages

= 2.5.8 =
- Fixed a linking error for users using the default WordPress link structure

= 2.5.7 =
- Added a label for "Back to catalogue"
- Added an option to not maintain filtering between page loads, to address some redirection issues
- Fixed an export to Excel error
- Fixed a filtering error on custom product pages

= 2.5.6=
- Correct version of Shortcodes.php file included with this version (sorry!)

= 2.5.5 =
- Included the missing "Export to Excel" files
- Added an option to turn on custom field slug conversions (which are not set to off by default)

= 2.5.4 =
- Filtering settings are preserved when using the "Back to catalogue" link
- Added an option to display a message when no products are found 
- Added a label for the placeholder text in the text search field

= 2.5.3 =
- Fixed a checkboxes error with custom fields
- Additional fix for products not displaying on homepage

= 2.5.2 =
- Fixed a bug that didn't allow catalogues to be displayed on home pages
- Fixed a labelling search bug

= 2.5.1 =
- Added custom fields to Fancyboxes

= 2.5 =
- Allows relabelling of some front-end text, the first in a series of major new features being rolled out over the next few weeks

= 2.4.43 =
- Fixes an image switching error with mobile product pages
- Support for FancyBox for WP is being dropped. We believe the plugins will still work together to create a FancyBox for each product, but we're no longer actively supporting that feature.

= 2.4.42 =
- Fixed a mobile custom product page bug

= 2.4.41 =
- Made the selector for custom product page list elements more selective
- Added a div around custom fields in the thumbnail and details layouts, so that they can displayed or hidden
- Included an improved version of the Brazillian Portugese translation

= 2.4.40 =
- Fixed two potential admin display issues

= 2.4.39 =
- Shortcodes can be used in "text" custom elements
- Fixes custom product page element styles

= 2.4.38 = 
- Removes the grey background from custom product page elements

= 2.4.37 =
- Fixed a potential filtering error

= 2.4.36 =
- New premium feature: ability to export all products to Excel!

= 2.4.35 =
- Added the abilit to put [upcp-price] in a product's description, to include the product's price

= 2.4.34 =
- Fixed a bug on the sub-category details page

= 2.4.33 =
- Fixed a commenting error with AJAX searches

= 2.4.32 =
- Added support for additional shortcodes inside of descriptions

= 2.4.31 =
- Fixed the translation bug where no products would display if "Name" had been translated

= 2.4.30 =
- Fixed a spreadsheet upload warning when no custom fields existed

= 2.4.29=
- Added a new .pot file with many of the missing strings
- Fixed an error that was preventing images from being uploaded

= 2.4.28 = 
- Prices with text and currency signs will now be sorted correctly
- Fixed sorting so that products stay sorted after selecting a category, sub-category or tag

= 2.4.27 =
- Added tooltip help for the "Options" tab
- Made it easier to identify category, sub-category and tag IDs
- Fixed an error where products deleted from catalogues were left in as blank entries

= 2.4.26 =
- Custom product pages minor update
- Fixed a fields label error

= 2.4.25 =
- Added hierarchical sub-categories as a sidebar option 

= 2.4.24 =
- Fixed a product pages CSS error

= 2.4.23 =
- Fixed a javascript error with image zooming in FancyBox
- Updated to the newest version of Gridster

= 2.4.22 =
- Fixed a sorting PHP warning

= 2.4.21 =
- Categories, Sub-Categories and Tags are now listed alphabetically
- Added an option to add pagination links to the bottom of the page
- Fixed a small jQuery error

= 2.4.20 =
- Fixed an error with "Checkbox" type custom fields

= 2.4.19 =
- Fixed a "Custom Product Pages" error
- Fixed an error where the "Product Sort" option was not displaying on the "Options" page

= 2.4.18 =
- "catalogue ID" can now be included in spreadsheet product uploads to add a product directly to a certain catalogue
- Eliminated "Mobile Stylesheet" as an option, since there is a custom mobile layout option
- Fixed a product page bug that didn't allow images at the start of a product description
- Eliminated the max-width and max-height restrictions on main images on custom product pages
- Renamed French and Spanish translation files so that they should work correctly
- Fixed a bug where mobile layout images couldn't be swapped

= 2.4.17 =
- Fixed a product page error

= 2.4.16 =
- Fixed a product page error
- Fixed the "Back to catalogue" link

= 2.4.15 =
- Added a second custom product display, "Mobile", that can be used for small-screen devices
- Added options to customize the "Sort By" box so that it can be eliminated or reduced

= 2.4.14 =
- Product link can now be included in a spreadsheet upload
- An XML sitemap of the products in a catalogue is automatically generated each time a product is created or edited

= 2.4.13 =
- Tags should now display correctly on custom product pages
- Categories, Sub-Categories and Tags can now be added as URL parameters (categories, subcategories, tags are the parameters)

= 2.4.12 =
- In the sidebar, Category, Sub-Category and Tag checkboxes should now be ordered by date created

= 2.4.11 =
- Current layout is now saved when visitors switch pages using pagination
- Fixed a height error for pagination

= 2.4.10 =
- Fixed an error when custom fields and tags were uploaded in the same sheet

= 2.4.9 =
- Fixed two custom product page image bugs

= 2.4.8 =
- Added an option to deal with Custom product pages on mobile devices

= 2.4.7 =
- Fixed category and sub-category count when pagination is being used

= 2.4.6 =
- Fixed sorting by name error

= 2.4.5 =
- Extended "AND" logic for Tags to AJAX filtering
- Fixed a small error with "Delete All Products"

= 2.4.4 =
- Fixed the filtering errors with "Molbile Stylesheet"

= 2.4.3 =
- Fixed a responsive CSS error that was stopping clicks from being able to be clicked

= 2.4.2 =
- Fixed an error where multiple custom fields being uploaded from a spreadsheet would sometimes fail
- Added a Russian translation

= 2.4.1 =
- Fixed a custom fields error
- Changed the text on the product pages restore confirmation

= 2.4 =
- Added pagination, allowing large catalogues to be split onto multiple pages
- Fixed a small display error
 
= 2.3.12 =
- catalogue product count should now be accurate
- Product page grid widths, heights and margins are now adjustable
- "Restore Default" button added to the individual product pages
- Made saving of a custom layout an explicit action instead of saving each time an action was performed

= 2.3.11 =
- It is now possible to put code into the "Image" field instead of the URL of an image (ex: to add a slideshow for a product instead of an image)
- Added a visual editor for "Description" instead of a plain text area input
 
= 2.3.10 = 
- Made it possible to upload "slugs" from a spreadsheet

= 2.3.9 = 
- Updated CSS for single product pages for small screen devices
- Added a advisory on the Custom Product Pages feature tab
- Added a Dutch translation

= 2.3.8 = 
- Fixed a spreadsheet upload bug

= 2.3.7 = 
 - Added a new product search option
 - Fixed an error on the "Product Page" tab
 - Added Spanish translation files

= 2.3.6 = 
- Fixed a search error related to the new options

= 2.3.5 = 
- Make searching more than 1 category at a time possible
- Added an option to search product description as well as name
- Fixed a problem that prevented most users from using the custom product pages feature
- Fixed a number of small CSS problems

= 2.3.4 = 
- Fixed a spreadsheet upload error

= 2.3.3 =
- Fixed a permalinks error after AJAX sorting
- Fixed a "Read more" link error

= 2.3.2 =
- Fixed a JQuery error

= 2.3.1 =
- Fixed a product count error

= 2.3 =
- New premium feature: custom product page design, let's you drag and drop product pages to change the layout in the back-end
- Contact forms and PayPal buttons can be included on product pages with the new layout feature
- Added the ability to add multiple additional images at once
- Custom fields can now be uploaded with products being uploaded by spreadsheet (Limited testing, please let us know if you find any errors with this)
- Added a new custom field type, file, so that PDF's and other files can be included with products
- Added a "Details" image option, so that the arrow can be replaced with any image of your choosing
- Added an italian language translation
- Fixed a small spreadsheet error

= 2.2.12 =
 - Fixed a display bug for individual product pages

= 2.2.11 =
- Major custom fields improvement: allow fields to be displayed on main catalogue pages
- Minor css upgrades to the main catalogue pages

= 2.2.10 =
- Fixed an individual product pages bug

= 2.2.9 =
- Fixed the pretty permalinks rewrites to be compatible with recent WordPress updates
- Added a "Delete All Products" button
- Added the ability to require confirmation
- Added Turkish as a language option

= 2.2.8 =
- Disabled the "Enter" function on the search form
- Fixed spreadsheet upload bugs
- Fixed FancyBoxes after AJAX search

= 2.2.7 =
- Fixed "custom fields" error with no validation entered

= 2.2.6 =
- Added French as a supported language
- Improved the AJAX search function

= 2.2.5 =
- Added css support for a large number of new themes

= 2.2.4 =
- Added case-insensitive search for AJAX filtering

= 2.2.3 =
- Small update for uploading products from spreadsheets

= 2.2.2 =
- Bug fixes for custom fields
- Shortcodes can now be used in product descriptions

= 2.2.1 =
- Two small bug fixes

= 2.2 =
- New Premium feature: Custom Fields!
- Custom fields let you add fields to your products, that can be included in the description of your products via shortcode, so that you can have a common product template
- New feature: Non-displayed products
- Non-displayed products let you temporarily remove a product from all catalogues (ex: if it's out of stock)
- Tags can now be imported via spreadsheet
- catalogue height now adjusts depending on the size of the current layout
- Tutorial videos are available in the FAQ section

= 2.1.5 =
- Small bug fix
- Some language files added

= 2.1.4 =
- Three small fixes for the front-end and product page

= 2.1.3 =
- Small fix for "Tags" functionality with new AJAX filtering
- Small optimizations to return catalogue quicker after users filter the catalogue

= 2.1.2 =
- Beta AJAX catalogue filtering as an option
- Number of characters in a product's "details" view description added as an option
- Fixed a small catalogue detail's page bug

= 2.1 =
- Implemented view counting for products, based on clicks on title or image links
- Added mobile stylesheet (v1) and product sorting for premium users
- Increased compatibility for uploaded product spreadsheets (more forgiving of small errors in column names, better error reporting)
- Attempted to make tables compatible with MySQL strict mode
- Fixed an error where SEO friendly URL's stopped working shortly after being setup

= 2.0.1 =
- Added in the WordPress Uploader for product images
- SEO friendly single product URLs are now an option
- Plugin tables now use UTF8 encoding

= 2.0 =
- Added an 'Options' page
- Added 'Read More' as an option on the 'Options' page
- Added 'Color Scheme' as an option on the 'Options' page
- Added 'Tags Logic' as an option on the 'Options' page
- Added 'Product Links' as an option on the 'Options' page
- Implemented a premium version for new users