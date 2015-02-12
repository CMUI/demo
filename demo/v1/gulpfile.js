'use strict'

var _ = require('underscore')

var gulp = require('gulp')
var del = require('del')
var concat = require('gulp-concat')

var path = require('path')

var PATH_STATIC_ROOT = './static/baixing'
var PATH_DIST_JS = path.join(PATH_STATIC_ROOT, 'js/dist/')
var PATH_DIST_CSS = path.join(PATH_STATIC_ROOT, 'css/dist/')
var FILES_DIST_JS = path.join(PATH_DIST_JS, '*.js')
var FILES_DIST_CSS = path.join(PATH_DIST_CSS, '*.css')
var PATH_SRC_CSS = path.join(PATH_STATIC_ROOT, 'css/src/')
var FILES_SRC_CSS = path.join(PATH_SRC_CSS, '*.styl')

var PATH_THEME_ROOT = './theme'
var PATH_DIST_BAIXING = path.join(PATH_THEME_ROOT, 'baixing')
var FILES_DIST_BAIXING = path.join(PATH_DIST_BAIXING, '*.php')
var PATH_SRC_BAIXING = path.join(PATH_THEME_ROOT, 'baixing/src')
var FILES_SRC_BAIXING = path.join(PATH_SRC_BAIXING, '*.jedi')


gulp.task('default', ['clean-build'])
gulp.task('build', ['js', 'css', 'jedi'])
gulp.task('dist', ['clean'], function () {
	gulp.start('build')
})

gulp.task('clean', function () {
	del([
		FILES_DIST_JS,
		FILES_DIST_CSS,
		FILES_DIST_BAIXING,
	], {
		force: true
	}, function (err, deletedFiles) {
		console.log('[clean] deleted:')
		console.log(deletedFiles.join('\n'))
	})
})

var jsSrcList = require('./building/config-js-combo').jsSrcList
gulp.task('js', function () {
	var jsFilenames = Object.keys(jsSrcList)
	jsFilenames.forEach(function (filename) {
		if (!filename || filename.indexOf('_') === 0) return
		var src = jsSrcList[filename]
		gulp.src(src)
			.pipe(concat(filename + '.js'))
			.pipe(gulp.dest(PATH_DIST_JS))
		console.log('[js] src: ' + src)
		console.log('[js] concat: ' + PATH_DIST_JS + filename + '.js')
	})
})

var stylus = require('gulp-stylus')
var nib = require('nib')
gulp.task('css', function () {
	var styl = stylus({
		use: [nib()],
		import: 'nib',
		linenos: false,
		compress: true,
		errors: true,
	})
	gulp.src(FILES_SRC_CSS)
		.pipe(styl)
		.pipe(gulp.dest(PATH_DIST_CSS))
	console.log('[css] compiling stylus: ' + FILES_SRC_CSS)
	console.log('[css] output css: ' + PATH_DIST_CSS)
})
gulp.task('css-dev', function () {
	var styl = stylus({
		use: [nib()],
		import: 'nib',
		linenos: true,
		compress: false,
		errors: true,
	})
	gulp.src(FILES_SRC_CSS)
		.pipe(styl)
		.pipe(gulp.dest(PATH_DIST_CSS))
	console.log('[css] compiling stylus: ' + FILES_SRC_CSS)
	console.log('[css] output css: ' + PATH_DIST_CSS)
})

var jedi = require('gulp-jedi')
gulp.task('jedi', function () {
	gulp.src(FILES_SRC_BAIXING)
		.pipe(jedi())
		.pipe(gulp.dest(PATH_DIST_BAIXING))
})


gulp.task('watch', ['css-dev', 'jedi'], function () {
	gulp.watch(FILES_SRC_CSS, ['css-dev'])
	gulp.watch('./bower_components/cmui/src/**/*.styl', ['css-dev'])
	gulp.watch(FILES_SRC_BAIXING, ['jedi'])
})
