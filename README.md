# Mybooking WordPress Theme

Mybooking WordPress Theme is a child theme for UnderStrap Theme Framework: https://github.com/understrap/understrap

## How it works

Mybooking WordPress Theme shares with the parent theme all PHP files and adds its own
funtions.php on top of the Understrap parent theme's functions.php.

## Installation

1. Go into your WP admin backend
2. Upload mybooking-wp-theme.zip
3. Go to "Appearance -> Themes"
4. Activate Mybooking WordPress Theme

WordPress will install the [parent theme](https://github.com/understrap/understrap) automatically.

## Editing

## Developing with NPM, Gulp, SASS and Browser Sync

### Installing dependencies

- Make sure you have installed Node.js and Gulp on your computer globally
- Open your terminal and browse to the location of the Mybooking WordPress Theme
- Run `$ yarn`

### Build

- To build styles run `$ gulp styles`

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
**NOTE: Localhost port depends of local server configuration.**

## Changelog

### Version 0.0.2
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

### Version 0.1.2
- Moved and renamed **home.php** to **mybooking-parts/mybooking-home.php**
- Added customized **index.php**
- Moved **mybooking-empty.php** to **mybooking-parts/**
- Added custom **page.php**
- Added **mybooking-parts/blog/mybooking-content-single** for custom posts
- Added **mybooking-parts/blog/mybooking-content-blog** for custom blog

### Version 0.1.3
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

### Version 0.1.4
- Added the cookies policy warning [from here](https://www.wimagguc.com/2018/05/gdpr-compliance-with-the-jquery-eu-cookie-law-plugin/)
- Cleaned **_carousel.scss**
- Cleaned payment icons on config page because are not used anymore
- Updated translation to en_GB and added de_DE
- New custom post type for vehicle reselling
- Custom post type activation option in Global Options settings page

### Version 0.1.5
- Added custom text on contact template
- Several translation updates and minor changes

### Version 0.2.0
- Added horizontal cards on choose vehicle process page
- Cleaned obsolet partials on footer
- Added YouTube icon on footer
- Added new fields on **mybookin-plugin-complete-tmpl.php**
- Updated translations
- Sticky topbar on Choose template

### 0.2.1
- New templates on **mybooking-templates/**
- Eliminated footer menu references
- Deprecation notice on Contact settings section (we'll eliminate on 1.0.0)
- Added the_content() hook on **mybooking-product-loop.php**

### 0.3.0
- New home header module with image/video/carousel background
- Reestructured options pages for new header options
- New custom post type Carousel
- Deleted obsolete partials related to old home header
