const gulp = require('gulp');
const zip = require('gulp-zip');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const cleanCss = require('gulp-clean-css');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const clean = require('gulp-clean');

sass.compiler = require('node-sass');

gulp.task('copy', function () {
    return gulp.src(['./src/**/*', '!./src/scss', '!./src/scss/**/*'])
        .pipe(gulp.dest('./dist'))
});

gulp.task('clean', function () {
    return gulp.src('./dist/*')
        .pipe(clean({read: false}))
});

gulp.task('sass', function () {
    return gulp.src('./src/scss/bundle.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('sass:build', function () {
    return gulp.src('./src/scss/bundle.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([autoprefixer]))
        .pipe(cleanCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./src/scss/**/*.scss', ['sass'])
});


gulp.task('dev:watch', function () {
    return gulp.watch('./src/**/*', gulp.series('clean', 'sass', 'copy'))
});

gulp.task('dev', gulp.series('clean', 'sass', 'copy', 'dev:watch'));

gulp.task('build', gulp.series('clean', 'sass:build', 'copy'), function() {
    return gulp.src('./dist/**')
        .pipe(zip('min-dist.zip'))
        .pipe(gulp.dest('./build/dist.zip'));
});