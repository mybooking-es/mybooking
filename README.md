[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](http://www.gnu.org/licenses/gpl-2.0.html)

# Mybooking WordPress Theme

## About

We usually use Bootstrap as a CSS Frameword for developing webapps and we wanted to use it on WordPress. 
We started creating a child theme from [Understrap](https://github.com/understrap/understrap), but finally we decided to create our own
theme, so we can fully customize it. 

---

**Theme Name:** MyBooking  
**Theme URI:** https://github.com/mybooking-es/mybooking  
**Contributors:** MyBooking Team - hectorasencio marcelreig juanmiqueo 
**Requires at least:** WordPress 5.2  
**Version:** 0.9.39  
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

These are the main components of the theme:

### Notification area

It is shown at top of any pages. It is only visible if a widget is added to the
Top Notification Widget Area.

It can be used to show notification messages.

### TopBar

It is shown at top, below the notification area and above the navigation menu.

It shows the contact information and has a widget area at right, where any widget
like social media links can be placed. 

### Footer

The footer has 4 widgets areas, so different information can we placed there.

### Templates

MyBooking theme defines three templates:

1. MyBooking Home to create the home page with a background image, video or slide.
2. MyBooking Contact to create the contact page with map and contact form.
3. MyBooking Empty to use Elementor or any Page Builder.

#### MyBooking Home Template

It is an special template used to build the homepage. Below the navigation menu
is shown an image/video/carrousel with two widgets areas, Header Right and Header
Left, so a message or form can be placed over the image.

Moreover it has some areas that widgets areas that are show above and below the
page content. They allow to place any widget like banners, news, testimonials, a
map, ... so it can be used to show dynamic content.

#### MyBooking Contact Template

It is a basic template to create a contact page. It shows the map with the location
of the company office. Moreover, it has a widget area where any contact form can
be placed.

#### MyBooking Empty Template

It is an empty template that can be used with any PageBuild to create custom contents.

### Customizer

Colors, typography and layout can be configured in the customizer. It allows to 
customize the aspect of the website.

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

See [license](LICENSE.md)

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

Mybooking is derived from Understrap, Copyright 2013-2018 Holger Koenemann. Understrap theme is distributed under license GPL V2

