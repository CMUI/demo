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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
       $data->pageId = 'list';                                                 // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
       $data->pageTitle = 'List';                                              // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
  
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
echo               '<section class="summary">';                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('列表元素有一些基本的结构约定。'), 0x88);          // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                   '<ul class="cm-text">';                                 // 13, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 14, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('列表元素必须具有 '), 0x88);              // 15, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 16, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('.cm-list'), 0x88);             // 16, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 这个基础类名，然后通过其它辅助性的类名来指定细节样式和属性。'), 0x88);// 17, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</li>';
echo                     '<li>';                                               // 18, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('列表的各个列表项（'), 0x88);              // 19, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 20, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('.cm-list > li'), 0x88);        // 20, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars(('）必须有一个（通常也应该只有一个）子元素作为其 “内容元素”。'), 0x88);// 21, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<p>';                                                  // 22, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('因此一个列表的结构往往是这样的：'), 0x88);         // 22, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 23, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<code>';                                             // 23, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       'ul.cm-list', "\n";                                 // 24, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '	li > p', "\n";
echo                       '	li > p', "\n";
echo                       '	...', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                   '<p>';                                                  // 28, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('其效果如下：'), 0x88);                   // 28, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<ul class="cm-list">';                                   // 30, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<li>';                                                 // 31, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 31, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '列表项';                                              // 31, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                   '<li>';                                                 // 32, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 32, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '列表项';                                              // 32, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                   '<li>';                                                 // 33, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 33, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '列表项';                                              // 33, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                 '</ul>';
echo               '</section>';
            
echo               '<section>';                                                // 35, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 36, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('作为区块内容'), 0x88);                     // 36, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 37, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<p>';                                                  // 38, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('列表可以作为逻辑区块的内容元素。我们需要给列表追加 '), 0x88);// 39, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<code>';                                             // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('.cm-section-content'), 0x88);    // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类，然后将其作为子元素放置到 '), 0x88);         // 41, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<code>';                                             // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('<section>'), 0x88);              // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素中。'), 0x88);                    // 43, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 44, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('此时列表就可以拥有自己的标题了，参见以下结构：'), 0x88);  // 45, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 46, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<code>';                                             // 46, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       'section', "\n";                                    // 47, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '	h2.cm-section-title \'列表标题\'', "\n";
echo                       '	ul.cm-list.cm-section-content', "\n";
echo                       '		li > p \'列表项\'', "\n";
echo                       '		li > p \'列表项\'', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                   '<p>';                                                  // 52, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('如果把以上代码重复两遍，则对应的效果如下：（绿色虚线表示容器边界）'), 0x88);// 52, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 54, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<section>';                                            // 55, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<h2 class="cm-section-title">';                      // 56, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '列表标题';                                             // 56, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</h2>';
echo                     '<ul class="cm-list cm-section-content">';            // 57, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<li>';                                             // 58, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 58, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 58, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 59, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 59, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 59, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                   '</section>';
echo                   '<section>';                                            // 60, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<h2 class="cm-section-title">';                      // 61, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '列表标题';                                             // 61, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</h2>';
echo                     '<ul class="cm-list cm-section-content">';            // 62, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<li>';                                             // 63, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 63, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 63, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 64, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 64, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 64, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                   '</section>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 66, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 67, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('间距'), 0x88);                         // 67, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 68, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<p>';                                                  // 69, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('常规列表没有默认的垂直外边距，因此列表与其它元素之间的间距需要另行设置。不过两个列表之间是有默认间距的：（绿色虚线表示容器边界）'), 0x88);// 69, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<ul class="cm-list">';                                   // 70, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<li>';                                                 // 71, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 71, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '常规列表 · 列表项';                                       // 71, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                   '<li>';                                                 // 72, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 72, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '常规列表 · 列表项';                                       // 72, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                 '</ul>';
echo                 '<ul class="cm-list">';                                   // 73, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<li>';                                                 // 74, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 74, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '常规列表 · 列表项';                                       // 74, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                   '</li>';
echo                 '</ul>';
echo                 '<div class="intro">';                                    // 75, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<p>';                                                  // 76, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('当列表作为区块内容时，两个 '), 0x88);           // 77, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<code>';                                             // 78, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('ul.cm-list.cm-section-content'), 0x88);// 78, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素之间也是有默认间距的：'), 0x88);           // 79, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 80, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<section>';                                            // 81, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<ul class="cm-list cm-section-content">';            // 82, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<li>';                                             // 83, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 83, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 83, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 84, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 84, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 84, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                     '<ul class="cm-list cm-section-content">';            // 85, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<li>';                                             // 86, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 86, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 86, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 87, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '<p>';                                            // 87, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                           '列表项';                                          // 87, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                   '</section>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 89, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 90, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('内容'), 0x88);                         // 90, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 91, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<h3>';                                                 // 92, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('普通列表'), 0x88);                     // 92, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 93, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 94, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('纯展示列表的列表项的内容元素可以是 '), 0x88);     // 95, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 96, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('<p>'), 0x88);                  // 96, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 或 '), 0x88);                    // 97, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 98, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('<div>'), 0x88);                // 98, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 元素。'), 0x88);                   // 99, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 100, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 100, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 101, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li > p', "\n";
echo                         '	li > p', "\n";
echo                         '	li > div', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list">';                                 // 105, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 106, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<p>';                                              // 107, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('列表项'), 0x88);                  // 107, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li>';                                               // 108, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<p>';                                              // 109, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('列表项'), 0x88);                  // 109, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li>';                                               // 110, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<div>';                                            // 111, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('列表项'), 0x88);                  // 111, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</div>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo                 '<section>';                                              // 112, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<h3>';                                                 // 113, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     htmlspecialchars(('链接列表'), 0x88);                     // 113, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 114, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 115, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('我们用得比较多的其实是链接列表，它是很常见的 UI 元素。'), 0x88);// 115, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<p>';                                                // 116, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('链接列表的列表项的内容元素是链接元素。'), 0x88);    // 116, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 117, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 117, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 118, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li > a', "\n";
echo                         '	li > a', "\n";
echo                         '	li > a', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list">';                                 // 122, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 123, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 124, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 124, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 125, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 126, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 127, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 127, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 128, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 129, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 130, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 130, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 131, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo               '</section>';
echo               '<section>';                                                // 132, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 133, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('列表项的右箭头'), 0x88);                    // 133, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 134, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<div class="intro">';                                  // 135, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 136, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('给需要加右箭头的列表项添加 '), 0x88);         // 137, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 138, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('.cm-list-with-right-arrow'), 0x88);// 138, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类名。'), 0x88);                   // 139, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<p>';                                                // 140, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('请记住只有链接列表项才会显示出右箭头——这听起来像个限制，但其实很合理。因为，如果这个列表项没有动作，只是纯展示，那它也是不需要有右箭头的。'), 0x88);// 140, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 141, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 141, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 142, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li > a', "\n";
echo                         '	li.cm-list-with-right-arrow > a', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list">';                                 // 145, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 146, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 147, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 147, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 148, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li class="cm-list-with-right-arrow">';              // 149, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 150, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 150, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 151, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo                 '<hr>';                                                   // 152, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<section>';                                              // 153, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<div class="intro">';                                  // 154, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 155, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('如果恰好一个列表中的每个列表项都需要右箭头，那把 '), 0x88);// 156, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 157, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('.cm-list-with-right-arrow'), 0x88);// 157, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 类名加给列表元素就可以了。'), 0x88);         // 158, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 159, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 159, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list.cm-list-with-right-arrow', "\n";      // 160, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li > a', "\n";
echo                         '	li > a', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list cm-list-with-right-arrow">';        // 163, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 164, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 165, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 165, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 166, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 167, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 168, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 168, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 169, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 171, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 172, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('列表项有徽章'), 0x88);                     // 172, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 173, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<div class="intro">';                                  // 174, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 175, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('给列表项添加 '), 0x88);                // 176, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 177, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('data-cm-badge'), 0x88);        // 177, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 属性可以生成一个徽章。'), 0x88);           // 178, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 179, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 179, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 180, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li @data-cm-badge="9"', "\n";
echo                         '		p', "\n";
echo                         '	li @data-cm-badge="999999"', "\n";
echo                         '		a', "\n";
echo                         '	li.cm-list-with-right-arrow @data-cm-badge="999"', "\n";
echo                         '		a', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list">';                                 // 187, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li';                                                // 188, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-badge', ('9'));            // 188, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<p>';                                              // 189, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('列表项'), 0x88);                  // 189, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li';                                                // 190, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-badge', ('999999'));       // 190, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<a';                                               // 191, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 191, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 192, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li class="cm-list-with-right-arrow"';               // 193, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-badge', ('999'));          // 193, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<a';                                               // 194, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 194, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 195, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 197, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 198, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('列表项有值'), 0x88);                      // 198, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 199, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<div class="intro">';                                  // 200, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 201, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('给列表项添加 '), 0x88);                // 202, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 203, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('data-cm-value'), 0x88);        // 203, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 属性可以在列表项右侧显示一个值。'), 0x88);      // 204, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 205, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 205, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 206, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li @data-cm-value="foobar"', "\n";
echo                         '		p', "\n";
echo                         '	li @data-cm-value="foo"', "\n";
echo                         '		a', "\n";
echo                         '	li.cm-list-with-right-arrow @data-cm-value="bar"', "\n";
echo                         '		a', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                   '<ul class="cm-list">';                                 // 213, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li';                                                // 214, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-value', ('列表项的值'));        // 214, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<p>';                                              // 215, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         htmlspecialchars(('列表项'), 0x88);                  // 215, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li';                                                // 216, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-value', ('列表项的值'));        // 216, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<a';                                               // 217, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 217, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项'), 0x88);                  // 218, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li class="cm-list-with-right-arrow"';               // 219, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       \jedi\attribute('data-cm-value', ('列表项的值很长很长很长很长很长很长很长很长很长很长'));// 219, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                      '>';
echo                       '<a';                                               // 220, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 220, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         htmlspecialchars(('列表项很长很长很长很长很长很长'), 0x88);      // 221, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 223, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '<h2>';                                                   // 224, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   htmlspecialchars(('列表项有图标'), 0x88);                     // 224, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                 '</h2>';
echo                 '<section>';                                              // 225, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                   '<div class="intro">';                                  // 226, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<p>';                                                // 227, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       htmlspecialchars(('图标元素应该是列表项内容元素的第一个子元素。有点拗口，看结构吧：'), 0x88);// 228, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 229, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<code>';                                           // 229, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         'ul.cm-list', "\n";                               // 230, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '	li > a @href="#"', "\n";
echo                         '		i.cm-icon.cm-x20', "\n";
echo                         '		"foobar"', "\n";
echo                         '	...', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
                
echo                   '<ul class="cm-list icon-size">';                       // 236, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                     '<li>';                                               // 237, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 238, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 238, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         '<i class="cm-icon cm-x20">';                     // 239, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</i>';
echo                         htmlspecialchars(('试试各种尺寸 20x20'), 0x88);         // 240, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 241, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 242, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 242, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         '<i class="cm-icon cm-x30">';                     // 243, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</i>';
echo                         htmlspecialchars(('试试各种尺寸 30x30'), 0x88);         // 244, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 245, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 246, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 246, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         '<i class="cm-icon cm-x40">';                     // 247, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</i>';
echo                         htmlspecialchars(('试试各种尺寸 40x40'), 0x88);         // 248, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                     '<li>';                                               // 249, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '<a';                                               // 250, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         \jedi\attribute('href', ('#'));                   // 250, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                        '>';
echo                         '<i class="cm-icon cm-x50">';                     // 251, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                         '</i>';
echo                         htmlspecialchars(('试试各种尺寸 50x50'), 0x88);         // 252, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/list.jedi
echo                       '</a>';
echo                     '</li>';
echo                   '</ul>';
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
