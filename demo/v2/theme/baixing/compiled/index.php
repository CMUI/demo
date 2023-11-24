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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
       $data->pageId = 'index';                                                // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
  
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
echo               '<div class="version-info">';                               // 7, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '<p>';                                                    // 8, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '以下演示页面适用于 CMUI v2。';                                   // 8, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '</p>';
echo                 '<p>';                                                    // 9, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '<a';                                                   // 10, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     \jedi\attribute('href', ('https://github.com/CMUI/CMUI'));// 10, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     \jedi\attribute('target', ('_blank'));                // 10, 56 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                    '>';
echo                     'View on GitHub';                                     // 11, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '</a>';
echo                 '</p>';
echo               '</div>';
            
echo               '<section>';                                                // 13, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '<h2>';                                                   // 14, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   htmlspecialchars(('基础样式'), 0x88);                       // 14, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '</h2>';
echo                 '<ul class="content">';                                   // 15, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '<li>';                                                 // 16, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('color.php'));             // 17, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Color（颜色）'), 0x88);              // 18, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 19, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('预定义的颜色变量'), 0x88);               // 19, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 20, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 21, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('text.php'));              // 21, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Text（文本）'), 0x88);               // 22, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 23, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('标题、段落、列表等元素的语义化样式'), 0x88);      // 23, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 24, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 25, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('icon.php'));              // 25, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Icon（图标）'), 0x88);               // 26, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 27, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('预定义图标、自定义图标等'), 0x88);           // 27, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                 '</ul>';
echo               '</section>';
            
echo               '<section>';                                                // 29, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '<h2>';                                                   // 30, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   htmlspecialchars(('元素'), 0x88);                         // 30, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '</h2>';
echo                 '<ul class="content">';                                   // 31, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '<li>';                                                 // 32, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 33, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('layout.php'));            // 33, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Layout（页面框架）'), 0x88);           // 34, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 35, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('Subview、导航栏、视图主体、逻辑区块等'), 0x88); // 35, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 36, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 37, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('label.php'));             // 37, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Label（标签）'), 0x88);              // 38, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 39, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('空心标签、实心标签、多种尺寸'), 0x88);         // 39, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 40, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 41, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('btn.php'));               // 41, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Btn（按钮）'), 0x88);                // 42, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 43, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('多种尺寸、多种类型、多种状态、多种排列组合'), 0x88);  // 43, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 44, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 45, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('list.php'));              // 45, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('List（列表）'), 0x88);               // 46, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 47, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('普通列表、链接列表、带箭头、带徽章、带值、带图标'), 0x88);// 47, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 48, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 49, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('grid-list.php'));         // 49, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Grid List（网格列表）'), 0x88);        // 50, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 51, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('行列式布局的列表、弹性网络列表'), 0x88);        // 51, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 52, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 53, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('msg-box.php'));           // 53, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Msg Box（提示框）'), 0x88);           // 54, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 55, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('包含常规、警告、成功、错误等状态'), 0x88);       // 55, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 56, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 57, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('form.php'));              // 57, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Form（表单）'), 0x88);               // 58, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 59, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('表单布局、表单控件、错误提示等'), 0x88);        // 59, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                 '</ul>';
echo               '</section>';
            
echo               '<section>';                                                // 61, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '<h2>';                                                   // 62, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   htmlspecialchars(('交互组件'), 0x88);                       // 62, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '</h2>';
echo                 '<ul class="content">';                                   // 63, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '<li>';                                                 // 64, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 65, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('mask.php'));              // 65, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Mask（遮罩层）'), 0x88);              // 66, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 67, 39 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('覆盖全页面的半透明遮罩层、JS API'), 0x88);    // 67, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 68, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 69, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('loading.php'));           // 69, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Loading（加载提示）'), 0x88);          // 70, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 71, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('提示用户操作正在进行、可附加文字提示、JS API'), 0x88);// 71, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 72, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 73, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('dialog.php'));            // 73, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Dialog（弹框）'), 0x88);             // 74, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 75, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('亦称对话框、JS API'), 0x88);           // 75, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 76, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 77, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('panel.php'));             // 77, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Panel（浮出面板）'), 0x88);            // 78, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 79, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('视口底部浮出操作面板、JS API'), 0x88);      // 79, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 80, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 81, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('scroll-box.php'));        // 81, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('Scroll Box（区域滚动）'), 0x88);       // 82, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 83, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('让定高容器的内容可滚动、JS API'), 0x88);     // 83, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
                 // li                                                         // 84, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
                 // a @href="#"
                 // 	"Toast（悬浮提示）"
                 // small "（开发中）"
                 // li                                                         // 88, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
                 // a @href="#"
                 // 	"Tab（标签页）"
                 // small "（开发中）"
echo                 '</ul>';
echo               '</section>';
            
echo               '<section>';                                                // 93, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '<h2>';                                                   // 94, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   htmlspecialchars(('开发者需知'), 0x88);                      // 94, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                 '</h2>';
echo                 '<ul class="content">';                                   // 95, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                   '<li>';                                                 // 96, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 97, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('guideline.php'));         // 97, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('技术规范'), 0x88);                   // 98, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 99, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('编码规范、浏览器支持策略等'), 0x88);          // 99, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
echo                   '</li>';
echo                   '<li>';                                                 // 100, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '<a';                                                 // 101, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       \jedi\attribute('href', ('api.php'));               // 101, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                      '>';
echo                       htmlspecialchars(('接口'), 0x88);                     // 102, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</a>';
echo                     '<small>';                                            // 103, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                       htmlspecialchars(('变量、mixin 等编码接口'), 0x88);         // 103, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/index.jedi
echo                     '</small>';
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
