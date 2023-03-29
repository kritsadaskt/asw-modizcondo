var gulp = require('gulp');
var less = require('gulp-less');
var watch = require('gulp-watch-less');
var path = require('path');

gulp.task('less', function () {
    return gulp.src('styles/style.less')
        .pipe(less())
        .pipe(gulp.dest('styles'));
});

gulp.task('watch', function() {
    gulp.watch('styles/*.less', ['less']);
});