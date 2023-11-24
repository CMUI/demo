<?php

namespace Jedi {

	if (!defined('JEDI_RUNTIME')) {
		define('JEDI_RUNTIME', '1.0.0');

		function attribute($name, $value) {
			if ($value === null || $value === false) return '';
			if ($value === true) return ' ' . $name;
			return ' ' . $name . '="' . htmlspecialchars($value, ENT_COMPAT | ENT_SUBSTITUTE | ENT_DISALLOWED) . '"';
		}

		function toArray($iterable) {
			if (is_array($iterable)) return $a = $iterable;
			else return iterator_to_array($iterable);
		}

		function listPattern($iterable, array $defaults) {
			$bindings = array();
			$i = 0; $n = count($defaults);
			foreach ($iterable as $value) {
				if ($i < $n) array_push($bindings, is_null($value) ? $defaults[$i] : $value);
				else return $bindings;
				++$i;
			}
			array_splice($bindings, $i, 0, array_slice($defaults, $i));
			return $bindings;
		}

		function listRestPattern($iterable, array $before_defaults, array $after_defaults) {
			$bindings = array(); $rest = array();
			$i = 0; $n = count($before_defaults);
			foreach ($iterable as $value) {
				if ($i < $n) array_push($bindings, is_null($value) ? $before_defaults[$i] : $value);
				else array_push($rest, $value);
				++$i;
			}
			if ($i < $n) {
				array_splice($bindings, $i, 0, array_slice($before_defaults, $i));
				array_push($bindings, array());
				array_splice($bindings, $n + 1, 0, $after_defaults);
				return $bindings;
			}
			$after = array();
			for ($i = count($after_defaults) - 1; $i >= 0; --$i) {
				$value = array_pop($rest);
				array_unshift($after, is_null($value) ? $after_defaults[$i] : $value);
			}
			array_push($bindings, $rest);
			array_splice($bindings, $n + 1, 0, $after);
			return $bindings;
		}
		// assert(listPattern([1, 2, 3, 4], [null, null, null]) == [1, 2, 3]);
		// assert(listRestPattern([1, 2, 3, 4], [null, null, null], []) == [1, 2, 3, [4]]);
		// assert(listRestPattern([1, 2, 3, 4], [], [null, null]) == [[1, 2], 3, 4]);
		// assert(listRestPattern([1, 2, 3, 4], [null, null, null, null, null], []) == [1, 2, 3, 4, null, []]);
		// assert(listRestPattern([1, 2, 3, 4], [], [null, null, null, null, null]) == [[], null, 1, 2, 3, 4]);
		// assert(listRestPattern([1, 2, 3, 4], [null, null, null], [null, null, null]) == [1, 2, 3, [], null, null, 4]);

		function recordPattern($record, $groups) {
			$a = is_array($record) ? $record : new \ArrayObject($record);
			$bindings = array();
			foreach ($groups as $group) {
				foreach ($group as $name => $default) {
					$value = $a[$name];
					array_push($bindings, is_null($value) ? $default : $value);
					unset($a[$name]);
				}
				$copy = $a;
				array_push($bindings, $copy);
			}
			return $bindings;
		}

		function record($a) {
			return new \ArrayObject($a, \ArrayObject::ARRAY_AS_PROPS);
		}

		// function foreachAuto($iterable, $closure, $index = 0) {
		// 	$assoc = false; $entries = array(); $i = $index;
		// 	foreach ($iterable as $key => $value) {
		// 		if ($assoc) {
		// 			$closure($i, array($key, $value));
		// 		} else {
		// 			array_push($entries, array($key, $value));
		// 			if ($i !== $key) {
		// 				$assoc = true;
		// 				foreach ($entries as $entry) {
		// 					$closure($index, $entry);
		// 					++$index;
		// 				}
		// 			}
		// 		}
		// 		++$i;
		// 	}
		// 	if (!$assoc) {
		// 		foreach ($entries as $entry) {
		// 			$closure($index, $entry[1]);
		// 		}
		// 		++$index;
		// 	}
		// }

		function foreachValue($iterable, $closure) {
			foreach ($iterable as $v) $closure($v);
		}

		function foreachKeyValue($iterable, $closure) {
			foreach ($iterable as $k => $v) $closure($k, $v);
		}

		function foreachValueAt($iterable, $closure, $i = 0) {
			foreach ($iterable as $v) {
				$closure($v, $i);
				++$i;
			}
		}

		function foreachKeyValueAt($iterable, $closure, $i = 0) {
			foreach ($iterable as $k => $v) {
				$closure($k, $v, $i);
				++$i;
			}
		}
	}
}

namespace {
echo  '<!doctype html>', "\n";
 //  #/Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton# // 1, 1 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
   //  #base                                                                   // 1, 1 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);            // 2, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->pathStatic = '/demo/v2/static/baixing';                            // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->pathCSS = $data->pathStatic . '/css/dist';                         // 4, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->pathJS = $data->pathStatic . '/js/dist';                           // 5, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->pageId = '';                                                       // 6, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->pageTitle = '';                                                    // 7, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->metaKeywords = 'CMUI, UI, Framework, CSS, Mobile, Web';            // 8, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     $data->metaDescription = 'CMUI - Lightweight UI solution for mobile web. CMUI 是一个专攻移动网页的 UI 框架，它提供了丰富的组件和简洁的接口，开箱即用。CMUI 帮助开发者摆脱样式细节和兼容性困扰，从而腾出更多精力投入到业务开发中。';// 9, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
       $data->pageId = 'panel';                                                // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
       $data->pageTitle = 'Panel';                                             // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
  
echo     '<html';                                                              // 11, 1 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo       ' lang="zh-cmn-Hans"';                                              // 11, 6 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo      '>';
echo       '<head>';                                                           // 12, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo         '<meta';                                                          // 13, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           ' charset="utf-8"';                                             // 13, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo          '>';
echo         '<title>';                                                        // 14, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
         //  #title                                                            // 15, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
           if ($data->pageTitle) {                                             // 16, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               htmlspecialchars($data->pageTitle, 0x88);                   // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               ' - ';                                                      // 18, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
           }
echo             'CMUI Demo';                                                  // 19, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo         '</title>';
      
       //  #head-meta                                                          // 21, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           '<meta';                                                        // 22, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             ' name="viewport"';                                           // 22, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             ' content="initial-scale=1, user-scalable=no"';               // 23, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo            '>';
       //  #head-seo                                                           // 24, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
         if ($data->metaKeywords) {                                            // 25, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             '<meta';                                                      // 25, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               ' name="keywords"';                                         // 26, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               \jedi\attribute('content', ($data->metaKeywords));          // 27, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo              '>';
         }
         if ($data->metaDescription) {                                         // 28, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             '<meta';                                                      // 28, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               ' name="description"';                                      // 29, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               \jedi\attribute('content', ($data->metaDescription));       // 30, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo              '>';
         }
      
       //  #stylesheets                                                        // 32, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           '<link';                                                        // 33, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             ' rel="stylesheet"';                                          // 33, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             \jedi\attribute('href', ($data->pathCSS) . ('/demo.css'));    // 33, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo            '>';
       //  #head-scripts                                                       // 34, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo       '</head>';
    
echo       '<body';                                                            // 36, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo         \jedi\attribute('id', ($data->pageId));                           // 36, 10 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo        '>';
       //  #content                                                            // 37, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           '<article class="subview subview-root">';                       // 38, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
           //  #header                                                         // 39, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               '<header>';                                                 // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                 '<h1>';                                                   // 41, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
                 //  #heading                                                  // 42, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
                   if ($data->pageTitle) {                                     // 43, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                       htmlspecialchars($data->pageTitle, 0x88);           // 44, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
                   }
                   else {                                                      // 45, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                       'CMUI Demo';                                        // 46, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
                   }
echo                 '</h1>';
echo               '</header>';
           //  #main                                                           // 47, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               '<section>';                                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   htmlspecialchars(('浮出面板'), 0x88);                       // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     htmlspecialchars(('浮出面板（以下简称 “面板”）是指视口底部浮出操作面板，其外观和行为类似于 iOS 系统上的 ActionSheet。其内容不仅仅局限于按钮或菜单，可以任意定制。'), 0x88);// 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 12, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<h4>';                                                 // 13, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<strong>';                                           // 13, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '注意';                                               // 13, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</strong>';
echo                   '</h4>';
echo                   '<ul class="cm-text">';                                 // 14, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<li>';                                               // 15, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       htmlspecialchars(('此组件依赖 CMUI 的 Mask 组件。'), 0x88);  // 15, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</li>';
echo                     '<li>';                                               // 16, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       htmlspecialchars(('此组件依赖 Zepto.js 的 '), 0x88);      // 17, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<code>';                                           // 18, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         htmlspecialchars(('fx'), 0x88);                   // 18, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 模块。此模块不在 Zepto 的默认包中，需要手动加载。'), 0x88);// 19, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 20, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 21, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     htmlspecialchars(('在使用浮出面板的 JS API 之前，需要在页面中写好（或由 JS 动态生成）相应的面板元素。面板元素的结构大致如下：'), 0x88);// 21, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 22, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<code>';                                             // 22, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       'div.cm-panel  //面板的容器', "\n";                      // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '	header.cm-panel-header        //标题栏', "\n";
echo                       '		h2.cm-panel-header-title  //标题文字', "\n";
echo                       '		a.cm-panel-header-btn.cm-panel-header-left   //标题栏的左按钮', "\n";
echo                       '		a.cm-panel-header-btn.cm-panel-header-right  //标题栏的右按钮', "\n";
echo                       '	main.cm-panel-content.cm-scroll-box  //面板主体', "\n";
echo                       '		ul.cm-list', "\n";
echo                       '			...', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                   '<p>';                                                  // 31, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '面板标题栏的左右按钮也可以添加 ';                                   // 32, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<code>';                                             // 33, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       htmlspecialchars(('.cm-panel-header-btn-minor'), 0x88);// 33, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</code>';
echo                     ' 类，以作弱化处理。';                                         // 34, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 36, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 37, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     htmlspecialchars(('浮出面板并不是静态的布局元素，且默认不显示，因此，如果要看它的样式，还是要由 JS API 来打开它，才能看到它的庐山真面目。'), 0x88);// 38, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 40, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '<h2>';                                                   // 41, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   htmlspecialchars(('JS API'), 0x88);                     // 41, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 42, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 43, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '在 JS 中调用以下 API，即可触发相应的功能。';                          // 43, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 44, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 45, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '各参数的含义详见 API 文档（暂未完成）。';                             // 45, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<section>';                                              // 46, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<h3>';                                                 // 47, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '显示';                                                 // 47, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 48, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<dt>';                                               // 49, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<code>';                                           // 49, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         htmlspecialchars(('CMUI.panel.show(elem, options)'), 0x88);// 49, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<a class="cm-btn"';                                // 51, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         \jedi\attribute('href', ('#'));                   // 51, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         \jedi\attribute('data-action', ('demo-panel-show'));// 51, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                        '>';
echo                         htmlspecialchars(('显示'), 0x88);                   // 52, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</a>';
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo                 '<section>';                                              // 53, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<h3>';                                                 // 54, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '隐藏';                                                 // 54, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 55, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<dt>';                                               // 56, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<code>';                                           // 56, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         htmlspecialchars(('CMUI.panel.hide(options)'), 0x88);// 56, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 57, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<p>';                                              // 58, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         '请在浮出的面板中，点击标题栏中的左右按钮来测试隐藏效果。';                   // 58, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</p>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 59, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<strong>';                                           // 60, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 60, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</strong>';
echo                     '：在默认情况下，点击遮罩层并不能隐藏浮出面板。';                            // 61, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 62, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<h3>';                                                 // 63, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '切至其它面板';                                             // 63, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 64, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<dt>';                                               // 65, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<code>';                                           // 65, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         htmlspecialchars(('CMUI.panel.switchTo(elem, options)'), 0x88);// 65, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 66, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '请在浮出的面板中，点击 “切至其它面板” 菜单来测试效果。';                    // 66, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo                 '<section>';                                              // 67, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<h3>';                                                 // 68, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '切回上一面板';                                             // 68, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 69, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '<dt>';                                               // 70, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '<code>';                                           // 70, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                         htmlspecialchars(('CMUI.panel.switchBack(options)'), 0x88);// 70, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 71, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                       '请在切换后的面板中，点击标题栏中的 “返回” 按钮来测试效果。';                  // 71, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo               '</section>';
            
             // section                                                        // 73, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
             // h2 "HTML API"
             // div.intro
             // 	p '本组件还支持声明式的 HTML API。只需要在触发动作的元素（以下简称 “触发元素”）身上加上特定的属性，该元素就具备相应的功能了。'
             // div.intro
             // 	p '各参数的含义详见 API 文档（暂未完成）。'
             // section
             // 	h3 '显示'
             // 	div.intro
             // 		p > code '[data-action="cm-panel-show"]'
             // 		p '触发元素的示例如下：'
             // 		pre > code
             // 			'a  //触发元素
             // 					@data-action="cm-panel-show"  //指定显示动作
             // 					@href="#demo-panel"           //指定面板元素的 ID
             // 		p '或者：'
             // 		pre > code
             // 			'button  //触发元素
             // 					@data-action="cm-panel-show"  //指定显示动作
             // 					@data-target="#demo-panel"    //指定面板元素的 ID
             // section
             // 	h3 '隐藏'
             // 	div.intro
             // 		p > code '[data-action="cm-panel-hide"]'
             // 		pre > code
             // 			'a  //触发元素
             // 					@data-action="cm-panel-hide"  //指定隐藏动作
             // 					@href="#"  //置空，无需指定面板元素
             // 		p '或者：'
             // 		pre > code
             // 			'button  //触发元素
             // 					@data-action="cm-panel-hide"  //指定隐藏动作
             // section
             // 	h3 '切至其它面板'
             // 	div.intro
             // 		p > code '[data-action="cm-panel-switch-to"]'
             // 		pre > code
             // 			'a  //触发元素
             // 					@data-action="cm-panel-switch-to"  //指定切换动作
             // 					@href="#demo-panel-alt"  //指定另一面板元素的 ID
             // 		p
             // 			'同理，用 '
             // 			code '<button>'
             // 			' 元素作为触发元素也是可以的。'
             // section
             // 	h3 '切回上一面板'
             // 	div.intro
             // 		p > code '[data-action="cm-panel-switch-back"]'
             // 		pre > code
             // 			'a  //触发元素
             // 					@data-action="cm-panel-switch-back"  //指定切回动作
             // 					@href="#"  //置空，无需指定上一面板元素
             // 		p
             // 			'同理，用 '
             // 			code '<button>'
             // 			' 元素作为触发元素也是可以的。'
          
           //  #back                                                           // 49, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
             if ($data->pageTitle) {                                           // 50, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                 '<section class="back">';                                 // 50, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                   '<a';                                                   // 51, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                     \jedi\attribute('href', ('./'));                      // 51, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                    '>';
echo                     htmlspecialchars(('<< 返回首页'), 0x88);                  // 52, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                   '</a>';
echo                 '</section>';
             }
           //  #footer                                                         // 53, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               '<footer>';                                                 // 54, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo                 '&copy; CMUI.NET';                                        // 55, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo               '</footer>';
echo           '</article>';
      
       //  #subviews                                                           // 57, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
       //  #widgets                                                            // 58, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           '<div class="cm-panel" id="demo-panel">';                       // 132, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo             '<header class="cm-panel-header">';                           // 133, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '<h2 class="cm-panel-header-title">';                       // 134, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '浮出面板';                                                   // 134, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</h2>';
echo               '<a class="cm-panel-header-btn cm-panel-header-left cm-panel-header-btn-minor"';// 135, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 ' href="#"';                                              // 135, 86 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 \jedi\attribute('data-action', ('demo-panel-hide'));      // 135, 96 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                '>';
echo                 '取消';                                                     // 136, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</a>';
echo               '<a class="cm-panel-header-btn cm-panel-header-right"';     // 137, 126 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 ' href="#"';                                              // 137, 61 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 \jedi\attribute('data-action', ('demo-panel-hide'));      // 137, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                '>';
echo                 '确定';                                                     // 138, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</a>';
echo             '</header>';
echo             '<main class="cm-panel-content cm-scroll-box">';              // 139, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '<ul class="cm-list">';                                     // 140, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '<li class="cm-list-with-right-arrow">';                  // 141, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<a';                                                   // 142, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     ' href="#"';                                          // 143, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     \jedi\attribute('data-action', ('demo-panel-switch-to'));// 144, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                    '>';
echo                     '切至其它面板';                                             // 145, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</a>';
echo                 '</li>';
echo                 '<li>';                                                   // 146, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 146, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 146, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 147, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 147, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 147, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 148, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 148, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 148, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 149, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 149, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 149, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 150, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 150, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 150, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 151, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 151, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 151, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 152, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 152, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 152, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 153, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 153, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 153, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 154, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 154, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 154, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 155, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 155, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 155, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 156, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 156, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 156, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 157, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 157, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 157, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 158, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 158, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 158, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 159, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 159, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第一个面板的列表项';                                          // 159, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo               '</ul>';
echo             '</main>';
echo           '</div>';
        
echo           '<div class="cm-panel" id="demo-panel-alt">';                   // 161, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo             '<header class="cm-panel-header">';                           // 162, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '<h2 class="cm-panel-header-title">';                       // 163, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '另一个面板';                                                  // 163, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</h2>';
echo               '<a class="cm-panel-header-btn cm-panel-header-left cm-panel-header-btn-minor"';// 164, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 ' href="#"';                                              // 164, 86 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 \jedi\attribute('data-action', ('demo-panel-switch-back'));// 164, 96 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                '>';
echo                 '返回';                                                     // 165, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</a>';
echo               '<a class="cm-panel-header-btn cm-panel-header-right"';     // 166, 133 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 ' href="#"';                                              // 166, 61 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 \jedi\attribute('data-action', ('demo-panel-hide'));      // 166, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                '>';
echo                 '确定';                                                     // 167, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '</a>';
echo             '</header>';
echo             '<main class="cm-panel-content cm-scroll-box">';              // 168, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo               '<ul class="cm-list">';                                     // 169, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                 '<li>';                                                   // 170, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 170, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第二个面板的列表项';                                          // 170, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo                 '<li>';                                                   // 171, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '<p>';                                                  // 171, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                     '第二个面板的列表项';                                          // 171, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/panel.jedi
echo                   '</p>';
echo                 '</li>';
echo               '</ul>';
echo             '</main>';
echo           '</div>';
      
       //  #defer-scripts                                                      // 60, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo           '<script';                                                      // 61, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             \jedi\attribute('src', ($data->pathJS) . ('/lib.js'));        // 61, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo            '>';
echo           '</script>';
echo           '<script';                                                      // 62, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             \jedi\attribute('src', ($data->pathJS) . ('/cmui.js'));       // 62, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo            '>';
echo           '</script>';
echo           '<script';                                                      // 63, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo             \jedi\attribute('src', ($data->pathJS) . ('/demo.js'));       // 63, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/_skeleton.jedi
echo            '>';
echo           '</script>';
echo       '</body>';
echo     '</html>';
  

}
