var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('minify', function() {
    console.log('minifying js ...');

    return gulp.src('./public/css/*.css')
        .pipe(concat('all.css'))
        .pipe(uglify({
            compress: {
                drop_console: true
            }
        }))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('watch-js', function() {
    gulp.watch('./public/css/*.css', ['minify'], function() {
        console.log('watching js changes...');
    });
});

gulp.task('default', ['watch-js'], function() {
    console.log('Executing gulp...');
});