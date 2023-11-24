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
   $data->pageId = 'index';

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
           echo '<article class="version-info"'
            , '>'
             , '<div'
              , '>'
               , '<p'
                , '>'
                 , '以下演示页面适用于 CMUI v0.10。'
               , '</p>'
               , '<p'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('https://github.com/CMUI/CMUI'), 0x88)
                   , '"'
                   , ' target="'
                   , htmlspecialchars(('_blank'), 0x88)
                   , '"'
                  , '>'
                   , 'View on GitHub'
                 , '</a>'
               , '</p>'
             , '</div>'
           , '</article>';
          
           echo '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('基础风格'), 0x88)
             , '</h1>'
             , '<ul class="content"'
              , '>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('color.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('颜色'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('text.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('文本'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('icon.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('图标'), 0x88)
                 , '</a>'
               , '</li>'
             , '</ul>'
           , '</article>'
           , '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('元素'), 0x88)
             , '</h1>'
             , '<ul class="content"'
              , '>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('btn.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('按钮'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('info-box.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('信息框'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('list.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('列表'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('grid-list.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('网格列表'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('msg-box.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('提示框'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('page.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('页面'), 0x88)
                 , '</a>'
               , '</li>'
             , '</ul>'
           , '</article>'
           , '<article'
            , '>'
             , '<h1'
              , '>'
               , htmlspecialchars(('组件'), 0x88)
             , '</h1>'
             , '<ul class="content"'
              , '>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('mask.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('遮罩层（Mask）'), 0x88)
                 , '</a>'
               , '</li>'
               , '<li'
                , '>'
                 , '<a'
                   , ' href="'
                   , htmlspecialchars(('loading.php'), 0x88)
                   , '"'
                  , '>'
                   , htmlspecialchars(('加载提示（Loading）'), 0x88)
                 , '</a>'
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
