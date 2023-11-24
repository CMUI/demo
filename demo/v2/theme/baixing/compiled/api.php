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
 $_macro_div_cm_msg_box_cm_msg_box_warning__notice_ = function ($context) {    // 1, 1 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo  
    '>';
   $api = $context;                                                            // 2, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo       '<strong>';                                                         // 3, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo         htmlspecialchars(('注意'), 0x88);                                   // 3, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo       '</strong>';
echo       htmlspecialchars(('：仅当业务层以 Stylus 作为 CSS 开发语言、且已引入 CMUI 的样式入口文件（ '), 0x88);// 4, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo       '<code>';                                                           // 5, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo         htmlspecialchars(('src/css/theme/*/index.styl'), 0x88);           // 5, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo       '</code>';
echo       htmlspecialchars(('）时可使用 “') . ($api) . ('” 作为 API。'), 0x88);       // 6, 14 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
 };

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
     //  #base                                                                 // 10, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
       $data->pageId = 'api';                                                  // 11, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
       $data->pageTitle = 'API';                                               // 12, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
  
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
echo               '<section>';                                                // 15, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '<h2>';                                                   // 16, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 16, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 17, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 18, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('和绝大多数 UI 框架一样，CMUI 提供的接口以 HTML 结构约定和元素的类名为主。'), 0x88);// 19, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 20, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('此外，为保证样式统一，CMUI 也抽象出了一些变量供业务层使用；为提升开发效率，CMUI 还为业务层提供了一些工具性的 mixin。'), 0x88);// 21, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 23, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '<h2>';                                                   // 24, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   htmlspecialchars(('类名'), 0x88);                         // 24, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 25, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 26, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('CMUI 提供的通用工具类如下：'), 0x88);         // 26, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<section>';                                              // 28, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 29, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('布局'), 0x88);                       // 29, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 30, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 31, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 31, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '.clearfix';                                      // 31, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 32, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '闭合浮动（它是通过 ';                                       // 33, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 34, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         'clearfix()';                                     // 34, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       ' 这个 mixin 来实现的）';                                  // 35, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo                 '<section>';                                              // 36, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 37, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('尺寸'), 0x88);                       // 37, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 38, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 39, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 39, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '.cm-x20';                                        // 39, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 40, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '将元素的宽高均设置为 20px';                                  // 40, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 41, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 41, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '.cm-x30';                                        // 41, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 42, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '将元素的宽高均设置为 30px';                                  // 42, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 43, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 43, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '.cm-x40';                                        // 43, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 44, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '将元素的宽高均设置为 40px';                                  // 44, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 45, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 45, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '.cm-x50';                                        // 45, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 46, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '将元素的宽高均设置为 50px';                                  // 46, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 48, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '<h2>';                                                   // 49, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   htmlspecialchars(('变量'), 0x88);                         // 49, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 50, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning"';           // 51, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
                 $_macro_div_cm_msg_box_cm_msg_box_warning__notice_('变量');
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 52, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 53, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<strong>';                                           // 54, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 54, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：业务层应把这些变量视为常量，不应在业务开发中修改它们的值。'), 0x88);// 55, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 56, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 57, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('CMUI 提供的 Stylus 变量包括：'), 0x88);    // 57, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                   '<ul class="cm-text">';                                 // 58, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 59, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('颜色变量：请参见 '), 0x88);              // 60, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<a';                                               // 61, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         ' href="color.php"';                              // 61, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                        '>';
echo                         '颜色';                                             // 62, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</a>';
echo                       htmlspecialchars((' 章节。'), 0x88);                   // 63, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 64, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('其它变量：其它变量的值和含义如下。'), 0x88);      // 64, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
              
echo                 '<section>';                                              // 66, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 67, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('字体大小'), 0x88);                     // 67, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 68, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 69, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 69, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-font-size-s = 12px';                         // 69, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 70, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '小字号（次要文字等）';                                       // 70, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 71, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 71, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-font-size = 14px';                           // 71, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 72, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '常规字号（正文、段落等）';                                     // 72, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 73, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 73, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-font-size-l = 16px';                         // 73, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 74, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '大字号（标题等）';                                         // 74, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 75, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 75, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-font-size-xl = 18px';                        // 75, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 76, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '超大字号（重着强调的文字等）';                                   // 76, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section>';                                              // 78, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 79, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('文字行高'), 0x88);                     // 79, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 80, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 81, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 81, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-line-height = 1.5';                          // 81, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 82, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '默认行高';                                             // 82, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 83, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 83, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-line-height-min = 1.2';                      // 83, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 84, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '最小行高（某些 UI 元素可能需要把行高压缩到最小值）';                      // 84, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 85, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 85, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-line-height-text = 1.5';                     // 85, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 86, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '段落文本的行高';                                          // 86, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section>';                                              // 88, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 89, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('布局'), 0x88);                       // 89, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 90, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 91, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 91, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-content-padding = 10px';                     // 91, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 92, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '文本距离容器边缘的空隙';                                      // 92, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                     '<dt>';                                               // 93, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 93, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         '$cm-section-gap = 10px';                         // 93, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 94, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '列表区块之间的空隙、表单区块之间的空隙';                              // 94, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
               // section                                                      // 96, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
               // h3 "选择符"
               // div.intro
               // 	p '通过 Stylus 的选择符插值语法来使用：'
               // 	pre > code
               // 		'.wrapper
               // 				{$cm-sel-foo}
               // 					display block
               // 					color red
               // dl.code-result
               // 	dt > code '$cm-sel-input-text'
               // 	dd
               // 		'选中所有文本输入框元素，不包含 '
               // 		code '<textarea>'
               // 		' 元素。'
               // 	dt > code '$cm-sel-input-option'
               // 	dd '选中复选框与单选框。'
               // 	dt > code '$cm-sel-btn'
               // 	dd '选中所有按钮元素。'
echo               '</section>';
            
echo               '<section>';                                                // 116, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '<h2>';                                                   // 117, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   htmlspecialchars(('Mixin'), 0x88);                      // 117, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 118, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning"';           // 119, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
                 $_macro_div_cm_msg_box_cm_msg_box_warning__notice_('mixin');
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 120, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 121, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('Mixin 可以生成多行声明或多条规则，从而实现某种样式或功能。'), 0x88);// 122, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<section>';                                              // 124, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<h3>';                                                 // 125, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('布局'), 0x88);                       // 125, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 126, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<dt>';                                               // 127, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 127, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         'clearfix()';                                     // 127, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 128, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '闭合浮动';                                             // 128, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 130, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '<h2>';                                                   // 131, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   htmlspecialchars(('环境信息'), 0x88);                       // 131, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 132, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 133, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<strong>';                                           // 134, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 134, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：这个接口是为 CMUI 的开发者准备的内部功能，不建议在业务开发中使用。'), 0x88);// 135, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 136, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 137, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('为便于开发者针对不同浏览器及其特性写样式，CMUI 脚本会自动根据当前浏览器环境为 '), 0x88);// 138, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<code>';                                             // 139, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('<html>'), 0x88);                 // 139, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素添加以下类：'), 0x88);                // 140, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                   '<ul class="cm-text">';                                 // 141, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 142, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 143, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.cmui'), 0x88);                // 143, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示 CMUI 的脚本文件已加载。'), 0x88);  // 144, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<ul class="cm-text">';                                 // 145, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 146, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 147, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.ios'), 0x88);                 // 147, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前的移动操作系统是 iOS（根据 UA 信息判断）。'), 0x88);// 148, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 149, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 150, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.android'), 0x88);             // 150, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前的移动操作系统是 Android（根据 UA 信息判断）。'), 0x88);// 151, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 152, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 153, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.legacy'), 0x88);              // 153, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前的移动操作系统版本过低（根据 UA 信息判断），比如 iOS 版本低于 7 或 Android 版本低于 4。'), 0x88);// 154, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<ul class="cm-text">';                                 // 155, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 156, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 157, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.mobile'), 0x88);              // 157, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前用户处于移动操作系统（根据 UA 信息判断），iOS 和 Android 将被视为移动操作系统。'), 0x88);// 158, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 159, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 160, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.desktop'), 0x88);             // 160, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前用户处于桌面操作系统（根据 UA 信息判断），非 iOS 和 Android 一律视为桌面操作系统。'), 0x88);// 161, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<ul class="cm-text">';                                 // 162, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 163, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 164, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.safari'), 0x88);              // 164, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前浏览器是 Safari，包括桌面版和移动版（根据 UA 信息判断）。'), 0x88);// 165, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 166, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 167, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.chrome'), 0x88);              // 167, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前浏览器是 Chrome，包括桌面版和移动版（根据 UA 信息判断）。'), 0x88);// 168, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                   '<ul class="cm-text">';                                 // 169, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<li>';                                               // 170, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 171, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.touch'), 0x88);               // 171, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前浏览器支持触摸事件（根据特性探测）。'), 0x88);// 172, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                     '<li>';                                               // 173, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '<code>';                                           // 174, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                         htmlspecialchars(('.no-touch'), 0x88);            // 174, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       '</code>';
echo                       htmlspecialchars((' —— 表示当前浏览器不支持触摸事件（根据特性探测）。'), 0x88);// 175, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 176, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 177, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('如果需要在脚本中判断浏览器等环境特征，请参考 Gearbox 提供的 '), 0x88);// 178, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<a';                                                 // 179, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       ' href="https://github.com/CMUI/gearbox/issues/5"'; // 179, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       ' target="_blank"';                                 // 179, 74 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                      '>';
echo                       htmlspecialchars(('相关 API'), 0x88);                 // 180, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</a>';
echo                     '。';                                                  // 182, 84 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<hr>';                                                   // 183, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
              
echo                 '<div class="intro">';                                    // 185, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '<p>';                                                  // 186, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('CMUI 脚本会在加载后尝试移除 '), 0x88);        // 187, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<code>';                                             // 188, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('<html>'), 0x88);                 // 188, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素的 '), 0x88);                    // 189, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<code>';                                             // 190, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('.no-js'), 0x88);                 // 190, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类。'), 0x88);                      // 191, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 192, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     htmlspecialchars(('这意味着，如果你在编写 HTML 时预先给 '), 0x88);   // 193, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<code>';                                             // 194, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('<html>'), 0x88);                 // 194, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素写上这个类，就可以利用 '), 0x88);          // 195, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '<code>';                                             // 196, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                       htmlspecialchars(('html.no-js'), 0x88);             // 196, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 作为顶层选择符来编写无脚本情况下的 fallback 样式，以保障可访问性。'), 0x88);// 197, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/api.jedi
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
