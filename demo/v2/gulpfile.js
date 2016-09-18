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

gulp.task('clean', function (cb) {
	del([
		FILES_DIST_JS,
		FILES_DIST_CSS,
		FILES_DIST_BAIXING,
	], {
		force: true
	}, function (err, deletedFiles) {
		var infoTitle = '[clean] deleted: '
		if (deletedFiles.length) {
			console.log(infoTitle)
			console.log(deletedFiles.join('\n'))
		} else {
			console.log(infoTitle + '(no files).')
		}

		cb()
	})
})

var jsSrcList = require('./building/config-js-combo').jsSrcList
gulp.task('js', function () {
	var tasks = []
	var jsFilenames = Object.keys(jsSrcList)
	jsFilenames.forEach(function (filename) {
		if (!filename || filename.indexOf('_') === 0) return
		tasks.push(new Promise(function (resolve, reject) {
			var src = jsSrcList[filename]
			gulp.src(src)
				.pipe(concat(filename + '.js', {
					newLine: '\n;',
				}))
				// .pipe(replace(/\/\*\* DEBUG_INFO_START \*\*\//g, '/*'))
				// .pipe(replace(/\/\*\* DEBUG_INFO_END \*\*\//g, '*/'))
				.pipe(gulp.dest(PATH_DIST_JS))
				.on('error', function (e) {
					console.error('\x07', e.message)
					reject(e)
				})
				.on('finish', resolve)
				.on('end', function () {
					console.log('[js] src: ' + src)
					console.log('[js] concat: ' + PATH_DIST_JS + filename + '.js')
				})
		}))
	})
	return Promise.all(tasks)
})

var stylus = require('gulp-stylus')
var nib = require('nib')
var IS_DEV = false
gulp.task('css', function () {
	var styl = stylus({
		use: [nib()],
		import: 'nib',
		linenos: IS_DEV,
		compress: !IS_DEV,
		errors: true,
	})
	return gulp.src(FILES_SRC_CSS)
		.pipe(styl)
		.pipe(gulp.dest(PATH_DIST_CSS))
		.on('end', function () {
			console.log('[css] compiling stylus: ' + FILES_SRC_CSS)
			console.log('[css] output css: ' + PATH_DIST_CSS)
		})
})

var jedi = require('./building/gulp-jedi')
gulp.task('jedi', function () {
	return gulp.src([
			FILES_SRC_BAIXING,
		], {
			ignore: '**/_*.*',
		})
		.pipe(jedi())
		.pipe(gulp.dest(PATH_DIST_BAIXING))
})

gulp.task('build', gulp.parallel([
	'js',
	'css',
	'jedi',
]))

gulp.task('dist', gulp.series([
	'clean',
	'build',
]))

gulp.task('watch-css', function () {
	return gulp.watch([
		FILES_SRC_CSS,
		// './node_modules/cmui-v2/src/**/*.styl',
	], gulp.parallel('css'))
})
gulp.task('watch-js', function () {
	return gulp.watch([
		'./static/baixing/js/src/demo.js',
		// './node_modules/cmui-v2/src/**/*.js',
	], gulp.parallel('js'))
})
gulp.task('watch-jedi', function () {
	return gulp.watch([
		FILES_SRC_BAIXING,
	], gulp.parallel('jedi'))
})

gulp.task('watch', function () {
	return gulp.series([
		'dist',
		gulp.parallel([
			'watch-css',
			'watch-js',
			'watch-jedi',
		])
	])
})

gulp.task('default', gulp.series('dist'))
