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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
       $data->pageId = 'icon';                                                 // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
       $data->pageTitle = 'Icon';                                              // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
  
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
echo               '<section class="summary">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '</h2>';
              
echo                 '<section>';                                              // 11, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '<h3>';                                                 // 12, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('结构约定'), 0x88);                     // 12, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 13, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<p>';                                                // 14, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       htmlspecialchars(('所有图标采用 '), 0x88);                // 15, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '<code>';                                           // 16, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         htmlspecialchars(('i.cm-icon'), 0x88);            // 16, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 这样的结构。'), 0x88);                // 17, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</p>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 18, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '<h3>';                                                 // 19, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('初始样式'), 0x88);                     // 19, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</h3>';
echo                   '<div class="intro cm-text">';                          // 20, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<p>';                                                // 21, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '<code>';                                           // 22, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         htmlspecialchars(('.cm-icon'), 0x88);             // 22, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类具有以下初始样式：'), 0x88);            // 23, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</p>';
echo                     '<ul>';                                               // 24, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '<li>';                                             // 25, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '显示为块级';                                          // 25, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 26, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '无浮动、无定位属性';                                      // 26, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 27, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '溢出隐藏';                                           // 27, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 28, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '内部文字自动隐藏（可在其内部包含文本，以增强可访问性）';                    // 28, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                     '</ul>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 29, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '<h3>';                                                 // 30, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('图标尺寸'), 0x88);                     // 30, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</h3>';
echo                   '<div class="intro cm-text">';                          // 31, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<p>';                                                // 32, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       htmlspecialchars(('添加以下类名来指定图标的尺寸。'), 0x88);        // 32, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</p>';
echo                     '<ul>';                                               // 33, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '<li>';                                             // 34, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '<code>';                                         // 35, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                           htmlspecialchars(('.cm-x20'), 0x88);            // 35, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '</code>';
echo                         htmlspecialchars((' —— 20px 宽高的正方形'), 0x88);      // 36, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 37, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '<code>';                                         // 38, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                           htmlspecialchars(('.cm-x30'), 0x88);            // 38, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '</code>';
echo                         htmlspecialchars((' —— 30px 宽高的正方形'), 0x88);      // 39, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 40, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '<code>';                                         // 41, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                           htmlspecialchars(('.cm-x40'), 0x88);            // 41, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '</code>';
echo                         htmlspecialchars((' —— 40px 宽高的正方形'), 0x88);      // 42, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                       '<li>';                                             // 43, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '<code>';                                         // 44, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                           htmlspecialchars(('.cm-x50'), 0x88);            // 44, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                         '</code>';
echo                         htmlspecialchars((' —— 50px 宽高的正方形'), 0x88);      // 45, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '</li>';
echo                     '</ul>';
echo                   '</div>';
echo                 '</section>';
echo               '</section>';
echo               '<section class="system-icon">';                            // 46, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '<h2>';                                                   // 47, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   htmlspecialchars(('系统图标'), 0x88);                       // 47, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 48, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '<p>';                                                  // 49, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('CMUI 内置了一些图标，仅供提示框、加载提示等组件内部使用。'), 0x88);// 49, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="custom-icon">';                            // 51, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '<h2>';                                                   // 52, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   htmlspecialchars(('自定义图标'), 0x88);                      // 52, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                 '</h2>';
echo                 '<div class="intro cm-text">';                            // 53, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '<p>';                                                  // 54, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('CMUI 未对图标的实现做限制，选择权完全交给业务层。'), 0x88);// 54, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 55, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('以下图标方案都可与 '), 0x88);               // 56, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<code>';                                             // 57, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       htmlspecialchars(('i.cm-icon'), 0x88);              // 57, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 正常整合：'), 0x88);                   // 58, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                   '</p>';
echo                   '<ul>';                                                 // 59, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<li>';                                               // 60, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       '背景图片（以及 CSS Sprites）';                             // 60, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</li>';
echo                     '<li>';                                               // 61, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       'Icon Font';                                        // 61, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</li>';
echo                     '<li>';                                               // 62, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       'SVG Icon';                                         // 62, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<p>';                                                  // 63, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     htmlspecialchars(('图标尺寸可自行定义，也可以采用上述 '), 0x88);       // 64, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '<code>';                                             // 65, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                       htmlspecialchars(('.cm-x20'), 0x88);                // 65, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 等尺寸类。'), 0x88);                   // 66, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/icon.jedi
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
