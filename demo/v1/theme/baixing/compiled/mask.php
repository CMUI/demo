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
   $data->pageId = 'mask';
   $data->pageTitle = 'Mask';

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
           echo '<article class="mask"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('遮罩层'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('遮罩层是一个覆盖整个视口的半透明层，被它遮住的元素不可交互。这个组件是一个底层组件，可以和 Loading 组件同时使用，也可以被对话框组件调用作为 backdrop（未完成）。'), 0x88)
               , '</p>'
             , '</div>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('提示：在本页打开遮罩后，仍可点击遮罩下层的按钮。'), 0x88)
                 , '<strong'
                  , '>'
                   , htmlspecialchars(('不过请注意这不是遮罩本身的特性，只是本页面为了便于测试而增加的行为。'), 0x88)
                 , '</strong>'
               , '</p>'
             , '</div>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                   , ' data-action="'
                   , htmlspecialchars(('mask-show'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('显示'), 0x88)
                 , '</a>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , 'CMUI.mask.show()'
                 , '</code>'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                   , ' data-action="'
                   , htmlspecialchars(('mask-hide'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('隐藏'), 0x88)
                 , '</a>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , 'CMUI.mask.hide()'
                 , '</code>'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                   , ' data-action="'
                   , htmlspecialchars(('mask-fade-in'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('淡入'), 0x88)
                 , '</a>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , 'CMUI.mask.fadeIn()'
                 , '</code>'
               , '</dd>'
             , '</dl>'
             , '<dl'
              , '>'
               , '<dt'
                , '>'
                 , '<a class="cmBtn"'
                   , ' href="'
                   , htmlspecialchars(('#'), 0x88)
                   , '"'
                   , ' data-action="'
                   , htmlspecialchars(('mask-fade-out'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('淡出'), 0x88)
                 , '</a>'
               , '</dt>'
               , '<dd'
                , '>'
                 , '<code'
                  , '>'
                   , 'CMUI.mask.fadeOut()'
                 , '</code>'
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
