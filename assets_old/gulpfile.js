import gulp from 'gulp';
import babel from 'gulp-babel';
import browserSync from 'browser-sync';
import gulpIf from 'gulp-if';
import uglify from 'gulp-uglify-es';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import cleancss from 'gulp-clean-css';
import gcmq from 'gulp-group-css-media-queries';
import del from 'del';
import sourcemaps from 'gulp-sourcemaps';
import rename from 'gulp-rename';

let isDev = process.argv.includes('--dev');
let isProd = !isDev;
let isSync = process.argv.includes('--sync');

let config = {
    src: './src/',
    build: './build',
    html: {
        src: '**/*.html',
        dest: '/'
    },
    img: {
        src: 'images/**/*',
        dest: '/images'
    },
    css: {
        src: 'css/*.scss',
        watch: 'css/**/*.scss',
        dest: '/css'
    },
    fonts: {
        src: 'fonts/**/*',
        dest: '/fonts'
    },
    js: {
        src: 'js/*.js',
        watch: 'js/**/*.js',
        dest: '/js'
    }
};

export const html = () => {
    return gulp.src(config.src + config.html.src)
        .pipe(gulp.dest(config.build + config.html.dest))
        .pipe(gulpIf(isSync, browserSync.stream()));
}

export const images = () => {
    return gulp.src(config.src + config.img.src)
        .pipe(gulp.dest(config.build + config.img.dest))
        .pipe(browserSync.stream())
}

export const styles = () => {
    return gulp.src(config.src + config.css.src)
        .pipe(gulpIf(isDev, sourcemaps.init()))
        .pipe(sass())
        .pipe(gcmq())
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions'],
            grid: true
        }))
        .pipe(cleancss({
            level: 2
        }))
        .pipe(gulpIf(isDev, sourcemaps.write()))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(config.build + config.css.dest))
        .pipe(browserSync.stream())
}

export const fonts = () => {
    return gulp.src(config.src + config.fonts.src)
        .pipe(gulp.dest(config.build + config.fonts.dest))
}

export const scripts = () => {
    return gulp.src(config.src + config.js.src)
        .pipe(gulpIf(isDev, sourcemaps.init()))
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        .pipe(uglify.default({
            toplevel: true
        }))
        .pipe(gulpIf(isDev, sourcemaps.write()))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(config.build + config.js.dest))
        .pipe(browserSync.stream())
}

export const clear = () => {
    return del(config.build + '/*');
}

export const startWatch = () => {
    if (isSync) {
        browserSync.init({
            server: {
                baseDir: config.build,
            },
            port: 5001
        });
    }

    gulp.watch(config.src + config.html.src, html);
    gulp.watch(config.src + config.css.watch, styles);
    gulp.watch(config.src + config.js.src, scripts);
    gulp.watch(config.src + config.img.src, images);
}


export const build = gulp.series(clear, html, styles, scripts, images, fonts);
export const watch = gulp.parallel(html, styles, fonts, scripts, images, startWatch);