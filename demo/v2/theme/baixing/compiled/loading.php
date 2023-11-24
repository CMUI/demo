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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
       $data->pageId = 'loading';                                              // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
       $data->pageTitle = 'Loading';                                           // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
  
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
echo               '<section class="loading">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   htmlspecialchars(('加载提示'), 0x88);                       // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     htmlspecialchars(('加载提示（Loading 动画图标）一种很好的暗示用户等待的方式，可以显著提升用户的耐心。'), 0x88);// 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     htmlspecialchars(('当某个操作可能耗时超过 100ms 时，就应该使用 Loading 提示。当某个操作耗时超过 10 秒且仍然存活时，应在 Loading 提示上更新提示语，以提示用户当前操作仍在进行。'), 0x88);// 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<section class="normal">';                               // 13, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   '<dl>';                                                 // 14, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 15, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 16, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 16, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-show')); // 16, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('显示'), 0x88);                   // 17, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 18, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 18, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         'CMUI.loading.show()';                            // 18, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl>';                                                 // 19, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 20, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 21, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 21, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-hide')); // 21, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('隐藏'), 0x88);                   // 22, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 23, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 23, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         'CMUI.loading.hide()';                            // 23, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl>';                                                 // 24, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 25, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 26, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 26, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-fade-in'));// 26, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('淡入'), 0x88);                   // 27, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 28, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 28, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         'CMUI.loading.fadeIn()';                          // 28, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl>';                                                 // 29, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 30, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 31, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 31, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-fade-out'));// 31, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('淡出'), 0x88);                   // 32, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 33, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 33, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         'CMUI.loading.fadeOut()';                         // 33, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo                 '<section class="with-text">';                            // 34, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                   '<dl>';                                                 // 35, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 36, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 37, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 37, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-show-with-text'));// 37, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('带文字显示'), 0x88);                // 38, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 39, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 39, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         htmlspecialchars(('CMUI.loading.show(\'str\')'), 0x88);// 39, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                     '<dd>';                                               // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         htmlspecialchars(('CMUI.loading.fadeIn(\'str\')'), 0x88);// 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl>';                                                 // 41, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 42, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 43, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 43, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-update-text'));// 43, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('更新文字'), 0x88);                 // 44, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 45, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 45, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         htmlspecialchars(('CMUI.loading.updateText(\'new-str\')'), 0x88);// 45, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl>';                                                 // 46, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                     '<dt>';                                               // 47, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<a class="cm-btn"';                                // 48, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('href', ('#'));                   // 48, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         \jedi\attribute('data-action', ('loading-clear-text'));// 48, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                        '>';
echo                         htmlspecialchars(('清除文字'), 0x88);                 // 49, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</a>';
echo                     '</dt>';
echo                     '<dd>';                                               // 50, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '<code>';                                           // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                         htmlspecialchars(('CMUI.loading.updateText(\'\')'), 0x88);// 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/loading.jedi
echo                       '</code>';
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo               '</section>';
          
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
