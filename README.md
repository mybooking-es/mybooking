# Mybooking WordPress Theme

## About

We usually use Bootstrap as a CSS Frameword for developing webapps and we wanted to use it on WordPress. 
We started creating a child theme from [Understrap](https://github.com/understrap/understrap), but finally we decided to create our own
theme, so we can fully customize it. This is the theme we are using on our WordPress projects.

---

**Theme Name:** MyBooking  
**Theme URI:** https://github.com/mybooking-es/mybooking  
**Contributors:** MyBooking Team - hectorasencio marcelreig juanmiqueo 
**Requires at least:** WordPress 5.2  
**Version:** 0.9.31  
**License:** GPLv2 or later  
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html  
**Tags:** e-commerce

## Changelog

See [changelog](CHANGELOG.md)

## Features

MyBooking is a simple theme but allow to customize the colors and offers three
templates to easy build a company website.

- Boostrap integration 4.4
- Font Awesome integration 5.0
- Customizer
  - Header and Footer
  - Colors and Typography
- Widgets areas
  - Notification Top Bar
  - TopBar
  - Footer
  - Special areas on MyBooking Home Template to build complex home pages
- Custom templates

### Header and Footer

1. Header with notification and top bar areas where widgets can be placed
2. Footer with four widgets areas

### Templates

1. MyBooking Home to create the home page with a background image, video or slide.
2. MyBooking Contact to create the contact page with map and contact form.
3. MyBooking Empty to use Elementor or any Page Builder.

### Customizer

1. Customize colors (brand primary and secondary, navigation bar and so on)
2. Typography

## Installation

1. Go into your WP admin backend
2. Upload mybooking.zip
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

## Copyright 

MyBooking WordPress Theme, Copyright 2020 mybooking.es. Mybooking is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

Mybooking is derived from Understrap, Copyright 2013-2018 Holger Koenemann. Understrap theme is distributed under license GPL V2

See [license](LICENSE.md)
