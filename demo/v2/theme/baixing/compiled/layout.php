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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
       $data->pageId = 'layout';                                               // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
       $data->pageTitle = 'Layout';                                            // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
  
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
echo               '<section>';                                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
                
echo                   '<p>';                                                  // 12, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<strong>';                                           // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('本页面的 HTML 结构是为演示效果而特别编写的，不具有实际参考意义。所有元素的 HTML 结构约定请以各元素的相关描述为准。'), 0x88);// 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('（以下示例中的绿色虚线表示容器边界。）'), 0x88);    // 14, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</strong>';
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 15, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 16, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('一个 HTML 页面可能包含多个 “view”。一个 view 就是一个功能视图，页面中至少应包含一个 view，其中第一个 view 称作 root view（主视图），其它称作 sub view（子视图）。每个 view 都应该被放置在单独的 '), 0x88);// 17, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 18, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('body > article.subview'), 0x88); // 18, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素中。'), 0x88);                    // 19, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 20, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('因此整个 HTML 文档的结构应该是这样的（以 L2V 为例）：'), 0x88);// 20, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 21, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 21, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'html', "\n";                                       // 22, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	head', "\n";
echo                       '	body', "\n";
echo                       '		article.subview#listing-view  //主视图（必需）', "\n";
echo                       '		article.subview#vad-view	  //子视图（可选）', "\n";
echo                       '		article.subview#other-view	//子视图（可选）', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 28, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 29, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('每个 view 内的主要结构应该是这样的：'), 0x88);    // 30, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 31, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 31, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'article.subview  //页面级容器', "\n";                   // 32, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	header  //页头', "\n";
echo                       '	main	//页面主体', "\n";
echo                       '	footer  //页脚', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<hr>';                                                   // 36, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<div class="intro">';                                    // 37, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 38, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('多个 view 之间切换应该由 Subview 这个组件来实现，详见 '), 0x88);// 39, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<a';                                                 // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       ' href="https://github.com/cssmagic/subview/wiki"'; // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       ' target="_blank"';                                 // 40, 74 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                      '>';
echo                       htmlspecialchars(('Subview 组件的文档'), 0x88);          // 41, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</a>';
echo                     htmlspecialchars(('。'), 0x88);                        // 43, 84 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<hr>';                                                   // 43, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<div class="intro">';                                    // 44, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 45, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('View 内的各个区块详见如下各小节。'), 0x88);      // 46, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="header">';                                 // 48, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 49, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('页头'), 0x88);                         // 49, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 50, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 51, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('页头可以包含一个或多个导航元素。'), 0x88);         // 51, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 52, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('通常页头内唯一的导航元素就是导航栏（导航栏的具体结构和样式参见下一节）。'), 0x88);// 52, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 53, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 53, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'header  //页头区域', "\n";                             // 54, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	nav.cm-nav-bar  //导航栏', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage subview">';                       // 56, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<header>';                                             // 57, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<nav class="cm-nav-bar">';                           // 58, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h1 class="cm-nav-bar-title">';                    // 59, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('（这里是导航栏）'), 0x88);             // 59, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h1>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-left">';     // 60, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 61, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 61, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('导航栏按钮'), 0x88);              // 62, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-right">';    // 63, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 64, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 64, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('导航栏按钮'), 0x88);              // 65, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</nav>';
echo                   '</header>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 67, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 68, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('除了导航栏之外，你还可以在页头中添加其它导航元素（比如面包屑）。'), 0x88);// 68, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 69, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 69, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'header  //页头区域', "\n";                             // 70, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	nav.cm-nav-bar  //导航栏', "\n";
echo                       '	nav			 //其它导航元素', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage subview">';                       // 73, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<header>';                                             // 74, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<nav class="cm-nav-bar">';                           // 75, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h1 class="cm-nav-bar-title">';                    // 76, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('（这里是导航栏）'), 0x88);             // 76, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h1>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-left">';     // 77, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 78, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 78, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('导航栏按钮'), 0x88);              // 79, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-right">';    // 80, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 81, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 81, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('导航栏按钮'), 0x88);              // 82, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</nav>';
echo                     '<nav>';                                              // 83, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('（这里是另一个导航元素）'), 0x88);           // 84, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</nav>';
echo                   '</header>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="nav-bar">';                                // 86, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 87, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('导航栏'), 0x88);                        // 87, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 88, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 89, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('导航栏内部的结构约定如下：'), 0x88);            // 89, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 90, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 90, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'nav.cm-nav-bar  //导航栏', "\n";                      // 91, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	h1.cm-nav-bar-title				  //导航栏标题', "\n";
echo                       '	div.cm-btn-wrapper.cm-nav-bar-left   //左按钮容器', "\n";
echo                       '		a.cm-btn', "\n";
echo                       '	div.cm-btn-wrapper.cm-nav-bar-right  //右按钮容器', "\n";
echo                       '		a.cm-btn', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage subview">';                       // 97, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<header>';                                             // 98, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<nav class="cm-nav-bar">';                           // 99, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h1 class="cm-nav-bar-title">';                    // 100, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('标题'), 0x88);                   // 100, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h1>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-left">';     // 101, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 102, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#back'));             // 102, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('返回'), 0x88);                 // 103, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-right">';    // 104, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn"';                              // 105, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 105, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('动作按钮'), 0x88);               // 106, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</nav>';
echo                   '</header>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 108, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<h3>';                                                 // 109, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('注意'), 0x88);                       // 109, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</h3>';
echo                   '<p>';                                                  // 110, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('导航栏按钮可以通过辅助类来设置为不同的场景（颜色），也可以设置为空心样式。但导航栏按钮的尺寸是固定的。'), 0x88);// 110, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage subview">';                       // 112, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<header>';                                             // 113, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<nav class="cm-nav-bar">';                           // 114, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h1 class="cm-nav-bar-title">';                    // 115, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('标题'), 0x88);                   // 115, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h1>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-left">';     // 116, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn cm-btn-bordered"';              // 117, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#back'));             // 117, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('空心按钮'), 0x88);               // 118, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                       '<div class="cm-btn-wrapper cm-nav-bar-right">';    // 119, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<a class="cm-btn cm-btn-primary"';               // 120, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           \jedi\attribute('href', ('#action'));           // 120, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                          '>';
echo                           htmlspecialchars(('重要按钮'), 0x88);               // 121, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</a>';
echo                       '</div>';
echo                     '</nav>';
echo                   '</header>';
echo                 '</div>';
echo               '</section>';
echo               '<section class="main">';                                   // 122, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 123, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('视图主体'), 0x88);                       // 123, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 124, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 125, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('视图主体由 '), 0x88);                   // 126, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 127, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('<main>'), 0x88);                 // 127, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素来实现。'), 0x88);                  // 128, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 129, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('<main>'), 0x88);                 // 129, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素没有设置水平内边距，其内部元素在默认情况下都是 “水平满幅” 的布局。'), 0x88);// 130, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 131, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 132, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('<main>'), 0x88);                 // 132, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素与页头页脚之间没有设置任何垂直外边距。如果视图主体的内容需要与页头页尾保持距离，可以通过设置内容元素的垂直外边距来实现。'), 0x88);// 133, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="section">';                                // 135, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 136, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('逻辑区块'), 0x88);                       // 136, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 137, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 138, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('视图主体往往由多个逻辑区块组成，逻辑区块建议采用 '), 0x88);// 139, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 140, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('<section>'), 0x88);              // 140, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素来标记。因此页面主体的结构往往是这样的：'), 0x88);  // 141, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 142, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 142, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'article.subview > main  //页面主体', "\n";             // 143, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '	section  //逻辑区块', "\n";
echo                       '	section  //逻辑区块', "\n";
echo                       '	...', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 147, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<h3>';                                                 // 148, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('注意'), 0x88);                       // 148, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</h3>';
echo                   '<ul class="cm-text">';                                 // 149, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<li>';                                               // 150, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 151, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('<section>'), 0x88);            // 151, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 元素没有任何特殊样式，因此你需要另行设置垂直外边距才能将它们分离开。'), 0x88);// 152, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</li>';
echo                     '<li>';                                               // 153, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 154, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('<section>'), 0x88);            // 154, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 元素没有设置水平内边距，其内部元素在默认情况下都是 “水平满幅” 的布局。如果你需要某个 '), 0x88);// 155, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 156, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('<section>'), 0x88);            // 156, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 具有水平内边距以防止其内容碰到视图边缘，请对它添加以下样式：'), 0x88);// 157, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<pre>';                                                // 158, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<code>';                                             // 158, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'padding-left $cm-content-padding', "\n";           // 159, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       'padding-right $cm-content-padding', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
              
echo                 '<hr>';                                                   // 162, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<section>';                                              // 163, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<div class="intro">';                                  // 164, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<p>';                                                // 165, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('逻辑区块可以包含一个标题元素（可选）和一个内容元素（必需）。'), 0x88);// 165, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<h3>';                                                 // 166, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('标题元素'), 0x88);                     // 166, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 167, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<p>';                                                // 168, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('逻辑区块的标题元素需要添加 '), 0x88);         // 169, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 170, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('.cm-section-title'), 0x88);    // 170, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 这个类。'), 0x88);                  // 171, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                     '<p>';                                                // 172, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('它设置了水平内边距，以免文字贴在容器边缘；字体不加粗，颜色为灰色；背景透明，因此可以透过它看见 Subview 的背景色。'), 0x88);// 172, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<h3>';                                                 // 173, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('内容元素'), 0x88);                     // 173, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 174, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<p>';                                                // 175, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('逻辑区块的内容元素需要添加 '), 0x88);         // 176, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 177, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('.cm-section-content'), 0x88);  // 177, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</code>';
echo                       htmlspecialchars((' 这个类。'), 0x88);                  // 178, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                     '<p>';                                                // 179, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('它将具有白色背景，但没有边框和投影；它是一个容器，因此也没有其它特殊样式。'), 0x88);// 179, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<h3>';                                                 // 180, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('示例'), 0x88);                       // 180, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 181, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<p>';                                                // 182, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('如果一个逻辑区块拥有标题，则它的结构可能是这样的：'), 0x88);// 182, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 183, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<code>';                                           // 183, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         'section', "\n";                                  // 184, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '	h2.cm-section-title "区块标题"', "\n";
echo                         '	div.cm-section-content', "\n";
echo                         '		p "区块内容"', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                     '<p>';                                                // 188, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       htmlspecialchars(('如果把以上代码重复两遍，则对应的效果如下：（绿色虚线表示容器边界）'), 0x88);// 188, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '</p>';
echo                   '</div>';
                
echo                   '<div class="demo-stage subview">';                     // 190, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     '<section>';                                          // 191, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h2 class="cm-section-title">';                    // 192, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('区块标题'), 0x88);                 // 192, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h2>';
echo                       '<div class="cm-section-content">';                 // 193, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<p>';                                            // 194, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           htmlspecialchars(('区块内容'), 0x88);               // 194, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</p>';
echo                       '</div>';
echo                     '</section>';
echo                     '<section>';                                          // 195, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '<h2 class="cm-section-title">';                    // 196, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         htmlspecialchars(('区块标题'), 0x88);                 // 196, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                       '</h2>';
echo                       '<div class="cm-section-content">';                 // 197, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '<p>';                                            // 198, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                           htmlspecialchars(('区块内容'), 0x88);               // 198, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                         '</p>';
echo                       '</div>';
echo                     '</section>';
echo                   '</div>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section class="footer">';                                 // 200, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '<h2>';                                                   // 201, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   htmlspecialchars(('页脚'), 0x88);                         // 201, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 202, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                   '<p>';                                                  // 203, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
echo                     htmlspecialchars(('CMUI 未对页脚进行任何样式定义，请自定处理。'), 0x88); // 203, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/layout.jedi
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
