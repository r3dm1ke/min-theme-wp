var gulp = require('gulp');
var zip = require('gulp-zip');

gulp.task('build', function() {
    return gulp.src('./src/**')
        .pipe(zip('min-dist.zip'))
        .pipe(gulp.dest('./build'));
});