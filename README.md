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
**Version:** 2.0.1  
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

It is an special template used to build the homepage. 

The home template has the following areas that are rendered in the following order

- The header
- MyBooking Home Template Top widgets
- Content 
- Mybooking Home Template Center widgets
- News
- MyBooking Home Template Bottom widgets

In the customizer > Home Page you can configure which of this components will be shown

##### The header

The header can be configured in the customizer: MyBooking Theme > Header

It renders a background that can be made by a photo, a video or a carrousel.
In two the background two widget areas are available, mybooking_home_derecha (at right)
and mybooking_home_izquierda (at left). 

The layout can also be configured in the customizer. It means the width porcentage
of the widgets areas and if the must be placed in columns or in rows.

##### Top widgets area

It allows to place some widgets between the header and the content.

##### The content

Where the page content is placed

##### Center Widgets

There are up to three widgets areas that can used below the content. They are shown in
a row.

##### News

The last three posts are show

##### Bottom widgets

Below the news another widget area that can be used to render extra information.

#### MyBooking Contact Template

It is a basic template to create a contact page. It shows the map with the location
of the company office. Moreover, it has a widget area where any contact form can
be placed. It can be integrated with any plugin that offers a contact form as a
widget.

#### MyBooking Landing Template

It is a template used to create landing pages with the page featured image at full
width an a widget area to include any required widget.

#### MyBooking Empty Template

It is an empty template that can be used with any page builder to create custom contents.
It does not show the page title.

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

### Dependencies

- node v.12.13.0
- gulp v.4.0.2
- yarn v.1.22.19

### Installing dependencies

- Make sure you have installed Node.js and Gulp and Yarn on your computer globally
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

