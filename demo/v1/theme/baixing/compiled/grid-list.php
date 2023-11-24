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
   $data->pageId = 'grid-list';
   $data->pageTitle = 'Grid List';

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
           echo '<article class="summary"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('概述'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('网格列表主要以行列式呈现的列表。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('网格列表元素必须具有 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.cmGridList'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 这个基础类名。'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'ul.cmGridList', "\n"
                   , '    li > a', "\n"
                   , '    li > a', "\n"
                   , '    li > a', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
           , '</article>';
          
           echo '<article class="line-style"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('网格列表样式'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('默认有分隔线'), 0x88)
               , '</h2>'
               , '<ul class="cmGridList"'
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
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('无有分隔线'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('给列表元素增加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmGridListNoBorder'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类名即可去除分隔线。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('绿色虚线框用于示意元素范围。'), 0x88)
                 , '</p>'
               , '</div>'
               , '<ul class="cmGridList cmGridListNoBorder"'
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
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
           , '</article>';
          
           echo '<article class="column-width"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('网格列表的列数'), 0x88)
             , '</h1>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('默认两列'), 0x88)
               , '</h2>'
               , '<ul class="cmGridList"'
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
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
                 , '<li'
                  , '>'
                   , '<a'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('列表项很长很长很长很长很长很长很长很长很长很长很长很长很长很长'), 0x88)
                   , '</a>'
                 , '</li>'
               , '</ul>'
             , '</section>'
             , '<section'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('多列 '), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('可以通过指定列表项的宽度来实现对列数的控制。比如下面的 CSS 代码将列数设置为（最多）4 列，并确保每列最多可显示 6 个汉字。'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , '#my-grid-list > li {', "\n"
                     , '    width: 25%;', "\n"
                     , '    min-width: 6em;', "\n"
                     , '}', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
             , '</section>'
           , '</article>';
          
           echo '<article class="selected-item"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('当前项的样式'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('给当前列表项增加 '), 0x88)
                 , '<code'
                  , '>'
                   , htmlspecialchars(('.selected'), 0x88)
                 , '</code>'
                 , htmlspecialchars((' 类名即可。'), 0x88)
               , '</p>'
             , '</div>'
             , '<ul class="cmGridList"'
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
               , '<li class="selected"'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('当前列表项'), 0x88)
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
           , '</article>';
          
           echo '<article class="form"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('用于表单'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('可用于表单中的单选框、复选框等。'), 0x88)
               , '</p>'
               , '<pre'
                , '>'
                 , '<code'
                  , '>'
                   , 'form > ul.cmGridList', "\n"
                   , '    li > label > input', "\n"
                   , '    li > label > input', "\n"
                   , '    li > label > input', "\n"
                 , '</code>'
               , '</pre>'
             , '</div>'
             , '<ul class="cmGridList"'
              , '>'
               , '<li'
                , '>'
                 , '<label'
                  , '>'
                   , '<input'
                     , ' name="radio"'
                     , ' type="radio"'
                    , '>'
                   , htmlspecialchars(('表单选项'), 0x88)
                 , '</label>'
               , '</li>'
               , '<li'
                , '>'
                 , '<label'
                  , '>'
                   , '<input'
                     , ' name="radio"'
                     , ' type="radio"'
                    , '>'
                   , htmlspecialchars(('表单选项'), 0x88)
                 , '</label>'
               , '</li>'
               , '<li'
                , '>'
                 , '<label'
                  , '>'
                   , '<input'
                     , ' name="checkbox"'
                     , ' type="checkbox"'
                    , '>'
                   , htmlspecialchars(('表单选项'), 0x88)
                 , '</label>'
               , '</li>'
               , '<li'
                , '>'
                 , '<label'
                  , '>'
                   , '<input'
                     , ' name="checkbox"'
                     , ' type="checkbox"'
                    , '>'
                   , htmlspecialchars(('表单选项'), 0x88)
                 , '</label>'
               , '</li>'
             , '</ul>'
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
