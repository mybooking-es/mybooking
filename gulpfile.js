// Defining requirements
var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
var rename = require("gulp-rename");
var rimraf = require("gulp-rimraf");
var sourcemaps = require("gulp-sourcemaps");
var cleanCSS = require("gulp-clean-css");
var autoprefixer = require("gulp-autoprefixer");

// Configuration file to keep your code DRY
var cfg = require("./gulpconfig.json");
var paths = cfg.paths;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task("watch", function() {
  gulp.watch(`${paths.sass}/**/*.scss`, gulp.series("styles"));
});

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task("sass", function() {
  var stream = gulp
    .src(`${paths.sass}/*.scss`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit("end");
        }
      })
    )
    .pipe(sass({ errLogToConsole: true }))
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
  return stream;
});

// Run:
// gulp minifycss
// Minify child-theme.css
gulp.task("minifycss", function() {
  return gulp
    .src(paths.css + "/child-theme.css")
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: "*" }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit("end");
        }
      })
    )
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
});

// Run:
// gulp styles
// Compile Sass and minify css
gulp.task("styles", gulp.series("sass", "minifycss"));
