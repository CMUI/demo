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
echo
  '<!doctype html>', "\n";
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
     //  #base                                                                 // 4, 5 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
       $data->pageId = 'form';                                                 // 5, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
       $data->pageTitle = 'Form';                                              // 6, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
      
       $data->imgUrl = 'https://cloud.githubusercontent.com/assets/1231359/19432187/0106b376-948e-11e6-8171-cb089ff94b4c.jpg';// 8, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
  
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
echo               '<section>';                                                // 11, 9 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 12, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('概述'), 0x88);                         // 12, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 13, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 14, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<strong>';                                           // 15, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('注意'), 0x88);                     // 15, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</strong>';
echo                     htmlspecialchars(('：以下示例中的绿色虚线表示容器边界。'), 0x88);       // 16, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section class="layout">';                                 // 18, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 19, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('表单布局'), 0x88);                       // 19, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 20, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 21, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     htmlspecialchars(('表单的容器（通常就是 '), 0x88);              // 22, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 23, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('<form>'), 0x88);                 // 23, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 元素）需要添加 '), 0x88);                // 24, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 25, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('.cm-form'), 0x88);               // 25, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 这个类。建议把表单作为 '), 0x88);            // 26, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 27, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('<section>'), 0x88);              // 27, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 的子元素。'), 0x88);                   // 28, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 29, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '表单的每个字段独占一行，以下简称 “表单行”。每个表单行都需要有', "\n";             // 30, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 31, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('.cm-form-line'), 0x88);          // 31, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     htmlspecialchars((' 这个类。'), 0x88);                    // 32, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                   '<p>';                                                  // 33, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '多个表单行可以组成一个区块（';                                     // 34, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 35, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('.cm-section-content'), 0x88);    // 35, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     '）；整张表单可能是由多个区块组成的。区块之间有间隙。';                         // 36, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 37, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 38, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     htmlspecialchars(('表单的结构大致如下：'), 0x88);               // 39, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 40, 18 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 40, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       'main > section    //视图主体中的逻辑区块', "\n";             // 41, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '	form.cm-form  //表单容器', "\n";
echo                       '		div.cm-section-content  //表单区块', "\n";
echo                       '			div.cm-form-line    //表单行', "\n";
echo                       '			div.cm-form-line    //表单行', "\n";
echo                       '			...', "\n";
echo                       '		div.cm-section-content  //表单区块', "\n";
echo                       '			div.cm-form-line    //表单行', "\n";
echo                       '			...', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 51, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<section>';                                            // 52, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<form class="cm-form"';                              // 53, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       ' action="#"';                                      // 53, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                      '>';
echo                       '<div class="cm-section-content">';                 // 54, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<div class="cm-form-line">';                     // 55, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<p>';                                          // 56, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '表单行';                                        // 56, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                         '<div class="cm-form-line">';                     // 57, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<p>';                                          // 58, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '表单行';                                        // 58, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                         '<div class="cm-form-line">';                     // 59, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<p>';                                          // 60, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '表单行';                                        // 60, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-section-content">';                 // 61, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<div class="cm-form-line">';                     // 62, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<p>';                                          // 63, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '表单行';                                        // 63, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                         '<div class="cm-form-line">';                     // 64, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<p>';                                          // 65, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '表单行';                                        // 65, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                       '</div>';
echo                     '</form>';
echo                   '</section>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 67, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 68, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '可以在表单区块的上方添加标题（';                                    // 69, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 70, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('.cm-section-title'), 0x88);      // 70, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</code>';
echo                     '）。';                                                 // 71, 26 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 72, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 73, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 73, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<h2 class="cm-section-title">';                      // 74, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('表单区块标题'), 0x88);                 // 74, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</h2>';
echo                     '<div class="cm-section-content">';                   // 75, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 76, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<p>';                                            // 77, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '表单行';                                          // 77, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</p>';
echo                       '</div>';
echo                     '</div>';
echo                     '<h2 class="cm-section-title">';                      // 78, 43 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       htmlspecialchars(('表单区块标题'), 0x88);                 // 78, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</h2>';
echo                     '<div class="cm-section-content">';                   // 79, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 80, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<p>';                                            // 81, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '表单行';                                          // 81, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</p>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 82, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<p>';                                            // 83, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '表单行';                                          // 83, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</p>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 85, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 86, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('表单行'), 0x88);                        // 86, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 87, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 88, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '表单行内的基本结构如下：';                                       // 88, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                   '<pre>';                                                // 89, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<code>';                                             // 89, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       'div.cm-form-line    //表单行', "\n";                  // 90, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '	label.cm-form-label  //标签容器', "\n";
echo                       '		em.required \'*\'  //必填标记（可选）', "\n";
echo                       '		\'标签\'           //标签文本', "\n";
echo                       '	div.cm-form-ctrl     //控件容器', "\n";
echo                       '		input            //控件', "\n";
echo                     '</code>';
echo                   '</pre>';
echo                   '<p>';                                                  // 96, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '控件的详细约定将在下面详细陈述（各控件的结构约定请直接查看页面源码）。';                // 96, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 98, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 99, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('基本控件'), 0x88);                       // 99, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 100, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 101, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '文本输入框（包括数字、Email、URL 等 HTML5 新增的文本类型的输入框）的效果如下：';    // 101, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 102, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 103, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 103, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 104, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 105, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 106, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 107, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 107, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签';                                           // 108, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 109, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 110, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="text"';                               // 110, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="这是一个文本输入框"';                   // 110, 54 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 111, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 112, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 113, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 113, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签超过六个字了啊啊啊';                                  // 114, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 115, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 116, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="number"';                             // 116, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="这是一个数字输入框"';                   // 116, 56 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 117, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 118, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '还可以有单位（请留意该元素在结构中的位置）：';                             // 118, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 119, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 120, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 120, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 121, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 122, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 123, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 124, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 124, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '行驶里程';                                         // 125, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<label class="cm-form-unit">';                   // 126, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('万公里'), 0x88);                // 126, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 127, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 128, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="number"';                             // 128, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写数字"';                       // 128, 56 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 129, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 130, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '多行文本输入框的效果如下：';                                      // 130, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 131, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 132, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 132, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 133, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 134, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 135, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 136, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 136, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签';                                           // 137, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 138, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<textarea';                                    // 139, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="可填写多行文本……"';                   // 139, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                           '</textarea>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 140, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 141, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '下拉框的效果如下：';                                          // 141, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 142, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 143, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 143, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 144, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 145, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 146, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 147, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 147, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签';                                           // 148, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 149, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-select-wrapper">';         // 150, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<select>';                                   // 151, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<option class="cm-form-placeholder"';      // 152, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' value=""';                              // 152, 68 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                                 '请选择颜色';                                  // 153, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</option>';
echo                               '<option>';                                 // 154, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '红';                                      // 154, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</option>';
echo                               '<option>';                                 // 155, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '黑';                                      // 155, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</option>';
echo                               '<option>';                                 // 156, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '白';                                      // 156, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</option>';
echo                               '<option>';                                 // 157, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '银';                                      // 157, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</option>';
echo                             '</select>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo                 '<hr>';                                                   // 158, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<section>';                                              // 159, 15 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<h3>';                                                 // 160, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '关于占位符';                                              // 160, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</h3>';
echo                   '<div class="intro">';                                  // 161, 20 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<p>';                                                // 162, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '文本输入框的占位符采用原生的 ';                                  // 163, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<code>';                                           // 164, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         htmlspecialchars(('placeholder'), 0x88);          // 164, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '</code>';
echo                       ' 属性来实现。';                                          // 165, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</p>';
echo                     '<p>';                                                // 166, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '下拉框的占位符效果需要分三步走：';                                 // 167, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</p>';
echo                     '<ol class="cm-text">';                               // 168, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<li>';                                             // 169, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '给用作占位符的 ';                                       // 170, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<code>';                                         // 171, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('<option>'), 0x88);           // 171, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</code>';
echo                         ' 元素添加 ';                                         // 172, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<code>';                                         // 173, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('.cm-form-placeholder'), 0x88);// 173, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</code>';
echo                         ' 类。';                                            // 174, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '</li>';
echo                       '<li>';                                             // 175, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '在页面中加载 CMUI 的脚本文件及其依赖，下拉框即可获得占位符效果。';            // 176, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '</li>';
echo                       '<li>';                                             // 177, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '为避免脚本生效前后的闪动效果，对于那些给没有初始值的（即默认选中占位符选项的）下拉框，我们可以为它们手动添加 ';// 178, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<code>';                                         // 179, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('.cm-form-placeholder'), 0x88);// 179, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</code>';
echo                         ' 类。如果下拉框是在脚本加载之后动态生成的，也需要做这个处理。';                // 180, 34 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '</li>';
echo                     '</ol>';
echo                     '<p>';                                                // 181, 31 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '没有初始值的下拉框的结构如下：';                                  // 181, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 182, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<code>';                                           // 182, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         'div.cm-form-select-wrapper    //下拉框的容器', "\n";   // 183, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '	select.cm-form-placeholder      //下拉框', "\n";
echo                         '		option.cm-form-placeholder  //占位符选项', "\n";
echo                         '			\'请选择颜色\'', "\n";
echo                         '		option \'红\'                 //常规选项', "\n";
echo                         '		option \'黑\'                 //常规选项', "\n";
echo                       '</code>';
echo                     '</pre>';
                  
echo                     '<p>';                                                // 190, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '有初始值的下拉框的结构如下：';                                   // 190, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</p>';
echo                     '<pre>';                                              // 191, 23 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<code>';                                           // 191, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         'div.cm-form-select-wrapper    //下拉框的容器', "\n";   // 192, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '	select                          //下拉框', "\n";
echo                         '		option.cm-form-placeholder  //占位符选项', "\n";
echo                         '			\'请选择颜色\'', "\n";
echo                         '		option @selected \'红\'       //常规选项', "\n";
echo                         '		option \'黑\'                 //常规选项', "\n";
echo                       '</code>';
echo                     '</pre>';
echo                   '</div>';
echo                 '</section>';
echo               '</section>';
            
echo               '<section>';                                                // 199, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 200, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('复合控件'), 0x88);                       // 200, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 201, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 202, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '某些字段包含了多个控件，其布局也稍复杂。';                               // 202, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 204, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 205, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '两个下拉框的组合有两种形式：';                                     // 205, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 206, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 207, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 207, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 208, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 209, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 210, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 211, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 211, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '出生年月';                                         // 212, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 213, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-dual-select">';            // 214, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<div class="cm-form-select-wrapper">';       // 215, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<select>';                                 // 216, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<option class="cm-form-placeholder"';    // 217, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   ' value=""';                            // 217, 72 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                  '>';
echo                                   '请选择年份';                                // 218, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 219, 81 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '2014年';                                // 219, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 220, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '2015年';                                // 220, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 221, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '2016年';                                // 221, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                               '</select>';
echo                             '</div>';
echo                             '<div class="cm-form-select-wrapper">';       // 222, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<select>';                                 // 223, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<option class="cm-form-placeholder"';    // 224, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   ' value=""';                            // 224, 72 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                  '>';
echo                                   '请选择月份';                                // 225, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 226, 81 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '1月';                                   // 226, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 227, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '2月';                                   // 227, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 228, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '3月';                                   // 228, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                               '</select>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 229, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 230, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 231, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 231, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '年龄范围';                                         // 232, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 233, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-range-select">';           // 234, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<div class="cm-form-select-wrapper">';       // 235, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<select>';                                 // 236, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<option class="cm-form-placeholder"';    // 237, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   ' value=""';                            // 237, 72 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                  '>';
echo                                   '请选择';                                  // 238, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 239, 81 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '18';                                   // 239, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 240, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '19';                                   // 240, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 241, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '20';                                   // 241, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                               '</select>';
echo                               '<label class="cm-form-unit">';             // 242, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '岁';                                      // 242, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                             '</div>';
echo                             '<span>';                                     // 243, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '至';                                        // 243, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</span>';
echo                             '<div class="cm-form-select-wrapper">';       // 244, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<select>';                                 // 245, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<option class="cm-form-placeholder"';    // 246, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   ' value=""';                            // 246, 72 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                  '>';
echo                                   '请选择';                                  // 247, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 248, 81 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '19';                                   // 248, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 249, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '20';                                   // 249, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                                 '<option>';                               // 250, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '21';                                   // 250, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</option>';
echo                               '</select>';
echo                               '<label class="cm-form-unit">';             // 251, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '岁';                                      // 251, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 253, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 254, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '多个复选框的效果如下：';                                        // 254, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 255, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 256, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 256, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 257, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 258, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 259, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 260, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 260, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '发布人身份';                                        // 261, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 262, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-option-list">';            // 263, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<label>';                                    // 264, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 265, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 265, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 265, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('个人'), 0x88);             // 267, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                             '<label>';                                    // 267, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 268, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 268, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 268, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('商家'), 0x88);             // 270, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 270, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 271, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 272, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 272, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '多个选项';                                         // 273, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 274, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-option-list">';            // 275, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<label>';                                    // 276, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 277, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 277, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 277, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('选项一'), 0x88);            // 279, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                             '<label>';                                    // 279, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 280, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 280, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 280, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('选项二'), 0x88);            // 282, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                             '<label>';                                    // 282, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 283, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 283, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 283, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('选项三超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长'), 0x88);// 285, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                             '<label>';                                    // 285, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 286, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 286, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 286, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('选项四'), 0x88);            // 288, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                             '<label>';                                    // 288, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<input';                                   // 289, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="radio"';                          // 289, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' name="posterType"';                     // 289, 63 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                               htmlspecialchars(('选项五超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长超长'), 0x88);// 291, 71 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</label>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 292, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 293, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('图片上传'), 0x88);                       // 293, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 294, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 295, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<strong>';                                           // 296, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '注意';                                               // 296, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</strong>';
echo                     '：CMUI 只提供了图片上传控件的样式，未提供上传功能。';                       // 297, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 298, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 299, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '图片上传控件的初始状态如下。';                                     // 299, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 301, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 302, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 302, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 303, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 304, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 305, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 306, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 306, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 307, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 308, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 309, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 310, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 311, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 312, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 313, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 313, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 315, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 316, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '已上传不同张数的效果分别如下。';                                    // 316, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 318, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 319, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 319, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 320, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 321, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 322, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 323, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 323, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 324, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 325, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 326, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 327, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 328, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 329, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 329, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-title">';     // 330, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '封面';                                   // 330, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 331, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 332, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 332, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 333, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 334, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 335, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 335, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 336, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 337, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 338, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 338, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 339, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 340, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 341, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 342, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 343, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 344, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 344, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-title">';     // 345, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '封面';                                   // 345, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 346, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 347, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 347, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                               '<li class="cm-form-image-item">';          // 348, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 349, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 349, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-wrapper">';   // 350, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 351, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 351, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 352, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 353, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 354, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 354, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 355, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 356, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 357, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 357, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 358, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 359, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 360, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 361, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 362, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 363, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 363, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-title">';     // 364, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '封面';                                   // 364, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 365, 70 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 366, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 366, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                               '<li class="cm-form-image-item">';          // 367, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 368, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 368, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-wrapper">';   // 369, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 370, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 370, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                               '<li class="cm-form-image-item">';          // 371, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 372, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 372, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-wrapper">';   // 373, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 374, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ($data->imgUrl));// 374, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 375, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 376, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 377, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 377, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo                 '<div class="intro">';                                    // 378, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p class="copyright">';                                // 379, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '（图片来源：Peter Miller @ Flickr）';                       // 379, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 381, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 382, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '上传的不同阶段的样式分别如下。';                                    // 382, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 384, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 385, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 385, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 386, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 387, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 388, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 389, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 389, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '正在上传示意';                                       // 390, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 391, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 392, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 393, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 394, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 395, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 395, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-status-loading">';// 396, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 397, 78 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img>';                                // 398, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 399, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 400, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 401, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 401, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 402, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 403, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 404, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 404, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '上传失败示意';                                       // 405, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 406, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 407, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 408, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 409, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 410, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 410, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-status-failed">';// 411, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '上传失败';                                 // 411, 78 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 412, 78 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 413, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ('about:blank'));// 413, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 414, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 415, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 416, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 416, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 418, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 419, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('提示信息'), 0x88);                       // 419, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 420, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 421, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '静态的提示语有以下两种形式。首先是块状的强化提示：';                          // 421, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 423, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 424, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 424, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 425, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 426, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 427, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 428, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 428, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '联系电话';                                         // 429, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<span class="cm-form-unit">';                    // 430, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('万元'), 0x88);                 // 430, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</span>';
echo                         '<div class="cm-form-ctrl">';                     // 431, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 432, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="tel"';                                // 432, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写您的联系电话"';                   // 432, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                         '<div class="cm-form-note">';                     // 433, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '为保护您的账号安全，请填写注册手机号。';                          // 434, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 435, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 436, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 437, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 437, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '联系电话';                                         // 438, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<span class="cm-form-unit">';                    // 439, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           htmlspecialchars(('万元'), 0x88);                 // 439, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</span>';
echo                         '<div class="cm-form-ctrl">';                     // 440, 47 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 441, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="tel"';                                // 441, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写您的联系电话"';                   // 441, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                         '<div class="cm-form-note">';                     // 442, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<h4>';                                         // 443, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '富文本也没问题';                                    // 443, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</h4>';
echo                           '<p>';                                          // 444, 36 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '为保护您的账号安全，请填写注册手机号。';                        // 444, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                           '<p>';                                          // 445, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '提示语段落文字文字文字文字。';                             // 445, 35 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</p>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 447, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 448, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '然后是放置在输入框附近的弱化提示：';                                  // 448, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 449, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 450, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 450, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 451, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 452, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 453, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 454, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 454, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '联系电话';                                         // 455, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 456, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 457, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="tel"';                                // 457, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写您的联系电话"';                   // 457, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                           '<div class="cm-form-note-minor">';             // 459, 67 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '为保护您的账号安全，请填写注册手机号';                         // 459, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 460, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 461, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 462, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 462, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 463, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 464, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 465, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 466, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 467, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 468, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 469, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 469, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                             '<div class="cm-form-note-minor">';           // 470, 62 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '最多上传12张图片';                                // 470, 60 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 472, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 473, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '动态的提示语也有两种形式。一是表单校验时显示的错误信息，效果如下：';                  // 473, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                   '<div class="cm-msg-box cm-msg-box-warning">';          // 474, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '<strong>';                                           // 475, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '注意';                                               // 475, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '</strong>';
echo                     '：CMUI 仅提供了错误信息的样式，未提供表单校验功能。';                       // 476, 28 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</div>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 477, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 478, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 478, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 479, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 480, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 481, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 482, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 482, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           'QQ号';                                          // 483, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 484, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 485, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="number"';                             // 485, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写数字"';                       // 485, 56 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                         '<div class="cm-form-error">';                    // 486, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<i class="cm-icon cm-icon-x20-msg-error">';    // 487, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</i>';
echo                           '此项必填，错误信息超长超长超长超长超长超长超长超长超长超长超长超长超长';          // 488, 64 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 489, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 490, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 491, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 491, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '联系电话';                                         // 492, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 493, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<input';                                       // 494, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' type="tel"';                                // 494, 42 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' placeholder="请填写您的联系电话"';                   // 494, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                         '</div>';
echo                         '<div class="cm-form-note-minor">';               // 495, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '为保护您的账号安全，请填写注册手机号';                           // 496, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                         '<div class="cm-form-error">';                    // 497, 51 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<i class="cm-icon cm-icon-x20-msg-error">';    // 498, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</i>';
echo                           '此项必填';                                         // 499, 64 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 500, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 501, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 502, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 502, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '图片';                                           // 503, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 504, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 505, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 506, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 507, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 508, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 509, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 509, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                         '<div class="cm-form-note-minor">';               // 510, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '最多上传12张图片';                                    // 510, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                         '<div class="cm-form-error">';                    // 511, 52 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<i class="cm-icon cm-icon-x20-msg-error">';    // 512, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</i>';
echo                           '必须上传一张图片';                                     // 513, 64 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 514, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 515, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 516, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 516, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '行驶证照片';                                        // 517, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 518, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 519, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 520, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 521, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 522, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 523, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 523, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                         '<div class="cm-form-error">';                    // 524, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<i class="cm-icon cm-icon-x20-msg-error">';    // 525, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</i>';
echo                           '必须上传一张图片';                                     // 526, 64 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                         '<div class="cm-form-note">';                     // 527, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<strong>';                                     // 528, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '郑重承诺：';                                      // 528, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</strong>';
echo                           '证件照片仅用于信息核查，不会在页面展示';                          // 529, 40 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 531, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 532, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '二是交互过程中产生的强化错误提示，参见以下效果：';                           // 532, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
echo                 '<div class="demo-stage">';                               // 533, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 534, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 534, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 535, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 536, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 537, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 538, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 538, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '上传失败示意';                                       // 539, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 540, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<div class="cm-form-image">';                  // 541, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '<ul class="cm-form-image-list">';            // 542, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<li class="cm-form-image-item">';          // 543, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '<button class="cm-form-image-btn-remove">';// 544, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '×';                                    // 544, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</button>';
echo                                 '<span class="cm-form-image-status-failed">';// 545, 77 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '上传失败';                                 // 545, 78 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 '</span>';
echo                                 '<span class="cm-form-image-wrapper">';   // 546, 78 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                   '<img';                                 // 547, 49 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                     \jedi\attribute('src', ('about:blank'));// 547, 53 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                    '>';
echo                                 '</span>';
echo                               '</li>';
echo                             '</ul>';
echo                             '<div class="cm-form-image-btn-add">';        // 548, 58 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '<label>';                                  // 549, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                               '</label>';
echo                               '<input';                                   // 550, 46 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                 ' type="file"';                           // 550, 50 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                                '>';
echo                             '</div>';
echo                           '</div>';
echo                         '</div>';
echo                         '<div class="cm-form-note cm-form-note-error">';  // 551, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '超时了，网络不给力哦';                                   // 552, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
echo               '</section>';
            
echo               '<section>';                                                // 554, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '<h2>';                                                   // 555, 13 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   htmlspecialchars(('交互组件'), 0x88);                       // 555, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                 '</h2>';
echo                 '<div class="intro">';                                    // 556, 16 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 557, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '某些字段点击后会打开一个独立的交互组件（比如 Panel、Dialog 或 Subview）来完成内容的填写。因此这些字段在显示值的位置并不是一个表单控件，而是交互组件的占位符和触发器。';// 557, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 559, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 560, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 560, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 561, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 562, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 563, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 564, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 564, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签';                                           // 565, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 566, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-placeholder">';// 567, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('占位符（无箭头）'), 0x88);         // 568, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 569, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 570, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 571, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 571, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '标签';                                           // 572, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 573, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-placeholder cm-form-ctrl-value-with-right-arrow">';// 574, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('占位符（有箭头）'), 0x88);         // 575, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 576, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 577, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 578, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 578, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '品牌';                                           // 579, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 580, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-placeholder cm-form-ctrl-value-with-right-arrow">';// 581, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('请选择（可多选）'), 0x88);         // 582, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                         '<div class="cm-form-note-minor">';               // 583, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '找不到您的车？';                                      // 584, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<a';                                           // 585, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' href="#"';                                  // 585, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                             '填写一个';                                       // 586, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</a>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
echo                 '</div>';
              
echo                 '<div class="intro">';                                    // 588, 27 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<p>';                                                  // 589, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     '已填状态如下。';                                            // 589, 19 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '</p>';
echo                 '</div>';
              
echo                 '<div class="demo-stage">';                               // 591, 22 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                   '<form class="cm-form"';                                // 592, 17 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                     ' action="#"';                                        // 592, 30 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                    '>';
echo                     '<div class="cm-section-content">';                   // 593, 21 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                       '<div class="cm-form-line">';                       // 594, 25 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 595, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 596, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 596, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '地区';                                           // 597, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 598, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-ctrl-value-with-right-arrow">';// 599, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('徐汇区 / 徐家汇'), 0x88);        // 600, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 601, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 602, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 603, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 603, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '福利待遇';                                         // 604, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 605, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-ctrl-value-with-right-arrow">';// 606, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('五险一金,包吃,双休,年底双薪'), 0x88);  // 607, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                       '</div>';
echo                       '<div class="cm-form-line">';                       // 608, 41 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '<label class="cm-form-label">';                  // 609, 29 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<em class="required">';                        // 610, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             '*';                                          // 610, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</em>';
echo                           '品牌';                                           // 611, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                         '</label>';
echo                         '<div class="cm-form-ctrl">';                     // 612, 48 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<span class="cm-form-ctrl-value cm-form-ctrl-value-with-right-arrow">';// 613, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             htmlspecialchars(('奥迪100 1992年款 2.6 手动E化油器'), 0x88);// 614, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</span>';
echo                         '</div>';
echo                         '<div class="cm-form-note-minor">';               // 615, 45 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '找不到您的车？';                                      // 616, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '<a';                                           // 617, 33 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                             ' href="#"';                                  // 617, 38 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                            '>';
echo                             '填写一个';                                       // 618, 37 @ /Users/birdstudio/Project/CMUI/demo/demo/v2/theme/baixing/src/form.jedi
echo                           '</a>';
echo                         '</div>';
echo                       '</div>';
echo                     '</div>';
echo                   '</form>';
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
