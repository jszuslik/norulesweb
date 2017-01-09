var devDomain = 'norulesweb.dev';
var gulp = require('gulp');
var sass = require('gulp-sass');
// var minifyCss = require('gulp-minify-css');
var browserSync = require('browser-sync').create();

gulp.task('default', function () {
    console.log("Starting gulp tasks....");
});
gulp.task('sass', function () {
   return gulp.src('./src/scss/**/*.scss')
       .pipe(sass().on('error', sass.logError))
       .pipe(gulp.dest('./'))
       .pipe(browserSync.reload({
           stream: true
       }))
});
gulp.task('watch', ['default','browserSync','sass'], function (){
    gulp.watch('src/scss/*.scss', ['sass']);
    gulp.watch('src/scss/*.scss', browserSync.reload);
    gulp.watch('src/js/**/*.js', browserSync.reload);
    gulp.watch('./*.php', browserSync.reload);
});
gulp.task('browserSync', function() {
    browserSync.init({
        logPrefix: devDomain,
        proxy: devDomain,
        port: 8081
    })
});