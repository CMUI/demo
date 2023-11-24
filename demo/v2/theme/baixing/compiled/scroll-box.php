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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
       $data->pageId = 'scroll-box';                                           // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
       $data->pageTitle = 'Scroll Box';                                        // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
  
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
echo               '<section>';                                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('在很多时候，我们需要让某个固定高度的容器根据其内容的长短自动出现垂直滚动条。'), 0x88);// 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('在早期，我们只能求助于 iScroll 这样的模拟滚动条方式，在性能、可访问性、交互体验等方面存在不少弊端。随着浏览器能力的不断提升，我们也可以利用原生滚动条来实现这种效果。'), 0x88);// 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 13, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 14, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('ScrollBox 组件正是为这类需求而生的。它的特性如下：'), 0x88);// 14, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                   '<ul class="cm-text">';                                 // 15, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<li>';                                               // 16, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<p>';                                              // 16, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         htmlspecialchars(('通过 '), 0x88);                  // 17, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<code>';                                         // 18, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           htmlspecialchars(('overflow-y: auto;'), 0x88);  // 18, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</code>';
echo                         htmlspecialchars((' 来实现原生的滚动条效果。'), 0x88);        // 19, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li>';                                               // 20, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<p>';                                              // 20, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         htmlspecialchars(('通过 '), 0x88);                  // 21, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<code>';                                         // 22, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           htmlspecialchars(('-webkit-overflow-scrolling: touch;'), 0x88);// 22, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</code>';
echo                         htmlspecialchars((' 来实现触摸滚动的交互方式。'), 0x88);       // 23, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li>';                                               // 24, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<p>';                                              // 24, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         htmlspecialchars(('当内容的滚动位置处于最顶端或最底端时，为防止触摸操作引起整个页面的滚动，借鉴 '), 0x88);// 25, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<a';                                             // 26, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           ' href="https://github.com/joelambert/ScrollFix"';// 26, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           ' target="_blank"';                             // 26, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                          '>';
echo                           htmlspecialchars(('ScrollFix'), 0x88);          // 27, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</a>';
echo                         htmlspecialchars((' 对交互细节进行了优化。'), 0x88);         // 29, 87 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '</p>';
echo                     '</li>';
echo                     '<li>';                                               // 29, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<p>';                                              // 29, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         htmlspecialchars(('当内容过短、没有出现垂直滚动条时，为防止触摸操作引起整个页面的滚动，禁用触摸事件。（有待进一步优化）'), 0x88);// 30, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '</p>';
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 32, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '<h2>';                                                   // 33, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   htmlspecialchars(('结构'), 0x88);                         // 33, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 34, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 35, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('为使容器具备基本的交互样式，我们需要给它添加 '), 0x88);  // 36, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<code>';                                             // 37, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       htmlspecialchars(('.cm-scroll-box'), 0x88);         // 37, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 这个类。容器及其内容的结构大致如下：'), 0x88);      // 38, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 39, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<code>';                                             // 39, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       'div.cm-scroll-box  //容器', "\n";                    // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '	ul.cm-list      //内容列表', "\n";
echo                       '		li', "\n";
echo                       '		...', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 45, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '<h2>';                                                   // 46, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   htmlspecialchars(('JS API'), 0x88);                     // 46, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 47, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 48, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('光有样式是不够的，每个 ScrollBox 都需要由脚本来初始化，以实现上述交互优化。ScrollBox 组件在加载时会初始化一次页面中的所有 '), 0x88);// 49, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<code>';                                             // 50, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       htmlspecialchars(('.cm-scroll-box'), 0x88);         // 50, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素。'), 0x88);                     // 51, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 53, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<code>';                                               // 54, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('CMUI.scrollBox.refresh()'), 0x88); // 54, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</code>';
echo                   '<p>';                                                  // 55, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('如果页面中的 ScrollBox 是由 JS 动态生成的，则我们需要手动调用此方法来初始化页面中所有未初始化的 '), 0x88);// 56, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<code>';                                             // 57, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       htmlspecialchars(('.cm-scroll-box'), 0x88);         // 57, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素。'), 0x88);                     // 58, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="demo">';                                   // 60, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '<h2>';                                                   // 61, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   htmlspecialchars(('演示'), 0x88);                         // 61, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 62, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 63, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('以下就是一个已经初始化的 ScrollBox 示例：（绿色虚线表示容器边界）'), 0x88);// 64, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 65, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<div class="cm-scroll-box">';                          // 66, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<ul class="cm-list">';                               // 67, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<li>';                                             // 68, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 68, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 68, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 69, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 69, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 69, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 70, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 70, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 70, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 71, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 71, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 71, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 72, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 72, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 72, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 73, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 73, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 73, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 74, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 74, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 74, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 75, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 75, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 75, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 76, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 76, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 76, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 77, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<p>';                                                  // 78, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     htmlspecialchars(('下面是一个内容过短的 ScrollBox 示例：'), 0x88); // 79, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 80, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                   '<div class="cm-scroll-box">';                          // 81, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                     '<ul class="cm-list">';                               // 82, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                       '<li>';                                             // 83, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 83, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 83, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                       '<li>';                                             // 84, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '<p>';                                            // 84, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                           '列表项';                                          // 84, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/scroll-box.jedi
echo                         '</p>';
echo                       '</li>';
echo                     '</ul>';
echo                   '</div>';
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
