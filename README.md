# Mybooking WordPress Theme

## About

We usually use Bootstrap as CSS Frameword and we wanted to use it on WordPress. We started creating a child theme from [Understrap](https://github.com/understrap/understrap), but finally we decided to create a fork from it, so we can fully customize it. This is the theme we are using on our WordPress projects.

## License

Mybooking WordPress Theme, Copyright 2020 MyBooking
Mybooking is distributed under the terms of the GNU GPL version 2

See [license](LICENSE.md)

## Changelog

See [changelog](CHANGELOG.md)

## Features

MyBooking is a simple theme but allow to customize the colors and offers three
templates to easy build a company website.

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
