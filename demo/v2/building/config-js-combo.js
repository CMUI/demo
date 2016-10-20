var jsSrcList = {}

jsSrcList['lib'] = [
	'./node_modules/underscore/underscore.js',

	'./node_modules/zepto.js/src/zepto.js',
	'./node_modules/zepto.js/src/event.js',
	'./node_modules/zepto.js/src/ajax.js',
	'./node_modules/zepto.js/src/form.js',
	'./node_modules/zepto.js/src/fx.js',
	'./node_modules/zepto.js/src/fx_methods.js',
	'./node_modules/zepto.js/src/callbacks.js',	//用于ajax
	'./node_modules/zepto.js/src/deferred.js',	//用于ajax

	'./node_modules/cmui-gearbox/dist/gearbox.js',
]
jsSrcList['cmui'] = [
	'./node_modules/cmui-v2/src/js/adapter-trad/_intro.js',
	'./node_modules/cmui-v2/src/js/adapter-trad/_var.js',
	'./node_modules/cmui-v2/src/js/core.js',
	'./node_modules/cmui-v2/src/js/dom.js',
	'./node_modules/cmui-v2/src/js/btn.js',
	'./node_modules/cmui-v2/src/js/form.js',
	'./node_modules/cmui-v2/src/js/msg-box.js',
	'./node_modules/cmui-v2/src/js/overlay-mask.js',
	'./node_modules/cmui-v2/src/js/overlay-loading.js',
	'./node_modules/cmui-v2/src/js/panel.js',
	'./node_modules/cmui-v2/src/js/adapter-trad/_outro.js',
]
jsSrcList['demo'] = [
	'./static/baixing/js/src/demo.js',
]

module.exports = {
	jsSrcList: jsSrcList
}
