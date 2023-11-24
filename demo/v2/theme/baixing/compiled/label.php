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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
       $data->pageId = 'label';                                                // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
       $data->pageTitle = 'Label';                                             // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
  
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
echo               '<section class="summary">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   htmlspecialchars(('标签'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('为行内元素添加 '), 0x88);                 // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label'), 0x88);              // 13, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类名即可将其设置为标签。'), 0x88);            // 14, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 15, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('标签的 '), 0x88);                     // 16, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('display'), 0x88);                // 17, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 属性将被设置为 '), 0x88);                // 18, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('inline-block'), 0x88);           // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars(('。'), 0x88);                        // 20, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 21, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<dt>';                                                 // 22, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 22, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label'), 0x88);              // 22, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 23, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label">';                            // 23, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('标签'), 0x88);                     // 24, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="size">';                                   // 26, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '<h2>';                                                   // 27, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   htmlspecialchars(('标签尺寸'), 0x88);                       // 27, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 28, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<p>';                                                  // 29, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('为标签追加辅助类即可设置其尺寸。'), 0x88);         // 30, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 31, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<dt>';                                                 // 32, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label.cm-label-s'), 0x88);   // 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 33, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label cm-label-s">';                 // 34, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('小标签'), 0x88);                    // 35, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 36, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 36, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label'), 0x88);              // 36, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 37, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label">';                            // 38, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('常规标签'), 0x88);                   // 39, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 40, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 40, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label.cm-label-l'), 0x88);   // 40, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 41, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label cm-label-l">';                 // 42, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('大标签'), 0x88);                    // 43, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 44, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 44, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label.cm-label-xl'), 0x88);  // 44, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 45, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label cm-label-xl">';                // 46, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('超大标签'), 0x88);                   // 47, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                 '</dl>';
echo                 '<hr>';                                                   // 48, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '<div class="intro">';                                    // 49, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<p>';                                                  // 50, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('把 '), 0x88);                       // 51, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 52, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label'), 0x88);              // 52, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类名加到 '), 0x88);                   // 53, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 54, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('<small>'), 0x88);                // 54, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素上也可以得到 “小标签” 的效果。'), 0x88);     // 55, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 56, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<dt>';                                                 // 57, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 57, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('small.cm-label'), 0x88);         // 57, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 58, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<small class="cm-label">';                           // 59, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('小标签'), 0x88);                    // 60, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</small>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="style">';                                  // 62, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '<h2>';                                                   // 63, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   htmlspecialchars(('标签样式'), 0x88);                       // 63, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 64, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<p>';                                                  // 65, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('给标签追加 '), 0x88);                   // 66, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 67, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label-solid'), 0x88);        // 67, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类名可以得到实心标签的效果。'), 0x88);          // 68, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 69, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<strong>';                                           // 70, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 70, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：Firefox 48- 可能无法正常显示实心标签效果。'), 0x88);// 71, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 72, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<dt>';                                                 // 73, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 73, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('.cm-label.cm-label-solid'), 0x88);// 73, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 74, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<span class="cm-label cm-label-solid">';             // 75, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('实心标签'), 0x88);                   // 76, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</span>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section class="color">';                                  // 78, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '<h2>';                                                   // 79, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   htmlspecialchars(('标签颜色'), 0x88);                       // 79, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 80, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '<p>';                                                  // 81, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     htmlspecialchars(('对标签设置 '), 0x88);                   // 82, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '<code>';                                             // 83, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                       htmlspecialchars(('color'), 0x88);                  // 83, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 属性即可设置标签的主色调。'), 0x88);           // 84, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/label.jedi
echo                   '</p>';
echo                 '</div>';
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
