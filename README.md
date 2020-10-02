# Mybooking WordPress Theme

Mybooking WordPress Theme is designed to integrate Mybooking Engine funtionalities over WordPress, and fast developement of rental sites using Mybooking Reservation Engine plugin: https://wordpress.org/plugins/mybooking-reservation-engine/.

## How it works

Mybooking WordPress Theme could be used and customized standalone or using a child theme.

## Installation

1. Go into your WP admin backend
2. Upload mybooking-wp-theme.zip
3. Go to "Appearance -> Themes"
4. Activate Mybooking WordPress Theme

## Editing

## Developing with NPM, Gulp, SASS and Browser Sync

### Installing dependencies

- Make sure you have installed Node.js and Gulp on your computer globally
- Open your terminal and browse to the location of the Mybooking WordPress Theme
- Run `$ yarn`

### Build

- To build styles run `$ gulp styles`
- To build scripts run `$ gulp scripts`

### Browser Sync

Browsersync settings is setup in a gulpenv.json file. This file is not hold in Version Control. Please create it on the root folder of the theme and configure the proxy depending on your development environment.

```json
{
  "browserSyncOptions": {
    "proxy": "localhost:8888/mybooking",
    "notify": false
  }
}
```
**NOTE: Localhost port depends of your local server configuration.**

## Changelog

### 0.0.2
- Theme package renamed to Mybooking WordPress Theme and version number updated
- Added Whatsapp/Telegram field on Company Information options page wich is rendered on home topbar
- Eliminated placeholder texts for more layout flexibility
- Added a secondary widgets area on home header
- Two new layouts	for footer; Regular and Simple, and options page for administer them
- Footer elements separated in parts
- New classes on footer parts for styling
- New menus registered, for footer and topbar
- No more widgets on footer menu zone
- Adjustable columns on footer; now the active ones expands to all the space
- Now is possible to hide/show title and image on promos
- Several minor refactoring on code

### 0.1.2
- Moved and renamed **home.php** to **mybooking-parts/mybooking-home.php**
- Added customized **index.php**
- Moved **mybooking-empty.php** to **mybooking-parts/**
- Added custom **page.php**
- Added **mybooking-parts/blog/mybooking-content-single** for custom posts
- Added **mybooking-parts/blog/mybooking-content-blog** for custom blog

### 0.1.3
- Refactorized **mybooking-top-bar.php** to include info icons inside anchors
- Added new classes at topbar for correct visualization on responsive view
- Fixed bad columns align on **mybooking-home-news.php**
- Added Google Analytics code and configuration
- Refactorized footer layouts; now we have minimal & regular
- Global responsive fixins on footer, header & plugin process templates
- Striped out Promos Features & Highlight because we can replicate with Elementor
- New header layout with one column and his configuration
- Now we can setup header image via configuration instead CSS
- Custom template for pages with header image and sidebar
- Added image to 404 page
- Eliminated the topbar widget area
- Updated translations
- Lots of minor fixins

### 0.1.4
- Added the cookies policy warning [from here](https://www.wimagguc.com/2018/05/gdpr-compliance-with-the-jquery-eu-cookie-law-plugin/)
- Cleaned **_carousel.scss**
- Cleaned payment icons on config page because are not used anymore
- Updated translation to en_GB and added de_DE
- New custom post type for vehicle reselling
- Custom post type activation option in Global Options settings page

### 0.1.5
- Added custom text on contact template
- Several translation updates and minor changes

### 0.2.0
- Added horizontal cards on choose vehicle process page
- Cleaned obsolet partials on footer
- Added YouTube icon on footer
- Added new fields on **mybookin-plugin-complete-tmpl.php**
- Updated translations
- Sticky topbar on Choose template
- New reservation template for process

### 0.2.1
- Eliminated footer menu references
- Deprecation notice on Contact settings section (we'll eliminate on 1.0.0)
- Added the_content() hook on **mybooking-product-loop.php**

### 0.3.0
- New home header module with image/video/carousel background
- Reestructured options pages for new header options
- New custom post type Carousel
- Deleted obsolete partials related to old home header

### 0.4.0
- New navigation with widget modals and custom options

### 0.5.0
- New reservation widget and process wizard style

### 0.5.1
- Reworked header backgrounds for better responsiveness

### 0.6.0
- Mybooking now is a parent theme!!!

### 0.6.1
- Added theme suport and customizer options
- Updated container and pagination hooks
- Refactorized functions.php

### 0.6.2
- Elementor content area displacement solved
- CSS adjustements

### 0.6.3
- Added old parent functions for posts

### 0.6.4
- New wizard selector

### 0.6.5
- Solves header background issues reported at https://github.com/mybooking-es/mybooking-wp-theme/issues/8

### 0.6.6
- Fixing for news home posts and testimonials

### 0.6.7
- Fixed navigation panel's icon height
- Solves header widget areas issues reported at https://github.com/mybooking-es/mybooking-wp-theme/issues/10
- New widget area next to primary menu requested at https://github.com/mybooking-es/mybooking-wp-theme/issues/11

### 0.6.8
- Refactorized Header background image/video/carousel CSS for better screen adaptation

### 0.6.9
- Now navigation walker supports 3 levels

### 0.6.10
- Connection to external payment gateways

### 0.6.11
- Testimonials can have images now, with default avatar fallback

### 0.6.12
- Custom properties rocks!
- Navigation refactorized
- WPML support

### 0.6.13
- Navigation panels with titles
- Contact page options now on Global settings
- Added topbar message area

### 0.7.0
- Home widgets grid for content promotion
- Popup content post type
- Theme configuration refactorized and unified
- Deprecated functions cleaned

### 0.9.0
- Customizer on steroids! Now we have all style options grouped on native WordPress panels
- Mybooking settings menu cleaned and tabbed

### 0.9.1
- Contact Page setting titles fixed

### 0.9.2
- Header Widget areas overlaping solved

### 0.9.3
- Customizer menu order rearrangement
- Footer color controls

### 0.9.4
- Panelized cutomizer settings
- Home settings shown only when editing home page
- Color controls for topbar notice

### 0.9.4.1
- Simplified home content widgets areas and controls now on customizer

### 0.9.4.2
- New hide home header control. Now is possible to make totaly customized homepages.
- New controls on customizer to allow change home sections order's

### 0.9.5
- Woocommerce basic support

### 0.9.6
- Gutenberg support for blocks and editor
- Container control for navigation and topbar
- Default colors for advanced mode updated

### 0.9.7
- Little fixins on Gutenberg styles
- Footer and Navbar color are no more an advanced option
- Solved issue #18 related to stacked slider images on load

### 0.9.8
- Refactorization of vehicle Custom Post Type, now more generic
- Refactorization of cookies notice to avoid reported i18n issues
- Spanish translation update

### 0.9.9

##### Added
- Added activities templates
- Promotions Popup
- Added a common class to all widget containers
- Added Activities templates

##### Updated
- Realigned default footer elements
- Woo products now match card styles on choose step
- Minor style adjustements on woo product details
- Now blog page has two columns and right sidebar
- Added header based on featured image to single posts
- Unified all post related styles in the same document
- Refactorized Contact template with Bootstrap markup and minimal classes
- Fixed blog post header image centering

##### Fixed
- Fixed Testimonial white margin on mobile devices
- Fixed selector date input overflow
- Fixed selector rendering in Mybooking Pages template
- Arranged some Woocommerce minor errors
- Refactorized and fixed Mybooking Pages template, and now is Mybooking Landing
- Fixed missing posts default-image
- Fixed issue with multiple word navigation items

### 0.9.10

#### Updated
- Custom Post Types are no more on the theme, they moved to the plugin
- Vehicles CPT and loop will be a separated plugin in the future
- Moved theme settings under Appearance menu and CPT configuration to the plugin settings

#### Added
- New widgets area at home's bottom to make room for Testimonials shortcode and anything else

#### Fixed
- Theme validation adjustements previous to publishing
