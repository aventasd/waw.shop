const gulp = require('gulp'),
    babel = require('gulp-babel'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    watch = require('gulp-watch'),
    cleanCSS = require('gulp-clean-css');

gulp.task('default', function () {
    gulp.src([
        'assets/js/main.js',
        'assets/js/filters.js',
        'assets/js/products.js',
        'assets/js/my_account.js',
        'assets/js/cart.js'])

        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        .pipe(concat('dist.js'))
        .pipe(gulp.dest('assets/js/build'));
});

gulp.task('plugins', function () {
    gulp.src([

       'assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js'
    ])

        .pipe(uglify())
        .pipe(concat('plugins.js'))
        .pipe(gulp.dest('assets/js/build'));
});


gulp.task('css-plugin', () => {
    return gulp.src([
        'assets/css/owl.carousel.min.css',
        'assets/css/owl.theme.default.min.css',
        'assets/fonts/iconic/css/material-design-iconic-font.min.css',
        'assets/fonts/fa/css/fontawesome-all.min.css',
        'assets/jquery-ui-1.12.1/jquery-ui.min.css',
        'assets/css/jquery.mmenu.all.css',
        'assets/mmenu/hamburgers.css',
        'assets/css/selectric.css'

    ])
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('plugin.css'))
        .pipe(gulp.dest('assets/css/build'));
});


gulp.task('css', () => {
    return gulp.src([
        'assets/css/style.css',
        'assets/css/style_catalog.css',
        'assets/css/style_cart.css'
    ])
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('dist.css'))
        .pipe(gulp.dest('assets/css/build'));
});




gulp.task('cur', function () {
    gulp.src([
        'assets/js/jquery.formatCurrency-1.4.0.js' ])
        .pipe(uglify())
        .pipe(concat('plugin.js'))
        .pipe(gulp.dest('assets/js/build'));
});


gulp.task('stream', function () {
    // Endless stream mode
    return watch('css/**/*.css', { ignoreInitial: false })
        .pipe(gulp.dest('build'));
});


gulp.task('concat', function() {
    gulp.src('assets/js/build/*.js')
        .pipe(concat('dist.js'))
        .pipe(gulp.dest('dist'));
});
