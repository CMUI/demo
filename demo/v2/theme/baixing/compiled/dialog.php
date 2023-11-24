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
     //  #base                                                                 // 3, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
       $data->pageId = 'dialog';                                               // 4, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
       $data->pageTitle = 'Dialog';                                            // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
  
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
echo               '<section>';                                                // 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '<h2>';                                                   // 9, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   htmlspecialchars(('简介'), 0x88);                         // 9, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 10, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 11, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     htmlspecialchars(('“弹框” 亦称 “对话框”，是最常见的 UI 交互元素之一。'), 0x88);// 11, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     htmlspecialchars(('CMUI 只支持模态弹框。模态弹框是指弹框将下层的页面内容遮盖，避免用户与弹框之外的内容进行交互。'), 0x88);// 12, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 13, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h4>';                                                 // 14, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 14, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注意';                                               // 14, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                   '</h4>';
echo                   '<ul class="cm-text">';                                 // 15, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<li>';                                               // 16, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       htmlspecialchars(('此组件依赖 CMUI 的 Mask 组件。'), 0x88);  // 16, 24 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</li>';
echo                   '</ul>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 18, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '<h2>';                                                   // 19, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   htmlspecialchars(('结构'), 0x88);                         // 19, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 20, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 21, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     htmlspecialchars(('在使用弹框的 JS API 之前，需要在页面中写好（或由 JS 动态生成）相应的弹框元素。弹框元素的结构大致如下：'), 0x88);// 21, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 22, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<code>';                                             // 22, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       'div.cm-dialog  //弹框的容器', "\n";                     // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '	a.cm-dialog-close-btn @href="#"  //关闭按钮（注 1）', "\n";
echo                       '	div.cm-dialog-img        //头图（注 2）（注 4）', "\n";
echo                       '	header.cm-dialog-header  //弹框标题栏（注 2）', "\n";
echo                       '		h2.cm-dialog-header-title  //标题文字', "\n";
echo                       '	main.cm-dialog-content   //弹框主体（注 3）', "\n";
echo                       '		...', "\n";
echo                       '	footer.cm-dialog-footer  //弹框底栏（注 3）', "\n";
echo                       '		...', "\n";
echo                     '</code>';
echo                   '</pre>';
                
echo                   '<p>';                                                  // 33, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 34, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注 1';                                              // 34, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     '：“关闭按钮” 会由 JS API 自动生成，无需手工编写。';                     // 35, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 36, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 37, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注 2';                                              // 37, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     '：有此标注的多个元素至少应该存在一个。';                                // 38, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 39, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 40, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注 3';                                              // 40, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     '：有此标注的各个元素均为可选。';                                    // 41, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 42, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 43, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注 4';                                              // 43, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     '：头图可由 ';                                             // 44, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<code>';                                             // 45, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '&lt;img>';                                         // 45, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</code>';
echo                     ' 标签来实现，也可由背景图片来实现。无论使用哪种方法，都需要指定图片的高度。';             // 46, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="style">';                                  // 48, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '<h2>';                                                   // 49, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   htmlspecialchars(('样式'), 0x88);                         // 49, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 50, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 51, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '弹框默认具有圆角样式，其内容会被切圆角。';                               // 52, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 53, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 54, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     htmlspecialchars(('弹框并不是静态的布局元素，且默认不显示。但由于弹框有多种样式组合，为便于演示，下面把弹框以静态元素的形式展示出来。'), 0x88);// 55, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 56, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 57, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '注意';                                               // 57, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：以下示例并没有列出所有可能的样式组合，你可以根据 “结构” 段落所述的约定自行搭配出更多的弹框样式。'), 0x88);// 58, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<section>';                                              // 59, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 60, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '仅有头图';                                               // 60, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 61, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 62, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 62, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<div class="cm-dialog-img">';                        // 63, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 64, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 65, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '仅有标题';                                               // 65, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 66, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 67, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 67, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 68, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 69, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 70, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                   '</div>';
echo                 '</section>';
               // section                                                      // 71, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
               // h3 '仅有内容'
               // div.cm-dialog
               // 	a.cm-dialog-close-btn @href="#"
               // 	main.cm-dialog-content
               // 		'内容文字'
echo                 '<section>';                                              // 77, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 78, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '头图 + 标题';                                            // 78, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 79, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 80, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 80, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<div class="cm-dialog-img">';                        // 81, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                     '<header class="cm-dialog-header">';                  // 82, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 83, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 84, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 85, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 86, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '头图 + 内容';                                            // 86, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 87, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 88, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 88, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<div class="cm-dialog-img">';                        // 89, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                     '<main class="cm-dialog-content">';                   // 90, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '内容文字';                                             // 91, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</main>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 92, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 93, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 内容';                                            // 93, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 94, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 95, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 95, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 96, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 97, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 98, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<main class="cm-dialog-content">';                   // 99, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '内容文字';                                             // 100, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</main>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 101, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 102, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 底栏';                                            // 102, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 103, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 104, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 104, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 105, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 106, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 107, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<footer class="cm-dialog-footer">';                  // 108, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn cm-btn-primary"';                 // 109, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 109, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '确定';                                             // 110, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</footer>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 111, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 112, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '头图 + 底栏';                                            // 112, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 113, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 114, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 114, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<div class="cm-dialog-img">';                        // 115, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                     '<footer class="cm-dialog-footer">';                  // 116, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn cm-btn-primary"';                 // 117, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 117, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '确定';                                             // 118, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</footer>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 119, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 120, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 内容 + 底栏';                                       // 120, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 121, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 122, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 122, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 123, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 124, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 125, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<main class="cm-dialog-content">';                   // 126, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '内容文字';                                             // 127, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</main>';
echo                     '<footer class="cm-dialog-footer">';                  // 128, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn cm-btn-primary"';                 // 129, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 129, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '确定';                                             // 130, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-primary cm-btn-bordered"'; // 131, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 131, 65 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '取消';                                             // 132, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</footer>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 133, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 134, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '头图 + 自动关闭提示栏';                                       // 134, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 135, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 136, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 136, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<div class="cm-dialog-img">';                        // 137, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                     '<div class="cm-dialog-auto-hide">';                  // 138, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<span class="cm-dialog-auto-hide-countdown">';     // 139, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '?';                                              // 140, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</span>';
echo                       ' 秒后自动关闭……';                                        // 141, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                   '</div>';
echo                   '<div class="intro">';                                  // 142, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<p>';                                                // 143, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '当 JS API 设置了弹框的自动关闭功能时，“自动关闭提示栏” 会自动出现，无需手工编写。';   // 144, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</p>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 145, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 146, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 自动关闭提示栏';                                       // 146, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 147, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 148, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 148, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 149, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 150, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 151, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<div class="cm-dialog-auto-hide">';                  // 152, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<span class="cm-dialog-auto-hide-countdown">';     // 153, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '?';                                              // 154, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</span>';
echo                       ' 秒后自动关闭……';                                        // 155, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 156, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 157, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 内容 + 自动关闭提示栏';                                  // 157, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 158, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 159, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 159, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 160, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 161, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 162, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<main class="cm-dialog-content">';                   // 163, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '内容文字';                                             // 164, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</main>';
echo                     '<div class="cm-dialog-auto-hide">';                  // 165, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<span class="cm-dialog-auto-hide-countdown">';     // 166, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '?';                                              // 167, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</span>';
echo                       ' 秒后自动关闭……';                                        // 168, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 169, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 170, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '标题 + 内容 + 底栏 + 自动关闭提示栏';                             // 170, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="cm-dialog">';                              // 171, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-dialog-close-btn"';                     // 172, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 172, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                     '</a>';
echo                     '<header class="cm-dialog-header">';                  // 173, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<h2 class="cm-dialog-header-title">';              // 174, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '标题文字';                                           // 175, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</h2>';
echo                     '</header>';
echo                     '<main class="cm-dialog-content">';                   // 176, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '内容文字';                                             // 177, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</main>';
echo                     '<footer class="cm-dialog-footer">';                  // 178, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn cm-btn-primary"';                 // 179, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 179, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '确定';                                             // 180, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                       '<a class="cm-btn cm-btn-primary cm-btn-bordered"'; // 181, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 181, 65 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         '取消';                                             // 182, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</footer>';
echo                     '<div class="cm-dialog-auto-hide">';                  // 183, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<span class="cm-dialog-auto-hide-countdown">';     // 184, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '?';                                              // 185, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</span>';
echo                       ' 秒后自动关闭……';                                        // 186, 59 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</div>';
echo                   '</div>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 188, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '<h2>';                                                   // 189, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   htmlspecialchars(('JS API'), 0x88);                     // 189, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 190, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 191, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '在 JS 中调用以下 API，即可触发相应的功能。';                          // 191, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 192, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<p>';                                                  // 193, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '各参数的含义详见 ';                                          // 194, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a';                                                 // 195, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       ' href="https://github.com/CMUI/doc/issues/3"';     // 195, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       ' target="_blank"';                                 // 195, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                       'API 文档';                                           // 196, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</a>';
echo                     '。';                                                  // 198, 80 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<section>';                                              // 198, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 199, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '显示';                                                 // 199, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 200, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<p>';                                                // 201, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '需要使用 JS API 来把指定的弹框显示出来。';                         // 201, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</p>';
echo                     '<p>';                                                // 202, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       'Dialog 组件支持在弹框中打开另一个弹框。多个弹框的打开顺序会保存在一个栈中，当栈中有多个弹框时，关闭当前弹框会恢复上一个弹框的显示。通过下面的按钮打开弹框，可以测试这一特性。';// 202, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</p>';
echo                   '</div>';
echo                   '<dl class="code-result">';                             // 203, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<dt>';                                               // 204, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<code>';                                           // 204, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         htmlspecialchars(('CMUI.dialog.show(elem)'), 0x88);// 204, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 205, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn"';                                // 206, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 206, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('data-action', ('demo-dialog-show'));// 206, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         htmlspecialchars(('显示'), 0x88);                   // 207, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</dd>';
echo                     '<dt>';                                               // 208, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<code>';                                           // 208, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         'CMUI.dialog.show(elem, {autoHideDelay: 3000})';  // 208, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 209, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<a class="cm-btn"';                                // 210, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('href', ('#'));                   // 210, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         \jedi\attribute('data-action', ('demo-dialog-show-auto-hide'));// 210, 44 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                        '>';
echo                         htmlspecialchars(('显示并设置自动隐藏'), 0x88);            // 211, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</a>';
echo                     '</dd>';
echo                   '</dl>';
echo                 '</section>';
              
echo                 '<section>';                                              // 213, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 214, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '隐藏';                                                 // 214, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 215, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<dt>';                                               // 216, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<code>';                                           // 216, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         htmlspecialchars(('CMUI.dialog.hide()'), 0x88);   // 216, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 217, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<p>';                                              // 218, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '此方法可以关闭当前显示的弹框。';                                // 218, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</p>';
echo                       '<p>';                                              // 219, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '在弹出的弹框中，点击关闭按钮可以测试隐藏效果；你也可以在控制台调用这个方法来测试效果。';    // 219, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</p>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 220, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<strong>';                                           // 221, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 221, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：在默认情况下，点击遮罩层并不能隐藏弹框。'), 0x88);    // 222, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</div>';
echo                 '</section>';
echo                 '<section>';                                              // 223, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '<h3>';                                                 // 224, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '构造一个弹框';                                             // 224, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                   '</h3>';
echo                   '<dl class="code-result">';                             // 225, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<dt>';                                               // 226, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<code>';                                           // 226, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         htmlspecialchars(('CMUI.dialog.create(options)'), 0x88);// 226, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</code>';
echo                     '</dt>';
echo                     '<dd>';                                               // 227, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '<p>';                                              // 228, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '此方法可以动态构造一个新的弹框。';                               // 228, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</p>';
echo                       '<p>';                                              // 229, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '构造完成之后，这个新弹框会被添加到 DOM 中，但默认不显示。我们需要显式调用 ';       // 230, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '<code>';                                         // 231, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                           'CMUI.dialog.show()';                           // 231, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '</code>';
echo                         ' 方法来将其打开，比如：';                                   // 232, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</p>';
echo                       '<pre>';                                            // 233, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '<code>';                                         // 233, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                           'var myDialog = CMUI.dialog.create({...})', "\n";// 234, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                           'CMUI.dialog.show(myDialog)', "\n";
echo                         '</code>';
echo                       '</pre>';
echo                       '<p>';                                              // 236, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                         '以下示例按钮包含了构造和显示两个步骤。';                            // 237, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       '</p>';
echo                     '</dd>';
echo                   '</dl>';
echo                   '<div class="intro">';                                  // 238, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '<a class="cm-btn"';                                  // 239, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('href', ('#'));                     // 239, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                       \jedi\attribute('data-action', ('demo-dialog-create-and-show'));// 239, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                      '>';
echo                       htmlspecialchars(('构造并显示'), 0x88);                  // 240, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                     '</a>';
echo                   '</div>';
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
echo           '<div class="cm-dialog" id="demo-dialog">';                     // 244, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo             '<header class="cm-dialog-header">';                          // 245, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<h2 class="cm-dialog-header-title">';                      // 246, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '弹框';                                                     // 246, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</h2>';
echo             '</header>';
echo             '<main class="cm-dialog-content cm-scrollable-content">';     // 247, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<p>';                                                      // 248, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '弹框的内容';                                                  // 248, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</p>';
echo               '<p>';                                                      // 249, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '弹框的内容';                                                  // 249, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</p>';
echo               '<p>';                                                      // 250, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '弹框的内容';                                                  // 250, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</p>';
echo             '</main>';
echo             '<footer class="cm-dialog-footer">';                          // 251, 57 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<button class="cm-btn cm-btn-primary"';                    // 252, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 \jedi\attribute('data-action', ('demo-dialog-show-alt')); // 252, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                '>';
echo                 '打开另一个弹框';                                                // 253, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</button>';
echo               '<button class="cm-btn cm-btn-primary cm-btn-bordered"';    // 254, 81 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 \jedi\attribute('data-action', ('cm-dialog-hide'));       // 254, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                '>';
echo                 '取消';                                                     // 255, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</button>';
echo             '</footer>';
echo           '</div>';
        
echo           '<div class="cm-dialog" id="demo-dialog-alt">';                 // 257, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo             '<header class="cm-dialog-header">';                          // 258, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<h2 class="cm-dialog-header-title">';                      // 259, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '另一个弹框';                                                  // 259, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</h2>';
echo             '</header>';
echo             '<main class="cm-dialog-content cm-scrollable-content">';     // 260, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<p>';                                                      // 261, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 '关闭本弹框后将返回上一个弹框。';                                        // 261, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</p>';
echo             '</main>';
echo             '<footer class="cm-dialog-footer">';                          // 262, 57 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '<button class="cm-btn cm-btn-primary"';                    // 263, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                 \jedi\attribute('data-action', ('cm-dialog-hide'));       // 263, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo                '>';
echo                 '关闭';                                                     // 264, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/dialog.jedi
echo               '</button>';
echo             '</footer>';
echo           '</div>';
      
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
