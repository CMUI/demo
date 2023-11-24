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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
       $data->pageId = 'btn';                                                  // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
       $data->pageTitle = 'Button';                                            // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
  
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
echo               '<section class="summary">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('目前仅可通过预定义的类名（而不是 mixin）来设置按钮样式。'), 0x88);// 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('为元素添加 '), 0x88);                   // 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 14, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn'), 0x88);                // 14, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类名，即可得到一个实色按钮。'), 0x88);          // 15, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 16, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<strong>';                                           // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 17, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：Firefox 48- 可能无法正常显示实色标签效果。'), 0x88);// 18, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<dl class="code-result">';                               // 20, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 21, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 21, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn'), 0x88);                // 21, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 22, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<a class="cm-btn"';                                  // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       \jedi\attribute('href', ('#'));                     // 23, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                      '>';
echo                       htmlspecialchars(('实色按钮'), 0x88);                   // 24, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</a>';
echo                   '</dd>';
echo                 '</dl>';
              
echo                 '<div class="intro">';                                    // 26, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 27, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('需要空心按钮（ghost button）？为按钮追加 '), 0x88);// 28, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 29, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn-bordered'), 0x88);       // 29, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类就可以了。（以下所有段落都同时提供了实色按钮和实心按钮内的效果。）'), 0x88);// 30, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 31, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 32, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-bordered'), 0x88);// 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 33, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<a class="cm-btn cm-btn-bordered"';                  // 34, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       \jedi\attribute('href', ('#'));                     // 34, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                      '>';
echo                       htmlspecialchars(('边框型按钮'), 0x88);                  // 35, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</a>';
echo                   '</dd>';
echo                 '</dl>';
              
echo                 '<hr>';                                                   // 37, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<div class="intro">';                                    // 38, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 39, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('其它说明'), 0x88);                     // 39, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<ul class="cm-text">';                                 // 40, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<li>';                                               // 41, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('CMUI 提供了大量辅助类，用于设置按钮的尺寸、颜色等样式。这些辅助类通常可以组合使用。'), 0x88);// 41, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</li>';
echo                     '<li>';                                               // 42, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('所有按钮默认显示为块级，可以按需对特定按钮指定宽度属性。'), 0x88);// 42, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</li>';
echo                     '<li>';                                               // 43, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('不建议在文本段落中混入按钮。'), 0x88);         // 43, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="btn-size">';                               // 45, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 46, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('按钮尺寸'), 0x88);                       // 46, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 47, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 48, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('为按钮添加尺寸辅助类，可以设置其尺寸。'), 0x88);      // 48, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 49, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 50, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 50, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-xs'), 0x88);      // 50, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 51, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 52, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-xs"';                      // 53, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 53, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('超小按钮'), 0x88);                 // 54, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-xs"';      // 55, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 55, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('超小按钮'), 0x88);                 // 56, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 57, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 58, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 58, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-s'), 0x88);       // 58, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 59, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 60, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-s"';                       // 61, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 61, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('小按钮'), 0x88);                  // 62, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-s"';       // 63, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 63, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('小按钮'), 0x88);                  // 64, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 65, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 66, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 66, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn'), 0x88);                // 66, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 67, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 68, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn"';                                // 69, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 69, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('常规按钮'), 0x88);                 // 70, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered"';                // 71, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 71, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('常规按钮'), 0x88);                 // 72, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 73, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 74, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 74, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-l'), 0x88);       // 74, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 75, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 76, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-l"';                       // 77, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 77, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('大按钮'), 0x88);                  // 78, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-l"';       // 79, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 79, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('大按钮'), 0x88);                  // 80, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 81, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 82, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 82, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-xl'), 0x88);      // 82, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 83, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 84, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-xl"';                      // 85, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 85, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('超大按钮'), 0x88);                 // 86, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-xl"';      // 87, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 87, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('超大按钮'), 0x88);                 // 88, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="btn-type">';                               // 90, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 91, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('场景类型'), 0x88);                       // 91, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 92, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 93, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('按钮在不同的功能场景下，往往体现为不同的颜色。CMUI 定义了以下场景类名。'), 0x88);// 93, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 94, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 95, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 95, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-primary'), 0x88); // 95, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 96, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 97, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-primary"';                 // 98, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 98, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('重要按钮'), 0x88);                 // 99, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-primary"'; // 100, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 100, 65 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('重要按钮'), 0x88);                 // 101, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 102, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 103, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 103, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-info'), 0x88);    // 103, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 104, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 105, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-info"';                    // 106, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 106, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('信息按钮'), 0x88);                 // 107, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-info"';    // 108, 55 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 108, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('信息按钮'), 0x88);                 // 109, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 110, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 111, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 111, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-success'), 0x88); // 111, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 112, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 113, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-success"';                 // 114, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 114, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('成功按钮'), 0x88);                 // 115, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-success"'; // 116, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 116, 65 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('成功按钮'), 0x88);                 // 117, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 118, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 119, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 119, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-danger'), 0x88);  // 119, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 120, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 121, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-danger"';                  // 122, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 122, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('危险按钮'), 0x88);                 // 123, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-danger"';  // 124, 57 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 124, 64 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('危险按钮'), 0x88);                 // 125, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 126, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 127, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 127, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('.cm-btn.cm-btn-warning'), 0x88); // 127, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 128, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 129, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-warning"';                 // 130, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 130, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('警告按钮'), 0x88);                 // 131, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered cm-btn-warning"'; // 132, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 132, 65 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('警告按钮'), 0x88);                 // 133, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="form-btn">';                               // 135, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 136, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('表单按钮'), 0x88);                       // 136, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 137, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 138, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('以上的各个类名除了可以用于 '), 0x88);           // 139, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 140, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('<a>'), 0x88);                    // 140, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素外，还可用于 '), 0x88);               // 141, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 142, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('<input>'), 0x88);                // 142, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 和 '), 0x88);                      // 143, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 144, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('<button>'), 0x88);               // 144, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 这样的表单按钮元素。'), 0x88);              // 145, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 146, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('表单内的按钮应该优先选择表单元素来实现。'), 0x88);     // 147, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 148, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<p>';                                                  // 149, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('表单按钮天生具备收缩包围的特性，在不指定宽度时，它们只呈现最小宽度。为使它们呈现出通长的块级效果，已对它们设置 '), 0x88);// 150, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 151, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       'width: 100%;';                                     // 151, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                     htmlspecialchars(('。'), 0x88);                        // 152, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 153, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 154, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 154, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       'input.cm-btn @type="button"';                      // 154, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 155, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<input class="cm-btn"';                              // 156, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       \jedi\attribute('type', ('button'));                // 156, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       \jedi\attribute('value', ('input 元素'));             // 156, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                      '>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<dl class="code-result">';                               // 157, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<dt>';                                                 // 158, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<code>';                                             // 158, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       'button.cm-btn';                                    // 158, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 159, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<button class="cm-btn"';                             // 160, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       \jedi\attribute('type', ('button'));                // 160, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                      '>';
echo                       htmlspecialchars(('button 元素'), 0x88);              // 161, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</button>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="btn-status">';                             // 163, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 164, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('按钮状态'), 0x88);                       // 164, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<section class="btn-status-hover">';                     // 165, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 166, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('悬停状态'), 0x88);                     // 166, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 167, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 168, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('鼠标悬停时可见此状态，不需要修改结构。'), 0x88);    // 168, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                     '<p>';                                                // 169, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('触屏设备可能不支持此状态。'), 0x88);          // 169, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section class="btn-status-active">';                    // 170, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 171, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('激活状态'), 0x88);                     // 171, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 172, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 173, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('鼠标按下或手指触摸时可见此状态，不需要修改结构。'), 0x88);// 173, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                     '<p>';                                                // 174, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('如果需要按钮一直保持在激活的状态（比如你需要做一个具有开关功能的按钮），可以通过添加 '), 0x88);// 175, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 176, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('.active'), 0x88);              // 176, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类来实现效果。效果如下（仅列出两种颜色的示例）：'), 0x88);// 177, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<dl class="code-result">';                             // 178, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<dt>';                                               // 179, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 179, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '.cm-btn.active';                                 // 179, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 180, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<div class="cm-btn-line">';                        // 181, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '<a class="cm-btn active"';                       // 182, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 182, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('激活的按钮'), 0x88);              // 183, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                         '<a class="cm-btn cm-btn-bordered active"';       // 184, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 184, 61 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('激活的按钮'), 0x88);              // 185, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</dd>';
echo                     '<dt>';                                               // 186, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 186, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '.cm-btn.cm-btn-primary.active';                  // 186, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 187, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<div class="cm-btn-line">';                        // 188, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '<a class="cm-btn cm-btn-primary active"';        // 189, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 189, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('激活的按钮'), 0x88);              // 190, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                         '<a class="cm-btn cm-btn-primary cm-btn-bordered active"';// 191, 69 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 191, 76 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('激活的按钮'), 0x88);              // 192, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section class="btn-status-disabled">';                  // 194, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 195, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('禁用状态'), 0x88);                     // 195, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 196, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 197, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('表单按钮（'), 0x88);                  // 198, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 199, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('<button>'), 0x88);             // 199, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars(('、'), 0x88);                      // 200, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 201, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('<input>'), 0x88);              // 201, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 元素）具有 '), 0x88);                // 202, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 203, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('disabled'), 0x88);             // 203, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 属性时，可见此状态。'), 0x88);            // 204, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                     '<p>';                                                // 205, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('对于由 '), 0x88);                   // 206, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 207, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('<a>'), 0x88);                  // 207, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 元素实现的按钮，需要添加 '), 0x88);         // 208, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 209, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('.disabled'), 0x88);            // 209, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类。'), 0x88);                    // 210, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                   '</div>';
                
                 // 禁用                                                         // 212, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<div class="intro">';                                  // 213, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 214, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '不同颜色按钮的禁用效果都是一样的：';                                // 214, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<dl class="code-result">';                             // 215, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<dt>';                                               // 216, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 216, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         'a.cm-btn.disabled';                              // 216, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 217, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<div class="cm-btn-line">';                        // 218, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '<a class="cm-btn disabled"';                     // 219, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 219, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('禁用的按钮'), 0x88);              // 220, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                         '<a class="cm-btn cm-btn-bordered disabled"';     // 221, 56 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           \jedi\attribute('href', ('#'));                 // 221, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                          '>';
echo                           htmlspecialchars(('禁用的按钮'), 0x88);              // 222, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</dd>';
echo                   '</dl>';
                
                 // 禁用 + 激活                                                    // 224, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
                 // div.intro                                                  // 225, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
                 // p '禁用且激活的效果如下：'
                 // dl.code-result                                             // 227, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
                 // dt > code 'a.cm-btn.active.disabled'
                 // dd
                 // 	div.cm-btn-line
                 // 		a.cm-btn.active.disabled @href="#"
                 // 			"禁用的按钮"
                 // 		a.cm-btn.cm-btn-bordered.active.disabled @href="#"
                 // 			"禁用的按钮"
                 // dl.code-result                                             // 235, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
                 // dt > code 'button.cm-btn.active @disabled'
                 // dd
                 // 	div.cm-btn-line
                 // 		button.cm-btn.active @disabled
                 // 			"禁用的按钮"
                 // 		button.cm-btn.cm-btn-bordered.active @disabled
                 // 			"禁用的按钮"
                
                 // div.intro                                                  // 244, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
                 // p
                 // 	"如需动态切换按钮的禁用状态，请使用以下 JavaScript API（开发中）："
                 // ul
                 // 	li > code "CMUI.btn.disable(btn)"
                 // 	li > code "CMUI.btn.enable(btn)"
                
echo                   '<div class="intro">';                                  // 251, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<h4>';                                               // 252, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 252, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</h4>';
echo                     '<ul class="cm-text">';                               // 253, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<li>';                                             // 254, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '被禁用的按钮添加 ';                                      // 255, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '<code>';                                         // 256, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                           htmlspecialchars(('.active'), 0x88);            // 256, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '</code>';
echo                         htmlspecialchars((' 类无效。'), 0x88);                // 257, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</li>';
echo                       '<li>';                                             // 258, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '被禁用的按钮无法响应点击动作。如果你真的需要监听它们的点击事件，则只能为它们包一层容器，然后监听容器的点击事件。';// 258, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</li>';
echo                     '</ul>';
echo                   '</div>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section class="btn-multiple">';                           // 260, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<h2>';                                                   // 261, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   htmlspecialchars(('按钮的排列组合'), 0x88);                    // 261, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '</h2>';
echo                 '<section class="btn-line">';                             // 262, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 263, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('并排的按钮'), 0x88);                    // 263, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 264, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 265, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('如果需要呈现并排的按钮，请使用以下结构：'), 0x88);   // 265, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 266, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 266, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '.cm-btn-line', "\n";                             // 267, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '	.cm-btn', "\n";
echo                         '	.cm-btn', "\n";
echo                         '	.cm-btn', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<div class="result">';                                 // 271, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-line">';                          // 272, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn"';                                // 273, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 273, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 274, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn"';                                // 275, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 275, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 276, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn"';                                // 277, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 277, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 278, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                     '<div class="cm-btn-line">';                          // 279, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-bordered"';                // 280, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 280, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 281, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered"';                // 282, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 282, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 283, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered"';                // 284, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 284, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 285, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</div>';
echo                   '<div class="intro">';                                  // 286, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<h4>';                                               // 287, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 287, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</h4>';
echo                     '<p>';                                                // 288, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('如果需要调整各按钮的宽度，建议给 '), 0x88);      // 289, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 290, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('max-width'), 0x88);            // 290, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 和 '), 0x88);                    // 291, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 292, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         htmlspecialchars(('min-width'), 0x88);            // 292, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 属性指定百分比值。'), 0x88);             // 293, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                   '</div>';
echo                 '</section>';
              
echo                 '<hr>';                                                   // 295, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                 '<section class="btn-group">';                            // 296, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '<h3>';                                                 // 297, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     htmlspecialchars(('按钮组合'), 0x88);                     // 297, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 298, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<p>';                                                // 299, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       htmlspecialchars(('如果需要将多个按钮合并为一组，请使用以下结构：'), 0x88);// 300, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 301, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<code>';                                           // 301, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '.cm-btn-group', "\n";                            // 302, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         '	.cm-btn', "\n";
echo                         '	.cm-btn', "\n";
echo                         '	.cm-btn', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<div class="result">';                                 // 306, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                     '<div class="cm-btn-group">';                         // 307, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn"';                                // 308, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 308, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 309, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn"';                                // 310, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 310, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 311, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn"';                                // 312, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 312, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('按钮'), 0x88);                   // 313, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                     '<div class="cm-btn-group">';                         // 314, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '<a class="cm-btn cm-btn-bordered"';                // 315, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 315, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 316, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered"';                // 317, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 317, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 318, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-bordered"';                // 319, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                         \jedi\attribute('href', ('#'));                   // 319, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                        '>';
echo                         htmlspecialchars(('表单按钮'), 0x88);                 // 320, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/btn.jedi
echo                       '</a>';
echo                     '</div>';
echo                   '</div>';
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
