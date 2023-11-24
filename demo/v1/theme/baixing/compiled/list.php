<?php
echo '<!doctype html>', "\n";
 //  #base
   $data = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);
   $data->pathStatic = '/demo/v1/static/baixing';
   $data->pathCSS = $data->pathStatic . '/css/dist';
   $data->pathJS = $data->pathStatic . '/js/dist';
   $data->pageId = '';
   $data->pageTitle = '';
   $data->metaKeywords = 'CMUI, UI, Framework, CSS, Mobile, Web';
   $data->metaDescription = 'CMUI - Lightweight UI solution for mobile web. CMUI 是一个专攻移动网页的 UI 框架，它提供了丰富的组件和简洁的接口，开箱即用。CMUI 帮助开发者摆脱样式细节和兼容性困扰，从而腾出更多精力投入到业务开发中。';
 //  #base
   $data->pageId = 'list';
   $data->pageTitle = 'List';

 echo '<html'
   , ' lang="zh-cmn-Hans"'
  , '>'
   , '<head'
    , '>'
     , '<meta'
       , ' charset="utf-8"'
      , '>'
     , '<title'
      , '>';
       //  #title
         if ($data->pageTitle) {
           echo htmlspecialchars($data->pageTitle, 0x88)
           , ' - ';
         }
         echo 'CMUI Demo'
     , '</title>';
    
     //  #head-meta
       echo '<meta'
         , ' name="viewport"'
         , ' content="initial-scale=1, user-scalable=no"'
        , '>';
     //  #head-seo
       if ($data->metaKeywords) {
         echo '<meta'
           , ' name="keywords"'
           , ' content="'
           , htmlspecialchars(($data->metaKeywords), 0x88)
           , '"'
          , '>';
       }
       if ($data->metaDescription) {
         echo '<meta'
           , ' name="description"'
           , ' content="'
           , htmlspecialchars(($data->metaDescription), 0x88)
           , '"'
          , '>';
       }
    
     //  #stylesheets
       echo '<link'
         , ' rel="stylesheet"'
         , ' href="'
         , htmlspecialchars(($data->pathCSS) . ('/demo.css'), 0x88)
         , '"'
        , '>';
     //  #head-scripts
   echo '</head>';
  
   echo '<body'
     , ' id="'
     , htmlspecialchars(($data->pageId), 0x88)
     , '"'
    , '>';
     //  #content
       echo '<div class="cmSubview cmSubviewRoot"'
        , '>';
         //  #header
           echo '<header'
            , '>'
             , '<h1'
              , '>';
               //  #heading
                 if ($data->pageTitle) {
                   echo htmlspecialchars($data->pageTitle, 0x88);
                 }
                 else {
                   echo 'CMUI Demo';
                 }
             echo '</h1>'
           , '</header>';
         //  #main
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('概述'), 0x88)
             , '</h1>'
             , '<div class="intro cmText"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('列表元素有一些基本的结构约定。'), 0x88)
               , '</p>'
               , '<ul'
                , '>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('列表元素必须具有 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmList'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 这个基础类名，然后通过其它辅助性的类名来指定细节样式和属性。'), 0x88)
                 , '</li>'
                 , '<li'
                  , '>'
                   , htmlspecialchars(('列表项必须有一个（通常也应该只有一个）子元素作为其“内容元素”。'), 0x88)
                 , '</li>'
               , '</ul>'
             , '</div>'
           , '</article>'
           , '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('内容'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('普通列表'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('纯展示列表的列表项的内容元素可以是 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('<p>'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 或 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('<div>'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 元素。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li > p', "\n"
                     , '    li > p', "\n"
                     , '    li > div', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList"'
                , '>'
                 , '<li'
                  , '>'
                   , '<p'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</p>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<p'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</p>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<div'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</div>'
                 , '</li>'
               , '</ul>'
             , '</section>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('链接列表'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('我们用得比较多的其实是链接列表，它是很常见的 UI 元素。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('链接列表的列表项的内容元素是链接元素。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li > a', "\n"
                     , '    li > a', "\n"
                     , '    li > a', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList"'
                , '>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>'
           , '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('列表项的右箭头'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('给需要加右箭头的列表项添加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmRightArrow'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类名。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('请记住只有链接列表项才会显示出右箭头——这听起来像个限制，但其实很合理。因为，如果这个列表项没有动作，只是纯展示，那它也是不需要有右箭头的。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li > a', "\n"
                     , '    li.cmRightArrow > a', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList"'
                , '>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li class="cmRightArrow"'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
             , '<hr'
              , '>'
             , '<section'
              , '>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果恰好一个列表中的每个列表项都需要右箭头，那把 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmRightArrow'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类名加给列表元素就可以了。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList.cmRightArrow', "\n"
                     , '    li > a', "\n"
                     , '    li > a', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList cmRightArrow"'
                , '>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
          
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('列表项有徽章'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('给列表项添加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('data-badge'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 属性可以生成一个徽章。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li @data-badge="999"', "\n"
                     , '        p', "\n"
                     , '    li @data-badge="999999"', "\n"
                     , '        a', "\n"
                     , '    li.cmRightArrow @data-badge="999"', "\n"
                     , '        a', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList"'
                , '>'
                 , '<li'
                   , ' data-badge="'
                   , htmlspecialchars(('999'), 0x88)
                   , '"'
                  , '>'
                   , '<p'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</p>'
                 , '</li>'
                 , '<li'
                   , ' data-badge="'
                   , htmlspecialchars(('999999'), 0x88)
                   , '"'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li class="cmRightArrow"'
                   , ' data-badge="'
                   , htmlspecialchars(('999'), 0x88)
                   , '"'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
          
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('列表项有值'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('给列表项添加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('data-value'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 属性可以在列表项右侧显示一个值。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li @data-value="foobar"', "\n"
                     , '        p', "\n"
                     , '    li @data-value="foo"', "\n"
                     , '        a', "\n"
                     , '    li.cmRightArrow @data-value="bar"', "\n"
                     , '        a', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<ul class="cmList"'
                , '>'
                 , '<li'
                   , ' data-value="'
                   , htmlspecialchars(('列表项的值'), 0x88)
                   , '"'
                  , '>'
                   , '<p'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</p>'
                 , '</li>'
                 , '<li'
                   , ' data-value="'
                   , htmlspecialchars(('列表项的值'), 0x88)
                   , '"'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li class="cmRightArrow"'
                   , ' data-value="'
                   , htmlspecialchars(('列表项的值很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '"'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
          
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('列表项有图标'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('图标元素应该是列表项内容元素的第一个子元素。有点拗口，看结构吧：'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'ul.cmList', "\n"
                     , '    li > a @href="#"', "\n"
                     , '        i.cmIcon.cmX20', "\n"
                     , '        "foobar"', "\n"
                     , '    ...', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>';
              
               echo '<ul class="cmList icon-size"'
                , '>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , '<i class="cmIcon cmX20"'
                      , '>'
                     , '</i>'
                     , htmlspecialchars(('试试各种尺寸 20x20'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , '<i class="cmIcon cmX30"'
                      , '>'
                     , '</i>'
                     , htmlspecialchars(('试试各种尺寸 30x30'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , '<i class="cmIcon cmX40"'
                      , '>'
                     , '</i>'
                     , htmlspecialchars(('试试各种尺寸 40x40'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , '<i class="cmIcon cmX50"'
                      , '>'
                     , '</i>'
                     , htmlspecialchars(('试试各种尺寸 50x50'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
        
         //  #back
           if ($data->pageTitle) {
             echo '<article class="back"'
              , '>'
               , '<a'
                 , ' href="'
                 , htmlspecialchars(('index.php'), 0x88)
                 , '"'
                , '>'
                 , htmlspecialchars(('<< 返回首页'), 0x88)
               , '</a>'
             , '</article>';
           }
         //  #footer
           echo '<footer'
            , '>'
            , '&copy; CMUI.NET'
           , '</footer>'
       , '</div>';
    
     //  #subviews
     //  #widgets
    
     //  #defer-scripts
       echo '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/lib.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
       , '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/cmui.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
       , '<script'
         , ' src="'
         , htmlspecialchars(($data->pathJS) . ('/demo.js'), 0x88)
         , '"'
        , '>'
       , '</script>'
   , '</body>'
 , '</html>';


?>
