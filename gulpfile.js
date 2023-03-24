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

// server
function server() {
    browserSync.init({
        server: pathRoot,
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

// css
async function buildStyles() {
    return await src(`${pathRoot}assets/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'))
        .pipe(browserSync.stream())
}
async function buildStylesElementor() {
    return await src(`${pathRoot}assets/scss/elementor-addon/elementor-addon.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/css`))
        .pipe(browserSync.stream())
}
async function buildCssPost() {
    return await src(`${pathRoot}assets/scss/post/post.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/css/post`))
        .pipe(browserSync.stream())
}
async function buildCssPostTypeCourses() {
    return await src(`${pathRoot}assets/scss/post-type-courses/courses.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/css/post-type-courses`))
        .pipe(browserSync.stream())
}
async function buildCssPostTypeService() {
    return await src(`${pathRoot}assets/scss/post-type-service/service.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathRoot}assets/css/post-type-service`))
        .pipe(browserSync.stream())
}

async function buildStylePageTemplates() {
    return await src(`${pathRoot}assets/scss/page-templates/*.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/css/page-templates/`))
        .pipe(browserSync.stream())
}

// js
async function buildJSTheme() {
    return await src([
        `${pathRoot}assets/js/*.js`,
        `!${pathRoot}assets/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathRoot}assets/js/`))
        .pipe(browserSync.stream())
}

async function buildTheme() {
    await buildStyles()
    await buildStylesElementor()
    await buildCssPost()
    await buildCssPostTypeCourses()
    await buildCssPostTypeService()

    await buildJSTheme()
}
exports.buildTheme = buildTheme

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