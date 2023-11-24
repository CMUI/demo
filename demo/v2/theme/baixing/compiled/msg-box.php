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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
       $data->pageId = 'msg-box';                                              // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
       $data->pageTitle = 'Msg Box';                                           // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
  
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
echo               '<section>';                                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   htmlspecialchars(('提示框'), 0x88);                        // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('块元素添加 '), 0x88);                   // 12, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 13, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box'), 0x88);            // 13, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类即可显示为提示框。'), 0x88);              // 14, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 15, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 15, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       'div.cm-msg-box', "\n";                             // 16, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '	"常规提示文本"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 18, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 19, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('效果如下：（绿色虚线表示容器边界）'), 0x88);        // 20, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 21, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box">';                             // 22, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('常规提示文本'), 0x88);                   // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 24, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box">';                             // 25, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('常规提示文本超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长'), 0x88);// 26, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 28, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<h3>';                                                 // 29, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('注意'), 0x88);                       // 29, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</h3>';
echo                   '<ul class="cm-text">';                                 // 30, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<li>';                                               // 30, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('提示框没有预设垂直外边距。'), 0x88);          // 30, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 32, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '<h2>';                                                   // 33, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   htmlspecialchars(('场景样式'), 0x88);                       // 33, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 34, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 35, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('可在提示框元素上增加额外的类名，以设置其场景样式。'), 0x88);// 35, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<dl class="code-result">';                               // 36, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<dt>';                                                 // 37, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 37, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box.cm-msg-box-info'), 0x88);// 37, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 38, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<div class="demo-stage">';                           // 39, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '<div class="cm-msg-box cm-msg-box-info">';         // 40, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                         htmlspecialchars(('信息提示文本'), 0x88);               // 41, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '</div>';
echo                     '</div>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 42, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 42, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box.cm-msg-box-success'), 0x88);// 42, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 43, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<div class="demo-stage">';                           // 44, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '<div class="cm-msg-box cm-msg-box-success">';      // 45, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                         htmlspecialchars(('成功提示文本'), 0x88);               // 46, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '</div>';
echo                     '</div>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 47, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 47, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box.cm-msg-box-warning'), 0x88);// 47, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 48, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<div class="demo-stage">';                           // 49, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '<div class="cm-msg-box cm-msg-box-warning">';      // 50, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                         htmlspecialchars(('警告提示文本'), 0x88);               // 51, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '</div>';
echo                     '</div>';
echo                   '</dd>';
echo                   '<dt>';                                                 // 52, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 52, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box.cm-msg-box-error'), 0x88);// 52, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                   '</dt>';
echo                   '<dd>';                                                 // 53, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<div class="demo-stage">';                           // 54, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '<div class="cm-msg-box cm-msg-box-error">';        // 55, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                         htmlspecialchars(('错误提示文本'), 0x88);               // 56, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '</div>';
echo                     '</div>';
echo                   '</dd>';
echo                 '</dl>';
echo               '</section>';
            
echo               '<section>';                                                // 58, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '<h2>';                                                   // 59, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   htmlspecialchars(('图标'), 0x88);                         // 59, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 60, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 61, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('提示框一般都会搭配图标显示。需要显式地给容器添加 '), 0x88);// 62, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 63, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box-with-icon'), 0x88);  // 63, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类，同时添加一个 20x20 的图标元素。（可用图标参见 '), 0x88);// 64, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<a';                                                 // 65, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       ' href="icon.php"';                                 // 65, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                      '>';
echo                       htmlspecialchars(('图标'), 0x88);                     // 66, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</a>';
echo                     htmlspecialchars(('。）'), 0x88);                       // 68, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 68, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 68, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       'div.cm-msg-box.cm-msg-box-with-icon', "\n";        // 69, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '	i.cm-icon  //图标元素', "\n";
echo                       '	"带图标的提示框"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 72, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-info cm-msg-box-with-icon">';// 73, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-info">';           // 74, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     htmlspecialchars(('带图标的提示框'), 0x88);                  // 75, 51 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 76, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-success cm-msg-box-with-icon">';// 77, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-success">';        // 78, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     htmlspecialchars(('带图标的提示框'), 0x88);                  // 79, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 80, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning cm-msg-box-with-icon">';// 81, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-warning">';        // 82, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     htmlspecialchars(('带图标的提示框'), 0x88);                  // 83, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 84, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-error cm-msg-box-with-icon">';// 85, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-error">';          // 86, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     htmlspecialchars(('带图标的提示框'), 0x88);                  // 87, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 89, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '<h2>';                                                   // 90, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   htmlspecialchars(('关闭'), 0x88);                         // 90, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 91, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 92, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('可以为提示框增加关闭按钮。需要显式地给容器添加 '), 0x88); // 93, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 94, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       htmlspecialchars(('.cm-msg-box-with-close-btn'), 0x88);// 94, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 类，同时添加一个关闭按钮。'), 0x88);           // 95, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 96, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 96, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       'div.cm-msg-box.cm-msg-box-with-close-btn', "\n";   // 97, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '	a.cm-msg-box-close-btn @href="#"', "\n";
echo                       '	"这是一个可关闭的提示框。"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 100, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning cm-msg-box-with-close-btn">';// 101, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<a class="cm-msg-box-close-btn"';                    // 102, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       \jedi\attribute('href', ('#'));                     // 102, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                      '>';
echo                     '</a>';
echo                     htmlspecialchars(('这是一个可关闭的提示框。'), 0x88);             // 103, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 105, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<p>';                                                  // 106, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     htmlspecialchars(('提示框的图标和关闭按钮可以同时存在：'), 0x88);       // 106, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 107, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<code>';                                             // 107, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       'div.cm-msg-box.cm-msg-box-with-icon.cm-msg-box-with-close-btn', "\n";// 108, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       '	i.cm-icon', "\n";
echo                       '	a.cm-msg-box-close-btn @href="#"', "\n";
echo                       '	"带图标的、可关闭的提示框。"', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 112, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning cm-msg-box-with-icon cm-msg-box-with-close-btn">';// 113, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-warning">';        // 114, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     '<a class="cm-msg-box-close-btn"';                    // 115, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       \jedi\attribute('href', ('#'));                     // 115, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                      '>';
echo                     '</a>';
echo                     htmlspecialchars(('带图标的、可关闭的提示框。'), 0x88);            // 116, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 117, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning cm-msg-box-with-icon cm-msg-box-with-close-btn">';// 118, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '<i class="cm-icon cm-icon-x20-msg-warning">';        // 119, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                     '</i>';
echo                     '<a class="cm-msg-box-close-btn"';                    // 120, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                       \jedi\attribute('href', ('#'));                     // 120, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
echo                      '>';
echo                     '</a>';
echo                     htmlspecialchars(('带图标的、可关闭的提示框。超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长'), 0x88);// 121, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/msg-box.jedi
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
