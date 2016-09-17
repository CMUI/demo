var jsSrcList = {}

jsSrcList['lib'] = [
	// zepto.js 结尾没有分号，所以以下文件的顺序需要注意。
	'./bower_components/underscore/underscore.js',
	'./bower_components/zepto.js/dist/zepto.js',
	'./bower_components/gearbox/dist/gearbox.js',
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
