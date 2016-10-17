'use strict';

var gutil = require('gulp-util');
var through = require('through2');
var parseFile = require('jedi/lib/parse').parseFile;
var transform = require('jedi/lib/transform').default;
var compile = require('jedi/lib/codegen').compile;

module.exports = function () {
    return through.obj(function(file, enc, cb) {
        if (file.isNull()) {
            this.push(file);
            return cb();
        }

        var code;
        try {
			const tree = transform(parseFile(file.path))
			code = compile(tree, 'php')
        } catch (e) {
            // var err = new gutil.PluginError('gulp-jedi', e);
            // this.emit('error', err);
			console.log(e)
            return cb();
        }
        if (file.isStream()) {
            var stream = through();
            stream.write(code);
            file.contents = stream;
        } else {
            file.contents = new Buffer(code);
        }
        file.path = gutil.replaceExtension(file.path, '.php');
        this.push(file);
        gutil.log('compiled jedi: ' + file.relative);
        cb();
    });
};
