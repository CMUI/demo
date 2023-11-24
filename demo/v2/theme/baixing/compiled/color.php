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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
       $data->pageId = 'color';                                                // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
       $data->pageTitle = 'Color';                                             // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
  
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
echo               '<section class="color">';                                  // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   htmlspecialchars(('颜色'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<strong>';                                           // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 12, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：本页内容还未完全确定。'), 0x88);             // 13, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 14, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     htmlspecialchars(('设计师已提供以下颜色，应通过变量来使用这些颜色。'), 0x88); // 14, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<section>';                                              // 16, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '<h3>';                                                 // 17, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     htmlspecialchars(('文本颜色'), 0x88);                     // 17, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '</h3>';
echo                   '<dl class="code-result fg-light">';                    // 18, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 19, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-fg-light = #999';                      // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 20, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[浅灰]';                                             // 20, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 21, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '次要文本颜色';                                           // 21, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result fg">';                          // 22, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 23, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-fg = #666';                            // 23, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 24, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[中灰]';                                             // 24, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 25, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '常规的文本颜色';                                          // 25, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result fg-dark">';                     // 26, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 27, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 27, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-fg-dark = #333';                       // 27, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 28, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[深灰]';                                             // 28, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 29, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '强化的文本颜色';                                          // 29, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section>';                                              // 31, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '<h3>';                                                 // 32, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     htmlspecialchars(('基本色调'), 0x88);                     // 32, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '</h3>';
echo                   '<dl class="code-result primary">';                     // 33, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 34, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 34, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-primary = #ff4466';                    // 34, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 35, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[玫红色]';                                            // 35, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 36, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '网站主题色、着重色';                                        // 36, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result highlight">';                   // 37, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 38, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 38, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-highlight = #ff9833';                  // 38, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 39, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[橙色]';                                             // 39, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 40, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '高亮文本色';                                            // 40, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result link">';                        // 41, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 42, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-link = #015EE7';                       // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 43, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[亮蓝]';                                             // 43, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 44, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '链接文本色';                                            // 44, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result bg">';                          // 45, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 46, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 46, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-bg = white';                           // 46, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 47, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[纯白]';                                             // 47, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 48, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '区块背景色';                                            // 48, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                   '<dl class="code-result stage">';                       // 49, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 50, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-stage = #f2f2f2';                      // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 51, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[极浅灰]';                                            // 51, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 52, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '页面主体区域的底色';                                        // 52, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section>';                                              // 54, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '<h3>';                                                 // 55, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     htmlspecialchars(('其它'), 0x88);                       // 55, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                   '</h3>';
echo                   '<dl class="code-result splitter">';                    // 56, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '<dt>';                                               // 57, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '<code>';                                           // 57, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                         '$cm-color-splitter = #e6e6e6';                   // 57, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 58, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '[黑灰]';                                             // 58, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                     '</dd>';
echo                     '<dd>';                                               // 59, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
echo                       '内容分隔线';                                            // 59, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/color.jedi
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
