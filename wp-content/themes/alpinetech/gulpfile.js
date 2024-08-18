var gulp = require('gulp'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    gutil = require('gulp-util'),
    plumber = require('gulp-plumber'),
    pug = require('gulp-pug'),
    cssnano = require('gulp-cssnano'),
    gls = require('gulp-live-server'),
    purgecss = require('gulp-purgecss'),
    livereload = require('gulp-livereload');
    connect = require('gulp-connect');
    autoprefixer = require('gulp-autoprefixer');
    browserSync = require('browser-sync').create();
    // babel = require('gulp-babel');
    // uglify = require('gulp-uglify');
    rootTheme = "speed/";    
    rootTheme = "topright/";
    rootTheme = "chusuken/";
    rootTheme = "alpinetech/";

//take sass
gulp.task('sass', () => {
  return gulp.src('./scss/*.scss')
    .pipe(plumber({ errorHandler: function(err) {
      browserSync.notify(err.message, 4000);
      this.emit('end');
    }}))
    .pipe(sass())
    .pipe(cssnano())
    .pipe(autoprefixer({cascade: false}))
    .pipe(gulp.dest('./css/'))
    .pipe(browserSync.stream());
});


gulp.task('pug', () => {
  return gulp.src([rootTheme+'html/*.pug', rootTheme+'html/**/*.pug'])
    .pipe(plumber({ errorHandler: function(err) {
      browserSync.notify(err.message, 4000);
      this.emit('end');
    }}))
    .pipe(
      pug({
        doctype: 'html',
        pretty: true
     })
    )
    .pipe(gulp.dest('./out/'+rootTheme))
    .pipe(browserSync.stream());
});


gulp.task('copyImg', () => {
  return gulp.src([rootTheme+'html/images/*', rootTheme+'html/images/**/*'])
        .pipe(gulp.dest('./out/'+rootTheme+'images/'))
        .pipe(browserSync.stream());
});
gulp.task('copyVendor', () => {
  return gulp.src([rootTheme+'html/vendor/*', rootTheme+'html/vendor/**/*', rootTheme+'html/vendor/**/**/*'])
        .pipe(gulp.dest('./out/'+rootTheme+'vendor/'))
        .pipe(browserSync.stream());
});

gulp.task('copyJs', () => {
  return gulp.src([rootTheme+'html/js/*', rootTheme+'html/js/**/*'])
        .pipe(gulp.dest('./out/'+rootTheme+'js/'))
        .pipe(browserSync.stream());
});

gulp.task('css-base', () => {
  return gulp
    .src('./out/'+rootTheme+'css/base.css')
    .pipe(
      purgecss({
        content: [
          './out/'+rootTheme+'*.html', 
          './out/'+rootTheme+'**/*.html',
          './out/'+rootTheme+'js/slick/*.js',
          './out/'+rootTheme+'**/**/*.js',
          './out/'+rootTheme+'**/*.js',
          './out/'+rootTheme+'js/common.js',
          './out/'+rootTheme+'vendor/anyview/*.js',
          './out/'+rootTheme+'vendor/owlcarousel/*.js',  './out/'+rootTheme+'js/*.js'],
          
      })
    )
    .pipe(cssnano())    
    .pipe(gulp.dest('./out/'+rootTheme+'css'))    
    .pipe(connect.reload());
});

gulp.task('copyCSS', () => {
  return gulp.src(['./out/'+rootTheme+'css/base.css', './out/'+rootTheme+'css/content.css'])
        .pipe(gulp.dest('../../Web PHP/alpinetech_wp/wp-content/themes/alpinetech/css/'))
        .pipe(browserSync.stream());
});

// .pipe(gulp.dest('../../Web PHP/alpinetech_wp/wp-content/themes/alpinetech/css'))


gulp.task('css-content', () => {
  return gulp
    .src('./out/'+rootTheme+'css/content.css')
    .pipe(
      purgecss({
        content: ['./out/'+rootTheme+'**/*.html', './out/'+rootTheme+'vendor/anyview/*.js', './out/'+rootTheme+'vendor/owlcarousel/*.js',  './out/'+rootTheme+'js/*.js']
      })
    )
    .pipe(cssnano())
    .pipe(gulp.dest('./out/'+rootTheme+'css'))
    .pipe(connect.reload());
});


//task connect

gulp.task('watch', function() {
  browserSync.init({
   //  server: 'http://localhost:8082'
  });
  gulp.watch(['./scss/*.scss', './scss/**/*.scss'], gulp.series('sass'));
//   gulp.watch([rootTheme+'html/*.pug', rootTheme+'html/**/*.pug', rootTheme+'theme/*.pug', rootTheme+'theme/**/*.pug'], gulp.series('pug'));
//   gulp.watch([rootTheme+'html/images/*', rootTheme+'html/images/**/*'], gulp.series('copyImg'));
//   gulp.watch([rootTheme+'html/js/*'], gulp.series('copyJs'));
//   gulp.watch([rootTheme+'html/vendor/*', rootTheme+'html/vendor/**/*'], gulp.series('copyVendor'));
})

gulp.task('default', gulp.series('pug', 'sass', 'copyImg', 'copyVendor', 'copyJs', 'watch'));
gulp.task('build', gulp.series('pug', 'sass', 'copyImg', 'copyVendor', 'copyJs', 'css-base', 'css-content', 'copyCSS'));


gulp.task('sass', gulp.series('sass', 'watch'));
