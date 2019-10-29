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
- Two new layout for footer; Regular and Simple, and and options page for administer them
- Footer elements separated in parts
- New classes on footer parts for styling
- New menus registered, for footer and topbar
- No more widgets on footer menu zone
- Adjustable columns on footer; now the active ones expands to all the space
- Now is possible to hide/show title and image on promos
- Several minor refactoring on code
