/**
 * CMUI - http://cmui.net/
 */
void function (window, undefined) {
	'use strict'


////////////////////  var  ////////////////////
var _ = window._
var $ = window.Zepto || window.jQuery || window.$
var document = window.document

//check dependency
if (!_ || !$) return false


////////////////////  core  ////////////////////

//namespace
/** DEBUG_INFO_START **/
if (window.CMUI) console.warn('CMUI: The namespace CMUI already exist.')
/** DEBUG_INFO_END **/
var CMUI = window.CMUI = window.CMUI || {}

void function (window, CMUI) {
	'use strict'

	var _config = {
		modulesToInit: []
	}
	var VERSION = ''

	//api
	function init() {
		_.each(_config.modulesToInit, function (moduleName) {
			var module = CMUI[moduleName]
			if (module && _.isFunction(module._init)) module._init()
		})
	}
	function _initModule(moduleName) {
		if (moduleName) _config.modulesToInit.push(moduleName)
	}

	//exports
	//CMUI.config = config
	CMUI.VERSION = VERSION
	CMUI.init = init
	CMUI._initModule = _initModule

}(window, CMUI)


////////////////////  dom  ////////////////////
void function (window, CMUI) {
	'use strict'

	//namespace
	var moduleName = 'dom'
	var module = CMUI[moduleName] = CMUI[moduleName] || {}

	//api
	function _init() {
		var ua = _.ua

		//segment legacy os
		var version = _.str.toFloat(ua.osVersion)
		var isLegacy =
				(ua.isIOS && version < 6) ||	//below ios 6
				(ua.isAndroid && version < 4)	//below android 4

		//set css hook on `html` element
		var classNames = [
			'js cmui',
			ua.isIOS ? 'ios' : '',
			ua.isAndroid ? 'android' : '',
			isLegacy ? 'legacy' : '',
			ua.isSafari ? 'safari' : '',
			ua.isChrome ? 'chrome' : '',
			ua.isTouchDevice ? 'touch' : 'mouse',
			ua.isMobileDevice ? 'mobile' : 'desktop'
		]
		_.dom.$root.removeClass('no-js').addClass(classNames.join(' '))

		//to enable `:active` style on ios and android 4+
		if (ua.isIOS || (ua.isAndroid && !isLegacy)) {
			$(function () {
				_.dom.$body.on('touchstart', function () {})
			})
		}
	}

	//exports
	module._init = _init

	//init
	CMUI._initModule(moduleName)

}(window, CMUI)


////////////////////  btn  ////////////////////
void function (window, CMUI) {
	'use strict'

	//namespace
	var moduleName = 'btn'
	var module = CMUI[moduleName] = CMUI[moduleName] || {}

	//const
	var BTN_ELEM_TAGS = ['a', 'input', 'button']
	var CLS_BTN = 'cmBtn'
	var CLS_BTN_DISABLED = 'disabled'
	var CLS_BTN_WRAPPER = 'cmBtnWrapper'
//	var CLS_BTN_SWITCH = 'cmBtnSwitch'
//	var CLS_BTN_SWITCH_ITEM = 'cmBtnItem'

	//util
	/**
	 * if click on a btn wrapper, trigger `click` event on the btn inside of the wrapper
	 * @private
	 */
	function _iniBtnWrapper() {
		var $wrapper = _.dom.$body || _.dom.$root
		$wrapper.on('click', function (ev) {
			var $target = _.$(ev.target)
			if ($target.hasClass(CLS_BTN_WRAPPER) && !$target.hasClass(CLS_BTN_DISABLED)) {
				var $btnWrapper = $target
				var selBtn = ([].concat('.' + CLS_BTN, BTN_ELEM_TAGS)).join(', ')
				var $btn = $btnWrapper.find(selBtn).first()
				if (!$btn.hasClass(CLS_BTN_DISABLED)) {
					$btn.trigger('click')
				}
			}
		})
	}

	//api
	function _init() {
		_iniBtnWrapper()
	}
	//todo: use `disabled` property for form btn, when relevant style is ready
	//function disable(elem) {}
	//function enable(elem) {}

	//todo: btn switch fn

	//exports
	module._init = _init

	//init
	CMUI._initModule(moduleName)

}(window, CMUI)


////////////////////  overlay - mask  ////////////////////
void function (window, CMUI) {
	'use strict'

	CMUI.mask = {
		//class name
		CLS: 'cmMask',
		CLS_HIDDEN: 'hidden',
		CLS_FADE_IN: 'fade-in',
		CLS_FADE_OUT: 'fade-out',

		//flag
		isReady: false,
		isVisible: false,

		//util
		_prepare: function () {
			var _ns = this
			if (!this.isReady) {
				this.$elem = $('<div class="cmMask hidden"></div>').appendTo(_.dom.$body)
				_.dom.$win.on('resize', function () {
					if (_ns.isVisible) _ns._pos()
				})
				this.isReady = true
			}
		},
		_pos: function () {
			this.$elem.css({
				height: document.documentElement.scrollHeight + 'px'
			})
		},

		//api
		adjust: function () {
			this._pos()
		},
		show: function () {
			if (this.isVisible) return false
			this._prepare()
			this._pos()
			var classNames = [this.CLS]
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = true
		},
		fadeIn: function () {
			if (this.isVisible) return false
			this._prepare()
			this._pos()
			var classNames = [this.CLS, this.CLS_FADE_IN]
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = true
		},
		hide: function () {
			if (!this.isVisible) return false
			var classNames = [this.CLS, this.CLS_HIDDEN]
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = false
		},
		fadeOut: function () {
			if (!this.isVisible) return false
			var classNames = [this.CLS, this.CLS_FADE_OUT]
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = false
		}
	}

}(window, CMUI)


////////////////////  overlay - loading  ////////////////////
void function (window, CMUI) {
	'use strict'

	CMUI.loading = {
		//class name
		CLS: 'cmLoading',
		CLS_TEXT: 'cmText',
		CLS_HIDDEN: 'hidden',
		CLS_FADE_IN: 'fade-in',
		CLS_FADE_OUT: 'fade-out',

		//flag
		isReady: false,
		isVisible: false,

		//element
		basicClassNames: [],
		html: [
			'<div class="cmLoading">',
				'<i class="cmIcon cmX50 loading-black-bg">Loading</i>',
			'</div>'
		].join(''),

		//util
		_prepare: function () {
			var _ns = this
			if (!this.isReady) {
				this.$elem = $(this.html).appendTo(_.dom.$body)
				this.isReady = true
				var elem = this.$elem[0]
				this.offsetParent = document.documentElement
				_.dom.$win.on('resize', function () {
					if (_ns.isVisible) _ns._pos()
				})
			}
		},
		_pos: function () {
			var elem = this.$elem[0]
			//to avoid `updateText()` expand this element out of viewport and
			//cause wrong `this.offsetParent.clientWidth`,
			//we have to move it into viewport
			this.$elem.css({'visibility': 'hidden', left: 0, top: 0})

			//body may be a page wrapper, and may have {position: relative}.
			var l = (this.offsetParent.clientWidth - elem.offsetWidth)/2
			//on ios, `doc.clientHeight` never change even when scrolling causes addr bar hidden.
			var t = (window.innerHeight * 0.95 - elem.offsetHeight)/2

			this.$elem.css({
				left: l + 'px',
				top: t + 'px'
			})
			this.$elem.css({'visibility': 'visible'})
		},
		_setText: function (str) {
			this._prepareText()
			//accept:
			//- any non-empty string
			//- any number (including `0`)
			//- any object which can be auto-converted to non-empty string
			if (str || _.isNumber(str)) {
				this.$elem.addClass(this.CLS_TEXT)
				this.basicClassNames = [this.CLS, this.CLS_TEXT]
				this.$text.html(str)
			} else {
				this.$elem.removeClass(this.CLS_TEXT)
				this.basicClassNames = [this.CLS]
			}
		},
		_prepareText: function () {
			if (!this.$text) {
				this.$text = $('<p></p>').appendTo(this.$elem)
			}
		},

		//api
		show: function (str) {
			if (this.isVisible) return false
			this._prepare()
			this._setText(str)
			this._pos()
			var classNames = this.basicClassNames
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = true
		},
		fadeIn: function (str) {
			if (this.isVisible) return false
			this._prepare()
			this._setText(str)
			this._pos()
			var classNames = _.union(this.basicClassNames, [this.CLS_FADE_IN])
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = true
		},
		hide: function () {
			if (!this.isVisible) return false
			var classNames = _.union(this.basicClassNames, [this.CLS_HIDDEN])
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = false
		},
		fadeOut: function () {
			if (!this.isVisible) return false
			var classNames = _.union(this.basicClassNames, [this.CLS_FADE_OUT])
			this.$elem.attr('class', classNames.join(' '))
			this.isVisible = false
		},

		//api - text
		updateText: function (str) {
			this._setText(str)
			this._pos()
		}
	}

}(window, CMUI)




}(this)

//init
CMUI.init();
