// Defining requirements
var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
var rename = require("gulp-rename");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rimraf = require("gulp-rimraf");
var sourcemaps = require("gulp-sourcemaps");
var cleanCSS = require("gulp-clean-css");
var autoprefixer = require("gulp-autoprefixer");
var gulp = require("gulp");
var browserSync = require("browser-sync").create();

// Configuration file to keep your code DRY
var cfg = require("./gulpconfig.json");
var paths = cfg.paths;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task("watch", function () {
  gulp.watch(`${paths.dev}/sass/**/*.scss`, gulp.series("styles"));
  gulp.watch(
    [
      `${paths.dev}/js/**/*.js`,
      "js/**/*.js",
      "!js/theme.js",
      "!js/theme.min.js",
    ],
    gulp.series("scripts")
  );
});

// ---------- SASS + CSS MANAGEMENT ---------------------------

// Copy jQuery UI images into dist images folder
gulp.task("cssimages", function () {
  return gulp
    .src(paths.dev + "/sass/vendor/jquery.ui.custom/images/*.{jpg,gif,png}")
    .pipe(gulp.dest(paths.css + "/images"));
});

// Copy Slick images into dist css folder
gulp.task("css-slick-images", function () {
  return gulp
    .src(paths.dev + "/sass/vendor/slick/ajax-loader.gif")
    .pipe(gulp.dest(paths.css));
});

// Copy slick fonts into dist css/fonts folder
gulp.task("css-slick-fonts", function () {
  return gulp
    .src(paths.dev + "/sass/vendor/slick/fonts/*.{eot,svg,ttf,woff}")
    .pipe(gulp.dest(paths.css+"/fonts"));
});

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task("sass", function () {
  var stream = gulp
    .src(`${paths.dev}/sass/*.scss`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(sass({ errLogToConsole: true }))
    .pipe(autoprefixer("last 2 versions"))
    // NOTE: Wordpress Theme can not contain .map
    //.pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
  return stream;
});

// Run:
// gulp minifycss
// Minify theme.css
gulp.task("minifycss", function () {
  return gulp
    .src(paths.css + "/theme.css")
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: "*" }))
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(rename({ suffix: ".min" }))
    // NOTE: Wordpress Theme can not contain .map
    //.pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
});

// Run:
// gulp styles
// Compile Sass and minify css
gulp.task("styles", gulp.series("sass", "minifycss", "cssimages", "css-slick-images", "css-slick-fonts"));

// ---------- Local Server  -------------------------------------------------

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task("browser-sync", function () {
  var cfgdev = require("./gulpenv.json");
  browserSync.init(cfg.browserSyncWatchFiles, cfgdev.browserSyncOptions);
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task("watch-bs", gulp.parallel("browser-sync", "watch"));

// ----------------------------- JS MANAGEMENT --------------------------------

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task("scripts", function () {
  var scripts = [
    // Start - All BS4 stuff
    `${paths.dev}/js/bootstrap4/bootstrap.bundle.js`,

    // End - All BS4 stuff

    `${paths.dev}/js/skip-link-focus-fix.js`,
    `${paths.dev}/js/vendor/mobile-detect/mobile-detect.js`,
    `${paths.dev}/js/vendor/slick/slick.js`,
    `${paths.dev}/js/vendor/jquery-eu-cookie/jquery-eu-cookie-law-popup.js`,

    // Adding currently empty javascript file to add on for your own themes´ customizations
    // Please add any customizations to this .js file only!
    `${paths.dev}/js/custom-javascript.js`,
  ];
  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("theme.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));

  return gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("theme.js"))
    .pipe(gulp.dest(paths.js));
});

// Copy Fontawesome fonts into dist folder
function fontawesome() {
  return gulp
    .src(
      "./node_modules/@fortawesome/fontawesome-free/webfonts/*.{woff,woff2,eot,svg,ttf}"
    )
    .pipe(gulp.dest(paths.fonts + "/fontawesome"));
}

exports.fontawesome = fontawesome;
