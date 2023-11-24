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
   $data->pageId = 'color';
   $data->pageTitle = 'Color';

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
           echo '<article class="color"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('颜色'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('设计师已指定以下颜色，应通过变量来使用这些颜色。'), 0x88)
               , '</p>'
             , '</div>';
            
             echo '<dl class="color-fg"'
              , '>'
               , '<dt'
                , '>'
                 , '[深灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$color-fg'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '常规文本颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="color-fg-minor"'
              , '>'
               , '<dt'
                , '>'
                 , '[浅灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$color-fg-minor'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '次要文本颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="color-fg-light"'
              , '>'
               , '<dt'
                , '>'
                 , '[中灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$color-fg-light'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '次级文本中的强调颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="color-fg-dark"'
              , '>'
               , '<dt'
                , '>'
                 , '[黑灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$color-fg-dark'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '特别强调文本颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="color-fg-highlight"'
              , '>'
               , '<dt'
                , '>'
                 , '[高亮]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$color-fg-highlight'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '高亮文本颜色'
               , '</dd>'
             , '</dl>';
            
             echo '<hr'
              , '>';
            
             echo '<dl class="bx-color-gray"'
              , '>'
               , '<dt'
                , '>'
                 , '[灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$bx-color-gray'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '图片边框颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="bx-color-light-gray"'
              , '>'
               , '<dt'
                , '>'
                 , '[浅灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$bx-color-light-gray'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '一般作为分割线颜色'
               , '</dd>'
             , '</dl>'
             , '<dl class="bx-color-x-light-gray"'
              , '>'
               , '<dt'
                , '>'
                 , '[超浅灰]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$bx-color-x-light-gray'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '一般作为区块底色'
               , '</dd>'
             , '</dl>'
             , '<dl class="bx-color-active-green"'
              , '>'
               , '<dt'
                , '>'
                 , '[激活绿]'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , '$bx-color-active-green'
                 , '</code>'
               , '</dd>'
               , '<dd'
                , '>'
                 , '已激活项目的颜色'
               , '</dd>'
             , '</dl>'
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
