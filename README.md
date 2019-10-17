# Mybooking Understrap Child Theme

Mybooking Child Theme for UnderStrap Theme Framework: https://github.com/understrap/understrap

## How it works

Mybooking Understrap Child Theme shares with the parent theme all PHP files and adds its own
funtions.php on top of the Understrap parent theme's functions.php.

## Installation

1. Install the parent theme Understrap first. https://github.com/understrap/understrap
2. Upload mybooking-wp-theme folder to your wp-content/themes directory
3. Go into your WP admin backend
4. Go to "Appearance -> Themes"
5. Activate Mybooking WordPress Theme

## Editing

## Developing with NPM, Gulp, SASS and Browser Sync

### Installing dependencies

- Make sure you have installed Node.js and Gulp on your computer globally
- Open your terminal and browse to the location of the Mybooking Understrap Child Theme
- Run `$ yarn`

### Build

- To build styles run `$ gulp styles`

### Browser Sync

Browsersync settings is setup in a gulpenv.json file. This file is not hold in Version Control. Please
create it on the root folder of the theme and configure the proxy depending on your development environment.

```json
{
  "browserSyncOptions": {
    "proxy": "localhost:8888/mybooking",
    "notify": false
  }
}
```