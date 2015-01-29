var jsSrcList = {}

jsSrcList['lib'] = [
	'./bower_components/zepto/zepto.js',
	'./bower_components/underscore/underscore.js',
	'./bower_components/underscore.ext/dist/underscore.ext.js',
]
jsSrcList['cmui'] = [
	'./bower_components/cmui/src/js/adapter-trad/_intro.js',
	'./bower_components/cmui/src/js/adapter-trad/_var.js',
	'./bower_components/cmui/src/js/core.js',
	'./bower_components/cmui/src/js/dom.js',
	'./bower_components/cmui/src/js/btn.js',
	'./bower_components/cmui/src/js/overlay-mask.js',
	'./bower_components/cmui/src/js/overlay-loading.js',
	'./bower_components/cmui/src/js/adapter-trad/_outro.js',
]
jsSrcList['demo'] = [
	'./static/baixing/js/src/demo.js',
]

module.exports = {
	jsSrcList: jsSrcList
}
