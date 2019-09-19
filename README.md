# Mybooking Understrap Child Theme

Mybooking Child Theme for UnderStrap Theme Framework: https://github.com/understrap/understrap

## How it works

Mybooking Understrap Child Theme shares with the parent theme all PHP files and adds its own
funtions.php on top of the Understrap parent theme's functions.php.

IT DOES NOT LOAD THE PARENT THEMES CSS FILE(S)! Instead it uses the UnderStrap Parent Theme as a dependency via npm and compiles its own CSS file from it.

Mybooking Understrap Child Theme uses the Enqueue method to load and sort the CSS file the right way instead of the old @import method.

## Installation

1. Install the parent theme Understrap first. https://github.com/understrap/understrap
2. Upload mybooking-wp-theme folder to your wp-content/themes directory
3. Go into your WP admin backend
4. Go to "Appearance -> Themes"
5. Activate Mybooking WordPress Theme

## Editing

## Developing with NPM, Gulp, SASS and Browser Sync

### Installing dependencies

Execute yarn

### Build

gulp styles
