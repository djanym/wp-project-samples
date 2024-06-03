import gulp from 'gulp';

const { watch, series, src, dest } = gulp;
import gulpSass from 'gulp-sass';
import * as dartSass from 'sass';

const sass = gulpSass(dartSass);

import cleanCSS from 'gulp-clean-css';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import postcss from 'gulp-postcss';
import { deleteAsync } from 'del';
import rigger from 'gulp-rigger';
import plumber from 'gulp-plumber';
// import babel from 'gulp-babel';
import webpackStream from 'webpack-stream';

import webpackConfig from './webpack.config.js';

const PRODUCTION = true;

let paths = {
    dst: {
        js: 'assets/js/build/',
        css: 'assets/css/'
    },
    src: {
        js: './src/js/*.js',
        css: './src/scss/*.scss'
    },
    watch: {
        js: './src/js/*.js',
        css: [
            './src/scss/*.scss',
            './src/scss/*/*.scss'
        ]
    },
    minify: {
        js: [
            './assets/js/build/*.js',
            '!./assets/js/build/*.min.js'
        ],
        css: [
            './assets/css/*.css',
            '!./assets/css/*.min.css'
        ]
    },
    clean: {
        js: './assets/js/build/*',
        css: './assets/css/*'
    }
};

function cssClean() {
    // return del( paths.clean.css );
    return deleteAsync(paths.clean.css);
}

function cssBuild() {
    return src(paths.src.css)
        .pipe(sourcemaps.init())
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        // .pipe(autoprefixer())
        // .pipe(postcss([ autoprefixer() ]))
        .pipe(postcss())
        // Save uncompressed version
        .pipe(dest(paths.dst.css))

        // Below is compressed version flow
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS({
            compatibility: '*',
            debug: true
        }, (details) => {
            console.log(`${details.name} = Before: ${details.stats.originalSize}; After: ${details.stats.minifiedSize}`);
        }))
        // Save compressed version map
        .pipe(sourcemaps.write('./'))
        // Save compressed version
        .pipe(dest(paths.dst.css));
}

function jsClean() {
    return deleteAsync(paths.clean.js);
}

function jsBuild() {
    return src(paths.src.js)
        .pipe(plumber())
        .pipe(rigger())
        .pipe(webpackStream(webpackConfig, null, (err, stats) => {
            if (!err) {
                console.log(stats.toString({
                    colors: true,
                    chunks: PRODUCTION,
                    chunkModules: PRODUCTION
                }));
                // $.util.log(stats.toString({
                //     colors: $.util.colors.supportsColor,
                //     chunks: PRODUCTION,
                //     chunkModules: PRODUCTION
                // }))
                // browserSync.reload()
            }
        }))
        // Save compressed version
        .pipe(dest(paths.dst.js));
}

export function cssTask(done) {
    series(cssClean, cssBuild)(done);
}

export function watchCss() {
    let options = {
        ignoreInitial: false,
        delay: 200,
        events: 'all'
    };
    watch(paths.watch.css, options, series(cssClean, cssBuild));
}

export function jsTask(done) {
    series(jsClean, jsBuild)(done);
}

export function watchJs() {
    let options = {
        ignoreInitial: false,
        delay: 200,
        events: 'all'
    };
    watch(paths.watch.js, options, series(jsClean, jsBuild));
}

export function watchAll() {
    let options = {
        ignoreInitial: false,
        delay: 500,
        events: 'all'
    };
    watch(paths.watch.css, options, series(cssClean, cssBuild));
    watch(paths.watch.js, options, series(jsClean, jsBuild));
}

export default function runAll(done) {
    series(series(cssClean, cssBuild), series(jsClean, jsBuild))(done);
}
