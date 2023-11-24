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
   $data->pageId = 'info-box';
   $data->pageTitle = 'Info Box';

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
           echo '<article class="info-box"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('信息框'), 0x88)
             , '</h1>'
             , '<section class="as-layout-wrapper"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('作为布局容器'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('对块级元素使用 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmInfoBox'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类名即可。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('下面是一个信息框作为布局容器的例子：'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'div.cmInfoBox', "\n"
                     , '    p', "\n"
                     , '    a.cmBtn', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<div class="cmInfoBox"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('这里是按钮的提示语：'), 0x88)
                 , '</p>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                  , '>'
                   , '示例按钮'
                 , '</a>'
               , '</div>'
             , '</section>'
             , '<section class="as-text-wrapper"'
              , '>'
               , '<h2'
                , '>'
                 , htmlspecialchars(('作为文本容器'), 0x88)
               , '</h2>'
               , '<div class="intro"'
                , '>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('如果需要内部的元素呈现出文本格式，则需要再追加 '), 0x88)
                   , '<code'
                    , '>'
                     , htmlspecialchars(('.cmText'), 0x88)
                   , '</code>'
                   , htmlspecialchars((' 类名。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('下面是一个信息框作为文本容器的例子：'), 0x88)
                 , '</p>'
                 , '<pre'
                  , '>'
                   , '<code'
                    , '>'
                     , 'div.cmInfoBox.cmText', "\n"
                     , '    h2', "\n"
                     , '    p', "\n"
                     , '    h3', "\n"
                     , '    p', "\n"
                     , '    p', "\n"
                   , '</code>'
                 , '</pre>'
               , '</div>'
               , '<div class="cmInfoBox cmText"'
                , '>'
                 , '<h2'
                  , '>'
                   , htmlspecialchars(('二级标题'), 0x88)
                 , '</h2>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
                 , '</p>'
                 , '<h3'
                  , '>'
                   , htmlspecialchars(('三级标题'), 0x88)
                 , '</h3>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('段落文字段落文字段落文字段落文字。'), 0x88)
                 , '</p>'
                 , '<p'
                  , '>'
                   , htmlspecialchars(('段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字段落文字。'), 0x88)
                 , '</p>'
               , '</div>'
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
