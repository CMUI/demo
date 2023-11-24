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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
       $data->pageId = 'grid-list';                                            // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
       $data->pageTitle = 'Grid List';                                         // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
  
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
echo               '<section class="summary">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('网格列表是以行列式呈现的列表。'), 0x88);          // 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('网格列表元素必须具有 '), 0x88);              // 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 14, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('.cm-grid-list'), 0x88);          // 14, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 这个基础类名。'), 0x88);                 // 15, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 16, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 16, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       'ul.cm-grid-list', "\n";                            // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '	li > a', "\n";
echo                       '	li > a', "\n";
echo                       '	li > a', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<ul class="cm-grid-list">';                              // 21, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<li>';                                                 // 22, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 22, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 22, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 24, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 24, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 24, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 25, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 26, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 26, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 26, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 27, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 28, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 28, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 28, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 29, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 30, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 30, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 30, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 31, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 32, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 32, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 33, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                 '</ul>';
echo               '</section>';
            
echo               '<section class="column-width">';                           // 35, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '<h2>';                                                   // 36, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   htmlspecialchars(('列数与列宽'), 0x88);                      // 36, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 37, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<h3>';                                                 // 38, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('默认两列'), 0x88);                     // 38, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</h3>';
echo                   '<ul class="cm-grid-list">';                            // 39, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<li>';                                               // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 40, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 41, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 42, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 42, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 43, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 44, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 44, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 44, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 45, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 46, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 46, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 46, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 47, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 48, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 48, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 48, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 49, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 50, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 50, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 51, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo                 '<section>';                                              // 52, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<h3>';                                                 // 53, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('多列'), 0x88);                       // 53, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 54, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<p>';                                                // 55, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('可以通过指定列表项的宽度来实现对列数的控制。比如下面的 CSS 代码将列数设置为（最多）4 列，并确保每列最多可显示 6 个汉字。'), 0x88);// 55, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 56, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<code>';                                           // 56, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         '#my-grid-list > li {', "\n";                     // 57, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         '	width: 25%;', "\n";
echo                         '	min-width: 6em;', "\n";
echo                         '}', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 61, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<h3>';                                                 // 62, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('弹性'), 0x88);                       // 62, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 63, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<p>';                                                // 64, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('给列表添加 '), 0x88);                 // 65, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<code>';                                           // 66, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         htmlspecialchars(('.cm-grid-list-flexible'), 0x88);// 66, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类即可将其设置为 “弹性网格列表”。'), 0x88);    // 67, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</p>';
echo                     '<p>';                                                // 68, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('弹性网格列表可以根据屏幕宽度自动调整列数（3～5 列）。'), 0x88);// 69, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 70, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<code>';                                           // 70, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         'ul.cm-grid-list.cm-grid-list-flexible', "\n";    // 71, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         '	li > a', "\n";
echo                         '	li > a', "\n";
echo                         '	...', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-grid-list cm-grid-list-flexible">';      // 75, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<li>';                                               // 76, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 76, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 76, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 77, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 78, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 78, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 78, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 79, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 80, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 80, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 80, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 81, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 82, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 82, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 82, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 83, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 84, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 84, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 84, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 85, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 86, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 86, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 86, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 87, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 88, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 88, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 88, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 89, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 90, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 90, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 90, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 91, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 92, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 92, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 92, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 93, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 94, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 94, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 94, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 95, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                   '<div class="intro">';                                  // 96, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<p>';                                                // 97, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('如果列表项中包含很长的文字，不希望每列太窄裁掉文字，可以给列表添加 '), 0x88);// 98, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<code>';                                           // 99, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         htmlspecialchars(('.cm-grid-list-with-long-text'), 0x88);// 99, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类。它可以让弹性网格列表在窄屏上显示 2 列。'), 0x88);// 100, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 101, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<code>';                                           // 101, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         'ul.cm-grid-list.cm-grid-list-flexible.cm-grid-list-with-long-text', "\n";// 102, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         '	li > a', "\n";
echo                         '	li > a', "\n";
echo                         '	...', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-grid-list cm-grid-list-flexible cm-grid-list-with-long-text">';// 106, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<li>';                                               // 107, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 107, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 107, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 108, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 109, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 109, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 109, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 110, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 111, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 111, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 111, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 112, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 113, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 113, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 113, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 114, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 115, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 115, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 115, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 116, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 117, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<a';                                               // 117, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 117, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88);// 118, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 120, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '<h2>';                                                   // 121, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   htmlspecialchars(('被选中的列表项'), 0x88);                    // 121, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 122, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<p>';                                                  // 123, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('给列表项（'), 0x88);                    // 124, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 125, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('<li>'), 0x88);                   // 125, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</code>';
echo                     htmlspecialchars(('）元素添加 '), 0x88);                   // 126, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 127, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('.selected'), 0x88);              // 127, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类名，即可将其设置为被选中的状态。'), 0x88);       // 128, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 129, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 129, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       'ul.cm-grid-list', "\n";                            // 130, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '	li > a @href="#"', "\n";
echo                       '	li.selected > a @href="#"', "\n";
echo                       '	li > a @href="#"', "\n";
echo                       '	li > a @href="#"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<ul class="cm-grid-list">';                              // 135, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<li>';                                                 // 136, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 136, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 136, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 137, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li class="selected">';                                // 138, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 138, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 138, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('被选中的列表项'), 0x88);                // 139, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 140, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 140, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 140, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 141, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                   '<li>';                                                 // 142, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<a';                                                 // 142, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       \jedi\attribute('href', ('#'));                     // 142, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                      '>';
echo                       htmlspecialchars(('列表项'), 0x88);                    // 143, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</a>';
echo                   '</li>';
echo                 '</ul>';
echo                 '<div class="intro">';                                    // 144, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<p>';                                                  // 145, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('给列表项内的 '), 0x88);                  // 146, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 147, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('<a>'), 0x88);                    // 147, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素添加 '), 0x88);                   // 148, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 149, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       htmlspecialchars(('.selected'), 0x88);              // 149, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类，也可以将该列表项设置为被选中的状态。（以下代码的实际效果同上。）'), 0x88);// 150, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 151, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 151, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       'ul.cm-grid-list', "\n";                            // 152, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '	li > a @href="#"', "\n";
echo                       '	li > a.selected @href="#"', "\n";
echo                       '	li > a @href="#"', "\n";
echo                       '	li > a @href="#"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="form">';                                   // 158, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '<h2>';                                                   // 159, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   htmlspecialchars(('用于表单'), 0x88);                       // 159, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 160, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<p>';                                                  // 161, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     htmlspecialchars(('可用于组织表单中的单选框、复选框等。'), 0x88);       // 161, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 162, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<code>';                                             // 162, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       'form > ul.cm-grid-list', "\n";                     // 163, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '	li > label > input', "\n";
echo                       '	li > label > input', "\n";
echo                       '	li > label > input', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<ul class="cm-grid-list">';                              // 167, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                   '<li>';                                                 // 168, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<label>';                                            // 168, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<input';                                           // 169, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' name="radio"';                                  // 169, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' type="radio"';                                  // 169, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                       htmlspecialchars(('表单选项'), 0x88);                   // 170, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</label>';
echo                   '</li>';
echo                   '<li>';                                                 // 171, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<label>';                                            // 171, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<input';                                           // 172, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' name="radio"';                                  // 172, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' type="radio"';                                  // 172, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                       htmlspecialchars(('表单选项'), 0x88);                   // 173, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</label>';
echo                   '</li>';
echo                   '<li>';                                                 // 174, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<label>';                                            // 174, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<input';                                           // 175, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' name="checkbox"';                               // 175, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' type="checkbox"';                               // 175, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                       htmlspecialchars(('表单选项'), 0x88);                   // 176, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</label>';
echo                   '</li>';
echo                   '<li>';                                                 // 177, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '<label>';                                            // 177, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                       '<input';                                           // 178, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' name="checkbox"';                               // 178, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                         ' type="checkbox"';                               // 178, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                        '>';
echo                       htmlspecialchars(('表单选项'), 0x88);                   // 179, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/grid-list.jedi
echo                     '</label>';
echo                   '</li>';
echo                 '</ul>';
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
