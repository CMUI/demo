'use strict'

const IS_DEV = !(process.env.NODE_ENV === 'production')

const _ = require('underscore')

const gulp = require('gulp')
const gulpfiles = require('gulpfiles')

const path = require('path')

const PATH_STATIC_ROOT = './static/baixing'
const PATH_DIST_JS = path.join(PATH_STATIC_ROOT, 'js/dist/')
const PATH_DIST_CSS = path.join(PATH_STATIC_ROOT, 'css/dist/')
const FILES_DIST_JS = path.join(PATH_DIST_JS, '*.js')
const FILES_DIST_CSS = path.join(PATH_DIST_CSS, '*.css')
const PATH_SRC_CSS = path.join(PATH_STATIC_ROOT, 'css/src/')
const FILES_SRC_CSS = path.join(PATH_SRC_CSS, '*.styl')

const PATH_THEME_ROOT = './theme'
const PATH_DIST_BAIXING = path.join(PATH_THEME_ROOT, 'baixing')
const FILES_DIST_BAIXING = path.join(PATH_DIST_BAIXING, '*.php')
const PATH_SRC_BAIXING = path.join(PATH_THEME_ROOT, 'baixing/src')
const FILES_SRC_BAIXING = path.join(PATH_SRC_BAIXING, '*.jedi')

gulp.task('clean', gulpfiles.del({
	glob: [
		FILES_DIST_JS,
		FILES_DIST_CSS,
		FILES_DIST_BAIXING,
	],
}))

const jsSrcList = require('./building/config-js-combo').jsSrcList
gulp.task('js', gulpfiles.concat({
	rules: jsSrcList,
	dest: PATH_DIST_JS,
}))

gulp.task('css', gulpfiles.stylus({
	src: FILES_SRC_CSS,
	dest: PATH_DIST_CSS,
	config: {
		nib: true,
		linenos: IS_DEV,
		compress: !IS_DEV,
	}
}))

const jedi = require('./building/gulp-jedi')
gulp.task('jedi', function () {
	return gulp.src([
			FILES_SRC_BAIXING,
		], {
			ignore: '**/_*.*',
		})
		.pipe(jedi())
		.pipe(gulp.dest(PATH_DIST_BAIXING))
})

gulp.task('dist', gulp.series([
	'clean',
	gulp.parallel([
		'js',
		'css',
		'jedi',
	]),
]))

gulp.task('watch-css', function () {
	return gulp.watch([
		FILES_SRC_CSS,
		'./node_modules/cmui/src/**/*.styl',
	], gulp.parallel('css'))
})
gulp.task('watch-js', function () {
	return gulp.watch([
		'./static/baixing/js/src/demo.js',
		'./node_modules/cmui/src/**/*.js',
	], gulp.parallel('js'))
})
gulp.task('watch-jedi', function () {
	return gulp.watch([
		FILES_SRC_BAIXING,
	], gulp.parallel('jedi'))
})

gulp.task('watch', gulp.series([
	'dist',
	gulp.parallel([
		'watch-css',
		'watch-js',
		'watch-jedi',
	])
]))

gulp.task('default', gulp.series('dist'))
