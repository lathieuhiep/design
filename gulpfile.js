'use strict'

const { src, dest, watch } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const browserSync = require('browser-sync')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const minifyCss = require('gulp-clean-css')
const concatCss = require('gulp-concat-css')
const rename = require("gulp-rename")

const pathRoot = './'
const pathServer = 'localhost/getdesign/'

// server
function server() {
    browserSync.init({
        proxy: pathServer,
        open: 'local',
        cors: true,
        ghostMode: false
    })
}

/**
 * Build libs
 **/

// css
async function buildCssLibs() {
    return await src(`${pathRoot}assets/scss/libs/*.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/libs/css`))
        .pipe(browserSync.stream())
}
async function buildWebFontsAwesome() {
    return await src([
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.ttf',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-brands-400.woff2',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.ttf',
        'node_modules/@fortawesome/fontawesome-free/webfonts/fa-solid-900.woff2'
    ])
        .pipe(dest(`${pathRoot}assets/libs/webfonts`))
        .pipe(browserSync.stream())
}

// js
async function buildJsLibs() {
    return await src([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'node_modules/jquery.scrollbar/jquery.scrollbar.js',
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/libs/js`))
        .pipe(browserSync.stream())
}

async function buildLibs() {
    await buildCssLibs()
    await buildWebFontsAwesome()
    await buildJsLibs()
}
exports.buildLibs = buildLibs

/**
 * Build Theme
 **/

// main
async function buildStyles() {
    return await src(`${pathRoot}assets/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'))
        .pipe(browserSync.stream())
}
async function buildJSMain() {
    return await src([
        `${pathRoot}assets/js/*.js`,
        `!${pathRoot}assets/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream())
}

// elementor add on
async function buildStylesElementor() {
    return await src(`${pathRoot}assets/scss/elementor-addon/elementor-addon.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/elementor-addon`))
        .pipe(browserSync.stream())
}
async function buildJSElementor() {
    return await src([`${pathRoot}assets/elementor-addon/elementor-addon.js`], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/elementor-addon`))
        .pipe(browserSync.stream())
}

// post type post
async function buildCssPost() {
    return await src(`${pathRoot}assets/scss/post-type/post/*.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/post-type/post`))
        .pipe(browserSync.stream())
}

// post type courses
async function buildCssPostTypeCourses() {
    return await src(`${pathRoot}assets/scss/post-type/courses/*.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/post-type/courses`))
        .pipe(browserSync.stream())
}
async function buildJsPostTypeCourses() {
    return await src([`${pathRoot}assets/assets/post-type/course.js`], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/post-type/courses`))
        .pipe(browserSync.stream())
}

// post type service
async function buildCssPostTypeService() {
    return await src(`${pathRoot}assets/scss/post-type/service/*.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/post-type/service`))
        .pipe(browserSync.stream())
}

// post type my product
async function buildCssPostTypeMyProduct() {
    return await src(`${pathRoot}assets/scss/post-type/my-product/*.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/post-type/my-product`))
        .pipe(browserSync.stream())
}
async function buildJsPostTypeMyProduct() {
    return await src([`${pathRoot}assets/assets/post-type/my-product/my-product.js`], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/post-type/my-product`))
        .pipe(browserSync.stream())
}

async function buildTheme() {
    await buildStyles()
    await buildJSMain()

    await buildStylesElementor()
    await buildJSElementor()

    await buildCssPost()

    await buildCssPostTypeCourses()

    await buildJsPostTypeCourses()
    await buildCssPostTypeService()

    await buildCssPostTypeMyProduct()
    await buildJsPostTypeMyProduct()
}
exports.buildTheme = buildTheme

// Task watch
function watchTask() {
    server()

    // watch build libs
    watch(`${pathRoot}assets/scss/libs/*.scss`, buildCssLibs)

    // watch build style css
    watch([
        `${pathRoot}assets/scss/**/*.scss`,
        `!${pathRoot}assets/scss/libs/*.scss`,
        `!${pathRoot}assets/scss/elementor-addon/*.scss`,
        `!${pathRoot}assets/scss/post/*.scss`,
        `!${pathRoot}assets/scss/post-type-courses/*.scss`,
        `!${pathRoot}assets/scss/post-type-service/*.scss`,
    ], buildStyles)

    watch([
        `${pathRoot}assets/js/*.js`,
        `!${pathRoot}assets/js/*.min.js`
    ], buildJSMain)

    // watch build element
    watch(`${pathRoot}assets/scss/elementor-addon/*.scss`, buildStylesElementor)
    watch([
        `${pathRoot}assets/elementor-addon/*.js`,
        `!${pathRoot}assets/elementor-addon/*.min.js`
    ], buildJSElementor)

    // watch build post type post
    watch(`${pathRoot}assets/scss/post-type/post/*.scss`, buildCssPost)

    // watch build post type courses
    watch(`${pathRoot}assets/scss/post-type/courses/*.scss`, buildCssPostTypeCourses)
    watch([
        `${pathRoot}assets/post-type/courses/*.js`,
        `!${pathRoot}assets/post-type/courses/*.min.js`
    ], buildJsPostTypeCourses)

    // watch build post type service
    watch(`${pathRoot}assets/scss/post-type/service/*.scss`, buildCssPostTypeService)

    // watch build post type my product
    watch(`${pathRoot}assets/scss/post-type/my-product/*.scss`, buildCssPostTypeMyProduct)
    watch([
        `${pathRoot}assets/post-type/my-product/*.js`,
        `!${pathRoot}assets/post-type/my-product/*.min.js`
    ], buildJsPostTypeMyProduct)

    // watch liveReload
    watch([
        `${pathRoot}assets/css/**/*.css`,
        `${pathRoot}assets/js/**/*.min.js`,
        `${pathRoot}assets/libs/**/*`,
        `${pathRoot}**/*.php`,
    ], browserSync.reload)
}
exports.watchTask = watchTask