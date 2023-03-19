'use strict';

const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const minifyCss = require('gulp-clean-css');
const concatCss = require('gulp-concat-css');
const rename = require("gulp-rename");

const pathRoot = './';

// server
function server() {
    browserSync.init({
        server: pathRoot,
        cors: true,
        ghostMode: false
    })
}

// build style libs
async function buildStyleLibs() {
    return await src([
        `${pathRoot}assets/scss/libs/*.scss`,
        'node_modules/owl.carousel/src/scss/owl.carousel.scss',
        'node_modules/jquery.scrollbar/sass/jquery.scrollbar.scss'
    ])
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/libs/css`))
        .pipe(browserSync.stream());
}
exports.buildStyleLibs = buildStyleLibs

// Task build fontawesome
async function buildFontawesomeStyle() {
    return await src([
        'node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss',
        'node_modules/@fortawesome/fontawesome-free/scss/brands.scss',
        'node_modules/@fortawesome/fontawesome-free/scss/solid.scss',
    ])
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(concatCss('fontawesome.css'))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest(`${pathRoot}assets/libs/css`))
        .pipe(browserSync.stream())
}
async function buildFontawesomeWebFonts() {
    return await src([
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.ttf',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.woff2',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.ttf',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.woff2'
    ])
        .pipe(dest(`${pathRoot}assets/libs/webfonts`))
        .pipe(browserSync.stream());
}
async function buildFontawesome() {
    await buildFontawesomeStyle();
    await buildFontawesomeWebFonts();
}
exports.buildFontawesome = buildFontawesome

// Task build style
async function buildStyles() {
    return await src(`${pathRoot}assets/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'))
        .pipe(browserSync.stream());
}
exports.buildStyles = buildStyles;

// Task build style elementor
async function buildStylesElementor() {
    return await src(`${pathRoot}assets/scss/elementor-addon/elementor-addon.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}extension/elementor-addon/css/`))
        .pipe(browserSync.stream());
}
exports.buildStylesElementor = buildStylesElementor;

// Task build style post
async function buildStylePost() {
    return await src(`${pathRoot}assets/scss/post/post.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/css/post/`))
        .pipe(browserSync.stream());
}
exports.buildStylePost = buildStylePost;

// Task build style page templates
async function buildStylePageTemplates() {
    return await src(`${pathRoot}assets/scss/page-templates/*.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/css/page-templates/`))
        .pipe(browserSync.stream());
}
exports.buildStylePageTemplates = buildStylePageTemplates

// Task build style shop
async function buildStyleShop() {
    return await src(`${pathRoot}assets/scss/shop/shop.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}extension/woocommerce/assets/css/`))
        .pipe(browserSync.stream());
}
exports.buildStyleShop = buildStyleShop;

// buildJSTheme
async function buildJSTheme() {
    return await src([
        `${pathRoot}assets/js/*.js`,
        `!${pathRoot}assets/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream());
}
exports.buildJSTheme = buildJSTheme

// Task compress mini library css theme
async function compressLibraryCssMin() {
    return await src([
        './node_modules/bootstrap/dist/css/bootstrap.css',
        './node_modules/owl.carousel/dist/assets/owl.carousel.css',
    ]).pipe(concatCss("library.min.css"))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(dest(`${pathRoot}assets/css/`))
        .pipe(browserSync.stream());
}
exports.compressLibraryCssMin = compressLibraryCssMin

// Task compress lib js & mini file
async function compressLibraryJsMin() {
    return await src([
        './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        './node_modules/owl.carousel/dist/owl.carousel.js',
    ], {allowEmpty: true})
        .pipe(concat('library.min.js'))
        .pipe(uglify())
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream());
}
exports.compressLibraryJsMin = compressLibraryJsMin

// Task watch
function watchTask() {
    server()
    watch(`${pathRoot}assets/scss/bootstrap.scss`, buildStylesBootstrap)
    watch([
        `${pathRoot}assets/scss/**/*.scss`,
        `!${pathRoot}assets/scss/bootstrap.scss`,
        `!${pathRoot}assets/scss/elementor-addon/*.scss`,
        `!${pathRoot}assets/scss/post/*.scss`,
        `!${pathRoot}assets/scss/page-templates/*.scss`,
        `!${pathRoot}assets/scss/shop/*.scss`
    ], buildStyles)
    watch(`${pathRoot}assets/scss/elementor-addon/*.scss`, buildStylesElementor)
    watch(`${pathRoot}assets/scss/post/*.scss`, buildStylePost)
    watch(`${pathRoot}assets/scss/page-templates/*.scss`, buildStylePageTemplates)
    watch(`${pathRoot}assets/scss/shop/*.scss`, buildStyleShop)
    watch([`${pathRoot}assets/js/*.js`, `!${pathRoot}assets/js/*.min.js`], buildJSTheme)
}
exports.watchTask = watchTask