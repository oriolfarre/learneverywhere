/*
 * Dependencias
 */
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    cleanCSS = require('gulp-clean-css'),
    flatten = require('gulp-flatten'),
    replace = require('gulp-replace-path'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch')
    ;

var paths = {
    scss: [
        'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
        'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
        'resources/assets/sass/app.scss'
    ],

    js: [
        'node_modules/owl.carousel/dist/owl.carousel.min.js',
    ],

    css: [
        'public/css/app.css'
    ],

    font:[
        'node_modules/**/{font,fonts}/*.{eot,svg,ttf,woff,woff2}'
    ],

    locale: {
        summernote: [
            'node_modules/summernote/lang/summernote-es-ES.js'
        ]
    }
};

gulp.task('default', ['uglify', 'sass', 'clean-css', 'fonts']);

/*
 * Configuración de la tarea 'uglify'
 */
gulp.task('uglify', function () {
    return gulp.src(paths.js)
        .pipe(concat('libs.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
});

/*
 * Configuración de la tarea 'saas'
 */
gulp.task('sass', function () {
    return gulp.src(paths.scss)
        .pipe(concat('app.css'))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public/css'))
});

/*
 * Configuración de la tarea 'cleans-css'
 */
gulp.task('clean-css', ['sass'], function () {
    return gulp.src('public/css/app.css')
        .pipe(replace('font/', 'fonts/'))
        .pipe(replace('fonts/', './../fonts/'))
        .pipe(cleanCSS({compatibility: 'ie8', keepSpecialComments : 0}))
        .pipe(gulp.dest('public/css'))
});

/*
 * Configuración de la tarea 'fonts'
 */
gulp.task('fonts', function () {
    return gulp.src(paths.font)
        .pipe(flatten())
        .pipe(gulp.dest('public/fonts'));
});


gulp.task('watch', function () {
    return watch('resources/assets/sass/*.scss', function(){
        gulp.src(paths.scss)
            .pipe(concat('app.css'))
            .pipe(sass())
            .pipe(gulp.dest('public/css'));
    });
});
