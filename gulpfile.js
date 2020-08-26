var gulp           = require('gulp'),
    gutil          = require('gulp-util' ),
    sass           = require('gulp-sass'),
    // browserSync    = require('browser-sync'),
    concat         = require('gulp-concat'),
    uglify         = require('gulp-uglify'),
    cleanCSS       = require('gulp-clean-css'),
    sourcemaps     = require('gulp-sourcemaps'),
    rename         = require('gulp-rename'),
    del            = require('del'),
    imagemin       = require('gulp-imagemin'),
    cache          = require('gulp-cache'),
    autoprefixer   = require('gulp-autoprefixer'),
    ftp            = require('vinyl-ftp'),
    notify         = require("gulp-notify"),
    rigger         = require('gulp-rigger');

gulp.task('js',  function() {

    gulp.src('resources/assets/js/*.js')
        .pipe(rigger())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write())

        .pipe(gulp.dest('public/js'))
        // .pipe(browserSync.reload({stream: true}));
});

gulp.task('lib-js', function() {

    return gulp.src([
        'resources/assets/libs/jquery/dist/jquery.min.js'
    ])
        .pipe(concat('scripts.min.js'))
        .pipe(gulp.dest('public/js'))
        // .pipe(browserSync.reload({stream: true}));
});

gulp.task('cp-libs', function(){
    gulp.src(['resources/assets/libs/**']).pipe(gulp.dest('public/libs'));
});

// gulp.task('browser-sync', function() {
//     browserSync({
//         server: {
//             baseDir: 'dist'
//         },
//         notify: false,
//     });
// });

gulp.task('sass', function() {
    return gulp.src('resources/assets/sass/**/**/*.sass')
        .pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
        .pipe(rename({suffix: '.min', prefix : ''}))
        .pipe(autoprefixer(['last 15 versions']))
        .pipe(cleanCSS())
        .pipe(gulp.dest('public/css'))
        // .pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['sass', 'js', 'lib-js', 'build'], function() {
	gulp.watch('resources/assets/sass/**/*.sass', ['sass']);
	gulp.watch('resources/assets/js/*.js', ['js']);
	gulp.watch(['resources/assets/libs/**/*.js', 'resources/assets/js/*.js'], ['js'], ['lib-js']);

});

gulp.task('imagemin', function() {
    return gulp.src('resources/assets/img/**/*')
        .pipe(cache(imagemin()))
        .pipe(gulp.dest('public/img'));
});

gulp.task('build', ['removedist', 'imagemin', 'sass', 'js'], function() {
    var buildCss = gulp.src([
        'resources/assets/css/main.min.css',
    ]).pipe(gulp.dest('public/css'));

    var buildJs = gulp.src([
        'resources/assets/js/scripts.min.js',
    ]).pipe(gulp.dest('public/js'));

    var buildFonts = gulp.src([
        'resources/assets/fonts/**/*',
    ]).pipe(gulp.dest('public/fonts'));

});

gulp.task('deploy', function() {

    var conn = ftp.create({
        host:      'hostname.com',
        user:      'username',
        password:  'userpassword',
        parallel:  10,
        log: gutil.log
    });

    var globs = [
        'dist/**',
        'dist/.htaccess',
    ];
    return gulp.src(globs, {buffer: false})
        .pipe(conn.dest('/path/to/folder/on/server'));

});

gulp.task('removedist', function() { return del.sync('dist'); });
gulp.task('clearcache', function () { return cache.clearAll(); });

gulp.task('default', ['watch']);