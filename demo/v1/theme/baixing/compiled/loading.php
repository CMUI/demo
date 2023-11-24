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
   $data->pageId = 'loading';
   $data->pageTitle = 'Loading';

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
           echo '<article class="loading"'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('Loading 提示'), 0x88)
             , '</h1>'
             , '<div class="intro"'
              , '>'
               , '<p'
                , '>'
                 , htmlspecialchars(('Loading 标志一种很好的暗示用户等待的方式，可以显著提升用户的耐心。'), 0x88)
               , '</p>'
               , '<p'
                , '>'
                 , htmlspecialchars(('当某个操作可能耗时超过 100ms 时，就应该使用 Loading 提示。当某个操作耗时超过 10 秒且仍然存活时，应在 Loading 提示上更新提示语，以提示用户当前操作仍在进行。'), 0x88)
               , '</p>'
             , '</div>'
             , '<section class="normal"'
              , '>'
               , '<dl'
                , '>'
                 , '<dt'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                     , ' data-action="'
                     , htmlspecialchars(('loading-show'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('显示'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , 'CMUI.loading.show()'
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
                     , htmlspecialchars(('loading-hide'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('隐藏'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , 'CMUI.loading.hide()'
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
                     , htmlspecialchars(('loading-fade-in'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('淡入'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , 'CMUI.loading.fadeIn()'
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
                     , htmlspecialchars(('loading-fade-out'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('淡出'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , 'CMUI.loading.fadeOut()'
                   , '</code>'
                 , '</dd>'
               , '</dl>'
             , '</section>'
             , '<section class="with-text"'
              , '>'
               , '<dl'
                , '>'
                 , '<dt'
                  , '>'
                   , '<a class="cmBtn"'
                     , ' href="'
                     , htmlspecialchars(('#'), 0x88)
                     , '"'
                     , ' data-action="'
                     , htmlspecialchars(('loading-show-with-text'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('带文字显示'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('CMUI.loading.show(\'str\')'), 0x88)
                   , '</code>'
                 , '</dd>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('CMUI.loading.fadeIn(\'str\')'), 0x88)
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
                     , htmlspecialchars(('loading-update-text'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('更新文字'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('CMUI.loading.updateText(\'new-str\')'), 0x88)
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
                     , htmlspecialchars(('loading-clear-text'), 0x88)
                     , '"'
                    , '>'
                     , htmlspecialchars(('清除文字'), 0x88)
                   , '</a>'
                 , '</dt>'
                 , '<dd'
                  , '>'
                   , '<code'
                    , '>'
                     , htmlspecialchars(('CMUI.loading.updateText(\'\')'), 0x88)
                   , '</code>'
                 , '</dd>'
               , '</dl>'
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
