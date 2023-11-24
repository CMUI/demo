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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
       $data->pageId = 'text';                                                 // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
       $data->pageTitle = 'Text';                                              // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
  
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
echo               '<section class="text">';                                   // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   htmlspecialchars(('通用文本样式'), 0x88);                     // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('在文本块的容器元素上加 '), 0x88);             // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<code>';                                             // 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('.cm-text'), 0x88);               // 13, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类，可以令其内部的标题、列表、段落元素显示出其自身的语义格式。'), 0x88);// 14, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 15, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('在 '), 0x88);                       // 16, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<code>';                                             // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('<ul>'), 0x88);                   // 17, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 和 '), 0x88);                      // 18, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<code>';                                             // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('<ol>'), 0x88);                   // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素上直接应用 '), 0x88);                // 20, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<code>';                                             // 21, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('.cm-text'), 0x88);               // 21, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类也可以令其语义格式生效。'), 0x88);           // 22, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<hr>';                                                   // 23, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '<div class="cm-text">';                                  // 24, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '<h1>';                                                 // 25, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('一级标题'), 0x88);                     // 25, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h1>';
echo                   '<h2>';                                                 // 26, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('二级标题'), 0x88);                     // 26, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h2>';
echo                   '<p>';                                                  // 27, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88);// 27, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                   '<h3>';                                                 // 28, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('三级标题'), 0x88);                     // 28, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h3>';
echo                   '<p>';                                                  // 29, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88);// 29, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                   '<h2>';                                                 // 30, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('二级标题'), 0x88);                     // 30, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h2>';
echo                   '<h3>';                                                 // 31, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('三级标题'), 0x88);                     // 31, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h3>';
echo                   '<p>';                                                  // 32, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88);// 32, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<hr>';                                                   // 33, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '<div class="cm-text">';                                  // 34, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '<h2>';                                                 // 35, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('二级标题'), 0x88);                     // 35, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h2>';
echo                   '<ol>';                                                 // 36, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<li>';                                               // 37, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 37, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                     '<li>';                                               // 38, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 38, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                   '</ol>';
echo                   '<h3>';                                                 // 39, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('三级标题'), 0x88);                     // 39, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h3>';
echo                   '<ol>';                                                 // 40, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<li>';                                               // 41, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 41, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                     '<li>';                                               // 42, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 42, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                   '</ol>';
echo                   '<h3>';                                                 // 43, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('三级标题'), 0x88);                     // 43, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h3>';
echo                   '<p>';                                                  // 44, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88);// 44, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                   '<ol>';                                                 // 45, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<li>';                                               // 46, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 46, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                     '<li>';                                               // 47, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 47, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                   '</ol>';
echo                   '<ol>';                                                 // 48, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<li>';                                               // 49, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 49, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                     '<li>';                                               // 50, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('有序列表'), 0x88);                   // 50, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                   '</ol>';
echo                   '<p>';                                                  // 51, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88);// 51, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<hr>';                                                   // 52, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '<div class="cm-text">';                                  // 53, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '<ul>';                                                 // 54, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<li>';                                               // 55, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('无序列表'), 0x88);                   // 56, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       '<ul>';                                             // 57, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                         '<li>';                                           // 58, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                           htmlspecialchars(('无序列表'), 0x88);               // 59, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                           '<ul>';                                         // 60, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                             '<li>';                                       // 61, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                               htmlspecialchars(('无序列表'), 0x88);           // 61, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                             '</li>';
echo                             '<li>';                                       // 62, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                               htmlspecialchars(('无序列表'), 0x88);           // 62, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                             '</li>';
echo                             '<li>';                                       // 63, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                               htmlspecialchars(('无序列表'), 0x88);           // 63, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                             '</li>';
echo                           '</ul>';
echo                         '</li>';
echo                         '<li>';                                           // 64, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                           htmlspecialchars(('无序列表'), 0x88);               // 64, 32 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                         '</li>';
echo                       '</ul>';
echo                     '</li>';
echo                     '<li>';                                               // 65, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('无序列表'), 0x88);                   // 65, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 67, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '<h2>';                                                   // 68, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   htmlspecialchars(('其它文本样式'), 0x88);                     // 68, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                 '</h2>';
echo                 '<section class="link">';                                 // 69, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '<h3>';                                                 // 70, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('链接元素'), 0x88);                     // 70, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 71, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     htmlspecialchars(('链接元素（'), 0x88);                    // 72, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<code>';                                             // 73, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       htmlspecialchars(('<a>'), 0x88);                    // 73, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '</code>';
echo                     htmlspecialchars(('）天生具有特殊的颜色，无需添加额外类名。其字号与普通文本一致，不显示下划线。'), 0x88);// 74, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                   '</div>';
echo                   '<dl class="code-result">';                             // 75, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                     '<dt>';                                               // 76, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       '<code>';                                           // 76, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                         htmlspecialchars(('a @href=\'#\''), 0x88);        // 76, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 77, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       '<a';                                               // 77, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                         \jedi\attribute('href', ('#'));                   // 77, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                        '>';
echo                         htmlspecialchars(('链接'), 0x88);                   // 78, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/text.jedi
echo                       '</a>';
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
