void function () {
	'use strict'

	var templateConfig = {
		//compatible with ejs
		interpolate : /<%-([\s\S]+?)%>/g,
		escape      : /<%=([\s\S]+?)%>/g,

		//to avoid use `with` in compiled templates
		//see: https://github.com/cssmagic/blog/issues/4
		variable: 'data',
	}
	_.extend(_.templateSettings, templateConfig)

	var demo = {
		init: function () {
			this._getPageId()
			this._initPage()
		},
		_getPageId: function () {
			this.pageId = gearbox.dom.$body.attr('id') || '__unknown__'
		},
		_initPage: function () {
			var pageModule = this[this.pageId]
			if (pageModule && _.isFunction(pageModule.init)) {
				pageModule.init()
			}
		}
	}

	demo.mask = {
		init: function () {
			this._setAction()
		},
		_setAction: function () {
			gearbox.action.add({
				'mask-show': function () {
					return CMUI.mask.show()
				},
				'mask-hide': function () {
					return CMUI.mask.hide()
				},
				'mask-fade-in': function () {
					return CMUI.mask.fadeIn()
				},
				'mask-fade-out': function () {
					return CMUI.mask.fadeOut()
				}
			})
		}
	}

	demo.loading = {
		init: function () {
			this._setAction()
		},
		_setAction: function () {
			gearbox.action.add({
				'loading-show': function () {
					return CMUI.loading.show()
				},
				'loading-hide': function () {
					return CMUI.loading.hide()
				},
				'loading-fade-in': function () {
					return CMUI.loading.fadeIn()
				},
				'loading-fade-out': function () {
					return CMUI.loading.fadeOut()
				},
				//text
				'loading-show-with-text': function () {
					return CMUI.loading.show('测试文字')
				},
				'loading-update-text': function () {
					return CMUI.loading.updateText('测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字测试文字')
				},
				'loading-clear-text': function () {
					return CMUI.loading.updateText()
				}
			})
		}
	}

	demo.panel = {
		init: function () {
			this._setAction()
		},
		_setAction: function () {
			gearbox.action.add({
				'demo-panel-show': function () {
					return CMUI.panel.show('#demo-panel')
				},
				'demo-panel-hide': function () {
					return CMUI.panel.hide()
				},
				'demo-panel-switch-to': function () {
					return CMUI.panel.switchTo('#demo-panel-alt')
				},
				'demo-panel-switch-back': function () {
					return CMUI.panel.switchBack()
				},
			})
		}
	}

	demo.dialog = {
		init: function () {
			this._setAction()
			// this._debug()
		},
		_setAction: function () {
			gearbox.action.add({
				'demo-dialog-show': function () {
					return CMUI.dialog.show('#demo-dialog')
				},
				'demo-dialog-show-auto-hide': function () {
					return CMUI.dialog.show('#demo-dialog', {
						autoHideDelay: 3000,
					})
				},
				'demo-dialog-show-alt': function () {
					return CMUI.dialog.show('#demo-dialog-alt', {
						// autoHideDelay: 3000,
					})
				},
				'demo-dialog-create-and-show': function () {
					return CMUI.dialog.show(CMUI.dialog.create({
						//...
					}))
				},
			})
		},
		_debug: function () {
			var html = [
				'<div class="debug">',
					'<p>doc.offsetHeight: <span class="offsetHeight"></span></p>',
					'<p>doc.clientHeight: <span class="clientHeight"></span></p>',
					'<p>win.innerHeight: <span class="innerHeight"></span></p>',
					'<p>doc.scrollTop: <span class="scrollTop"></span></p>',
				'</div>',
			].join('')
			var $wrapper = $(html)
			gearbox.dom.$body.append($wrapper)
			var $offsetHeight = $('.offsetHeight')
			var $clientHeight = $('.clientHeight')
			var $innerHeight = $('.innerHeight')
			var $scrollTop = $('.scrollTop')
			gearbox.dom.$win.on('touchmove scroll', function () {
				$offsetHeight.html(document.documentElement.offsetHeight)
				$clientHeight.html(document.documentElement.clientHeight)
				$innerHeight.html(window.innerHeight)
				$scrollTop.html((document.documentElement.scrollTop || document.body.scrollTop))
			})
			gearbox.dom.$win.on('resize', function () {
				var randomChannels = [
					_.random(0, 255),
					_.random(0, 255),
					_.random(0, 255),
				]
				$wrapper.css('background-color', 'rgb(' + randomChannels.join(',') + ')')
			})
		},
	}

	//exports
	window.demo = demo

	//init
	demo.init()
}()

