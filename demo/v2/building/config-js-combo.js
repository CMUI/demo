var jsSrcList = {}

jsSrcList['lib'] = [
	'./node_modules/underscore/underscore.js',
	'./node_modules/zepto.js/dist/zepto.js',
	'./node_modules/cmui-gearbox/dist/gearbox.js',
]
jsSrcList['cmui'] = [
	'./node_modules/cmui-v2/src/js/adapter-trad/_intro.js',
	'./node_modules/cmui-v2/src/js/adapter-trad/_var.js',
	'./node_modules/cmui-v2/src/js/core.js',
	'./node_modules/cmui-v2/src/js/dom.js',
	'./node_modules/cmui-v2/src/js/btn.js',
	'./node_modules/cmui-v2/src/js/msg-box.js',
	'./node_modules/cmui-v2/src/js/overlay-mask.js',
	'./node_modules/cmui-v2/src/js/overlay-loading.js',
	'./node_modules/cmui-v2/src/js/adapter-trad/_outro.js',
]
jsSrcList['demo'] = [
	'./static/baixing/js/src/demo.js',
]

module.exports = {
	jsSrcList: jsSrcList
}
